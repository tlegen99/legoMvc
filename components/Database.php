<?php

namespace components;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class Database
{
    public function __construct()
    {
        $params  = include(ROOT . '/config/db_params.php');

        $capsule = new Capsule;
        $capsule->addConnection($params);
        $capsule->setEventDispatcher(new Dispatcher(new Container));
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}
