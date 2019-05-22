<?php

namespace App\Tools;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

/**
 * Class Log
 *
 * @package \App\Tools
 */
class Log
{
    public static function boot()
    {
        $log = new Logger('Reptile');
        $file_path = BASE_PATH . 'store/log/' . date('Y-m-d') . '.log';
        $log->pushHandler(new StreamHandler($file_path),Logger::INFO);

        return $log;
    }
}
