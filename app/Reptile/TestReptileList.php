<?php

namespace App\Reptile;

/**
 * Class TestReptileList
 *
 * @package \App\Reptile
 */
class TestReptileList extends ReptileList
{
    public function test($data)
    {
        $this->web = $data;

        if($data['sort'] != ''){
            $this->sort();
        }

        $link = $this->url(1);

        return $this->collect($link);
    }

}
