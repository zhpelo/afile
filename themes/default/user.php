<?php get_header(); ?>
<style>
    .sidebar {
        overflow: hidden;
        padding: 0 2rem;
        position: absolute;
    }


    .sidebar-left-nav {
        /* margin-top: 3rem; */
    }

    .sidebar-left-nav ul,
    .sidebar-left-nav li {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .sidebar-left-nav li {
        height: 30px;
        display: flex;
        align-items: center;
    }

    .sidebar-left-nav li a {
        font-size: 14px;
        color: #333333;
    }


    .sidebar-left-title {
        color: #a5a5a4;
        margin-top: 20px;
    }
</style>
<!-- 页面主要内容 start -->
<div class="container-fluid">
    <div class="row flex-xl-nowrap">
        <div class="col-md-3 col-xl-2">
            <div class="sidebar">
                <div class="sidebar-left-nav">
                    <div class="sidebar-left-title">资料</div>
                    <ul>
                        <li>
                            <a href="?a=user&c=index">个人资料</a>
                        </li>

                        <li>
                            <a href="?a=user&c=setpass">密码管理</a>
                        </li>

                    </ul>

                    <div class="sidebar-left-title">资源</div>
                    <ul>
                        <li>
                            <a href="?a=user&c=file">文件管理</a>
                        </li>

                        <li>
                            <a href="?a=user&c=share">分享管理</a>
                        </li>

                        <li>
                            <a href="?a=user&c=trash">回收站</a>
                        </li>

                    </ul>

                </div>
            </div>
        </div>
        <div class="col-md-9 col-xl-8 py-md-3 pl-md-5">
            <div class="card">
                <div class="card-header"> 个人资料 </div>
                <div class="card-body">
                <form method="POST">

                    <?php  if($_GET['c'] == 'index'){ ?>
                        
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">用户名</label>
                            <div class="col-sm-5">
                                <input type="text" readonly class="form-control-plaintext"  value="<?php echo $_SESSION['user']['username']; ?>">
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
                                <input type="text" name="bio" class="form-control" id="inputBio" value="<?php echo $template_data['bio']; ?>" >
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


                        
                       
                    <?php  }elseif($_GET['c'] == 'setpass' ) { ?>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">原密码</label>
                            <div class="col-sm-5">
                                <input type="password" name="oldpassword" class="form-control" >   
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">新密码</label>
                            <div class="col-sm-5">
                                <input type="password" name="newpassword" class="form-control" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputBio" class="col-sm-2 col-form-label">确认新密码</label>
                            <div class="col-sm-5">
                                <input type="password" name="newpassword2" class="form-control" >
                            </div>
                        </div>
                    <?php } ?>

                    <button class="btn btn-warning" type="submit">保存修改</button>

                    </form>
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