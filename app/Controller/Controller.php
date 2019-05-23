<?php

namespace App\Controller;

use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Fluent;
use Illuminate\View\ViewServiceProvider;

/**
 * Class Controller
 *
 * @package \App\Controller
 */
class Controller
{
    protected function view($view,$data = [])
    {
        $app = new Container();
        $app['events'] = new Dispatcher();
        $app['config'] = new Fluent();
        $app['files'] = new Filesystem();

        $app['config']['view.paths'] = [BASE_PATH . '/views/'];
        $app['config']['view.compiled'] = BASE_PATH . '/store/view/';

        $serviceProvider = new ViewServiceProvider($app);
        $serviceProvider->register();

        Facade::setFacadeApplication($app);

        echo View::make($view,$data);

    }


    public function response($data = null, $msg = 'success',$status = 200)
    {
        header('Content-Type:application/json; charset=utf-8');
        http_response_code($status);
        echo json_encode([
            'message' => $msg,
            'data' => $data
        ],JSON_UNESCAPED_UNICODE);
        exit();
    }
}
