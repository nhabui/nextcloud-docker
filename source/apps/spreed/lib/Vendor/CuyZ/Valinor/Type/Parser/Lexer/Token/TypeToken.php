<?php

declare(strict_types=1);

namespace OCA\Talk\Vendor\CuyZ\Valinor\Type\Parser\Lexer\Token;

use OCA\Talk\Vendor\CuyZ\Valinor\Type\Parser\Lexer\TokenStream;
use OCA\Talk\Vendor\CuyZ\Valinor\Type\Type;

/** @internal */
final class TypeToken implements TraversingToken
{
    public function __construct(
        private Type $type,
        private string $symbol
    ) {}

    public function traverse(TokenStream $stream): Type
    {
        return $this->type;
    }

    public function symbol(): string
    {
        return $this->symbol;
    }
}
