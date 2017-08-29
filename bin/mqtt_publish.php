<?php
require_once __DIR__ . '/../boot.php';

$publisher = new \App\Mqtt\Publisher();
$publisher->publish('hello/demo', 'Hello demo mqtt!');
