<?php require_once "assets/php/init.php" ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>مدیر محتوا سپهرمدیا</title>
</head>

<body>

    <?php
    if (isset($_POST['login'])) {
        Login();
    } ?>

    <div class="content_login">

        <div class="content-right-login">

            <p class="title_title">ورود به پنل کاربری</p>

            <div class="lines">
                <div class="line1"></div>
                <div class="line1 line2"></div>
            </div>

            <form class="form-login" method="POST">

                <p class="title">تلفن همراه</p>
                <div class="input_text">
                    <input type="text" name="mobile" class="input_text_input" placeholder="مثال: 09301231121" autocomplete="off" maxlength="11" required autofocus />
                    <img src="assets/image/icon/ic_mobile.svg" alt="">
                </div>

                <p class="title">رمز عبور</p>
                <div class="input_text">
                    <input type="password" name="pass" id="pass" class="input_text_input" placeholder="********" required autocomplete="off" />
                    <img src="assets/image/icon/ic_eye.svg" id="eye-pass" onclick="ShowPass()" alt="">
                </div>

                <input type="submit" name="login" class="input_btn" value="ورود" />
                <input type="submit" name="" class="input_btn input_btn_strok" value="ورود با رمز عبور یک بار مصرف" />
            </form>

            <a href="https://sepehr.media/" class="copyright-login">گروه تولید محتوای سپهرمدیا</a>
        </div>

        <div class="content-left-login">
            <img src="assets/image/pic/login-pic.png" alt="#">
        </div>

    </div>

</body>


<script src="assets/js/script.js"></script>

</html>