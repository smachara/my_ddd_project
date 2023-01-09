<?php

declare(strict_types = 1);

namespace MacharaM\Social\Member\Application\Create;

use MacharaM\Social\Member\Domain\Member;
use MacharaM\Social\Member\Domain\MemberRepository;
final class MemberCreator
{
    public function __construct(private MemberRepository $repository){}

    public function __invoke(CreateMemberRequest $request )
    {
        $member = new Member( 
                $request->id(), 
                $request->name(),
                $request->email(),
                $request->password()
            );

        $this->repository->save($member);
        // $this->bus->publish(...$Member->pullDomainEvents());
    }
}
