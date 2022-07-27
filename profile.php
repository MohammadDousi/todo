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
    <title>پروفایل</title>
</head>

<body>

    <?php
    if (isset($_POST['edit'])) {
    } ?>

    <div class="content">
        <div class="content_new_task">
            <div class="box">

                <form method="POST" action="">
                    <p class="title">نام</p>
                    <input name="TextTask" value="<?php echo $_SESSION['UserOk']['fname'] . " " . $_SESSION['UserOk']['lname']; ?>" class="input_text" type="text" placeholder="..." maxlength="65" autocomplete="off" />

                    <p class="title">رمز عبور</p>
                    <input name="TextTask" value="<?php echo $_SESSION['UserOk']['password']; ?>" class="input_text" type="text" placeholder="..." maxlength="65" autocomplete="off" />

                    <p class="title">آخرین بازدید</p>
                    <input name="TextTask" value="<?php echo $_SESSION['UserOk']['lastseen']; ?>" class="input_text" disabled type="text" placeholder="..." maxlength="65" autocomplete="off" />

            </div>
            <div class="box">
                <p class="title">تگ نیم</p>
                <input name="TextTask" value="<?php echo $_SESSION['UserOk']['tagname']; ?>" class="input_text" type="text" placeholder="..." maxlength="65" autocomplete="off" />

                <p class="title">موبایل</p>
                <input name="TextTask" value="<?php echo $_SESSION['UserOk']['mobile']; ?>" class="input_text" type="text" placeholder="..." maxlength="65" autocomplete="off" />

                <p class="title">شغل</p>
                <input name="TextTask" value="<?php echo $_SESSION['UserOk']['job']; ?>" class="input_text" disabled type="text" placeholder="..." maxlength="65" autocomplete="off" />
                <input class="input_button active" type="submit" name="edit" value="ویرایش" />
                <input class="input_button back" type="button" onclick="GoToIndex()" name="back" value="بازگشت" />

            </div>


            </form>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</body>
<script src="assets/js/script.js"></script>

</html>