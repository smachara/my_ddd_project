<?php

declare(strict_types=1);

namespace MacharaM\Social\Member\Domain;
use MacharaM\Social\Member\Domain\ValueObject\MemberId;

interface MemberRepository
{
    public function save(Member $member): void;
    public function search(MemberId $id): ?Member;
}
