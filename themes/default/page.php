<?php include(TEMPLATE . "/header.php") ?>
<!-- 页面主要内容 start -->
<div class="container">

    <h1 class="mt-5 mb-4"><?php echo $template_data['title'];?></h1>
    <hr/>
    <p>发布时间：<?php echo zpl_time($template_data['create_time']);?> / 最后更新时间：<?php echo zpl_time($template_data['update_time']);?></p>
<hr/>
    <div class="content">
        <?php echo $template_data['content'];?>
    </div>
    
</div>
<!-- 页面主要内容 end -->
<?php include(TEMPLATE . "/footer.php") ?>