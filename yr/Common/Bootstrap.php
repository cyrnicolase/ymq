<?php
namespace Yr\Common;

use Noodlehaus\Config;

class Bootstrap
{
    public function init()
    {
        $this->loadConfig();
        $this->initLogger();
        $this->initCache();
        $this->initDB();
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

    protected function initDB()
    {
    }
}
