<?php

namespace App\Reptile;

use App\Tools\Log;
use GuzzleHttp\Client;

/**
 * Class RequestApi
 *
 * @package \App\Reptile
 */
class RequestApi extends RequestBase
{
    protected $web = null;

    public function run($data,$web)
    {
        $this->web = $web;

        $data = $this->format($data);

        $client = new Client();

        try{
            $result = $client->request('post',$web['api'],[
                'form_params' => $data
            ]);
        }catch (\Exception $e){
            Log::boot()->err('post error',[$e->getMessage()]);
            return false;
        }

        if($result->getStatusCode() == 200){
            return true;
        }
        return false;

    }

    protected function format($data)
    {
        if($this->web['api_type'] == 'typecho'){
            return $this->typecho($data);
        }
        if($this->web['api_type'] == 'wordpress'){
            return $this->wordpress($data);
        }
    }


    protected function wordpress($data)
    {
        $post['post_title'] = $data[0]['title'];
        $post['post_content'] = $data[0]['content'];
        $post['post_category'] = isset($data[0]['sort']) ? $this->sortAndTagFormat($data,'sort') : '';
        $post['post_date'] = isset($data[0]['date']) ? $this->dateFormat($data[0]['date']) : date('Y-m-d H:i:s');
        $post['post_author'] = isset($data[0]['username']) ? $data[0]['username'] : '';
        $post['post_meta_list'] = '';
        $post['tag'] = isset($data[0]['tag']) ?  $this->sortAndTagFormat($data,'tag') : '';

        return $post;
    }

    protected function typecho($data)
    {
        $post['category'] = isset($data[0]['sort']) ? $this->sortAndTagFormat($data,'sort') : '';
        $post['title'] = $data[0]['title'];
        $post['content'] = $data[0]['content'];
        $post['author'] = isset($data[0]['username']) ? $data[0]['username'] : '';
        $post['date'] = isset($data[0]['date']) ? $this->dateFormat($data[0]['date']) : '';
        $post['keywords'] = isset($data[0]['tag']) ?  $this->sortAndTagFormat($data,'tag') : '';
        return $post;
    }

    protected function sortAndTagFormat($data,$type)
    {
        $new_data = array_column($data,$type);
        $string = implode(',',$new_data);
        if(empty($string)){
            return '';
        }
        return $string;
    }

}
