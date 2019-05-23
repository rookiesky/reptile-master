@extends('layouts.app')

@section('content')
    <div class="container-full">
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">标题</th>
            <th scope="col">链接</th>
            <th scope="col">页码</th>
            <th scope="col">接口类型</th>
            <th scope="col">类型</th>
            <th scope="col">状态</th>
            <th scope="col">操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $item)
        <tr>
            <th scope="row">{{ $item->id }}</th>
            <td>{{ $item->name }}</td>
            <td>{{ $item->link }}</td>
            <td>{{ $item->total }}</td>
            <td>{{ $item->api_type }}</td>
            <td>{{ $item->type }}</td>
            <td>{{ $item->status }}</td>
            <td>
                <a href="/index.php?type=show&id={{ $item->id }}" class="btn btn-primary">编辑</a>
                <button type="button" class="btn btn-danger" data-id={{ $item->id }}>删除</button>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    </div>

    <script type="text/javascript">
        
        $(".btn-danger").click(function(){
            let id = $(this).data('id');

            if(id == ''){
                layer.alert('ID不能为空');
                return false;
            }

            $.get('/index.php?type=delete',{id:id})
            .done(function(data){
                layer.msg(data.message,function(){
                    window.location.reload();
                })
            })
            .fail(function(e){
                layer.alert(e.responseJSON.message)
            })

        })

    </script>
@stop
