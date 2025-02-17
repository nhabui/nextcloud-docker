<?php

declare(strict_types=1);

namespace OCA\Talk\Vendor\CuyZ\Valinor\Type\Parser\Exception\Generic;

use OCA\Talk\Vendor\CuyZ\Valinor\Type\Parser\Exception\InvalidType;
use OCA\Talk\Vendor\CuyZ\Valinor\Type\Type;
use RuntimeException;

use function array_map;
use function implode;

/** @internal */
final class GenericClosingBracketMissing extends RuntimeException implements InvalidType
{
    /**
     * @param class-string $className
     * @param Type[] $generics
     */
    public function __construct(string $className, array $generics)
    {
        $signature = $className . '<' . implode(', ', array_map(fn (Type $type) => $type->toString(), $generics)) . '>';

        parent::__construct(
            "The closing bracket is missing for the generic `$signature`.",
            1604333677
        );
    }
}
