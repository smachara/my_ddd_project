<?php

use MacharaM\Backoffice\Backend\BackofficeKernel;

require_once dirname(__DIR__).'../../../../vendor/autoload_runtime.php';

return function (array $context) {
    return new BackofficeKernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
