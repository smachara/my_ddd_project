<?php

declare(strict_types=1);

namespace MacharaM\Social\Member\Domain\ValueObject;
use MacharaM\Shared\Domain\ValueObject\StringValueObject;

class MemberName extends StringValueObject
{
    public function __construct(string $value) {
        $this->ensure_min_lenght($value);
        parent::__construct($value);
    }

    private function ensure_min_lenght($value)
    {
        $minlenght = 3;
        if (strlen($value)<$minlenght) {
            throw new \InvalidArgumentException("The name should have more than 3 characters");
        }
    }
}
