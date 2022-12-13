<?php
// get root dirs
function get_root_dirs()
{
    $root_dirs = glob(ROOT . '/*', GLOB_ONLYDIR | GLOB_NOSORT);

    if (empty($root_dirs)) return array();
    return array_filter($root_dirs, function ($dir) {
        return !is_exclude($dir, true, is_link($dir));
    });
}

// is exclude
function is_exclude($path = false, $is_dir = true, $symlinked = false)
{
    global $CONFIG;
    // early exit
    if (!$path || $path === ROOT) return;

    // exclude all root-relative paths that start with /_files* (reserved for any files and folders to be ignored and hidden from Files app)
    if (strpos('/' . root_relative($path), '/_files') !== false) return true;

    // exclude files PHP application
    if ($path === __FILE__) return true;

    // symlinks not allowed
    if ($symlinked && !$CONFIG['allow_symlinks']) return true;

    // exclude storage path
    if ($CONFIG['storage_path'] && is_within_path($path, $CONFIG['storage_path'])) return true;

    // dirs_exclude: check root relative dir path
    if ($CONFIG['dirs_exclude']) {
        $dirname = $is_dir ? $path : dirname($path);
        if ($dirname !== ROOT && preg_match($CONFIG['dirs_exclude'], substr($dirname, strlen(ROOT)))) return true;
    }

    // files_exclude: check vs basename
    if (!$is_dir) {
        $basename = basename($path);
        if ($CONFIG['files_exclude'] && preg_match($CONFIG['files_exclude'], $basename)) return true;
    }
}
function root_relative($dir)
{
    return ltrim(substr($dir, strlen(ROOT)), '\/');
}
function is_within_path($path, $root)
{
    return strpos($path . '/', $root . '/') === 0;
}


function get_url_path($dir)
{
    global $CONFIG;
    if (!is_within_docroot($dir)) return false;

    // if in __dir__ path, __dir__ relative
    if (is_within_path($dir, ROOT)) return $dir === ROOT ? '.' : substr($dir, strlen(ROOT) + 1);

    // doc root, doc root relative
    return $dir === $CONFIG['doc_root'] ? '/' : substr($dir, strlen($CONFIG['doc_root']));
}

function is_within_docroot($path)
{
    global $CONFIG;
    return is_within_path($path, $CONFIG['doc_root']);
}

function real_path($path)
{
    $real_path = realpath($path);
    return $real_path ? str_replace('\\', '/', $real_path) : false;
}

// 获取当前文件的上级目录
define("ROOT", dirname(__FILE__));
$exclude = [
    '.',
    '..',
    '_files',
    '_temps',
];
// 扫描$con目录下的所有文件

$CONFIG = [

    'doc_root' => real_path($_SERVER['DOCUMENT_ROOT']),
    // cache
    'cache' => true,
    'cache_key' => 0,
    'storage_path' => '_files',

    // exclude files directories regex
    'files_exclude' => '',
    'dirs_exclude' => '',
    'allow_symlinks' => true,
];
// $filename = scandir(ROOT);

$root_dirs = get_root_dirs();

if(isset($_GET['dir']) && $_GET['dir']){

    $current_dirs = str_replace(['.','../'],"",$_GET['dir']);

    $file_list= scandir(ROOT.'/'.$current_dirs);

}else{
    $current_dirs = "";
}


?>



<!doctype html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta name="theme-color" content="#5d6146" />
    <meta name="renderer" content="webkit">
    <title>传硕公版书_传递文明的硕果_免费、合法、无需注册！</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="keywords" content="免费电子书,传硕,公版书,公版書,公共版权,公版书籍网站,无版权书籍,公版书籍查询,七秒古诗词,七秒读书,七秒电子书,电子书下载,二十四史下载">
    <meta name="description" content="本站共计收录了85万+篇的古诗词、近千篇文言文和一万多本中文公版电子书！且这些书籍都属于公共版权，您可以随意阅读、下载、分享、转发且不用担心任何版权问题！免费、合法、无需注册！">
    <link rel="shortcut icon" href="https://www.7sbook.com/assets/img/favicon.ico" />
    <link href="https://www.7sbook.com/assets/css/zpl.css?v=1.5.4" rel="stylesheet">

    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?e4724966c10d71a2984d44a77eaf69ba";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6790232035711874" crossorigin="anonymous"></script>
</head>


<body class="bg-beige">
    <header class="zpl-header py-3 py bg-olive">
        <div class="container">
            <div class="row flex-nowrap justify-content-between align-items-center zpl-header-main">
                <div class="col pt-1">
                    <a class="link-light" target="_blank" href="https://www.7sbook.com/donation">捐赠支持</a>
                </div>
                <div class="col-auto text-center">
                    <a class="zpl-header-logo text-white" href="/" title="传硕公版书-传递文明的硕果">传硕公版书</a>
                </div>
                <div class="col d-flex justify-content-end align-items-center">
                    <a class="btn btn-outline-light btn-sm" href="https://www.7sbook.com/search"><i class="bi bi-search"></i>&nbsp;搜索</a>
                </div>
            </div>
        </div>
    </header>
    <div class="nav-scroller bg-burlywood">
        <div class="container">
            <nav class="nav top-nav d-flex justify-content-between">
                <a class="active" href="/">首页</a>
                <a class="" href="/ebook/index.html">书籍</a>
                <a href="https://www.7sbook.com/category/文章/">文章</a>
                <a class="" href="/poetry/index.html">诗词</a>
                <a class="" href="/author/index.html">作者</a>
                <a href="https://www.7sbook.com/category/名画/">名画</a>
            </nav>
        </div>
    </div>

    <div class="container-fluid container-lg mt-2">
        <!-- 全站导航栏广告 -->
        <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-6790232035711874" data-ad-slot="9324099010" data-ad-format="auto" data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>

    <style>
        .root_dir{
            font-size: 1.2rem;
            line-height: 3rem;
        }
    </style>
    <main class="container-fluid container-lg">
    
        <div class="row">
            <div class="col-3">
                <div class="my-3 p-3 bg-burlywood rounded shadow-sm">
                    <div class="d-flex justify-content-between border-bottom pb-2 mb-2">
                        <h3 class="h6">文件列表</h3>
                        <a href="/blogs/12.html">上传文件</a>
                    </div>
                    
                    <?php foreach ($root_dirs as $dir) {?>

                        <div class="root_dir">
                            <a href="?dir=<?=get_url_path($dir);?>">
                                <i class="bi bi-folder"></i>
                                <span><?=get_url_path($dir);?></span>
                            </a>
                        </div>
                    <?php } ?>

                </div>

                
            </div>
            <div class="col-9">
                <div class="my-3 p-3 bg-burlywood rounded shadow-sm">
                    <div class="d-flex justify-content-between border-bottom pb-2 mb-2">
                        <h3 class="h6">文件列表</h3>
                    
                    </div>

                    <style>
                        .grid-item { 
                            width: 32.5%;
                            margin-bottom: 10px;
                         }

                        .grid-item .folder{
                            height: 100px;
                            background-color: #fff;
                            border-radius: 6px;
                            padding: 20px;
                        }
                    </style>

                    <div class="grid">
                        <?php foreach ($file_list as $i=>$file) {  $ext = strrchr(strtolower($file), '.'); ?>
                        <div class="grid-item">
                            
                                <?php if(in_array($ext,['.jpg','.png','.jpeg'])){ ?>
                                    <a href="/<?=$current_dirs;?>/<?=$file;?>">
                                        <img src="<?=$current_dirs;?>/<?=$file;?>" style="width: 100%;"/>
                                    </a>
                                <?php }else{ ?>
                                    <a href="?dir=<?=$current_dirs;?>/<?=$file;?>">
                                        <div class="folder">
                                            <i class="bi bi-folder"></i>
                                            <span><?=$file;?></span>
                                        </div>
                                    </a>
                                   
                                <?php } ?>
                            
                        </div>

                        <?php } ?>

                    </div>
                </div>
            </div>

            
        </div>
    </main>
    <footer class="footer bg-burlywood">
        <div class="container">
            <ul class="bs-docs-footer-links">
                <li><a href="https://www.7sbook.com/chuanshuo-plan/">传硕计划</a></li>
                <li><a href="https://www.7sbook.com/privacy-policy/">隐私政策</a></li>
                <li><a href="https://www.7sbook.com/category/blog/">博客文章</a></li>
                <li><a href="https://www.7sbook.com/contact-us/">联系我们</a></li>
            </ul>
            <p class="copyright">Copyright&nbsp;©&nbsp;2021-2022 传硕公版书</p>

        </div>
    </footer>
    <script src="http://www.7sbook.com/assets/js/jquery-3.6.0.min.js"></script>
    <script src="http://www.7sbook.com/assets/js/bootstrap.min.js"></script>
    <script src="http://www.7sbook.com/assets/js/zpl.js?v=1.5.3"></script>
  
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <script src="https://unpkg.com/imagesloaded@5/imagesloaded.pkgd.min.js"></script>

    <script>
        var $grid = $('.grid').masonry({
            // options
            itemSelector: '.grid-item',
            percentPosition: true,
            gutter: 10,
            // columnWidth: 200,
        });
        // layout Masonry after each image loads
        $grid.imagesLoaded().progress( function() {
            $grid.masonry('layout');
        });
    </script>
</body>

</html>