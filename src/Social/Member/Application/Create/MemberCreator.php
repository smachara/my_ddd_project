<?php

declare(strict_types = 1);

namespace MacharaM\Social\Member\Application\Create;
use MacharaM\Social\Member\Domain\Member;
use MacharaM\Social\Member\Domain\MemberRepository;
use MacharaM\Social\Member\Domain\ValueObject\MemberEmail;
use MacharaM\Social\Member\Domain\ValueObject\MemberId;
use MacharaM\Social\Member\Domain\ValueObject\MemberName;
use MacharaM\Social\Member\Domain\ValueObject\MemberPassword;

final class MemberCreator
{
    public function __construct(private MemberRepository $repository){}

    public function __invoke(
        MemberId $id, 
        MemberName $name, 
        MemberEmail $email, 
        MemberPassword $password)
    {
        $member = new Member(
            $id,
            $name,
            $email,
            $password
        );
        $this->repository->save($member);
        // $this->bus->publish(...$Member->pullDomainEvents());
    }
}
