<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Links
 *
 * @package \App\Models
 */
class Links extends Model
{
    public $table = 'reptile_link';

    public $timestamps = false;

    protected $fillable = ['link','web_id'];


    public function addAll($data)
    {
        global $capsule;
        return $capsule::table($this->getTable())->insert($data);
    }

}
