<?php

declare(strict_types=1);

namespace MacharaM\Tests\Social\Member\Domain;
use MacharaM\Social\Member\Domain\ValueObject\MemberId;
use MacharaM\Tests\Shared\Domain\UuidMother;

final class MemberIdMother
{
    public static function create(string $value): MemberId
    {
        return new MemberId($value);
    }

    public static function creator(): callable
    {
        return static function () {
            return self::random();
        };
    }

    public static function random(): MemberId
    {
        return self::create(UuidMother::random());
    }
}