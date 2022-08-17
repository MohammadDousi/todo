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
    <link rel="stylesheet" href="assets/css/insert.css">
    <link rel="stylesheet" href="assets/css/profile.css">
    <title>ویرایش</title>
</head>

<body>

    <?php
    require_once "header.php";
    if (isset($_POST['edit'])) {
        ProfileEdit();
    } ?>

    <div class="content_profile">

        <div class="info">

            <form action="" method="POST" enctype='multipart/form-data'>

                <div class="info-left">

                    <div style="width: 100%;">
                        <div style="float: right;">
                            <p class="title_title">ویرایش تسک</p>
                            <div class="lines">
                                <div class="line1"></div>
                                <div class="line1 line2"></div>
                            </div>
                        </div>
                    </div>

                    <div class="info-row">
                        <div>
                            <p class="title">موضوع</p>
                            <div class="input_text">
                                <input name="TextTask" value="" type="text" placeholder="..." maxlength="65" autocomplete="off" required />
                                <img src="assets/image/icon/ic_lock.svg" alt="#">
                            </div>

                        </div>
                        <div>
                            <p class="title">توضیحات</p>
                            <div class="input_text">
                                <input name="Description" value="" type="text" placeholder="..." maxlength="65" autocomplete="off" required />
                                <img src="assets/image/icon/ic_lock.svg" alt="#">
                            </div>
                        </div>
                        <div>
                            <p class="title">وضعیت</p>

                            <div class="input_text">
                                <select class="combo_box" name="status" id="status">
                                    <?php
                                    $item = PerUser();
                                    if ($item) {
                                        foreach ($item as $value) { ?>
                                            <?php if ($value->Design) { ?><option value="4">در حال طراحی</option><?php } ?>
                                            <?php if ($value->VideoEdit) { ?><option value="5">در حال تدوین</option><?php } ?>
                                            <?php if ($value->ADesign) { ?><option value="6">اتمام طراحی</option><?php } ?>
                                            <?php if ($value->AVideo) { ?><option value="7">اتمام تدوین</option><?php } ?>
                                            <?php if ($value->End) { ?><option value="8">تمام شده</option><?php } ?>
                                            <?php if ($value->Edit) { ?><option value="9">ویرایش</option><?php } ?>
                                            <?php if ($value->Error) { ?><option value="10">خطا ، نیاز به طراحی و یا تدوین مجدد</option><?php } ?>

                                    <?php }
                                    } ?>
                                </select>
                                 <img src="assets/image/icon/ic_lock.svg" alt="#">

                            </div>


                        </div>
                    </div>

                    <div class="info-row">
                        <div>
                            <p class="title">تگ افراد مرتبط</p>
                            <div class="input_text">
                                <input name="SearchAddTag" id="SearchTagName" value="" type="text" placeholder="..." autocomplete="off" />
                                <img src="assets/image/icon/ic_lock.svg" alt="#">
                            </div>
                        </div>
                        <div>
                            <p class="title">رمز عبور جدید</p>
                            <div class="input_text">
                                <input name="new-pass" id="new-pass" type="password" placeholder="********" maxlength="20" autocomplete="off" />
                                <img src="assets/image/icon/ic_eye.svg" alt="#" id="new-pass-eye" onclick="NewPass()">
                            </div>
                        </div>
                        <div>
                            <p class="title">تکرار رمز عبور جدید</p>
                            <div class="input_text">
                                <input name="new-pass-repet" id="new-pass-repet" type="password" placeholder="********" maxlength="20" autocomplete="off" />
                                <img src="assets/image/icon/ic_eye.svg" alt="#" id="new-pass-repet-eye" onclick="NewPassRepet()">
                            </div>
                        </div>
                    </div>

                    <div class="info-row row-btn">

                        <input type="submit" name="edit" class="input_btn" value="بروزرسانی اطلاعات" />
                        <input class="input_btn_strok_cancel" type="button" onclick="GoToProfile()" value="بازگشت" />

                    </div>

                </div>

            </form>

        </div>

    </div>
    <div class="clear"></div>
</body>

<script src="assets/js/script.js"></script>

</html>