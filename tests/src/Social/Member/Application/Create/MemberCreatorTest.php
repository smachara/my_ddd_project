<?php

declare(strict_types=1);

namespace MacharaM\Tests\Social\Member\Application\Create;

use MacharaM\Social\Member\Application\Create\MemberCreator;
use MacharaM\Social\Member\Domain\Member;
use MacharaM\Social\Member\Domain\MemberRepository;
use MacharaM\Social\Member\Domain\ValueObject\MemberEmail;
use MacharaM\Social\Member\Domain\ValueObject\MemberId;
use MacharaM\Social\Member\Domain\ValueObject\MemberName;
use MacharaM\Social\Member\Domain\ValueObject\MemberPassword;
use PHPUnit\Framework\TestCase;

class MemberCreatorTest extends TestCase
{
    /** @test */
    public function it_should_create_a_valid_member():void 
    {
        $repository = $this->createMock(MemberRepository::class);
        $creator = new MemberCreator($repository);

        $id = new MemberId('9f271baa-f35f-42e7-b6ec-e71bf132a8c4');
        $name = new MemberName('some-name');
        $email = new MemberEmail('some-email');
        $password = new MemberPassword('some-password');

        $menber = new Member($id, $name, $email, $password);

        $repository->method('save')->with($menber);

        $creator->__invoke($id, $name, $email, $password);

    }
}