<?php

namespace App\Controller;

use App\Models\Web;
use App\Reptile\ReptileContent;
use App\Reptile\TestReptileContent;
use App\Reptile\TestReptileList;
use Illuminate\Http\Resources\Json\Resource;


/**
 * Class ReptileController
 *
 * @package \App\Controller
 */
class ReptileController extends Controller
{

    public function index()
    {
        $data = Web::get(['id','link','total','api_type','status','type','name']);
        return $this->view('index',compact('data'));
    }

    public function create()
    {
        return $this->view('create');
    }

    public function store()
    {
        $data = $_POST;

        if(Web::create($data)){
            return $this->response();
        }
        return $this->response(null,'写入失败',500);
    }

    public function show()
    {
        if(isset($_GET['type']) && isset($_GET['id'])){
            $web = Web::find($_GET['id']);

            if(empty($web)){
                return $this->response(null,'NOT',404);
            }

            return $this->view('show',compact('web'));
        }
        return $this->response(null,'NOT',404);
    }

    public function copay()
    {
        if(isset($_GET['id']) && $_GET['id'] != ''){

            $web = Web::find($_GET['id']);
            if(empty($web)){
                return $this->response(null,'NOT',404);
            }
            return $this->view('copay',compact('web'));
        }
        return $this->response(null,'NOT',404);
    }

    public function update()
    {
        $data = $_POST;
        if(empty($data)){
            return $this->response(null,'NOT',404);
        }

        if(Web::where('id',$data['id'])->update($data)){
            (new ReptileContent())->updateCacheWeb($data['id'],$data);
            return $this->response();
        }
        return $this->response(null,'修改失败',500);
    }

    public function destroy()
    {
        if(isset($_GET['id'])){
            $web = Web::find($_GET['id']);

            if(empty($web)){
                return $this->response(null,'NOT',404);
            }

            if($web->delete()){
                return $this->response();
            }
            return $this->response(null,'删除失败',500);
        }
        return $this->response(null,'NOT',404);
    }
    

    public function testList()
    {
        $data = $_POST;

        $result = (new TestReptileList())->test($data);

        if($result == false){
            return $this->response(null,'采集失败',404);
        }
        return $this->response($result);
    }

    public function testContent()
    {
        $data = $_POST;

        $result = (new TestReptileContent())->test($data);

        if($result == false){
            return $this->response(null,'采集失败',404);
        }
        return $this->response($result);
    }


}
