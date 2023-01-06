<?php

declare(strict_types=1);

namespace MacharaM\Social\Member\Domain\ValueObject;
use MacharaM\Shared\Domain\ValueObject\StringValueObject;

class MemberPassword extends StringValueObject
{
    public function isEquals(MemberPassword $other): bool
    {
        return $this->value() === $other->value();
    }
}
