

<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="card">
            <div class="card-header">
                列表设置
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label >标题</label>
                        <input type="text" class="form-control" name="name" value="<?php echo e($web->name); ?>">
                    </div>
                    <div class="form-group">
                        <label >链接</label>
                        <input type="text" class="form-control" name="link" value="<?php echo e($web->link); ?>">
                        <small id="emailHelp" class="form-text text-muted">(*)分页，(#)分类</small>
                    </div>
                    <div class="form-group">
                        <label >列表规则</label>
                        <input type="text" class="form-control" name="rule" value="<?php echo e($web->rule); ?>">
                        <small id="emailHelp" class="form-text text-muted">如：.content>a&&&href</small>
                    </div>
                    <div class="form-group">
                        <label >页码</label>
                        <input type="text" class="form-control" name="total" value="<?php echo e($web->total); ?>">
                    </div>
                    <div class="form-group">
                        <label >分类</label>
                        <input type="text" class="form-control" name="sort" value="<?php echo e($web->sort); ?>">
                    </div>
                    <button type="button" class="btn btn-info btn-block put-list">测试列表采集</button>
                    <div class="form-group">
                        <label >标题规则</label>
                        <input type="text" class="form-control" name="title_rule" value="<?php echo e($web->title_rule); ?>">
                    </div>
                    <div class="form-group">
                        <label >内容规则</label>
                        <input type="text" class="form-control" name="content_rule" value="<?php echo e($web->content_rule); ?>">
                    </div>
                    <div class="form-group">
                        <label >分类规则</label>
                        <input type="text" class="form-control" name="sort_rule" value="<?php echo e($web->sort_rule); ?>">
                    </div>
                    <div class="form-group">
                        <label >标签规则</label>
                        <input type="text" class="form-control" name="tag_rule" value="<?php echo e($web->tag_rule); ?>">
                    </div>
                    <div class="form-group">
                        <label >时间规则</label>
                        <input type="text" class="form-control" name="date_rule" value="<?php echo e($web->date_rule); ?>">
                    </div>
                    <div class="form-group">
                        <label >用户规则</label>
                        <input type="text" class="form-control" name="username_rule" value="<?php echo e($web->username_rule); ?>">
                    </div>
                    <div class="form-group">
                        <label >接口类型</label>
                        <select class="form-control" name="api_type">
                            <option value="typecho" <?php if($web->api_type == 'typecho'): ?> selected <?php endif; ?>>typecho</option>
                            <option value="wordpress" <?php if($web->api_type == 'wordpress'): ?> selected <?php endif; ?>>wordpress</option>
                            <option value="xiuno" <?php if($web->api_type == 'xiuno'): ?> selected <?php endif; ?>>xiuno</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label >API</label>
                        <input type="text" class="form-control" name="api" value="<?php echo e($web->api); ?>">
                    </div>
                    <div class="form-group">
                        <label >采集类型</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" <?php if($web->type == 1): ?>checked <?php endif; ?> type="radio" name="type" value="1">
                            <label class="form-check-label" for="inlineRadio1">即时</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" <?php if($web->type == 2): ?>checked <?php endif; ?> name="type" id="inlineRadio2" value="2">
                            <label class="form-check-label" for="inlineRadio2">维护</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label >状态</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" <?php if($web->status == 0): ?>checked <?php endif; ?> type="radio" name="status" value="0">
                            <label class="form-check-label" for="inlineRadio1">采集</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" <?php if($web->status == 1): ?>checked <?php endif; ?> name="status" id="inlineRadio2" value="1">
                            <label class="form-check-label" for="inlineRadio2">结束</label>
                        </div>
                        <input type="hidden" name="id" value="<?php echo e($web->id); ?>">
                    </div>
                    <button type="button" class="btn btn-info btn-block put-content">测试内容采集</button>
                    <button type="button" class="btn btn-primary btn-block put-data">提交</button>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $(".put-list").click(function () {
                var d = {};
                var t = $('form').serializeArray();
                $.each(t, function() {
                    if(this.name == 'link' || this.name == 'rule' || this.name == 'total' || this.name == 'sort'){
                        d[this.name] = this.value;
                    }
                });

                $.post('/index.php?type=test-list',d)
                    .done(function(data){
                        $(".modal-body").html(JSON.stringify(data.data));
                        $("#exampleModal").modal('show');
                    })
                    .fail(function(e){
                        layer.alert(e.responseJSON.message);
                    })

            })

            $(".put-content").click(function(){

                var d = {};
                var t = $('form').serializeArray();
                $.each(t, function() {
                    d[this.name] = this.value;
                });

                $.post('/index.php?type=test-content',d)
                    .done(function(data){
                        $(".modal-body").html(JSON.stringify(data.data));
                        $("#exampleModal").modal('show');
                    })
                    .fail(function(e){
                        layer.alert(e.responseJSON.message);
                    })

            })


            $(".put-data").click(function(){
                var d = {};
                var t = $('form').serializeArray();
                $.each(t, function() {
                    d[this.name] = this.value;
                });

                $.post('/index.php?type=update',d)
                    .done(function(data){
                        layer.msg(data.message,function(){
                            window.location.href = '/index.php?type=list';
                        });
                    })
                    .fail(function(e){
                        layer.alert(e.responseJSON.message);
                    })
            })


        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/reptile-master/views/show.blade.php ENDPATH**/ ?>