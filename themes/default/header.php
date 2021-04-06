<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <title>文件上传 - SSS.MS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.cookie@1.4.1/jquery.cookie.min.js"></script>
    <style>
    #send-box {
        min-height: 12rem;
        border: 1px solid #dee2e6;
        padding: 2rem
    }
    .text p {
        text-indent: 2em;
    }

    .htmlpage h1 {
        text-align: center;
        margin: 40px 0;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">SSS.MS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/html/sniff">设备绑定
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/html/lan">帮助中心</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        关于我们
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/html/help">使用帮助</a>
                        <a class="dropdown-item" href="/html/about">关于我们</a>
                        <a class="dropdown-item" href="/html/job">加入我们</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/html/privacy">隐私协议</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php if(isset($_SESSION['is_login']) && $_SESSION['is_login']){ ?>
                <img style="width: 40px; border-radius: 50%;"
                    src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgaGVpZ2h0PSIxMDAiIHdpZHRoPSIxMDAiPjxyZWN0IGZpbGw9InJnYigxNjcsMjI5LDE2MCkiIHg9IjAiIHk9IjAiIHdpZHRoPSIxMDAiIGhlaWdodD0iMTAwIj48L3JlY3Q+PHRleHQgeD0iNTAiIHk9IjUwIiBmb250LXNpemU9IjUwIiB0ZXh0LWNvcHk9ImZhc3QiIGZpbGw9IiNmZmZmZmYiIHRleHQtYW5jaG9yPSJtaWRkbGUiIHRleHQtcmlnaHRzPSJhZG1pbiIgYWxpZ25tZW50LWJhc2VsaW5lPSJjZW50cmFsIj5BPC90ZXh0Pjwvc3ZnPg=="
                    alt="<?php echo $_SESSION['user']['username'] ?>">
                <li class="nav-item">
                    <a class="nav-link" href="?a=user&c=index"><?php echo $_SESSION['user']['username'] ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?a=user&c=logout">注销</a>
                </li>
                <?php }else{ ?>
                <li class="nav-item">
                    <a class="nav-link" href="?a=login">登录</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="?a=register">注册</a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </nav>