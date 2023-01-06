<?php

declare(strict_types=1);

namespace MacharaM\Tests\Social\Member\Infrastructure;

use MacharaM\Social\Member\Domain\Member;
use MacharaM\Social\Member\Domain\ValueObject\MemberEmail;
use MacharaM\Social\Member\Domain\ValueObject\MemberId;
use MacharaM\Social\Member\Domain\ValueObject\MemberName;
use MacharaM\Social\Member\Domain\ValueObject\MemberPassword;
use MacharaM\Social\Member\Infrastructure\Persistence\FileMemberRepository;
use PHPUnit\Framework\TestCase;

final class FileMemberRepositoryTest extends TestCase
{
    /** @test */
    public function it_should_save_a_member(): void
    {
        $repository = new FileMemberRepository();

        $id = new MemberId('9f271baa-f35f-42e7-b6ec-e71bf132a8c1');
        $name = new MemberName('some-name');
        $email = new MemberEmail('some-email');
        $password = new MemberPassword('some-password');

        $member     = new Member($id, $name, $email, $password);

        $repository->save($member);
    }

    /** @test */
    public function it_should_return_an_existing_Member(): void
    {
        $repository = new FileMemberRepository();

        $id = new MemberId('9f271baa-f35f-42e7-b6ec-e71bf132a8c1');
        $name = new MemberName('some-name');
        $email = new MemberEmail('some-email');
        $password = new MemberPassword('some-password');

        $member     = new Member($id, $name, $email, $password);

        $repository->save($member);

        $this->assertEquals($member, $repository->search($member->id()));
    }

    /** @test */
    public function it_should_not_return_a_non_existing_member(): void
    {
        $repository = new FileMemberRepository();

        $id = new MemberId('9f271baa-f35f-42e7-b6ec-e71bf132a8c2');

        $this->assertNull($repository->search($id));
    }
}