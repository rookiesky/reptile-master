<?php
date_default_timezone_set('PRC');
include 'vendor/autoload.php';
$database = include 'config/database.php';

define('DEBUG',true);
define('BASE_PATH',str_replace('\\','/',realpath(dirname(__FILE__).'/'))."/");

if(DEBUG == true){
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();
}

Sentry\init(['dsn' => 'https://1327aabf127042ee838f4a4ebd8768ac@sentry.io/1461222' ]);

$capsule = new \Illuminate\Database\Capsule\Manager();

$capsule->addConnection($database);

$capsule->setEventDispatcher(new \Illuminate\Events\Dispatcher(new \Illuminate\Container\Container()));

$capsule->setAsGlobal();

$capsule->bootEloquent();
