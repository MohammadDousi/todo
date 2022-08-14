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

            <form action="" method="POST" enctype='multipart/form-data'>

                <div class="info-right">
                    <!-- <img src="/assets/image/pic_user/<?php // echo $_SESSION['UserOk']['avator']; 
                                                            ?>" alt=""> -->
                    <img src="assets/image/pic_user/u4.png" alt="">
                    <div class="input_file">
                        <input id="imgInp" name="Image" type="file" class="inputfile" accept="image/*" />
                        <svg xmlns="http://www.w3.org/2000/svg" style="padding-top: 2%;" width="20" height="17" viewBox="0 0 20 17">
                            <path fill="#252525" d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                        </svg>
                        <label for="imgInp" style="cursor: pointer; padding-right: 8px;">انتخاب تصویر</label>
                    </div>
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
                        <input type="submit" name="edit" class="input-edit-profile" style="float: left;" value="بروزرسانی اطلاعات" />
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
                                <input name="mobile" value="<?php echo $_SESSION['UserOk']['mobile']; ?>" type="text" placeholder="..." maxlength="11" autocomplete="off" />
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

            </form>

        </div>
    </div>
    <div class="clear"></div>
</body>

<script src="assets/js/script.js"></script>

</html>