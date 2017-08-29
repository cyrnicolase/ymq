<?php
defined('ROOT_DIR') or define('ROOT_DIR', __DIR__);

require_once 'vendor/autoload.php';
require_once ROOT_DIR . '/functions.php';

(new \Yr\Common\Bootstrap())->init();
