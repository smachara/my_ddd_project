<?php

declare(strict_types = 1);

namespace MacharaM\Social\Member\Domain\Exceptions;

use MacharaM\Shared\Domain\DomainError;


final class MemberNameMinLenght extends DomainError
{
    public function __construct(private int $minlenght )
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'min_lenght_inferior';
    }

    protected function errorMessage(): string
    {
        return sprintf("The name should have more than $this->minlenght characters");
    }
}