

<?php $__env->startSection('content'); ?>
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
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <th scope="row"><?php echo e($item->id); ?></th>
            <td><?php echo e($item->name); ?></td>
            <td><?php echo e($item->link); ?></td>
            <td><?php echo e($item->total); ?></td>
            <td><?php echo e($item->api_type); ?></td>
            <td><?php echo e($item->type); ?></td>
            <td><?php echo e($item->status); ?></td>
            <td>
                <a href="/index.php?type=show&id=<?php echo e($item->id); ?>" class="btn btn-primary">编辑</a>
                <button type="button" class="btn btn-danger" data-id=<?php echo e($item->id); ?>>删除</button>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/reptile-master/views/index.blade.php ENDPATH**/ ?>