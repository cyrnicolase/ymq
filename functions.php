<?php
function logger($name = 'default')
{
    return App\Common\Logger::getInstance()->getLogger($name);
}
