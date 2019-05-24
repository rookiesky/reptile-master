<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Maintain
 *
 * @package \App\Models
 */
class Maintain extends Model
{
    public $table = 'reptile_maintain';

    public $timestamps = false;

    protected $fillable = ['web_id','link'];


    public function addAll($data)
    {
        global $capsule;

        return $capsule::table($this->getTable())->insert($data);
    }

}
