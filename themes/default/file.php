<?php include(TEMPLATE . "/header.php") ?>

<!-- 页面主要内容 start -->
<div class="container-fluid">
    <div class="row flex-xl-nowrap">
        <div class="col-md-3 col-xl-2">
            <div class="sidebar">
                <?php include(TEMPLATE . "/block/sidebar-left-nav.php") ?>
            </div>
        </div>
        <div class="col-md-9 col-xl-8 py-md-3 pl-md-5">
            <div class="card">
                <div class="card-header"> 文件管理 </div>
                <div class="card-body">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="?a=file&c=add_folder" class="btn btn-secondary">新建文件夹</a>

                        <a href="?a=file&c=add_folder" class="btn btn-secondary">离线下载</a>
                        <a href="?a=file&c=add_folder" class="btn btn-secondary">上传文件</a>
                    </div>
                    <br /><br />

                    <?php if ($_GET['c'] == 'add_folder') { ?>
                    <form method="POST">
                        <input type="hidden" name="parent_id" value="0">

                        <div class="form-group row">
                            <label for="folder_name" class="col-sm-2 col-form-label">文件夹名</label>
                            <div class="col-sm-5">
                                <input type="text" name="folder_name" class="form-control" id="folder_name"
                                    value="未命名文件夹">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="is_public" class="col-sm-2 col-form-label">文件权限</label>
                            <div class="col-sm-5">
                                <select class="form-control" id="is_public" name="is_public">
                                    <option value="0">私人文件夹</option>
                                    <option value="1">公开文件夹</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="access_password" class="col-sm-2 col-form-label">访问密码</label>
                            <div class="col-sm-5">
                                <input type="text" name="access_password" class="form-control" id="access_password"
                                    placeholder="不设置就不用填写">
                            </div>
                        </div>


                        <button class="btn btn-warning" type="submit">确定</button>
                    </form>
                    <?php  } elseif ($_GET['c'] == 'trash') { ?>
                    <form method="POST">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">原密码</label>
                            <div class="col-sm-5">
                                <input type="password" name="oldpassword" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">新密码</label>
                            <div class="col-sm-5">
                                <input type="password" name="newpassword" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputBio" class="col-sm-2 col-form-label">确认新密码</label>
                            <div class="col-sm-5">
                                <input type="password" name="newpassword2" class="form-control">
                            </div>
                        </div>
                        <button class="btn btn-warning" type="submit">保存修改</button>
                    </form>
                    <?php  } else { ?>



                    <!-- 显示文件夹列表 -->

                    <div
                        class="row row-cols-3 row-cols-sm-4 row-cols-lg-6 row-cols-xl-8 list-unstyled list folder-list">
                        <?php  foreach ($template_data['folder'] as &$item){  ?>
                        <li class="col mb-4" data-tags="alarm clock" data-categories="devices">
                            <a class="d-block text-dark text-decoration-none" href="?a=file&c=index&parent_id=<?php echo $item['folder_id']; ?>">
                                <div class="p-3 py-4 mb-2 bg-light text-center rounded">
                                    <i class="bi bi-folder"></i>
                                    <div class="name text-muted text-decoration-none text-center pt-1">
                                        <?php echo $item['folder_name']; ?>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <?php }  ?>
                    </div>
                    <!-- 显示文件列表 -->

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">文件名</th>
                                <th scope="col">文件大小</th>
                                <th scope="col">上传日期</th>
                                <th scope="col">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  foreach ($template_data['file'] as &$item){  ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $item['file_id']; ?>
                                </th>
                                <td><a href="/s/<?php echo $item['alias']; ?>">
                                        <?php echo $item['name']; ?>
                                    </a> </td>
                                <td>
                                    <?php echo zpl_size($item['size']); ?>
                                </td>
                                <td>
                                    <?php echo zpl_time($item['create_time']); ?>
                                </td>
                                <td>
                                    <a href="#">删除</a>
                                    <a href="#">关闭</a>
                                </td>
                            </tr>

                            <?php }  ?>

                        </tbody>
                    </table>

                    <?php } ?>


                </div>

            </div>
        </div>
    </div>

</div>
<!-- 页面主要内容 end -->
<?php include(TEMPLATE . "/footer.php") ?>