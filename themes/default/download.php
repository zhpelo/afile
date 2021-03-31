<?php get_header(); ?>
<!-- 页面主要内容 start -->
<div class="container">
    <div class="shadow p-3 mb-5 bg-white rounded" style="margin-top: 50px;">
        <p>文件名称：<?php echo $data['name']; ?></p>
        <p>文件大小：<?php echo zpl_size($data['size']); ?></p>
        <p>上传时间：<?php echo zpl_time($data['create_time']); ?></p>
        <p>文件MD5：<?php echo $data['md5']; ?></p>
        <a href="/s/<?php echo $data['alias']; ?>?c=download" type="button" class="btn btn-warning">立即下载</a>
    </div>
</div>
<!-- 页面主要内容 end -->
<?php get_footer(); ?>