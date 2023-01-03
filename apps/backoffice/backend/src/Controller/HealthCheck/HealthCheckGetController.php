<?php

declare(strict_types = 1);

namespace MacharaM\Backoffice\Backend\Controller\HealthCheck;

use MacharaM\Shared\Domain\RandomNumberGeneratorInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class HealthCheckGetController
{
    public function __construct( 
        private RandomNumberGeneratorInterface $randomNumberGenerator 
    ){} 
    public function __invoke(Request $request): Response
    {
        return new JsonResponse(
            [
                'backoffice-backend' => 'ok',
                'numner' => $this->randomNumberGenerator->generate()
            ]
        );
    }
}
