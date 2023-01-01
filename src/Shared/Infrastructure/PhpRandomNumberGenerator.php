<?php

declare(strict_types = 1);

namespace MacharaM\Shared\Infrastructure;
use MacharaM\Shared\Domain\RandomNumberGeneratorInterface;

final class PhpRandomNumberGenerator implements RandomNumberGeneratorInterface
{
    public function generate(): int
    {
        return random_int(1, 5);
    }
}
