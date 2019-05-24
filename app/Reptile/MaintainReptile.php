<?php

namespace App\Reptile;

use App\Models\Maintain;
use App\Models\Web;
use App\Tools\Log;

/**
 * Class MaintainReptile
 *
 * @package \App\Reptile
 */
class MaintainReptile extends ReptileList
{

    public function run($data)
    {
        $this->web = $data;

        if($data['sort'] != ''){
            $this->sort();
        }

        if(empty($data['total'])){
            $link = $data['link'];
        }else{
            $link = $this->url($data['total']);
        }

        $log = Log::boot();

        $result = $this->collect($link);

        if($result == false){
            $log->error('Maintain reptile list error',[$link]);
            return false;
        }

        if((new Maintain())->addAll($result)){
            Web::where('id',$data['id'])->update(['total'=>($data['total'] - 1)]);
            $log->info('Maintain reptile Success',[$link]);
            return true;
        }

        $log->error('Maintain add list error',[$link]);
    }
}
