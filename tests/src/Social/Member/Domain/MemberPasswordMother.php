<?php

declare(strict_types=1);

namespace MacharaM\Tests\Social\Member\Domain;
use MacharaM\Social\Member\Domain\ValueObject\MemberPassword;
use MacharaM\Tests\Shared\Domain\WordMother;

class MemberPasswordMother
{
    public static function create(string $value): MemberPassword
    {
        return new MemberPassword($value);
    }

    public static function random(): MemberPassword
    {
        return self::create(WordMother::random());
    }
}
