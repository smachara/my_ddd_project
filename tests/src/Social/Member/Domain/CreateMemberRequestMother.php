<?php

declare(strict_types=1);

namespace MacharaM\Tests\Social\Member\Domain;

use MacharaM\Social\Member\Application\Create\CreateMemberCommand;
use MacharaM\Social\Member\Application\Create\CreateMemberRequest;

use MacharaM\Social\Member\Domain\ValueObject\MemberEmail;
use MacharaM\Social\Member\Domain\ValueObject\MemberId;
use MacharaM\Social\Member\Domain\ValueObject\MemberName;
use MacharaM\Social\Member\Domain\ValueObject\MemberPassword;

class CreateMemberRequestMother
{
    public static function create(
            MemberId $id, 
            MemberName $name, 
            MemberEmail $email, 
            MemberPassword $password ): CreateMemberRequest
    {
        return new CreateMemberRequest($id->value(), $name->value(), $email->value(), $password->value());
        
    }

    public static function fromRequest(CreateMemberCommand $request): CreateMemberRequest
    {
        return self::create(
            MemberIdMother::create($request->id()),
            MemberNameMother::create($request->name()),
            MemberEmailMother::create($request->email()), 
            MemberPasswordMother::create($request->password()) 
        );
    }

    public static function random(): CreateMemberRequest
    {

        return self::create(MemberIdMother::random(), MemberNameMother::random(), MemberEmailMother::random(),MemberPasswordMother::random());
    }
}
