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
    <title>ویرایش اطلاعات</title>
</head>

<body>

    <?php
    require_once "header.php";
    if (isset($_POST['edit'])) {
        ProfileEdit();
    } ?>

    <div class="content-profile">

        <div class="info">

            <div class="info-right">
                <img src="/assets/image/pic_user/<?php echo $_SESSION['UserOk']['avator']; ?>" alt="">
            </div>

            <div class="info-left">

                <div style="width: 100%;">
                    <div style="float: right;">
                        <p class="text1-login">ویرایش اطلاعات کاربری</p>
                        <div class="lines">
                            <div class="line1"></div>
                            <div class="line1 line2"></div>
                        </div>
                    </div>
                    <input type="submit" name="" class="input-edit-profile" style="float: left;" value="بروزرسانی اطلاعات" />
                </div>

                <div class="info-row">
                    <div>
                        <p class="title">نام</p>
                        <div class="input-text-login">
                            <p class="input-text-profile"><?php echo $_SESSION['UserOk']['name']; ?></p>
                            <img src="assets/image/icon/ic_user.svg" alt="#">
                        </div>
                    </div>
                    <div>
                        <p class="title">موبایل</p>
                        <div class="input-text-login">
                            <input name="name" value="<?php echo $_SESSION['UserOk']['mobile']; ?>" type="text" placeholder="..." maxlength="11" autocomplete="off" />
                            <img src="assets/image/icon/ic_lock.svg" alt="#">
                        </div>
                    </div>
                    <div>
                        <p class="title">تگ نیم</p>
                        <div class="input-text-login">
                            <p class="input-text-profile"><?php echo $_SESSION['UserOk']['tagname']; ?></p>
                            <img src="assets/image/icon/ic_at-sign.svg" alt="#">
                        </div>
                    </div>
                </div>

                <div class="info-row">
                    <div>
                        <p class="title">رمز عبور فعلی</p>
                        <div class="input-text-login margin0">
                            <input name="current-pass" id="current-pass" type="password" placeholder="********" maxlength="65" autocomplete="off" />
                            <img src="assets/image/icon/ic_eye.svg" alt="#" id="current-pass-eye" onclick="CurrentPass()">
                        </div>
                    </div>
                    <div>
                        <p class="title">رمز عبور جدید</p>
                        <div class="input-text-login margin0">
                            <input name="new-pass" id="new-pass" type="password" placeholder="********" maxlength="65" autocomplete="off" />
                            <img src="assets/image/icon/ic_eye.svg" alt="#" id="new-pass-eye" onclick="NewPass()">
                        </div>
                    </div>
                    <div>
                        <p class="title">تکرار رمز عبور جدید</p>
                        <div class="input-text-login margin0">
                            <input name="new-pass-repet" id="new-pass-repet" type="password" placeholder="********" maxlength="65" autocomplete="off" />
                            <img src="assets/image/icon/ic_eye.svg" alt="#" id="new-pass-repet-eye" onclick="NewPassRepet()">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="clear"></div>
</body>
<script src="assets/js/script.js"></script>

</html>