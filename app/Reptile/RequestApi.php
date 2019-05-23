<?php

namespace App\Reptile;

use App\Tools\Log;
use GuzzleHttp\Client;

/**
 * Class RequestApi
 *
 * @package \App\Reptile
 */
class RequestApi
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
    }

    protected function typecho($data)
    {
        $post['category'] = isset($data[0]['sort']) ? $data[0]['sort'] : '';
        $post['title'] = $data[0]['title'];
        $post['content'] = $data[0]['content'];
        $post['author'] = isset($data[0]['username']) ? $data[0]['username'] : '';
        $post['date'] = isset($data[0]['date']) ? $data[0]['date'] : '';
        $post['keywords'] = isset($data[0]['tag']) ? $data[0]['tag'] : '';

        return $post;
    }

}