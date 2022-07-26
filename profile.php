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
    <title>پروفایل</title>
</head>

<body>

    <?php
    if (isset($_POST['AddTask'])) {} ?>

    <div class="content">
        <div class="content_new_task">
            <div class="box">

                <form method="POST" action="">
                    <p class="title">نام</p>
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

                <input class="input_button active" type="submit" name="edit" value="ویرایش" />
                <input class="input_button back" type="button" onclick="GoToIndex()" name="back" value="بازگشت" />

                </form>
            </div>
        </div>
        <div class="clear"></div>
    </div>

    <div class="clear"></div>

</body>
<script src="assets/js/script.js"></script>
</html>