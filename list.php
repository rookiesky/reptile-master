<?php
include "init.php";

$model = new \App\Models\Web();

$web = $model::where('type',1)->get();

$reptile = new \App\Reptile\ReptileList();

$web = collect($web)->toArray();


foreach ($web as $item){
    $reptile->run($item);
    $model->where('id',$item['id'])->update(['status' => 1]);
}
