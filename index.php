<?php
include "init.php";


$web = [
    'link' => 'http://blog.chedushi.com/archives/category/php/page/1',
    'rule' => '.entry-header>h2>a&&&href',
    'total' => 0,
    'sort' => '',
    'id' => 1,
    'title_rule' => '.entry-header>h1&&&text',
    'sort_rule' => '.entry-footer>.row>.cattegories>span>a&&&text',
    'content_rule' => '.post-content>.entry-content&&&html',
    'tag_rule' => '.entry-footer>.row>.tags>span>a&&&text',
    'date_rule' => '.entry-date>a>time&&&datetime',
    'username_rule' => '',
    'api_type' => 'typecho',
    'api' => '',
    'status' => 0
];


//(new \App\Reptile\ReptileList())->run($data);

$data = [
    'link' => 'http://blog.chedushi.com/archives/3969',
    'web_id' => 1
];

if(isset($_GET['type'])){
   $controller = new \App\Controller\ReptileController();

    switch ($_GET['type']){

        case 'create':
            $controller->create();
            break;
        case 'test-list':
            $controller->testList();
            break;
        case 'test-content':
            $controller->testContent();
            break;
        case 'create-store':
            $controller->store();
            break;
        case 'list':
            $controller->index();
            break;
        case 'show':
            $controller->show();
            break;
        case 'update':
            $controller->update();
            break;
        case 'delete':
            $controller->destroy();
            break;
        case 'copay':
            $controller->copay();
            break;
    }

}


//(new \App\Reptile\ReptileController())->run($data,$web);
