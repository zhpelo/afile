<?php
//开始业务处理代码

$data = $this->db->orderBy("option_id", "asc")->get("options");
// p($data);
get_admin_header();
?>
<div class="container">
    <div class="block">
        <div class="block-header">
            <h3>系统设置</h3>
        </div>
        <div class="block-body">
            <form method="POST">
                <table class="table-option">
                    <tbody>
                        <?php  foreach ($data as &$item){  ?>
                        <tr>
                            <th scope="row">
                                <label for="<?php echo $item['option_name']; ?>"><?php echo $item['option_explain']; ?></label>
                            </th>
                            <td>
                                <input name="<?php echo $item['option_name']; ?>" type="text" id="<?php echo $item['option_name']; ?>" value="<?php echo $item['option_value']; ?>" class="regular-text">
                            </td>
                        </tr>
                        <?php }  ?>
                    
                    </tbody>
                </table>
                <button type="submit" class="button">保存修改</button>
            </form>
        </div>
    </div>

</div>

<?php get_admin_footer(); ?>