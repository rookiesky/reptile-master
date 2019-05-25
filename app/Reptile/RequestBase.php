<?php

namespace App\Reptile;

/**
 * Class RequestBase
 *
 * @package \App
 */
class RequestBase
{

 protected function dateFormat($date)
 {
     $rules = '/^(\d{4}年\d{2}月\d{2}日)?$/';

     $val = preg_replace('# #','',$date);

     if(preg_match($rules,$val)){
         return str_replace('月','-',str_replace('年','-',rtrim($val,'日')));
     }
     return $date;
 }
}
