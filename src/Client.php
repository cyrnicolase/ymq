<?php
namespace App;

use sskaje\mqtt\MQTT;

class Client
{
    public function publish()
    {
        $mqtt = new MQTT('tcp://127.0.0.1:1883', '1883');
        $mqtt->setVersion(MQTT::VERSION_3_1_1);
        #$mqtt->setVersion(MQTT::VERSION_3_1);
        $mqtt->setKeepalive(60);
        $connected = $mqtt->connect();
        if (!$connected) {
            die("Not connected\n");
        }
        \logger()->info('publish() QoS 0');
        $mqtt->publish_sync(
            'qos/0',
            'This is a QoS 0 Message'
        );
    }

    public function subscribe()
    {
        $mqtt = new MQTT('tcp://127.0.0.1:1883', '1883');
        $mqtt->setVersion(MQTT::VERSION_3_1_1);
        #$mqtt->setVersion(MQTT::VERSION_3_1);
        $mqtt->setKeepalive(60);
        $connected = $mqtt->connect();
        if (!$connected) {
            die("Not connected\n");
        }
        $mqtt->subscribe(['qos/0']);
        $mqtt->loop();
    }
}
