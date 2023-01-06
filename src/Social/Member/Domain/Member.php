<?php

declare(strict_types=1);

namespace MacharaM\Social\Member\Domain;
use MacharaM\Social\Member\Domain\ValueObject\MemberEmail;
use MacharaM\Social\Member\Domain\ValueObject\MemberId;
use MacharaM\Social\Member\Domain\ValueObject\MemberName;
use MacharaM\Social\Member\Domain\ValueObject\MemberPassword;

class Member
{
    public function __construct(
        private MemberId $id,
        private MemberName $name,
        private MemberEmail $email,
        private MemberPassword $password
    ){}    
    // public static function create(
    //     MemberId $id,
    //     MemberName $name,
    //     MemberEmail $email,
    //     MemberPassword $password
 
    // ): self
    // {
    //     $member = new self($id,$name,$email,$password);
    //     // $course->record(new CourseCreatedDomainEvent($id->value(), $name->value(), $duration->value()));
    //     return $member;
    // }
    public function id(): MemberId {
        return $this->id; 
    }
    public function  name():MemberName{
        return $this->name; 
    }
    public function  email():MemberEmail{
        return $this->email; 
    }
    public function  password():MemberPassword{
        return $this->password; 
    }
    public function changeName(MemberName $newvalue): void
    {
        $this->name = $newvalue;
    }
    public function changeEmail(MemberEmail $newvalue): void
    {
        $this->email = $newvalue;
    }
    public function changePassword(MemberPassword $newvalue): void
    {
        $this->password = $newvalue;
    }
}

