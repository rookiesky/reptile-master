<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>云平台</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/layer/2.3/skin/layer.css">
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js" ></script>
    <script src="https://cdn.staticfile.org/layer/2.3/layer.js"></script>
</head>
<body>

<?php echo $__env->yieldContent('content'); ?>

<!-- Optional JavaScript -->
<script src="https://cdn.bootcss.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
    $( document ).ajaxStart(function() {
        startmsg = layer.msg('加载中', {
            icon: 16
            ,shade: 0.01
        });
    });
    $( document ).ajaxStop(function() {
        layer.close(startmsg);
    });
</script>

</body>
</html>
<?php /**PATH /home/vagrant/code/reptile-master/views/layouts/app.blade.php ENDPATH**/ ?>