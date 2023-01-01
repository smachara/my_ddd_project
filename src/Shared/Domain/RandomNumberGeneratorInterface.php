<?php

declare(strict_types = 1);

namespace MacharaM\Shared\Domain;

interface RandomNumberGeneratorInterface
{
    public function generate(): int;
}
