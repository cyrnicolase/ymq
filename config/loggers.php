<?php
return [
    'default' => [
        'handler' => '\Monolog\Handler\StreamHandler',
        'file' => ROOT_DIR . '/var/log/default.log',
    ],
];
