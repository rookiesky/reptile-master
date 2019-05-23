

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
                        <input type="text" class="form-control" name="name" placeholder="">
                    </div>
                    <div class="form-group">
                        <label >链接</label>
                        <input type="text" class="form-control" name="link" placeholder="">
                        <small id="emailHelp" class="form-text text-muted">(*)分页，(#)分类</small>
                    </div>
                    <div class="form-group">
                        <label >列表规则</label>
                        <input type="text" class="form-control" name="rule" placeholder="">
                        <small id="emailHelp" class="form-text text-muted">如：.content>a&&&href</small>
                    </div>
                    <div class="form-group">
                        <label >页码</label>
                        <input type="text" class="form-control" name="total" placeholder="">
                    </div>
                    <div class="form-group">
                        <label >分类</label>
                        <input type="text" class="form-control" name="sort" placeholder="">
                    </div>
                    <button type="button" class="btn btn-info btn-block put-list">测试列表采集</button>
                    <div class="form-group">
                        <label >标题规则</label>
                        <input type="text" class="form-control" name="title_rule" placeholder="">
                    </div>
                    <div class="form-group">
                        <label >内容规则</label>
                        <input type="text" class="form-control" name="content_rule" placeholder="">
                    </div>
                    <div class="form-group">
                        <label >分类规则</label>
                        <input type="text" class="form-control" name="sort_rule" placeholder="">
                    </div>
                    <div class="form-group">
                        <label >标签规则</label>
                        <input type="text" class="form-control" name="tag_rule" placeholder="">
                    </div>
                    <div class="form-group">
                        <label >时间规则</label>
                        <input type="text" class="form-control" name="date_rule" placeholder="">
                    </div>
                    <div class="form-group">
                        <label >用户规则</label>
                        <input type="text" class="form-control" name="username_rule" placeholder="">
                    </div>
                    <div class="form-group">
                        <label >接口类型</label>
                        <select class="form-control" name="api_type">
                          <option value="typecho">typecho</option>
                          <option value="wordpress">wordpress</option>
                          <option value="xiuno">xiuno</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label >API</label>
                        <input type="text" class="form-control" name="api" placeholder="">
                    </div>
                    <div class="form-group">
                        <label >采集类型</label>
                        <div class="form-check form-check-inline">
                              <input class="form-check-input" checked type="radio" name="type" value="1">
                              <label class="form-check-label" for="inlineRadio1">即时</label>
                        </div>
                        <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="2">
                              <label class="form-check-label" for="inlineRadio2">维护</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label >状态</label>
                        <div class="form-check form-check-inline">
                              <input class="form-check-input" checked type="radio" name="status" value="0">
                              <label class="form-check-label" for="inlineRadio1">采集</label>
                        </div>
                        <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="1">
                              <label class="form-check-label" for="inlineRadio2">结束</label>
                        </div>
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

                $.post('/index.php?type=create-store',d)
                .done(function(data){
                    layer.msg(data.message);
                })
                .fail(function(e){
                    layer.alert(e.responseJSON.message);
                })
            })


        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/reptile-master/views/create.blade.php ENDPATH**/ ?>