<?php
include "init.php";

$model = new \App\Models\Maintain();

$links = $model->limit(2)->get();

$links = collect($links)->toArray();

$reptile = new \App\Reptile\ReptileContent();

foreach ($links as $item){
    $reptile->run($item);
    $model->where('id',$item['id'])->delete();
}
