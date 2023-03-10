<?php

use MacharaM\Social\Backend\SocialKernel;

require_once dirname(__DIR__).'../../../../vendor/autoload_runtime.php';

return function (array $context) {
    return new SocialKernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
