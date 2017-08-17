<?php
require_once __DIR__ . '/../boot.php';

use App\Client;

(new Client())->publish();
