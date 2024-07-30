<?php

declare(strict_types=1);

namespace OCA\Talk\Vendor\CuyZ\Valinor\Mapper\Tree\Builder;

use OCA\Talk\Vendor\CuyZ\Valinor\Definition\Repository\ClassDefinitionRepository;
use OCA\Talk\Vendor\CuyZ\Valinor\Mapper\Object\Factory\ObjectBuilderFactory;
use OCA\Talk\Vendor\CuyZ\Valinor\Mapper\Object\FilteredObjectBuilder;
use OCA\Talk\Vendor\CuyZ\Valinor\Mapper\Tree\Shell;
use OCA\Talk\Vendor\CuyZ\Valinor\Type\ClassType;

use function assert;

/** @internal */
final class NativeClassNodeBuilder implements NodeBuilder
{
    public function __construct(
        private ClassDefinitionRepository $classDefinitionRepository,
        private ObjectBuilderFactory $objectBuilderFactory,
        private ObjectNodeBuilder $objectNodeBuilder,
        private bool $enableFlexibleCasting,
    ) {}

    public function build(Shell $shell, RootNodeBuilder $rootBuilder): TreeNode
    {
        $type = $shell->type();

        // @infection-ignore-all
        assert($type instanceof ClassType);

        if ($this->enableFlexibleCasting && $shell->value() === null) {
            $shell = $shell->withValue([]);
        }

        $class = $this->classDefinitionRepository->for($type);
        $objectBuilder = new FilteredObjectBuilder($shell->value(), ...$this->objectBuilderFactory->for($class));

        return $this->objectNodeBuilder->build($objectBuilder, $shell, $rootBuilder);
    }
}
