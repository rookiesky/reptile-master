<?php

namespace App\Reptile;

use App\Models\Links;
use App\Tools\Cache;
use App\Tools\Log;
use function Clue\StreamFilter\fun;
use QL\QueryList;

/**
 * Class ReptileList
 *
 * @package \App\Reptile
 */
class ReptileList
{
    const TOTAL_KEY = 'page_total';

    protected $web = null;

    public function run($data)
    {
        $this->web = $data;
        //Cache::boot()->forget(self::TOTAL_KEY);
       // dd();

        if($data['sort'] != ''){
            $this->sort();
        }

        if(empty($data['total'])){
            $link = $data['link'];
            $result = $this->collect($link);
            if($result != false){
                (new Links())->addAll($result);
                Log::boot()->info('list: ' . $link . 'Success !');
            }
        }

        $this->links();
    }

    /**
     * 多页
     */
    protected function links()
    {
        $total = $this->getTotal();
        $log = Log::boot();
        $model = new Links();
        for ($i = $total; $i > 0; $i--){
            $link = $this->url($i);
            $result = $this->collect($link);
            if($result != false){
                $model->addAll($result);
                $log->info('list: ' . $link . 'Success !');
            }
            $this->setTotal($i - 1);
        }
        Cache::boot()->forget(self::TOTAL_KEY);
    }

    /**
     * 采集数据
     * @param $link
     *
     * @return bool|Array
     */
    protected function collect($link)
    {
        $web = $this->web;
        try{
            return QueryList::get($link)->rules([
                'link' => $this->rule()
            ])->queryData(function ($item) use($web) {
                $item['web_id'] = $web['id'];
                return $item;
            });
        }catch (\Exception $e){
            return false;
        }
    }

    /**
     * 获取页码
     * @return mixed
     */
    protected function getTotal()
    {
        $cache = Cache::boot();

        if($cache->has(self::TOTAL_KEY)){
            return $cache->get(self::TOTAL_KEY);
        }

        $this->setTotal($this->web['total']);
        return $this->web['total'];
    }

    /**
     * 写入页码缓存
     * @param $total
     *
     * @return bool
     */
    protected function setTotal($total)
    {
        return Cache::boot()->forever(self::TOTAL_KEY,$total);
    }

    /**
     * 规则
     * @return array
     */
    protected function rule()
    {
        return explode('&&&',$this->web['rule']);
    }

    /**
     * 网址分页
     * @param $page
     *
     * @return mixed
     */
    protected function url($page)
    {
        return str_replace("(*)",$page,$this->web['link']);
    }

    /**
     * 替换网址类别
     *
     * @return mixed
     */
    protected function sort()
    {
        return $this->web['link'] =  str_replace("(#)",$this->web['sort'],$this->web['link']);
    }

}
