<?php

declare(strict_types = 1);

namespace MacharaM\Social\Member\Infrastructure\Persistence;

use MacharaM\Social\Member\Domain\Member;
use MacharaM\Social\Member\Domain\MemberRepository;
use MacharaM\Social\Member\Domain\ValueObject\MemberId;

final class FileMemberRepository implements MemberRepository
{
    private const FILE_PATH = __DIR__ . '/member';

    public function save(Member $member): void
    {
        file_put_contents($this->fileName($member->id()->value()), serialize($member));
    }

    public function search(MemberId $id): ?Member
    {
        return file_exists($this->fileName($id->value()))
            ? unserialize(file_get_contents($this->fileName($id->value())))
            : null;
    }

    private function fileName(string $id): string
    {
        return sprintf('%s.%s.repo', self::FILE_PATH, $id);
    }
}
