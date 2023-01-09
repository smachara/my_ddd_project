<?php

declare(strict_types=1);

namespace MacharaM\Social\Member\Domain\ValueObject;
use MacharaM\Shared\Domain\ValueObject\StringValueObject;
use MacharaM\Social\Member\Domain\Exceptions\MemberNameMinLenght;
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
            throw new MemberNameMinLenght($minlenght);
        }
    }
}
