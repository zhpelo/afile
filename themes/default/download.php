<?php get_header(); ?>
<!-- 页面主要内容 start -->
<div class="container">

        <?php if (isset($_GET['c']) && $_GET['c'] == 'text') { ?>
            <div class="col-md-12 py-md-3 pl-md-5">
                <div class="card">
                    <div class="card-header"> 分享给您的文字 </div>
                    <div class="card-body">

                        <p>
                        <?php echo html_entity_decode($data['content']); ?>
                        </p>
                                
                        

                    </div>

                </div>
            </div>
        
        <?php }else{ ?>

            <div class="shadow p-3 mb-5 bg-white rounded" style="margin-top: 50px;">
                <p>文件名称：<?php echo $data['name']; ?></p>
                <p>文件大小：<?php echo zpl_size($data['size']); ?></p>
                <p>上传时间：<?php echo zpl_time($data['create_time']); ?></p>
                <p>文件MD5：<?php echo $data['md5']; ?></p>
                <a href="/s/<?php echo $data['alias']; ?>?c=download" type="button" class="btn btn-warning">立即下载</a>
            </div>
        
        
        <?php } ?>


    
</div>
<!-- 页面主要内容 end -->
<?php get_footer(); ?>