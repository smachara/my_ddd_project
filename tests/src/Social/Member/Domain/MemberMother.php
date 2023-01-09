<?php

declare(strict_types=1);

namespace MacharaM\Tests\Social\Member\Domain;
use MacharaM\Social\Member\Application\Create\CreateMemberRequest;
use MacharaM\Social\Member\Domain\Member;
use MacharaM\Social\Member\Domain\ValueObject\MemberEmail;
use MacharaM\Social\Member\Domain\ValueObject\MemberId;
use MacharaM\Social\Member\Domain\ValueObject\MemberName;
use MacharaM\Social\Member\Domain\ValueObject\MemberPassword;

class MemberMother
{
    public static function create(
            MemberId $id, 
            MemberName $name, 
            MemberEmail $email, 
            MemberPassword $password): Member
    {
        return new Member($id, $name, $email, $password);
    }

    public static function fromRequest(CreateMemberRequest $request): Member
    {
        return self::create(
            MemberIdMother::create($request->id()->value()),
            MemberNameMother::create($request->name()->value()),
            MemberEmailMother::create($request->email()->value()), 
            MemberPasswordMother::create($request->password()->value()) 
        );
    }

    public static function random(): Member
    {
        return self::create(MemberIdMother::random(), MemberNameMother::random(), MemberEmailMother::random(),MemberPasswordMother::random());
    }
}
