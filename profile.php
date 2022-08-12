<?php require_once "assets/php/init.php";
if (!isset($_SESSION['UserOk'])) {
    header('location:login.php');
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/profile.css">
    <title>پروفایل</title>
</head>

<body>

    <?php
    require_once "header.php"; ?>

    <div class="content-profile">

        <div class="info">

            <div class="info-right">
                <img src="/assets/image/pic_user/<?php echo $_SESSION['UserOk']['avator']; ?>" alt="">
            </div>

            <div class="info-left">

                <div style="width: 100%;">
                    <div style="float: right;">
                        <p class="text1-login">اطلاعات کاربری</p>
                        <div class="lines">
                            <div class="line1"></div>
                            <div class="line1 line2"></div>
                        </div>
                    </div>
                    <input type="submit" onclick="GoToEditProfile()" class="input-edit-profile" style="float: left;" value="ویرایش اطلاعات" />
                </div>

                <div class="info-row">
                    <div>
                        <p class="title">نام</p>
                        <div class="input-text-login">
                            <p><?php echo $_SESSION['UserOk']['name']; ?></p>
                            <img src="assets/image/icon/ic_user.svg" alt="#">
                        </div>
                    </div>
                    <div>
                        <p class="title">رمز عبور</p>
                        <div class="input-text-login">
                            <p><?php echo $_SESSION['UserOk']['password']; ?></p>
                            <img src="assets/image/icon/ic_lock.svg" alt="#">
                        </div>
                    </div>
                    <div>
                        <p class="title">موبایل</p>
                        <div class="input-text-login">
                            <p><?php echo GroupDigi_Mobile($_SESSION['UserOk']['mobile']); ?></p>
                            <img src="assets/image/icon/ic_mobile.svg" alt="#">
                        </div>
                    </div>
                </div>

                <div class="info-row">
                    <div>
                        <p class="title">آخرین بازدید</p>
                        <div class="input-text-login margin0">
                            <p><?php echo $_SESSION['UserOk']['lastseen']; ?></p>
                            <img src="assets/image/icon/ic_eye.svg" alt="#">
                        </div>
                    </div>

                    <div>
                        <p class="title">تگ نیم</p>
                        <div class="input-text-login margin0">
                            <p><?php echo $_SESSION['UserOk']['tagname']; ?></p>
                            <img src="assets/image/icon/ic_at-sign.svg" alt="#">
                        </div>
                    </div>
                    <div></div>
                </div>
            </div>

        </div>
    </div>
    <div class="clear"></div>
</body>
<script src="assets/js/script.js"></script>

</html>