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
    <link rel="stylesheet" href="assets/css/edit.css">
    <title>ایجاد تسک جدید</title>
</head>

<body>

    <?php
    require_once "header.php"; ?>

    <?php
    if (isset($_POST['EditTask'])) {
        if (EditTask()) { ?>
            <script>
                location.assign("index.php");
            </script>
        <?php }
    }

    if (isset($_POST['DelTask'])) {
        if (DelTask()) { ?>
            <script>
                location.assign("index.php");
            </script>

    <?php }
    } ?>

    <div class="content">

        <div class="info">

            <form action="" method="POST" enctype='multipart/form-data'>

                <div class="info_left">

                    <div style="width: 100%;">
                        <div style="float: right;">
                            <p class="title_title">ویرایش تسک</p>
                            <div class="lines">
                                <div class="line1"></div>
                                <div class="line1 line2"></div>
                            </div>
                        </div>
                    </div>

                    <?php if (isset($_GET['Id'])) {
                        $item = GetItemSingle($_GET['Id']);
                        if ($item) {
                            foreach ($item as $value) { ?>

                                <div class="info_row">
                                    <div>
                                        <p class="title">موضوع</p>
                                        <div class="input_text">
                                            <input name="TextTask" type="text" value="<?= $value->Text ?>" class="input_text_input" placeholder="..." maxlength="65" autocomplete="off" />
                                            <img src="assets/image/icon/ic_star.svg" alt="#">
                                        </div>
                                    </div>
                                    <div>
                                        <p class="title">وضعیت</p>
                                        <div class="input_text">
                                            <select class="combo_box" name="status" id="status">
                                                <?php
                                                $item = PerUser();
                                                if ($item) {
                                                    foreach ($item as $valuePerUser) { ?>
                                                        <?php if ($valuePerUser->Design) { ?><option value="4">در حال طراحی</option><?php } ?>
                                                        <?php if ($valuePerUser->VideoEdit) { ?><option value="5">در حال تدوین</option><?php } ?>
                                                        <?php if ($valuePerUser->ADesign) { ?><option value="6">اتمام طراحی</option><?php } ?>
                                                        <?php if ($valuePerUser->AVideo) { ?><option value="7">اتمام تدوین</option><?php } ?>
                                                        <?php if ($valuePerUser->End) { ?><option value="8">تمام شده</option><?php } ?>
                                                        <?php if ($valuePerUser->Edit) { ?><option value="9">ویرایش</option><?php } ?>
                                                        <?php if ($valuePerUser->Error) { ?><option value="10">خطا ، نیاز به طراحی و یا تدوین مجدد</option><?php } ?>

                                                <?php }
                                                } ?>
                                            </select>

                                            <img src="assets/image/icon/ic_star.svg" alt="#">
                                        </div>

                                    </div>

                                </div>

                                <div class="info_row">

                                    <div>
                                        <p class="title">توضیحات</p>
                                        <div class="input_text">
                                            <textarea name="Description" type="text" class="input_text_input" style="min-height: 10rem;" placeholder="..." autocomplete="off"><?= $value->Description ?></textarea>
                                            <img src="assets/image/icon/ic_star.svg" alt="#">
                                        </div>
                                    </div>



                                    <div>
                                        <p class="title">تگ افراد مرتبط</p>
                                        <div class="input_text">
                                            <input name="SearchAddTag" id="SearchTagName" type="search" value="<?= $value->Tag ?>" class="input_text_input" placeholder="..." autocomplete="off" />
                                            <img src="assets/image/icon/ic_at_sign.svg" alt="#" id="current-pass-eye" onclick="CurrentPass()">
                                        </div>

                                        <div class="box_item">
                                            <?php $item = SelectTag();
                                            if ($item) {
                                                foreach ($item as $ValueSearchTag) { ?>
                                                    <div class="item_search_box" id="<?= $ValueSearchTag->TagName; ?>" onclick="GetTagName(this.id)">
                                                        <?= $ValueSearchTag->TagName ?>
                                                    </div>
                                            <?php }
                                            }
                                            ?>
                                        </div>
                                    </div>

                                </div>

                                <div class="info_row">

                                    <div class="info_row">

                                        <div>
                                            <p class="title">سازنده تسک</p>
                                            <div class="input_text">
                                                <?php $id = ($value->Maker);
                                                if ($id) {
                                                    $item = GetUser($id);
                                                    if ($item) {
                                                        foreach ($item as $valueUser) { ?>
                                                            <p class="input_text_input"><?= $valueUser->Name ?></p>
                                                <?php }
                                                    }
                                                } else {
                                                } ?>

                                                <img src="assets/image/icon/ic_star.svg" alt="#">
                                            </div>
                                        </div>
                                        <div>
                                            <p class="title">طراح</p>
                                            <div class="input_text">
                                                <?php $id = ($value->Designer);
                                                if ($id) {
                                                    $item = GetUser($id);
                                                    if ($item) {
                                                        foreach ($item as $valueUser) { ?>
                                                            <p class="input_text_input"><?= $valueUser->Name ?></p>
                                                    <?php }
                                                    }
                                                } else { ?>
                                                    <p class="input_text_input">مشخص نشده !</p>
                                                <?php } ?>

                                                <img src="assets/image/icon/ic_star.svg" alt="#">
                                            </div>
                                        </div>
                                        <div>
                                            <p class="title">ادیتور</p>
                                            <div class="input_text">
                                                <?php $id = ($value->Editor);
                                                if ($id) {
                                                    $item = GetUser($id);
                                                    if ($item) {
                                                        foreach ($item as $valueUser) { ?>
                                                            <p class="input_text_input"><?= $valueUser->Name ?></p>
                                                    <?php }
                                                    }
                                                } else { ?>
                                                    <p class="input_text_input">مشخص نشده !</p>
                                                <?php } ?>

                                                <img src="assets/image/icon/ic_star.svg" alt="#">
                                            </div>
                                        </div>


                                    </div>


                                </div>
                    <?php }
                        }
                    } ?>

                    <div class="info_row row_btn">

                        <input type="submit" name="EditTask" class="input_btn" value="بروزرسانی اطلاعات" />
                        <input type="submit" name="DelTask" class="input_btn" value="حذف" />
                        <input class="input_btn_strok_cancel" type="button" onclick="GoToIndex()" value="بازگشت" />

                    </div>

                </div>

            </form>

        </div>

        <div class="history_edit">

            <div style="width: 100%;">
                <div style="float: right;">
                    <p class="title_title">تاریخچه تغییرات</p>
                    <div class="lines">
                        <div class="line1"></div>
                        <div class="line1 line2"></div>
                    </div>
                </div>
            </div>


            <?php $item = HistoryTask(($_GET['Id']));
            if ($item) {
                foreach ($item as $value) { ?>

                    <div class="history">
                        <span class="history_comment"><?= $value->Message; ?></span>
                        <span class="history_date"><?= $value->Date; ?></span>
                    </div>

            <?php }
            } ?>

        </div>


    </div>
</body>

<script src="assets/js/script.js"></script>

</html>