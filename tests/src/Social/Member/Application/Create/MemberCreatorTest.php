<?php

declare(strict_types=1);

namespace MacharaM\Tests\Social\Member\Application\Create;

use MacharaM\Social\Member\Application\Create\CreateMemberRequest;
use MacharaM\Social\Member\Application\Create\MemberCreator;
use MacharaM\Social\Member\Domain\Exceptions\MemberNameMinLenght;
use MacharaM\Social\Member\Domain\Member;
use MacharaM\Social\Member\Domain\MemberRepository;
use MacharaM\Social\Member\Domain\ValueObject\MemberName;

use MacharaM\Tests\Social\Member\Domain\CreateMemberRequestMother;
use MacharaM\Tests\Social\Member\Domain\MemberMother;

use MacharaM\Tests\Social\Member\MemberModuleUnitTestCase;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class MemberCreatorTest extends MemberModuleUnitTestCase
{
    private MemberCreator $creator;
   
    protected function setUp():void
    {
        parent::setUp();
        $this->creator = new MemberCreator($this->repository());
    }
    /** @test */
    public function it_should_create_a_valid_member(): void
    {
        $request = CreateMemberRequestMother::random();
        $member = MemberMother::fromRequest($request); 
        
        $this->shouldSave($member);

        $this->creator->__invoke($request);

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