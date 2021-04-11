<?php include(TEMPLATE . "/header.php") ?>
<script src="https://cdn.jsdelivr.net/npm/dropzone@5.9.2/dist/dropzone.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/dropzone@5.9.2/dist/dropzone.min.css" rel="stylesheet">
<style>
    .container {
        margin-top: 20px;
    }

    .dropzone {
        min-height: 350px;
        border: 2px dashed #5A8DEE;
        background: #F2F4F4;
        margin: 30px 0;
    }

    .dropzone .dz-message {
        font-size: 1.5rem;
        position: absolute;
        top: 50%;
        left: 0;
        width: 100%;
        height: 300px;
        margin-top: -30px;
        color: #5A8DEE;
        text-align: center;
    }

    .dropzone .dz-message .dz-button {
        font-size: 3rem;
    }

    .dropzone .dz-preview .dz-progress {
        top: 78%;
    }

    .dropzone .dz-preview.dz-file-preview .dz-image {
        height: 158px;
        border-radius: 5px;
    }

    .dropzone .dz-preview .dz-details {
        padding: 1em 1em;
    }

    .dropzone .dz-preview .dz-details .dz-filename {
        font-size: 1rem;
        white-space: initial;
    }

    .dropzone .dz-preview.dz-file-preview .dz-image {
        background: linear-gradient(to bottom, #bbb9b9, #5a5a59);
    }

    .dropzone .dz-preview .dz-details .dz-filename span,
    .dropzone .dz-preview .dz-details .dz-size span {
        background-color: rgb(255 255 255 / 0%);
    }

    .dropzone .dz-preview .dz-details .dz-size {
        margin-bottom: 0.5em;
    }
</style>
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
                        <a href="?a=file&c=add_folder<?php if(isset($_GET['parent_id'])) echo '&parent_id='.$_GET['parent_id']; ?>"
                            class="btn btn-secondary">新建文件夹</a>

                        <a href="?a=file&c=add_folder" class="btn btn-secondary">离线下载</a>
                        <a href="?a=file&c=upload<?php if(isset($_GET['parent_id'])) echo '&parent_id='.$_GET['parent_id']; ?>"
                            class="btn btn-secondary">上传文件到此目录</a>
                    </div>
                    <br />
                    <br />

                    <?php if ($_GET['c'] == 'add_folder') { ?>
                    <form method="POST">
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
                    <?php  } elseif ($_GET['c'] == 'upload') { ?>





                    <form action="?a=upload&c=folder<?php if(isset($_GET['parent_id'])) echo '&parent_id='.$_GET['parent_id']; ?>" class="dropzone"
                        id="dpz-file-limits">
                        <div class="dz-message needsclick">
                            <button type="button" class="dz-button">点击这里选择文件 或 将文件拖入此处</button><br />
                            <span class="note needsclick">文件大小不能超过100mb</span>
                        </div>
                    </form>

                    <div class="hidden" id="box-upload">
                        <button id="start-uploading" class="btn btn-primary mb-2 ">开始上传</button>
                    </div>


                    <script type="text/javascript">
                        Dropzone.options.dpzFileLimits = {
                            paramName: "file", // The name that will be used to transfer the file
                            maxFilesize: 500, // MB
                            maxFiles: 20,
                            parallelUploads: 20,
                            maxThumbnailFilesize: 1, // MB
                            addRemoveLinks: true,
                            autoProcessQueue: false,
                            dictRemoveFile: "删除",
                            dictFileTooBig: "文件超过100M,不允许上传",
                            init: function () {
                                var submitButton = document.querySelector("#start-uploading")
                                myDropzone = this; // closure

                                submitButton.addEventListener("click", function () {
                                    myDropzone.processQueue(); // Tell Dropzone to process all queued files.
                                });
                                this.on("addedfile", function (file) {
                                    $('#box-upload').removeClass('hidden');
                                });

                                this.on("success", function (file) {
                                    console.log("File " + file.name + " 上传成功");
                                });
                                this.on("removedfile", function (file) {
                                    console.log("File " + file.name + "removed");
                                });

                                this.on("maxfilesexceeded", function (file) {
                                    this.removeFile(file);
                                });
                            },
                        }


                    </script>




                    <?php  } else { ?>



                
                    <style>
                        .file-list .filename{
                            font-size: 16px;
                            color: #5a5a59;
                            padding: .375rem .75rem;
                        }
                        .file-list .filename a{
                            color: #000;
                        }
                        .file-list .filename .bi{
                            font-size: 28px;
                            margin-right: 8px;
                            color: #ffd65a;
                        }
                        .file-list .filename span{
                            line-height: 26px;
                            vertical-align: text-bottom;
                        }
                    </style>

                    <table class="table table-striped file-list">
                        <thead>
                            <tr>
                                <th scope="col">文件名</th>
                                <th scope="col" style="width: 110px;">文件大小</th>
                                <th scope="col" style="width: 110px;">上传日期</th>
                                <th scope="col" style="width: 180px;">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($template_data['folder'] as &$item){  ?>
                                <tr>
                                    <td class="filename">
                                        <a href="?a=file&c=index&parent_id=<?php echo $item['folder_id']; ?>">
                                            <i class="bi bi-folder-fill"></i><span><?php echo $item['folder_name']; ?></span>
                                        </a>
                                    </td>
                                    <td>
                                        --
                                    </td>
                                    <td>
                                        <?php echo zpl_time($item['create_time']); ?>
                                    </td>
                                    <td>
                                       
                                        <div class="dropdown">
                                            <?php if($item['is_public']) { ?>
                                            <button type="button" class="btn btn-warning btn-sm" onclick='copyText("<?php echo url('folder_share',$item['alias']);?>")'>复制链接</button>
                                            <?php } ?>
                                            <button class="btn btn-secondary dropdown-toggle btn-sm" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                操作
                                            </button>
                                            <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">删除</a>
                                                <a class="dropdown-item" href="#">重命名</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php }  ?>
                            <?php  foreach ($template_data['file'] as &$item){  ?>
                            <tr>
                                <td class="filename">
                                    <a href="<?php echo url('file_share',$item['alias']);?>">
                                        <i class="bi bi-file-earmark-fill" style="color: #bbbbbb;"></i><span><?php echo $item['name']; ?></span>
                                    </a>
                                </td>
                                <td>
                                    <?php echo zpl_size($item['size']); ?>
                                </td>
                                <td>
                                    <?php echo zpl_time($item['create_time']); ?>
                                </td>
                                <td>
                                   
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-warning btn-sm" onclick='copyText("<?php echo url('file_share',$item['alias']);?>")'>复制链接</button>
                                        <button class="btn btn-secondary dropdown-toggle btn-sm" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            操作
                                        </button>
                                        <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="?a=file&c=delete&file_id=<?php echo $item['file_id']; ?>">删除</a>
                                            <a class="dropdown-item" href="#">重命名</a>
                                        </div>
                                    </div>
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