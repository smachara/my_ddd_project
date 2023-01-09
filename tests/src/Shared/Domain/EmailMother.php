<?php

declare(strict_types = 1);

namespace MacharaM\Tests\Shared\Domain;
use MacharaM\Tests\Shared\Domain\MotherCreator;

final class EmailMother
{
    public static function random(): string
    {
        return MotherCreator::random()->email();
    }
}