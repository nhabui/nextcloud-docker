<?php

declare(strict_types=1);

namespace OCA\Talk\Vendor\CuyZ\Valinor\Type\Parser\Exception\Iterable;

use OCA\Talk\Vendor\CuyZ\Valinor\Type\Parser\Exception\InvalidType;
use RuntimeException;

/** @internal */
final class ShapedArrayEmptyElements extends RuntimeException implements InvalidType
{
    public function __construct()
    {
        parent::__construct(
            "Shaped array must define one or more elements, for instance `array{foo: string}`.",
            1631286932
        );
    }
}
