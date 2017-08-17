<?php
namespace App\Mqtt;

class Demo
{
    public function execute()
    {
        $host = '127.0.0.1';
        // $port = 15675;
        $port = 1883;
        $message = 'Hello Mqtt!-----';

        $mqtt = new \phpMQTT($host, $port, sprintf('ClientId : %s', mt_rand(10000, 99999)));
        if ($mqtt->connect()) {
            echo "Publish\n";
            $mqtt->publish('hello/demo', $message, 0);
            $mqtt->close();
        } else {
            echo "Fail or time out!\n";
        }
    }
}
