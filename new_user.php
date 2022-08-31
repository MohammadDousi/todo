<?php require_once "assets/php/init.php"; ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/profile.css">
    <title>ثبت کاربر جدید</title>
</head>

<body>


    <?php
    require_once "header.php";
    if (isset($_POST['insert'])) {
        NewUser();
    } ?>

    <div class="content_profile">

        <div class="info">

            <div class="info-right">
                <img src="/assets/image/pic_user/" alt="">
            </div>

            <form action="" method="POST" enctype='multipart/form-data'>


                <div class="info-left">

                    <div style="width: 100%;">
                        <div style="float: right;">
                            <p class="title_title">ثبت کاربر جدید</p>
                            <div class="lines">
                                <div class="line1"></div>
                                <div class="line1 line2"></div>
                            </div>
                        </div>
                    </div>

                    <div class="info-row">
                        <div>
                            <p class="title">نام</p>
                            <div class="input_text">
                                <input name="name" class="input_text_input" type="text" placeholder="..." autocomplete="off" />
                                <img src="assets/image/icon/ic_user.svg" alt="#">
                            </div>
                        </div>
                        <div>
                            <p class="title">رمز عبور</p>
                            <div class="input_text">
                                <input name="pass" class="input_text_input" type="text" placeholder="..." autocomplete="off" />
                                <img src="assets/image/icon/ic_lock.svg" alt="#">
                            </div>
                        </div>
                        <div>
                            <p class="title">موبایل</p>
                            <div class="input_text">
                                <input name="mobile" class="input_text_input" type="text" placeholder="..." autocomplete="off" />
                                <img src="assets/image/icon/ic_mobile.svg" alt="#">
                            </div>
                        </div>
                    </div>

                    <div class="info-row">

                        <div>
                            <p class="title">تگ نیم</p>
                            <div class="input_text">
                                <input name="tagname" class="input_text_input" type="text" placeholder="..." autocomplete="off" />
                                <img src="assets/image/icon/ic_at_sign.svg" alt="#">
                            </div>
                        </div>
                        <div></div>
                        <div></div>

                    </div>

                    <div style="width: 100%;">
                        <div style="float: right;">
                            <p class="title_title">دسترسی ها </p>
                            <div class="lines">
                                <div class="line1"></div>
                                <div class="line1 line2"></div>
                            </div>
                        </div>
                    </div>

                    <div class="info-row">
                        <div>
                            <div class="input_text">
                                <input name="design" type="checkbox" />
                                <label>طراحی</label>
                            </div>
                        </div>
                        <div>
                            <div class="input_text">
                                <input name="adesign" type="checkbox" />
                                <label>اتمام طراحی</label>
                            </div>
                        </div>
                        <div>
                            <div class="input_text">
                                <input name="videoedit" type="checkbox" />
                                <label>ادیت ویدئو</label>
                            </div>
                        </div>
                        <div>
                            <div class="input_text">
                                <input name="avideoedit" type="checkbox" />
                                <label>اتمام ویدئو</label>
                            </div>
                        </div>

                    </div>

                    <div class="info-row">
                        <div>
                            <div class="input_text">
                                <input name="end" type="checkbox" />
                                <label>پایان تسک</label>
                            </div>
                        </div>
                        <div>
                            <div class="input_text">
                                <input name="edit" type="checkbox" />
                                <label>ویرایش کردن</label>
                            </div>
                        </div>
                        <div>
                            <div class="input_text">
                                <input name="error" type="checkbox" />
                                <label>گزارش خطا</label>
                            </div>
                        </div>
                        <div></div>
                    </div>

                    <div class="info-row row-btn">

                        <input type="submit" name="insert" class="input_btn" style="float: left;" value="ثبت" />

                    </div>

                </div>

            </form>

        </div>
    </div>
    <div class="clear"></div>
</body>
<script src="assets/js/script.js"></script>

</html>