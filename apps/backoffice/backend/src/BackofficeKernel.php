<?php

namespace MacharaM\Backoffice\Backend;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;

class BackofficeKernel extends BaseKernel
{
    use MicroKernelTrait;

    /**
    * Gets the path to the configuration directory.
    */
    public function getProjectDir(): string
    {
        return \dirname(__DIR__);
    }

}