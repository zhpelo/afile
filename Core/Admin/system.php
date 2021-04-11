<?php
//开始业务处理代码

$data = $this->db->orderBy("option_id", "asc")->get("options");
// p($data);
get_admin_header();
?>
<div class="container-fluid">
    <div class="block">
        <div class="block-header">
            <h3>系统设置</h3>
        </div>
        <div class="block-body">
            <form method="POST">
            <?php foreach ($data as &$item) {  ?>
                <div class="form-group row">
                    <label for="<?php echo $item['option_name']; ?>" class="col-sm-2 col-form-label"><?php echo $item['option_explain']; ?></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="<?php echo $item['option_name']; ?>"  name="<?php echo $item['option_name']; ?>" value="<?php echo $item['option_value']; ?>">
                    </div>
                </div>
            <?php }  ?>
                <button type="submit" class="button">保存修改</button>
            </form>
        </div>
    </div>

</div>

<?php get_admin_footer(); ?>