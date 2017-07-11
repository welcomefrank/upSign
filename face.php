<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>人脸注册 - 上上签</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">
    <link href="statics/css/bootstrap.min.css" rel="stylesheet">
    <link href="statics/css/oneui.min.css" id="css-main" rel="stylesheet">
    <link href="statics/css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="block">
        <div class="block-content block-content-full text-center bg-image" style="background-image: url('statics/img/photo2.jpg');">
            <img class="img-avatar img-avatar96 img-avatar-thumb" src="statics/img/avatar.jpg" id="avatar" alt="上上签">
            <h3 class="h1 font-w400 text-white">人脸注册</h3>
            <div class="font-w300 text-white">请上传清晰的自拍照片进行人脸注册</div>
        </div>
        <div class="block-content block-content-full">
            <input type="hidden" name="action" value="addFace" />
            <form class="form-horizontal" action="api.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="name">姓名</label>
                        <input class="form-control" type="text" id="name" name="name" placeholder="请输入所在教室号...">
                    </div>
                    <div class="col-md-12">
                        <label for="number">学号</label>
                        <input class="form-control" type="text" id="number" name="number" placeholder="请输入所在教室号...">
                    </div>
                    <div class="col-md-12">
                        <label for="face">自拍</label>
                        <input class="form-control" type="file" id="face" name="face" accept="image/*;capture=camera">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <button class="btn btn-lg btn-block btn-success" type="submit">注册人脸</button>
                    </div>
                </div>
            </form>
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
</body>
</html>