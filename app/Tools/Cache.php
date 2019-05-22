<?php

namespace App\Tools;

use Illuminate\Cache\FileStore;
use Illuminate\Cache\Repository;
use Illuminate\Filesystem\Filesystem;

/**
 * Class Cache
 *
 * @package \App\Tools
 */
class Cache
{
    public static function boot()
    {
        $fileStore = new FileStore(new Filesystem(), BASE_PATH . 'store/cache');

        return new Repository($fileStore);

    }
}
