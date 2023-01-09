<?php

declare(strict_types=1);

namespace MacharaM\Tests\Social\Member\Application\Create;

use MacharaM\Shared\Domain\DomainError;
use MacharaM\Social\Member\Application\Create\CreateMemberRequest;
use MacharaM\Social\Member\Application\Create\MemberCreator;
use MacharaM\Social\Member\Domain\Exceptions\MemberNameMinLenght;
use MacharaM\Social\Member\Domain\Member;
use MacharaM\Social\Member\Domain\MemberRepository;
use MacharaM\Social\Member\Domain\ValueObject\MemberName;
use PHPUnit\Framework\TestCase;

class MemberCreatorTest extends TestCase
{
    protected $repository; 
    protected MemberCreator $creator;
    protected CreateMemberRequest $request;
 
    protected function setUp():void
    {
        $this->repository = $this->createMock(MemberRepository::class);
        $this->creator = new MemberCreator($this->repository);
        $this->request = new CreateMemberRequest(
            '9f271baa-f35f-42e7-b6ec-e71bf132a8c4',
            'some-name',
            'some-email',
            'some-password'
        );
    }
    
    /** @test */
    public function it_should_create_a_valid_member(): void
    {
        $member = new Member($this->request->id(), $this->request->name(), $this->request->email(), $this->request->password());
        $this->repository->method('save')->with($member);
        $this->creator->__invoke($this->request);
    }
 
    /** @test */
    public function member_name_should_have_right_lenght(): void
    {
        try {
            $name = new MemberName('so');
        } catch (MemberNameMinLenght $e) {
            $this->assertEquals('min_lenght_inferior', $e->errorCode());
            return;
        }
        $this->expectExceptionCode('min_lenght_inferior');
    }
}