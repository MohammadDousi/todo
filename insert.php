<?php require_once "assets/php/init.php";
if (!isset($_SESSION['UserOk'])) {
    header('location:login.php');
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/task.css">
    <title>ویرایش اطلاعات</title>
</head>

<body>

    <?php
    require_once "header.php";?>

    <?php
    if (isset($_POST['AddTask'])) {
        if (AddTask()) { ?>
            <script>
                location.assign("index.php");
            </script>
    <?php }
    } ?>

    <div class="content">

        <div class="info">

            <form action="" method="POST" enctype='multipart/form-data'>

                <div class="info_left">

                    <div style="width: 100%;">
                        <div style="float: right;">
                            <p class="title_title">ایجاد تسک جدید</p>
                            <div class="lines">
                                <div class="line1"></div>
                                <div class="line1 line2"></div>
                            </div>
                        </div>
                    </div>

                    <div class="info_row">
                        <div>
                            <p class="title">موضوع</p>
                            <div class="input_text">
                                <input name="TextTask" type="text" class="input_text_input" placeholder="..." maxlength="65" autocomplete="off" />
                                <img src="assets/image/icon/ic_star.svg" alt="#">
                            </div>
                        </div>
                        <div>
                            <p class="title">سطح فوریت</p>
                            <div class="input_text">
                                <select class="combo_box" name="Level">
                                    <option value="1">عادی</option>
                                    <option value="2">فوری</option>
                                    <option value="3">ویژه</option>
                                </select>
                                <img src="assets/image/icon/ic_star.svg" alt="#">
                            </div>

                        </div>

                    </div>

                    <div class="info_row">

                        <div>
                            <p class="title">توضیحات</p>
                            <div class="input_text">
                                <textarea name="Description" type="text" class="input_text_input" style="min-height: 10rem;" placeholder="..." autocomplete="off"></textarea>
                                <img src="assets/image/icon/ic_star.svg" alt="#">
                            </div>
                        </div>



                        <div>
                            <p class="title">تگ افراد مرتبط</p>
                            <div class="input_text">
                                <input name="SearchAddTag" id="SearchTagName" type="search" class="input_text_input" placeholder="..." />
                                <img src="assets/image/icon/ic_at_sign.svg" alt="#" id="current-pass-eye" onclick="CurrentPass()">
                            </div>

                            <div class="box_item">
                                <?php $item = SelectTag();
                                if ($item) {
                                    foreach ($item as $ValueSearchTag) { ?>
                                        <div class="item_search_box" id="<?= $ValueSearchTag->TagName; ?>" onclick="GetTagName(this.id)">
                                            <?= $ValueSearchTag->TagName ?>
                                        </div>
                                <?php }
                                }
                                ?>
                            </div>
                        </div>

                    </div>

                    <div class="info_row row_btn">

                        <input type="submit" name="AddTask" class="input_btn" value="ثبت تسک" />
                        <input class="input_btn_strok_cancel" type="button" onclick="GoToIndex()" value="بازگشت" />

                    </div>

                </div>

            </form>

        </div>

    </div>
</body>

<script src="assets/js/script.js"></script>

</html>