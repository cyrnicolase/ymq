<?php
require_once __DIR__ . '/../boot.php';


use App\Client;

$client = (new Client());
$client->subscribe();
