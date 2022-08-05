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
    <div class="content-login">

        <div class="content-right-login">

            <p class="text1-login">ورود به پنل کاربری</p>

            <div class="lines">
                <div class="line1"></div>
                <div class="line1 line2"></div>
            </div>

            <form class="form-login" method="POST">

                <p>تلفن همراه</p>
                <input type="text" class="input_text input-text-login" name="Mobile" placeholder="مثال: 09301231121" autocomplete="off" required maxlength="11" />

                <p>رمز عبور</p>
                <input type="password" class="input_text input-text-login" name="Pass" placeholder="********" required autocomplete="off" />

                <input type="submit" name="Login" class="input_button input-btn-login" value="ورود" />
                <input type="submit" name="" class="input_button input-btn-login input-btn-strok-login" value="ورود با رمز عبور یک بار مصرف" />
            </form>

            <p class="copyright-login">گروه تولید محتوای سپهرمدیا</p>

        </div>

        <div class="content-left-login">
            <img src="assets/image/pic/login-pic.png" alt="#">
        </div>

    </div>

</body>

</html>