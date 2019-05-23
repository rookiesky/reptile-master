<?php

namespace App\Reptile;

use App\Models\Web;
use App\Tools\Cache;
use App\Tools\Log;
use QL\QueryList;

/**
 * Class ReptileController
 *
 * @package \App\Reptile
 */
class ReptileContent
{

    const LINK_WEB_KEY = 'LINK_WEB_LEY_';

    protected $web = null;

    public function run($link)
    {
        //处理规则
        if($this->getWeb($link) == false ){
            return false;
        }

        //获取内容
       $content =  $this->collect($link['link']);

       if($content == false){
           return false;
       }

        (new RequestApi())->run($content,$this->web);
    }


    protected function collect($link)
    {
        try{
            $result = QueryList::get($link)->rules($this->rule())->queryData();
        }catch (\Exception $e){
            Log::boot()->error('reptile: ' . $link . '  - Error');
            return false;
        }
        return $result;
    }

    protected function getWeb($web)
    {
        $cache = Cache::boot();

        if($cache->has(self::LINK_WEB_KEY . $web['web_id'])){
            $this->web = $cache->get(self::LINK_WEB_KEY . $web['web_id']);
            return true;
        }

        $data = Web::find($web['web_id']);

        if(empty($data)){
            return false;
        }
        $data = collect($data)->toArray();
        $cache->put(self::LINK_WEB_KEY . $web['web_id'],$data,600);
        return $data;

    }

    public function deleteCacheWeb($id = null)
    {
        if($id == null){
            Cache::boot()->forget(self::LINK_WEB_KEY . $this->web['id']);
        }else{
            Cache::boot()->forget(self::LINK_WEB_KEY .$id);
        }

    }

    public function updateCacheWeb($id,$data)
    {
        Cache::boot()->put(self::LINK_WEB_KEY . $id,$data,600);
    }


    protected function rule()
    {
        $web = $this->web;

        $rule['title'] = $this->ruleMart($web['title_rule']);
        $rule['content'] = $this->ruleMart($web['content_rule']);
        if(! empty($web['sort_rule'])){
            $rule['sort'] = $this->ruleMart($web['sort_rule']);
        }

        if(! empty($web['tag_rule'])){
            $rule['tag'] = $this->ruleMart($web['tag_rule']);
        }

        if(! empty($web['date_rule'])){
            $rule['date'] = $this->ruleMart($web['date_rule']);
        }

        if(! empty($web['username_rule'])){
            $rule['username'] = $this->ruleMart($web['username_rule']);
        }

        return $rule;

    }


    protected function ruleMart($rule)
    {
        return explode('&&&',$rule);
    }



}
