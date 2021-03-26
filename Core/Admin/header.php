<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <title>管理后台</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            padding: 0;
            margin: 0;
        }

        .nav {
            height: 60px;
            background-color: #1e86d0;
            color: #fff;
            display: flex;
            line-height: 60px;
            justify-content: space-between;
        }

        .nav .l-nav {
            display: flex;
        }

        .nav .logo {
            margin: 0 20px;
        }

        .nav li,
        .nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .nav .l-nav li {
            float: left;
            margin-right: 20px;
        }

        .nav .r-nav {
            float: right;
            margin-right: 20px;
        }

        .nav a {
            color: #ffffff;
            text-decoration: none;
        }

        .container {
            display: flex;
            padding: 30px 40px;
            flex-direction: column;
        }

        .survey-info {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }

        .survey-info .item {
            display: inline-block;
            width: calc((100% - 90px) / 4);
            margin-right: 30px;
            margin-bottom: 30px;
            background-color: #e6e6e6;
            padding: 20px;
            box-sizing: border-box;
            position: relative;
            border-radius: 10px;
        }

        .survey-info .item .num {
            margin: 10px 0;
            font-size: 36px;
            font-weight: 400;
            margin-top: 48px;
            color: #FF6A00 !important;
        }

        .statistics-wrap {
            display: flex;
        }

        .statistics-wrap .item {
            display: inline-block;
            width: calc((100% - 90px) / 4);
            margin-right: 30px;
            margin-bottom: 30px;
            display: flex;
        }

        .statistics-wrap .item .flex-box {
            flex: 1;
            background: #f5f5f5;
            height: 120px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            cursor: pointer;
        }

        .statistics-wrap .item .flex-box:first-child {
            margin-right: 30px;
        }

        .common-functions {
            width: 100%;
        }

        .common-functions-item {
            display: inline-block;
            width: 215px;
            background-color: #F7F9FA;
            text-align: center;
            margin-right: 10px;
            margin-bottom: 15px;
            padding: 24px 20px;
            box-sizing: border-box;
        }

        .common-functions-box .ns-item-pic {
            display: inline-block;
            width: 40px;
            height: 40px;
            text-align: center;
            line-height: 40px;
        }

        .common-functions-box .ns-item-pic img {
            max-width: 100%;
            max-height: 100%;
        }

        .common-functions-box .ns-item-content-title {
            font-size: 14px;
            line-height: 14px;
            margin-top: 17px;
        }

        .common-functions-box .ns-item-content-desc {
            font-size: 12px;
            color: #666666;
            line-height: 12px;
            margin-top: 9px;
            width: 100%;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
    </style>
</head>

<body>
    <div class="nav">
        <div class="l-nav">
            <div class="logo">
                <h1>管理后台</h1>
            </div>
            <ul>
                <li><a href="?do=base">数据总览</a></li>
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