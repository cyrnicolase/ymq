<?php
namespace App\Common;

use Noodlehaus\Config;

class Bootstrap
{
    public function init()
    {
        $this->loadConfig();
        $this->initLogger();
        $this->initCache();
        $this->initDb();
    }

    protected function loadConfig()
    {
    }

    protected function initLogger()
    {
    }

    protected function initCache()
    {
    }

    protected function initDb()
    {
    }
}
