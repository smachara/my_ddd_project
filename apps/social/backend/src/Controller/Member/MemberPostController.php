<?php

declare(strict_types = 1);

namespace MacharaM\Social\Backend\Controller\Member;

use MacharaM\Social\Member\Application\Create\MemberCreator;
use MacharaM\Social\Member\Domain\ValueObject\MemberId;
use MacharaM\Social\Member\Domain\ValueObject\MemberEmail;
use MacharaM\Social\Member\Domain\ValueObject\MemberName;
use MacharaM\Social\Member\Domain\ValueObject\MemberPassword;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class MemberPostController
{
    public function __construct( 
        private MemberCreator $creator
    ){} 
    public function __invoke(string $id, Request $request): Response
    {
        $json = ( \json_decode($request->getContent()) );

        $id_ = new MemberId($id);
        $name = new MemberName($json->name);
        $email = new MemberEmail($json->email);
        $password = new MemberPassword($json->password);

        $this->creator->__invoke(
            $id_,
            $name,    
            $email,   
            $password,
        );
        return new Response(
            content:'', 
            status: Response::HTTP_CREATED
        );
    }
}
