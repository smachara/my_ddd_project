<?php

declare(strict_types = 1);

namespace MacharaM\Social\Backend\Controller\Member;

use MacharaM\Social\Member\Application\Create\CreateMemberRequest;
use MacharaM\Social\Member\Application\Create\MemberCreator;
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

        $this->creator->__invoke( 
            new CreateMemberRequest(
                $id, 
                $json->name, 
                $json->email, 
                $json->password
            ) 
        );
        return new Response(
            content:'', 
            status: Response::HTTP_CREATED
        );
    }
}
