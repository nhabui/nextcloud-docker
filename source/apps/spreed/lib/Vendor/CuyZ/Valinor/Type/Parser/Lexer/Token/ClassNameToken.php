<?php

declare(strict_types=1);

namespace OCA\Talk\Vendor\CuyZ\Valinor\Type\Parser\Lexer\Token;

use OCA\Talk\Vendor\CuyZ\Valinor\Type\Parser\Exception\Constant\ClassConstantCaseNotFound;
use OCA\Talk\Vendor\CuyZ\Valinor\Type\Parser\Exception\Constant\MissingClassConstantCase;
use OCA\Talk\Vendor\CuyZ\Valinor\Type\Parser\Exception\Constant\MissingSpecificClassConstantCase;
use OCA\Talk\Vendor\CuyZ\Valinor\Type\Parser\Lexer\TokenStream;
use OCA\Talk\Vendor\CuyZ\Valinor\Type\Type;
use OCA\Talk\Vendor\CuyZ\Valinor\Type\Types\NativeClassType;
use OCA\Talk\Vendor\CuyZ\Valinor\Type\Types\Factory\ValueTypeFactory;
use OCA\Talk\Vendor\CuyZ\Valinor\Type\Types\InterfaceType;
use OCA\Talk\Vendor\CuyZ\Valinor\Type\Types\UnionType;
use OCA\Talk\Vendor\CuyZ\Valinor\Utility\Reflection\Reflection;
use ReflectionClass;
use ReflectionClassConstant;

use function array_map;
use function count;
use function explode;

/** @internal */
final class ClassNameToken implements TraversingToken
{
    /** @var ReflectionClass<object> */
    private ReflectionClass $reflection;

    /**
     * @param class-string $className
     */
    public function __construct(string $className)
    {
        $this->reflection = Reflection::class($className);
    }

    public function traverse(TokenStream $stream): Type
    {
        $constant = $this->classConstant($stream);

        if ($constant) {
            return $constant;
        }

        if ($this->reflection->isInterface()) {
            return new InterfaceType($this->reflection->name);
        }

        return new NativeClassType($this->reflection->name);
    }

    public function symbol(): string
    {
        return $this->reflection->name;
    }

    private function classConstant(TokenStream $stream): ?Type
    {
        if ($stream->done() || ! $stream->next() instanceof DoubleColonToken) {
            return null;
        }

        $stream->forward();

        if ($stream->done()) {
            throw new MissingClassConstantCase($this->reflection->name);
        }

        $symbol = $stream->forward()->symbol();

        if ($symbol === '*') {
            throw new MissingSpecificClassConstantCase($this->reflection->name);
        }

        $cases = [];

        if (! preg_match('/\*\s*\*/', $symbol)) {
            $finder = new CaseFinder($this->reflection->getConstants(ReflectionClassConstant::IS_PUBLIC));
            $cases = $finder->matching(explode('*', $symbol));
        }

        if (empty($cases)) {
            throw new ClassConstantCaseNotFound($this->reflection->name, $symbol);
        }

        $cases = array_map(static fn ($value) => ValueTypeFactory::from($value), $cases);

        if (count($cases) > 1) {
            return new UnionType(...$cases);
        }

        return reset($cases);
    }
}
