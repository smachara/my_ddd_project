<?php

namespace MacharaM\Social\Backend;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;

class SocialKernel extends BaseKernel
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
