<?php include(TEMPLATE . "/header.php") ?>
<!-- 页面主要内容 start -->
<div class="container">
    <h1 style="text-align: center;margin: 100px 0;"> <?php echo $this->config['sitename'];?></h1>
    <div class="col-xs-12 col-sm-12 col-md-8 center-block" style="margin: 40px auto;">
        <ul class="nav nav-tabs" style="border-bottom: 0;">
            <li class="nav-item">
                <a class="nav-link active" href="/">文件发送</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?a=text">文字文本</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="?a=encryption">超级加密</a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" href="?a=receive">文件接收</a>
            </li>
        </ul>
        <div id="send-box">
            <form class="input-group mb-3" action="?a=upload" method="POST" enctype="multipart/form-data">
                <div class="input-group mb-3 ">
                    <input type="file" name="file" class="form-control" required>
                    <div class="input-group-append">
                        <button class="btn btn-warning col-sm-12" type="submit">文件上传</button>
                    </div>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label" for="time" style="width: 10rem">文件有效期</label> 
                    <select id="time" name="time" class="form-control">
                        <option value="1" selected>阅后即焚</option>
                        <option value="1d">一天</option>
                        <option value="7d">一周</option>
                        <option value="forever">永久 (需登录)</option>
                    </select>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="isLAN" name="isLAN" value="1" checked>
                    <label class="form-check-label" for="isLAN">内网共享</label>
                </div>
            </form>
        </div>

        

        <?php  if(isset($intranet) && $intranet){ ?>
            <div class="mt-3">
                <div class="card">
                    <div class="card-header">
                        内网共享文件
                    </div>
                    <ul class="list-group list-group-flush">
                        
                    
                        <?php  foreach ($intranet as &$item){  ?>
                            <li class="list-group-item"><a href="/s/<?php echo $item['alias']; ?>"><?php echo $item['name']; ?></a> </li>
                        <?php }  ?>


                    </ul>
                </div>
            </div>

        <?php  }  ?>
    </div>
</div>
<!-- 页面主要内容 end -->
<?php include(TEMPLATE . "/footer.php") ?>