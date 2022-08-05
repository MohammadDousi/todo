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

            <form class="form-login" method="POST">

                <p>تلفن همراه</p>
                <input type="text" class="input_text input-text-login" name="Mobile" placeholder="مثال: 09301231121" autocomplete="off" maxlength="11" />

                <p>رمز عبور</p>
                <input type="password" class="input_text input-text-login" name="Pass" placeholder="******** " autocomplete="off" />
             
                

                <input type="submit" name="Login" class="input_button input-btn-login" value="ورود" />
                <input type="submit" name="Login" class="input_button input-btn-login input-btn-strok-login" value="ورود با رمز عبور یک بار مصرف" />
            </form>


        </div>

        <div class="content-left-login">
            <img src="assets/image/pic/login-pic.png" alt="#">
        </div>

    </div>









    <!-- <div class="bg"></div>
    <div class="bg bg2"></div> -->

    <!-- <img src="assets/image/logo/sepehrlogo.png" class="logo_login" alt="sepehr.media"> -->
    <?php
    // if (isset($_POST['Login'])) {
    //     Login(); } 
    ?>

    <!-- <div id="content_message" class="content_message"></div>

    <div class="content">

        <form class="form" method="POST">
            <div>
                <p class="text_welcome1">از دیدار دوباره شما خوش حالیم :)</p>
                <p class="text_welcome2">به سیستم مدیریت محتوا سپهر مدیا خوش آمدید</p>
            </div>

            <input type="text" class="input_text input_login" name="Mobile" placeholder="09xx xx xxx xx" autocomplete="off" maxlength="11" />
            <input type="password" class="input_text input_login" name="Pass" placeholder="* * * * *" autocomplete="off" />
            <input type="submit" name="Login" class="input_button active" value="ورود" />
        </form>

        <div class="clear"></div>
    </div> -->

</body>

</html>