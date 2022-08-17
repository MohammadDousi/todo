<?php require_once "assets/php/init.php";
if (!isset($_SESSION['UserOk'])) {
    header('location:login.php');
} ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/insert.css">
    <title>ویرایش</title>
</head>

<body>
    <?php require_once "header.php"; ?>

    <?php
    if (isset($_POST['EditTask'])) {
        if (EditTask()) { ?>
            <script>
                location.assign("index.php");
            </script>
        <?php }
    }

    if (isset($_POST['DelTask'])) {
        if (DelTask()) { ?>
            <script>
                location.assign("index.php");
            </script>

    <?php }
    } ?>

    <div class="content">

        <div class="info">

            <div style="width: 100%;">
                <div style="float: right;">
                    <p class="title_title"> ویرایش تسک </p>
                    <div class="lines">
                        <div class="line1"></div>
                        <div class="line1 line2"></div>
                    </div>
                </div>
            </div>

            <?php if (isset($_GET['Id'])) {
                $item = GetItemSingle($_GET['Id']);
                if ($item) {
                    foreach ($item as $value) { ?>
                        <form method="POST" action="">

                            <p class="title">موضوع</p>
                            <div class="input_text">
                                <input name="TextTask" value="<?= $value->Text ?>" type="text" placeholder="..." maxlength="65" autocomplete="off" required />
                                <img src="assets/image/icon/ic_lock.svg" alt="#">
                            </div>

                            <p class="title">توضیحات</p>
                            <div class="input_text">
                                <input name="Description" value="<?= $value->Description ?>" type="text" placeholder="..." maxlength="65" autocomplete="off" required />
                                <img src="assets/image/icon/ic_lock.svg" alt="#">
                            </div>


                            <p class="title">وضعیت</p>
                            <select class="combo_box" name="status" id="status">
                                <?php
                                $item = PerUser();
                                if ($item) {
                                    foreach ($item as $value) { ?>
                                        <?php if ($value->Design) { ?><option value="4">در حال طراحی</option><?php } ?>
                                        <?php if ($value->VideoEdit) { ?><option value="5">در حال تدوین</option><?php } ?>
                                        <?php if ($value->ADesign) { ?><option value="6">اتمام طراحی</option><?php } ?>
                                        <?php if ($value->AVideo) { ?><option value="7">اتمام تدوین</option><?php } ?>
                                        <?php if ($value->End) { ?><option value="8">تمام شده</option><?php } ?>
                                        <?php if ($value->Edit) { ?><option value="9">ویرایش</option><?php } ?>
                                        <?php if ($value->Error) { ?><option value="10">خطا ، نیاز به طراحی و یا تدوین مجدد</option><?php } ?>

                                <?php }
                                } ?>
                            </select>

                <?php }
                }
            } ?>

                <?php if (isset($_GET['Id'])) {
                    $item = GetItemSingle($_GET['Id']);
                    if ($item) {
                        foreach ($item as $value) { ?>


                            <p class="title">>تگ افراد مرتبط</p>
                            <div class="input_text">
                                <input name="SearchAddTag" id="SearchTagName" value="<?= $value->Tag ?>" type="text" placeholder="..." autocomplete="off" />
                                <img src="assets/image/icon/ic_lock.svg" alt="#">
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

                            <div class="info-row row-btn">

                                <input type="submit" name="EditTask" class="input_btn" value="بروزرسانی اطلاعات" />
                                <input type="submit" name="DelTask" class="input_btn" value="حذف" />
                                <input class="input_btn_strok_cancel" type="button" onclick="GoToIndex()" value="بازگشت" />

                            </div>

                        </form>

            <?php }
                    }
                } ?>

        </div>

    </div>
    <div class="clear"></div>
</body>

<script src="assets/js/script.js"></script>


</html>