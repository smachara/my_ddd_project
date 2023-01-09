<?php

declare(strict_types=1);

namespace MacharaM\Tests\Social\Member\Domain;
use MacharaM\Social\Member\Domain\ValueObject\MemberEmail;
use MacharaM\Tests\Shared\Domain\EmailMother;

class MemberEmailMother
{
    public static function create(string $value): MemberEmail
    {
        return new MemberEmail($value);
    }

    public static function random(): MemberEmail
    {
        return self::create(EmailMother::random());
    }
}