<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>教师端 - 上上签</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">
    <link href="statics/css/bootstrap.min.css" rel="stylesheet">
    <link href="statics/css/jquery.fileupload.css" rel="stylesheet">
    <link href="statics/css/oneui.min.css" id="css-main" rel="stylesheet">
    <link href="statics/css/style.css" rel="stylesheet">
    <link href="statics/js/plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="block">
        <div class="block-content block-content-full text-center bg-image" style="background-image: url('statics/img/photo2.jpg');">
            <img class="img-avatar img-avatar96 img-avatar-thumb" src="statics/img/avatar.jpg" id="avatar" alt="上上签">
            <h3 class="h1 font-w400 text-white">教师端</h3>
            <div class="font-w300 text-white">请教师开启GPS定位功能后设置签到</div>
        </div>
        <div class="block-content block-content-full">
            <div class="form-horizontal">
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="room">教室号</label>
                        <input class="form-control" type="text" id="room" name="room" placeholder="请输入所在教室号...">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="lat">纬度</label>
                        <input class="form-control" type="text" id="lat" name="lat" disabled>
                    </div>
                    <div class="col-xs-6">
                        <label for="long">经度</label>
                        <input class="form-control" type="text" id="long" name="long" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <button class="btn btn-lg btn-block btn-success" type="submit" id="setSignin">设置签到</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer id="page-footer" class="content-mini content-mini-full font-s12 bg-gray-lighter clearfix">
        <div class="pull-right">
            Crafted with <i class="fa fa-heart text-city"></i> by <a class="font-w600" href="https://sangsir.com" target="_blank">SangSir</a>
        </div>
        <div class="pull-left">
            <a class="font-w600" href="https://sangsir.com" target="_blank">上上签</a> &copy; 2017 - 沐码团队
        </div>
    </footer>
</div>
    <script src="statics/js/oneui.min.js"></script>
    <script src="statics/js/plugins/sweetalert2/es6-promise.auto.min.js"></script>
    <script src="statics/js/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script>
$(function () {
    function geo_success(position) {
        $('#lat').val(position.coords.latitude);
        $('#long').val(position.coords.longitude);
    }
    function geo_error(error) {
        switch (error.code) {
            case error.TIMEOUT:
            swal('出错了...', '获取地理位置超时，请检查GPS是否开启！', 'error');
            break;
            case error.PERMISSION_DENIED:
            swal('出错了...', '请允许浏览器进行地理定位，或使用系统浏览器进行签到！', 'error');
            break;
        };
    }
    if (!!navigator.geolocation) {
        navigator.geolocation.watchPosition(geo_success, geo_error, {
            enableHighAccuracy: true,
            maximumAge: 30000,
            timeout: 27000
        });
    }else{
        swal('出错了...', '浏览器不支持Geo Location API，请使用最新版浏览器！', 'error');
    }
    $("#setSignin").click(function() {
        $.ajax({
                type: "post",
                url: "api.php",
                dataType: "json",
                data: {
                    action: "setSignin",
                    room: $("#room").val(),
                    lat: $("#lat").val(),
                    long: $("#long").val()
                },
                success: function(data){
                    if (data.status == 0) {
                        swal('设置成功', '请通知学生进行签到！', 'success');
                    }else{
                        swal('出错了...', '设置失败，请检查数据是否填写完整！', 'error');
                    }
                },
                error: function(){
                    swal('出错了...', '网络错误，请稍后再试！', 'error');
                }
        });
    });
});
    </script>
</body>
</html>