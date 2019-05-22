<?php
include "init.php";


$data = [
    'link' => 'http://blog.chedushi.com/archives/category/php/page/1',
    'rule' => '.entry-header>h2>a&&&href',
    'total' => 0,
    'sort' => '',
    'id' => 1,
    'title_rule' => '',
     'sort_rule' => '',
     'content_rule' => '',
     'tag_rule' => '',
     'date_rule' => '',
     'username_rule' => '',
     'api' => '',
      'status' => 0
];


//(new \App\Reptile\ReptileList())->run($data);

$data = [
    'link' => 'http://blog.chedushi.com/archives/3969',
    'web_id' => 1
];


(new \App\Reptile\ReptileController())->run($data);
