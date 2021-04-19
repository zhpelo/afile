<?php
//开始业务处理代码
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$data = $this->db->orderBy("create_time", "Desc")->arraybuilder()->paginate("user", $page);

get_admin_header();
?>
<div class="container-fluid">
    <div class="block">
        <div class="block-header">
            <h3>用户管理</h3>
        </div>
        <div class="block-body">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>用户ID</th>
                        <th>用户名</th>
                        <th>邮箱</th>
                        <th>手机号</th>
                        <th>最近登录</th>
                        <th>登录ip</th>
                        <th>注册时间</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as &$item) {  ?>
                        <tr>
                            <th scope="row"> <?php echo $item['user_id']; ?> </th>
                            <td> <?php echo $item['username']; ?> </td>
                            <td> <?php echo $item['email']; ?> </td>
                            <td> <?php echo $item['mobile']; ?> </td>
                            <td> <?php echo $item['login_time'] ? zpl_time($item['login_time']) : '无'; ?> </td>
                            <td> <?php echo $item['login_ip'] ?: '无'; ?> </td>
                            <td> <?php echo zpl_time($item['create_time']); ?> </td>
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