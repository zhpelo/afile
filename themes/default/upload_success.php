<?php get_header(); ?>
<!-- 页面主要内容 start -->
<div class="container">
    <div class="alert alert-success" role="alert" style="margin-top: 30px;">

        <strong>恭喜您</strong>，您的文件上传成功!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>

    <div class="shadow p-3 mb-5 bg-white rounded">



        <p>文件名：<?php echo $data['name']; ?></p>
        <p>提取码：<?php echo $data['alias']; ?></p>
        <p>直达链接：http://sss.com/s/<?php echo $data['alias']; ?></p>
        <p>二维码：<img width="160" src="https://api.pwmqr.com/qrcode/create/?url=http://sss.com/s/<?php echo $data['alias']; ?>"></p>



        <a class="btn btn-warning" href="/">返回继续上传文件</a>
    </div>
    
</div>
<!-- 页面主要内容 end -->

<?php get_footer(); ?>