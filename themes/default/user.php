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
                <div class="card-header"> 个人资料 </div>
                <div class="card-body">


                    <?php if ($_GET['c'] == 'index') { ?>
                        <form method="POST">
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">用户名</label>
                                <div class="col-sm-5">
                                    <input type="text" readonly class="form-control-plaintext" value="<?php echo $_SESSION['user']['username']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputNickname" class="col-sm-2 col-form-label">昵称</label>
                                <div class="col-sm-5">
                                    <input type="text" name="nickname" class="form-control" id="inputNickname" value="<?php echo $template_data['nickname']; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputBio" class="col-sm-2 col-form-label">个人简介</label>
                                <div class="col-sm-5">
                                    <input type="text" name="bio" class="form-control" id="inputBio" value="<?php echo $template_data['bio']; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">邮箱</label>
                                <div class="col-sm-5">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly>
                                        <div class="input-group-append">
                                            <button class="btn btn-warning col-sm-12">修改</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">手机号</label>
                                <div class="col-sm-5">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly>
                                        <div class="input-group-append">
                                            <button class="btn btn-warning col-sm-12">修改</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-warning" type="submit">保存修改</button>
                        </form>
                    <?php  } elseif ($_GET['c'] == 'setpass') { ?>
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
                    <?php  } elseif ($_GET['c'] == 'file') { ?>

                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-secondary">新建文件夹</button>
                            <button type="button" class="btn btn-secondary">离线下载</button>
                        </div>
                        <br /><br />

                        <!-- 显示文件夹列表 -->

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
                                <?php  foreach ($template_data as &$item){  ?>
                                <tr>
                                    <th scope="row"><?php echo $item['file_id']; ?></th>
                                    <td><a href="/s/<?php echo $item['alias']; ?>"><?php echo $item['name']; ?></a> </td>
                                    <td><?php echo zpl_size($item['size']); ?></td>
                                    <td><?php echo zpl_time($item['create_time']); ?></td>
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


<script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>