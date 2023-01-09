<?php

declare(strict_types=1);

namespace MacharaM\Tests\Social\Member\Application\Create;

use MacharaM\Social\Member\Application\Create\CreateMemberRequest;
use MacharaM\Social\Member\Application\Create\MemberCreator;
use MacharaM\Social\Member\Domain\Member;
use MacharaM\Social\Member\Domain\MemberRepository;
use PHPUnit\Framework\TestCase;

class MemberCreatorTest extends TestCase
{
    /** @test */
    public function it_should_create_a_valid_member():void 
    {
        $repository = $this->createMock(MemberRepository::class);
        $creator = new MemberCreator($repository);

        $request = new CreateMemberRequest(
            '9f271baa-f35f-42e7-b6ec-e71bf132a8c4',
            'some-name',
            'some-email',
            'some-password'
        );
        $member = new Member($request->id(), $request->name(), $request->email(), $request->password());

        $repository->method('save')->with($member);
        $creator->__invoke($request);
    }
}