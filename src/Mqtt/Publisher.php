<?php
namespace App\Mqtt;

use App\Common\Config;

class Publisher
{
    protected $connect;
    protected $mqtt;

    public function __construct()
    {
        $mqtt_config = Config::getInstance()->get('services.mqtt');
        $host = $mqtt_config['host'];
        $port = $mqtt_config['port'];
        $this->mqtt = new \phpMQTT($host, $port, sprintf('ClientId:%d%d', time(), mt_rand(1000, 9999)));
        if (!$this->mqtt->connect()) {
            throw new Exception\ConnectionException();
        }
    }

    public function publish($topic, $message)
    {
        $this->mqtt->publish($topic, $message, 0);
    }

    public function __destruct()
    {
        if (!$this->mqtt) {
            return;
        }
        $this->mqtt->close();
    }
}
