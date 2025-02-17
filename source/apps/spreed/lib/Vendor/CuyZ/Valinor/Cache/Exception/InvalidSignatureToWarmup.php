<?php

declare(strict_types=1);

namespace OCA\Talk\Vendor\CuyZ\Valinor\Cache\Exception;

use OCA\Talk\Vendor\CuyZ\Valinor\Type\Parser\Exception\InvalidType;
use RuntimeException;

/** @internal */
final class InvalidSignatureToWarmup extends RuntimeException
{
    public function __construct(string $signature, InvalidType $exception)
    {
        parent::__construct(
            "Cannot warm up invalid signature `$signature`: {$exception->getMessage()}",
            1653330261,
            $exception
        );
    }
}
