<?php

declare(strict_types=1);

namespace OCA\Talk\Vendor\CuyZ\Valinor\Utility\Reflection;

use Attribute;
use Closure;
use Error;
use ReflectionAttribute;
use ReflectionClass;
use ReflectionFunction;
use ReflectionIntersectionType;
use ReflectionMethod;
use ReflectionNamedType;
use ReflectionParameter;
use ReflectionProperty;
use ReflectionType;
use ReflectionUnionType;
use Reflector;
use RuntimeException;

use function array_filter;
use function array_map;
use function class_exists;
use function implode;
use function interface_exists;
use function spl_object_hash;
use function str_contains;

/** @internal */
final class Reflection
{
    /** @var array<class-string, ReflectionClass<object>> */
    private static array $classReflection = [];

    /** @var array<string, ReflectionFunction> */
    private static array $functionReflection = [];

    /**
     * Case-sensitive implementation of `class_exists` and `interface_exists`.
     */
    public static function classOrInterfaceExists(string $name): bool
    {
        if (! class_exists($name) && ! interface_exists($name)) {
            return false;
        }

        return self::class($name)->name === ltrim($name, '\\');
    }

    /**
     * @param class-string $className
     * @return ReflectionClass<object>
     */
    public static function class(string $className): ReflectionClass
    {
        return self::$classReflection[$className] ??= new ReflectionClass($className);
    }

    public static function function(callable $function): ReflectionFunction
    {
        $closure = Closure::fromCallable($function);

        return self::$functionReflection[spl_object_hash($closure)] ??= new ReflectionFunction($closure);
    }

    /**
     * @param ReflectionClass<object>|ReflectionProperty|ReflectionMethod|ReflectionFunction|ReflectionParameter $reflection
     * @return array<ReflectionAttribute<object>>
     */
    public static function attributes(Reflector $reflection): array
    {
        $attributes = array_filter(
            $reflection->getAttributes(),
            static fn (ReflectionAttribute $attribute) => $attribute->getName() !== Attribute::class,
        );

        return array_filter(
            array_map(
                static function (ReflectionAttribute $attribute) {
                    try {
                        $attribute->newInstance();

                        return $attribute;
                    } catch (Error) {
                        // Race condition when the attribute is affected to a property/parameter
                        // that was PROMOTED, in this case the attribute will be applied to both
                        // ParameterReflection AND PropertyReflection, BUT the target arg inside the attribute
                        // class is configured to support only ONE of them (parameter OR property)
                        // https://wiki.php.net/rfc/constructor_promotion#attributes for more details.
                        // Ignore attribute if the instantiation failed.
                        return null;
                    }
                },
                $attributes,
            ),
        );
    }

    public static function signature(Reflector $reflection): string
    {
        if ($reflection instanceof ReflectionClass) {
            return $reflection->name;
        }

        if ($reflection instanceof ReflectionProperty) {
            return "{$reflection->getDeclaringClass()->name}::\$$reflection->name";
        }

        if ($reflection instanceof ReflectionMethod) {
            return "{$reflection->getDeclaringClass()->name}::$reflection->name()";
        }

        if ($reflection instanceof ReflectionFunction) {
            if (str_contains($reflection->name, '{closure}')) {
                $startLine = $reflection->getStartLine();
                $endLine = $reflection->getEndLine();

                return $startLine === $endLine
                    ? "Closure (line $startLine of {$reflection->getFileName()})"
                    : "Closure (lines $startLine to $endLine of {$reflection->getFileName()})";
            }

            return $reflection->getClosureScopeClass()
                ? $reflection->getClosureScopeClass()->name . '::' . $reflection->name . '()'
                : $reflection->name . '()';
        }

        if ($reflection instanceof ReflectionParameter) {
            $signature = $reflection->getDeclaringFunction()->name . "(\$$reflection->name)";
            $class = $reflection->getDeclaringClass();

            if ($class) {
                $signature = $class->name . '::' . $signature;
            }

            return $signature;
        }

        throw new RuntimeException('Invalid reflection type `' . $reflection::class . '`.');
    }

    public static function flattenType(ReflectionType $type): string
    {
        if ($type instanceof ReflectionUnionType) {
            return implode('|', $type->getTypes());
        }

        if ($type instanceof ReflectionIntersectionType) {
            return implode('&', $type->getTypes());
        }

        /** @var ReflectionNamedType $type */
        $name = $type->getName();

        if ($name !== 'null' && $type->allowsNull() && $name !== 'mixed') {
            return $name . '|null';
        }

        return $name;
    }
}
