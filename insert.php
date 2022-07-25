<?php require_once "assets/php/init.php" ;
if (!isset($_SESSION['UserOk'])) {
    header('location:login.php');
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/insert.css">
    <title>تسک جدید</title>
</head>

<body>

    <?php
    if (isset($_POST['AddTask'])) {
        if (AddTask()) { ?>
            <script>
                location.assign("index.php");
            </script>
    <?php }
    } ?>

    <div class="content">
        <div class="content_new_task">
            <div class="box">

                <form method="POST" action="">
                    <p class="title">موضوع</p>
                    <input name="TextTask" class="input_text" type="text" placeholder="..." maxlength="65" autocomplete="off" />

                    <p class="title">توضیحات</p>
                    <textarea name="Description" class="input_text input_textarea" type="text" placeholder="..." autocomplete="off"></textarea>

                    <p class="title">سطح فوریت</p>
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
                    </div>
            </div>

            <div class="box">
                <p class="title">تگ افراد مرتبط</p>
                <input name="SearchAddTag" id="SearchTagName" class="input_text" style="margin-bottom: 2%;" type="search" placeholder="..." />

                <div class="box_item">
                    <?php $item = SelectTag();
                        if ($item) {
                            foreach ($item as $ValueSearchTag) { ?>
                                <div class="item_search_box" id="<?= $ValueSearchTag->TagName; ?>" onclick="GetTagName(this.id)">
                                    <?= $ValueSearchTag->TagName ?>
                                    <!-- <span class="close">&times;</span> -->
                                </div>
                    <?php }
                        }
                    ?>
                </div>

                <input class="input_button active" type="submit" name="AddTask" value="ثبت" />
                <input class="input_button back" type="button" onclick="GoToIndex()" name="back" value="بازگشت" />

                </form>
            </div>

        </div>
        <div class="clear"></div>
    </div>

    <div class="clear"></div>

</body>



<script>
    function GetTagName(tag) {

        temp = document.getElementById("SearchTagName").value;
        result = temp.replace(tag, "");
        document.getElementById("SearchTagName").value = result +""+ tag;
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
</script>


</html>