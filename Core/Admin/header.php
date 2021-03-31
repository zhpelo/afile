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

        body {
            background-color: #efefef;
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

        .nav .l-nav li,
        .nav .r-nav li {
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

        .block {
            background-color: #ffff;
            padding: 20px;
            border-radius: 5px;
        }

        .block-header {
            border-bottom: 1px solid #dedede;
            padding-bottom: 15px;
        }

        .block-body {
            margin-top: 20px;
        }

        .table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 20px;
            border-spacing: 0;
            border-collapse: collapse;
        }

        .table>tbody>tr>td,
        .table>tbody>tr>th,
        .table>tfoot>tr>td,
        .table>tfoot>tr>th,
        .table>thead>tr>td,
        .table>thead>tr>th {
            padding: 8px;
            line-height: 1.42857143;
            vertical-align: top;
            border-top: 1px solid #ddd;
        }

        th {
            text-align: left;
        }

        .data-list {
            border: 1px solid #ddd;
        }

        .data-list>tbody>tr>td,
        .data-list>tbody>tr>th,
        .data-list>tfoot>tr>td,
        .data-list>tfoot>tr>th,
        .data-list>thead>tr>td,
        .data-list>thead>tr>th {
            border: 1px solid #ddd;
        }

        .table-option {
            width: 100%;
            max-width: 100%;
            margin-bottom: 20px;
            border-spacing: 0;
            border-collapse: collapse;
        }

        .table-option th {
            vertical-align: top;
            text-align: left;
            padding: 20px 10px 20px 0;
            width: 150px;
            line-height: 1.3;
            font-weight: 600;
        }

        .table-option td {
            margin-bottom: 9px;
            padding: 15px 10px;
            line-height: 1.3;
            vertical-align: middle;
        }

        .regular-text {
            width: 25em;
        }

        .description {
            margin: 2px 0 5px;
            color: #646970;
        }

        input[type=date],
        input[type=datetime-local],
        input[type=datetime],
        input[type=email],
        input[type=month],
        input[type=number],
        input[type=password],
        input[type=search],
        input[type=tel],
        input[type=text],
        input[type=time],
        input[type=url],
        input[type=week] {
            padding: 0 8px;
            line-height: 2;
            min-height: 30px;
        }

        .button {
            border: none;
            display: inline-block;
            outline: 0;
            padding: 8px 18px;
            margin-top: 15px;
            margin-bottom: 10px;
            vertical-align: middle;
            overflow: hidden;
            text-decoration: none;
            color: #fff;
            background-color: #e9686b;
            text-align: center;
            transition: .2s ease-out;
            cursor: pointer;
            white-space: nowrap;
            box-shadow: 0px 2px 6px rgb(0 0 0 / 12%), 0px 1px 2px rgb(0 0 0 / 24%);
            font-family: '微软雅黑';
            border-radius: 2px;
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
                <li><a href="?do=333"><?php echo $_SESSION['admin']['username']; ?></a></li>
                <li><a href="?do=logout">注销</a></li>
            </ul>
        </div>
    </div>