<?php
require_once __DIR__ . '/../boot.php';

$publisher = new \App\Mqtt\Publisher();
$publisher->publish('helle/demo', 'Hello demo mqtt!');
