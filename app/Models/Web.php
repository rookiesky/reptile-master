<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Web
 *
 * @package \App\Models
 */
class Web extends Model
{
    public $table = 'reptile_web';

    public $timestamps = false;

    protected $fillable = ['web_id','link'];


    public function addAll($data)
    {
        global $capsule;
        return $capsule::table($this->getTable())->insert($data);
    }

}
