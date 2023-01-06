<?php

use MacharaM\Social\Frontend\SocialFrontendKernel;

require_once dirname(__DIR__).'../../../../vendor/autoload_runtime.php';

return function (array $context) {
    return new SocialFrontendKernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
