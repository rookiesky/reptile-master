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

    protected $fillable = ['name','link','rule','total','sort','title_rule','sort_rule','content_rule','tag_rule','date_rule','username_rule','api_type','api','status','type'];


    public function addAll($data)
    {
        global $capsule;
        return $capsule::table($this->getTable())->insert($data);
    }

}
