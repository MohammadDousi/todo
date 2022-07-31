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
        <div class="content_new_task">
            <div class="box">
                <?php if (isset($_GET['Id'])) {
                    $item = GetItemSingle($_GET['Id']);
                    if ($item) {
                        foreach ($item as $value) { ?>
                            <form method="POST" action="">
                                <p class="title">موضوع</p>
                                <input name="TextTask" value="<?= $value->Text ?>" class="input_text" type="text" placeholder="..." maxlength="65" autocomplete="off" />

                                <p class="title">توضیحات</p>
                                <textarea name="Description" class="input_text input_textarea" type="text" placeholder="..." autocomplete="off"><?= $value->Description ?></textarea>

                                <p class="title">وضعیت</p>
                                <select class="combo_box" name="status" id="status">
                                    <?php
                                    $item = PerUser();
                                    if ($item) {
                                        foreach ($item as $value) { ?>
                                            <?php if ($value->New) { ?><option value="new">جدید</option><?php } ?>
                                            <?php if ($value->Design) { ?><option value="design">در حال طراحی</option><?php } ?>
                                            <?php if ($value->VideoEdit) { ?><option value="videoedit">در حال تدوین</option><?php } ?>
                                            <?php if ($value->ADesign) { ?><option value="adesign">اتمام طراحی</option><?php } ?>
                                            <?php if ($value->AVideo) { ?><option value="avideo">اتمام تدوین</option><?php } ?>
                                            <?php if ($value->Edit) { ?><option value="edit">ویرایش</option><?php } ?>
                                            <?php if ($value->Error) { ?><option value="error">خطا ، نیاز به طراحی و یا تدوین مجدد</option><?php } ?>
                                            <?php if ($value->End) { ?><option value="end">تمام شده</option><?php } ?>
                                    <?php }
                                    } ?>
                                </select>
                    <?php }
                    }
                } ?>
            </div>

            <div class="box">
                <?php if (isset($_GET['Id'])) {
                    $item = GetItemSingle($_GET['Id']);
                    if ($item) {
                        foreach ($item as $value) { ?>

                            <p class="title">تگ افراد مرتبط</p>
                            <input name="SearchAddTag" id="SearchTagName" value="<?= $value->Tag ?>" class="input_text" style="margin-bottom: 2%;" type="search" placeholder="..." />

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

                            <input class="input_button active" type="submit" name="EditTask" value="ویرایش" />
                            <input class="input_button delete" type="submit" name="DelTask" value="حذف" />
                            <input class="input_button back" type="button" onclick="GoToIndex()" name="back" value="بازگشت" />

                            </form>

                <?php }
                    }
                } ?>
            </div>

        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</body>

<script src="assets/js/script.js"></script>


</html>