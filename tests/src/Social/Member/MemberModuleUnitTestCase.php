<?php

declare(strict_types=1);

namespace MacharaM\Tests\Social\Member;
use MacharaM\Social\Member\Domain\Member;
use MacharaM\Social\Member\Domain\MemberRepository;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

abstract class MemberModuleUnitTestCase extends TestCase
{
    private $repository; 
    protected function shouldSave(Member $member)
    {
        $this->repository()->method('save')->with($member);
    }

    /** @return MockObject|MemberRepository */
    protected function repository():MockObject {
        return $this->repository = $this->repository ?: $this->createMock(MemberRepository::class);
    }
}
