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
                                <!-- <p>سطح فوریت</p>
                                <div id="usual" onclick="usual()" class="inputGroupRadio">
                                    <input id="radio_usual" name="usual" type="radio" />
                                    <label for="radio_usual">عادی</label>
                                </div>
                                <div id="force" onclick="force()" class="inputGroupRadio" style="margin-right: 2%;">
                                    <input id="radio_force" name="force" type="radio" />
                                    <label for="radio_force">فوری</label>
                                </div>
                                <div id="vforce" onclick="vforce()" class="inputGroupRadio" style="margin-right: 2%;">
                                    <input id="radio_vforce" name="vforce" type="radio" />
                                    <label for="radio_vforce">فوق العاده</label>
                                </div> -->

                                <p class="title">وضعیت</p>
                                <select class="combo_box" name="status" id="status">
                                    <option value="design">در حال طراحی</option>
                                    <option value="videoedit">ادیت ویدئو</option>
                                    <option value="accept">تایید تسک و پایان</option>
                                    <option value="edit">ویرایش</option>
                                    <option value="error">وجود خطا، نیاز به هماهنگی باهم</option>
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