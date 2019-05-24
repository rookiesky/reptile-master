<?php
include "init.php";

$model = new \App\Models\Web();

$web = $model::where('type',2)->where('status',0)->get();

$reptile = new \App\Reptile\MaintainReptile();

$web = collect($web)->toArray();


foreach ($web as $item){
    $reptile->run($item);

    if($item['total'] == 1){
        $model->where('id',$item['id'])->update(['status' => 1]);
    }

}
