<?php
require_once __DIR__ . '/../boot.php';

$demo = new App\Mqtt\Demo();
$demo->execute();
