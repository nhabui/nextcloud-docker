<?php

declare(strict_types=1);

namespace OCA\Talk\Vendor\CuyZ\Valinor\Normalizer\Formatter;

use OCA\Talk\Vendor\CuyZ\Valinor\Normalizer\Formatter\Exception\CannotFormatInvalidTypeToJson;
use Generator;

use function addcslashes;
use function array_values;
use function fwrite;
use function is_array;
use function is_bool;
use function is_float;
use function is_int;
use function is_iterable;
use function is_null;
use function is_string;

/** @internal */
final class JsonFormatter implements StreamFormatter
{
    /**
     * @param resource $resource
     */
    public function __construct(
        private mixed $resource,
    ) {}

    public function format(mixed $value): void
    {
        if (is_null($value)) {
            $this->write('null');
        } elseif (is_bool($value)) {
            $this->write($value ? 'true' : 'false');
        } elseif (is_int($value) || is_float($value)) {
            $this->write((string)$value);
        } elseif (is_string($value)) {
            $this->write('"' . addcslashes($value, '"') . '"');
        } elseif (is_iterable($value)) {
            // Note: when a generator is formatted, it is considered as a list
            // if its first key is 0. This is done early because the first JSON
            // character for an array differs from the one for an object, and we
            // need to know that before actually looping on the generator.
            //
            // For generators having a first key of 0 and inconsistent keys
            // afterward, this leads to a JSON array being written, while it
            // should have been an object. This is a trade-off we accept,
            // considering most generators starting at 0 are actually lists.
            $isList = ($value instanceof Generator && $value->key() === 0)
                || (is_array($value) && $this->arrayIsList($value));

            $isFirst = true;

            $this->write($isList ? '[' : '{');

            foreach ($value as $key => $val) {
                if (! $isFirst) {
                    $this->write(',');
                }

                $isFirst = false;

                if (! $isList) {
                    $this->write('"' . $key . '":');
                }

                $this->format($val);
            }

            $this->write($isList ? ']' : '}');
        } else {
            throw new CannotFormatInvalidTypeToJson($value);
        }
    }

    public function resource(): mixed
    {
        return $this->resource;
    }

    private function write(string $content): void
    {
        fwrite($this->resource, $content);
    }

    /**
     * PHP8.1: replace with native function.
     *
     * `array_is_list` function polyfill.
     *
     * Code taken from `symfony/polyfill-php81`
     *
     * @param array<mixed> $array
     *
     * @codeCoverageIgnore
     * @infection-ignore-all
     */
    private function arrayIsList(array $array): bool
    {
        if ([] === $array || $array === array_values($array)) {
            return true;
        }

        $nextKey = -1;

        foreach ($array as $k => $v) {
            if ($k !== ++$nextKey) {
                return false;
            }
        }

        return true;
    }
}
