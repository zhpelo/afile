<?php 
//开始业务处理代码
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$data = $this->db->orderBy("create_time", "Desc")->arraybuilder()->paginate("file", $page);

get_admin_header(); 
?>
<div class="container-fluid">
    <div class="block">
        <div class="block-header">
            <h3>文件管理</h3>
        </div>
        <div class="block-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>文件ID</th>
                        <th>文件名</th>
                        <th>文件大小</th>
                        <th>存储路径</th>
                        <th>上传时间</th>
                        <th>过期时间</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  foreach ($data as &$item){  ?>
                    <tr>
                        <th scope="row"> <?php echo $item['file_id'];?> </th>
                        <td> <?php echo $item['name'];?> </td>
                        <td> <?php echo zpl_size($item['size']);?> </td>
                        <td> <?php echo $item['url'];?> </td>
                        <td> <?php echo zpl_time($item['create_time']);?> </td>
                        <td> <?php echo  date("Y-m-d H:i", $item['expire_time']);?> </td>
                        <td> 
                            <a href="#">封禁</a>
                            <a href="#">删除</a>
                            <a href="#">编辑</a>
                        </td>
                    </tr>
                    <?php }  ?>
                </tbody>
            </table>
            <?php 
                if ($this->db->totalPages > 1) { 
                    get_template_page($page,$this->db->totalPages);
                }
            ?>
        </div>
    </div>

</div>

<?php get_admin_footer(); ?>