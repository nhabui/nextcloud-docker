<?php

declare(strict_types=1);

namespace OCA\Talk\Vendor\CuyZ\Valinor\Mapper\Object\Factory;

use OCA\Talk\Vendor\CuyZ\Valinor\Definition\ClassDefinition;
use OCA\Talk\Vendor\CuyZ\Valinor\Mapper\Object\Exception\PermissiveTypeNotAllowed;
use OCA\Talk\Vendor\CuyZ\Valinor\Utility\PermissiveTypeFound;
use OCA\Talk\Vendor\CuyZ\Valinor\Utility\TypeHelper;

/** @internal */
final class StrictTypesObjectBuilderFactory implements ObjectBuilderFactory
{
    public function __construct(private ObjectBuilderFactory $delegate) {}

    public function for(ClassDefinition $class): array
    {
        $builders = $this->delegate->for($class);

        foreach ($builders as $builder) {
            $arguments = $builder->describeArguments();

            foreach ($arguments as $argument) {
                try {
                    TypeHelper::checkPermissiveType($argument->type());
                } catch (PermissiveTypeFound $exception) {
                    throw new PermissiveTypeNotAllowed($builder, $argument, $exception);
                }
            }
        }

        return $builders;
    }
}
