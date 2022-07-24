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

<script>
    function GetTagName(tag) {
        temp = document.getElementById("SearchTagName").value;
        document.getElementById("SearchTagName").value = temp + tag;
    }

    function GoToIndex() {
        location.assign("index.php");
    }

    function usual() {
        document.getElementById("radio_usual").checked = true;
        var hid = document.getElementById("usual");
        hid.style.backgroundColor = "#cfd8dc";
        hid.style.boxShadow = "0 0 15px rgba(29, 107, 242, 16%)";
        hid.style.fontWeight = "bold";

        document.getElementById("radio_force").checked = false;
        var hid = document.getElementById("force");
        hid.style.backgroundColor = "transparent";
        hid.style.boxShadow = "0 0 0 transparent";
        hid.style.fontWeight = "normal";


        document.getElementById("radio_vforce").checked = false;
        var hid = document.getElementById("vforce");
        hid.style.backgroundColor = "transparent";
        hid.style.boxShadow = "0 0 0 transparent";
        hid.style.fontWeight = "normal";

    }

    function force() {

        document.getElementById("radio_force").checked = true;
        var hid = document.getElementById("force");
        hid.style.backgroundColor = "#cfd8dc";
        hid.style.boxShadow = "0 0 15px rgba(29, 107, 242, 16%)";
        hid.style.fontWeight = "bold";

        document.getElementById("radio_usual").checked = false;
        var hid = document.getElementById("usual");
        hid.style.backgroundColor = "transparent";
        hid.style.boxShadow = "0 0 0 transparent";
        hid.style.fontWeight = "normal";

        document.getElementById("radio_vforce").checked = false;
        var hid = document.getElementById("vforce");
        hid.style.backgroundColor = "transparent";
        hid.style.boxShadow = "0 0 0 transparent";
        hid.style.fontWeight = "normal";

    }

    function vforce() {

        document.getElementById("radio_vforce").checked = true;
        var hid = document.getElementById("vforce");
        hid.style.backgroundColor = "#cfd8dc";
        hid.style.boxShadow = "0 0 15px rgba(29, 107, 242, 16%)";
        hid.style.fontWeight = "bold";

        document.getElementById("radio_force").checked = false;
        var hid = document.getElementById("force");
        hid.style.backgroundColor = "transparent";
        hid.style.boxShadow = "0 0 0 transparent";
        hid.style.fontWeight = "normal";

        document.getElementById("radio_usual").checked = false;
        var hid = document.getElementById("usual");
        hid.style.backgroundColor = "transparent";
        hid.style.boxShadow = "0 0 0 transparent";
        hid.style.fontWeight = "normal";

    }

    function EnableRadio(level) {

        switch (level) {
            case 0:
                document.getElementById("radio_usual") = checked;
                break;
            case 1:
                document.getElementById("radio_force") = checked;
                break;
            case 2:
                document.getElementById("radio_vforce") = checked;
                break;
            default:
                break;
        }
    }
</script>


</html>