<?php

declare(strict_types = 1);

namespace MacharaM\Tests\Shared\Infrastructure;

use MacharaM\Shared\Domain\RandomNumberGeneratorInterface;

final class ConstantRandomNumberGenerator implements RandomNumberGeneratorInterface
{
    public function generate(): int
    {
        return 1;
    }
}
