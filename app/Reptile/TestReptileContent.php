<?php

namespace App\Reptile;

/**
 * Class TestReptileContent
 *
 * @package \App\Reptile
 */
class TestReptileContent extends ReptileContent
{
    public function test($data)
    {
        $list = (new TestReptileList())->test($data);

        if($list == false){
            return false;
        }

        if(!isset($list[0]['link']) || empty($list[0]['link'])){
            return false;
        }

        $this->web = $data;

        return $this->collect($list[0]['link']);

    }
}
