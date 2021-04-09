<?php include(TEMPLATE . "/header.php") ?>
<!-- 页面主要内容 start -->
<div class="container">
    <h1 style="text-align: center;margin: 100px 0;"><?php echo $this->config['sitename'];?></h1>
    <div class="col-xs-12 col-sm-12 col-md-8 center-block" style="margin: 40px auto;">
        <ul class="nav nav-tabs" style="border-bottom: 0;">
            <li class="nav-item">
                <a class="nav-link" href="/">文件发送</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?a=text">文字文本</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="?a=encryption">超级加密</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?a=receive">文件接收</a>
            </li>
        </ul>
        <div id="send-box">
            

        </div>
    </div>
</div>
<!-- 页面主要内容 end -->

<?php include(TEMPLATE . "/footer.php") ?>