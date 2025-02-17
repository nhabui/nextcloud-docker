<?php

declare(strict_types=1);

namespace OCA\Talk\Vendor\CuyZ\Valinor\Type\Parser\Exception\Iterable;

use OCA\Talk\Vendor\CuyZ\Valinor\Type\Parser\Exception\InvalidType;
use OCA\Talk\Vendor\CuyZ\Valinor\Type\Type;
use OCA\Talk\Vendor\CuyZ\Valinor\Type\Types\ShapedArrayElement;
use RuntimeException;

use function implode;

/** @internal */
final class ShapedArrayColonTokenMissing extends RuntimeException implements InvalidType
{
    /**
     * @param ShapedArrayElement[] $elements
     */
    public function __construct(array $elements, Type $type)
    {
        $signature = 'array{' . implode(', ', array_map(fn (ShapedArrayElement $element) => $element->toString(), $elements));

        if (! empty($elements)) {
            $signature .= ', ';
        }

        $signature .= "{$type->toString()}?";

        parent::__construct(
            "A colon symbol is missing in shaped array signature `$signature`.",
            1631283847
        );
    }
}
