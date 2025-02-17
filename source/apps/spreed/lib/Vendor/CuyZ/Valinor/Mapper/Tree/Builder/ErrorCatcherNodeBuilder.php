<?php

declare(strict_types=1);

namespace OCA\Talk\Vendor\CuyZ\Valinor\Mapper\Tree\Builder;

use OCA\Talk\Vendor\CuyZ\Valinor\Mapper\Tree\Message\ErrorMessage;
use OCA\Talk\Vendor\CuyZ\Valinor\Mapper\Tree\Message\Message;
use OCA\Talk\Vendor\CuyZ\Valinor\Mapper\Tree\Message\UserlandError;
use OCA\Talk\Vendor\CuyZ\Valinor\Mapper\Tree\Shell;
use Throwable;

/** @internal */
final class ErrorCatcherNodeBuilder implements NodeBuilder
{
    private NodeBuilder $delegate;

    /** @var callable(Throwable): ErrorMessage */
    private $exceptionFilter;

    /**
     * @param callable(Throwable): ErrorMessage $exceptionFilter
     */
    public function __construct(NodeBuilder $delegate, callable $exceptionFilter)
    {
        $this->delegate = $delegate;
        $this->exceptionFilter = $exceptionFilter;
    }

    public function build(Shell $shell, RootNodeBuilder $rootBuilder): TreeNode
    {
        try {
            return $this->delegate->build($shell, $rootBuilder);
        } catch (Message $exception) {
            if ($exception instanceof UserlandError) {
                $exception = ($this->exceptionFilter)($exception->previous());
            }

            return TreeNode::error($shell, $exception);
        }
    }
}
