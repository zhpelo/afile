<?php
//开始业务处理代码
if(isset($_GET['c']) && $_GET['c'] == 'delete'){
    $this->db->where("page_id", (int)$_GET['page_id']);
    if($this->db->delete('page')){
        $this->success('删除成功');
    }else{
        $this->error('删除失败，请稍后重试');
    }
}
if (is_post()) {
    $data = [
        "page_url" 	=> (string)$_POST['page_url'],
        "title"		=> (string)$_POST['title'],
        "content"	=> (string)$_POST['content'] ,  
        "update_time" 	=> time(),
    ];
    //判断是否新增还是编辑
    if(isset($_POST['page_id']) && $_POST['page_id']){
        $page_id = $this->db->where("page_id", (int)$_GET['page_id'])->update("page", $data);
    }else{
        $data["create_time"] = time();
        $page_id = $this->db->insert('page', $data);
    }
    if ($page_id > 0) {
        $this->success('成功');
    } else {
        $this->error('失败，请重试');
    }
}
if(isset($_GET['page_id']) && $_GET['page_id']){
    $data = $this->db->where('page_id',(int)$_GET['page_id'])->getOne("page");
}else{
    $data = $this->db->orderBy("create_time", "Desc")->get("page");
}


get_admin_header();
?>
<div class="container-fluid">
    <div class="block">
        <div class="block-header d-flex justify-content-between">
            <h3>单页管理</h3>
            <a href="?do=page&c=add"  class="btn btn-primary">新建</a>
        </div>
        <div class="block-body">



            <?php if (isset($_GET['c']) && ($_GET['c'] == 'add' || $_GET['c'] == 'edit')) { ?>
                <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
                <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

                <form method="POST">
                    <?php if (isset($data['page_id'])) { ?>
                        <input type="hidden" id="page_id" name="page_id" value="<?php echo $data['page_id']; ?>">
                    <?php } ?>
                    <div class="form-group">
                        <label for="exampleInputEmail1">单页标题</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?php if (isset($data['title'])) echo $data['title']; ?>" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">固定链接</label>
                        <input type="text" class="form-control" id="page_url" name="page_url" value="<?php if (isset($data['page_url'])) echo $data['page_url']; ?>" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">单页内容</label>
                        <textarea id="summernote" name="content">
                            <?php if (isset($data['content'])) echo $data['content']; ?>
                        </textarea>

                    </div>
                    <button type="submit" class="btn btn-primary">提交</button>
                </form>
            <?php } else { ?>
                <table class="table data-list">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>标题</th>
                            <th>发布时间</th>
                            <th>最后修改</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as &$item) {  ?>
                            <tr>
                                <th scope="row"> <?php echo $item['page_id']; ?> </th>
                                <td>
                                    <a href="<?php echo url('page',$item['page_url']);?>"><?php echo $item['title']; ?></a> 
                                </td>
                                <td> <?php echo zpl_time($item['create_time']); ?> </td>
                                <td> <?php echo zpl_time($item['update_time']); ?> </td>
                                <td>
                                    <a href="?do=page&c=delete&page_id=<?php echo $item['page_id']; ?>">删除</a>
                                    <a href="?do=page&c=edit&page_id=<?php echo $item['page_id']; ?>">编辑</a>
                                </td>
                            </tr>
                        <?php }  ?>
                    </tbody>
                </table>
            <?php }  ?>

        </div>
    </div>

</div>
<script>
     $('#summernote').summernote({
        placeholder: '请在这里输入，如果内容包含js代码会被系统自动清除',
        tabsize: 2,
        height: 300
      });
  </script>
<?php get_admin_footer(); ?>