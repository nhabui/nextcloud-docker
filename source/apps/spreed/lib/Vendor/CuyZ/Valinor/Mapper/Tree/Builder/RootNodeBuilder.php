<?php

declare(strict_types=1);

namespace OCA\Talk\Vendor\CuyZ\Valinor\Mapper\Tree\Builder;

use OCA\Talk\Vendor\CuyZ\Valinor\Mapper\Tree\Shell;

/** @internal */
final class RootNodeBuilder
{
    public function __construct(private NodeBuilder $root) {}

    public function build(Shell $shell): TreeNode
    {
        return $this->root->build($shell, $this);
    }
}
