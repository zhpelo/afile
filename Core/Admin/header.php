
<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta charset="utf-8" />
        <title>管理后台</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            *{
                padding: 0;
                margin: 0;
            }
            .nav{
                height: 60px;
                background-color: #1e86d0;
                color: #fff;
                display: flex;
                line-height: 60px;
                justify-content: space-between;
            }
            .nav .l-nav{
                display: flex;
            }
            .nav .logo{
                margin: 0 20px;
            }
            .nav  li, .nav  ul{
                list-style: none;
                padding: 0;
                margin: 0;
            }
            .nav .l-nav li{
                float: left;
                margin-right: 20px;
            }

            .nav .r-nav{
                float: right;
                margin-right: 20px;
            }
        </style>
	</head>

    <body>
        <div class="nav">
            <div class="l-nav">
            <div class="logo"><h1>管理后台</h1></div>
                <ul>
                    <li><a href="?do=user">用户管理</a></li>
                    <li><a href="?do=file">资源管理</a></li>
                    <li><a href="?do=system">系统设置</a></li>
                </ul>
            </div>
            <div class="r-nav">
                <ul>
                    <li><a href="?do=logout">注销</a></li>
                </ul>
            </div>
        </div>

