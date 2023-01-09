<?php

declare(strict_types=1);

namespace MacharaM\Tests\Social\Member\Domain;
use MacharaM\Social\Member\Domain\ValueObject\MemberName;
use MacharaM\Tests\Shared\Domain\WordMother;

class MemberNameMother
{
    public static function create(string $value): MemberName
    {
        return new MemberName($value);
    }

    public static function random(): MemberName
    {
        return self::create(WordMother::random());
    }
}
