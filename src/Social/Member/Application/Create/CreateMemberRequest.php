<?php

declare(strict_types=1);

namespace MacharaM\Social\Member\Application\Create;
use MacharaM\Social\Member\Domain\ValueObject\MemberEmail;
use MacharaM\Social\Member\Domain\ValueObject\MemberId;
use MacharaM\Social\Member\Domain\ValueObject\MemberName;
use MacharaM\Social\Member\Domain\ValueObject\MemberPassword;

class CreateMemberRequest
{
    private MemberId $id;
    private MemberName $name;
    private MemberEmail $email;
    private MemberPassword $password;

    public function __construct(
        string $id, 
        string $name, 
        string $email, 
        string $password
    ){

        $this->id = new MemberId($id);
        $this->name = new MemberName($name);
        $this->email = new MemberEmail($email);
        $this->password = new MemberPassword($password);
        
    }

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
}
