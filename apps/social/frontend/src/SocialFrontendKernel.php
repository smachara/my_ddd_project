<?php

namespace MacharaM\Social\Frontend;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;

class SocialFrontendKernel extends BaseKernel
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
