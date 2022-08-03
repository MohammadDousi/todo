<?php require_once "assets/php/init.php"; ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/insert.css">
    <title>ثبت کاربر جدید</title>
</head>

<body>

    <?php
    if (isset($_POST['insert'])) {
        NewUser();
    } ?>

    <div class="content">
        <div class="content_new_task">
            <div class="box">

                <form action="" method="POST" enctype='multipart/form-data'>

                    <!-- <img id="img" src="" class="img_profile">
                    <div class="input_file" onclick="onchangeImg()">
                        <input id="imgInp" name="Image" type="file" class="inputfile" accept="image/*" />
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                            <path fill="#252525" d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                        </svg>
                        <label for="imgInp">انتخاب تصویر</label>
                    </div> -->

                    <p class="title">نام</p>
                    <input name="name" class="input_text" type="text" placeholder="..." maxlength="65" autocomplete="off" />

                    <p class="title">موبایل</p>
                    <input name="mobile" class="input_text" type="text" placeholder="..." maxlength="65" autocomplete="off" />

                    <p class="title">رمز عبور</p>
                    <input name="pass" class="input_text" type="text" placeholder="..." maxlength="11" autocomplete="off" />

                    <p class="title">تگ نیم</p>
                    <input name="tagname" class="input_text" type="text" placeholder="..." maxlength="65" autocomplete="off" />
            </div>
            <div class="box">

                <p class="title">دسترسی ها<p>
                <div class="inputGroupRadio">
                    <input name="design" type="checkbox" />
                    <label>طراحی</label>
                </div>
                <div class="inputGroupRadio" style="margin-right: 2%;">
                    <input name="adesign" type="checkbox" />
                    <label>اتمام طراحی</label>
                </div>
                <div class="inputGroupRadio" style="margin-right: 2%;">
                    <input name="videoedit" type="checkbox" />
                    <label>ادیت ویدئو</label>
                </div>
                <div class="inputGroupRadio" style="margin-right: 2%;">
                    <input name="avideoedit" type="checkbox" />
                    <label>اتمام ویدئو</label>
                </div>
                <div class="inputGroupRadio">
                    <input name="end" type="checkbox" />
                    <label>پایان تسک</label>
                </div>
                <div class="inputGroupRadio" style="margin-right: 2%;">
                    <input name="edit" type="checkbox" />
                    <label>ویرایش کردن</label>
                </div>
                <div class="inputGroupRadio" style="margin-right: 2%;">
                    <input name="error" type="checkbox" />
                    <label>گزارش خطا</label>
                </div>

                <input class="input_button active" type="submit" name="insert" value="ثبت" />
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