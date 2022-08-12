<?php require_once "assets/php/init.php";
// if (!isset($_SESSION['UserOk'])) {
//     header('location:login.php');
// }
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/main.css">
    <title>صفحه اصلی</title>
</head>

<body>

    <?php require_once "header.php"; ?>

    <div class="content">

        <div class="content_task_list">

            <div class="content_task_header">
                <p>تسک لیست (<?php CountStartList(); ?>)</p>
                <div class="new_task_btn" onclick="GoToInsert()">
                    <p> تسک جدید</p>
                    <img src="./assets/image/icon/ic_plus.svg" alt="">
                </div>
                <div class="clear"></div>
            </div>

            <div class="content_list_body">
                <?php $item = StartList();
                if ($item) {
                    foreach ($item as $value) { ?>
                        <div class="box_task" id="<?= $value->Id; ?>" onclick="GoToEdit(this.id)">
                            <?php switch ($value->Status) {
                                case "3": ?>
                                    <div class="box_task_status status_create"></div>
                                <?php
                                    break;
                                case "9":
                                ?>
                                    <div class="box_task_status status_edit"></div>
                                <?php
                                    break;
                                case "10": ?>
                                    <div class="box_task_status status_error"></div>
                            <?php
                                    break;
                            } ?>

                            <div class="box_task_text">
                                <p class="text_task"><?= $value->Text; ?></p>
                                <p class="description_task"><?= $value->Description; ?></p>

                                <?php switch ($value->Level) {
                                    case "0": ?>
                                        <p class="date_create_task">اولویت: عادی</p>
                                    <?php break;
                                    case "1": ?>
                                        <p class="date_create_task">اولویت: فوری</p>
                                    <?php break;
                                    case "2": ?>
                                        <p class="date_create_task">اولویت: فوق العاده</p>
                                <?php break;
                                } ?>


                                <?php $id = ($value->Maker);
                                if ($id) {
                                    $item = GetUser($id);
                                    if ($item) {
                                        foreach ($item as $valueUser) { ?>
                                            <p class="date_create_task">سازنده: <?= $valueUser->Name ?></p>
                                <?php
                                        }
                                    }
                                } else {
                                } ?>


                                <?php
                                $id = ($value->Designer);
                                if ($id) {
                                    $item = GetUser($id);
                                    if ($item) {
                                        foreach ($item as $valueUser) { ?>
                                            <p class="date_create_task">طراح: <?= $valueUser->Name ?></p>
                                <?php
                                        }
                                    }
                                } else {
                                } ?>
                                </p>

                                <?php
                                $id = ($value->Editor);
                                if ($id) {
                                    $item = GetUser($id);
                                    if ($item) {
                                        foreach ($item as $valueUser) { ?>
                                            <p class="date_create_task">ادیتور: <?= $valueUser->Name ?></p>

                                <?php
                                        }
                                    }
                                } else {
                                } ?>
                                </p>

                                <p class="date_create_task">
                                    <?= $value->Year . "/" . $value->Month . "/" . $value->Day . " " . $value->Nday
                                        . " " . $value->Hour . ":" . $value->Min; ?>
                                </p>

                                <p class="date_create_task red">
                                    <?php switch ($value->Status) {
                                        case 10: ?> وجود خطا ، نیاز به هماهنگی بیشتر
                                        <?php break;
                                        case 9: ?> نیاز به ویرایش
                                    <?php break;
                                    } ?>
                                </p>
                            </div>
                        </div>
                    <?php }
                } else { ?>

                    <div id="dont_data" class="box_dont_data">
                        <img src="./assets/image/icon/ic_no_data.svg" />
                        <p>داده ای یافت نشد !</p>
                        <span>تسک جدید ثبت کنید :)</span>
                    </div>

                <?php } ?>
                <div class="clear"></div>
            </div>
        </div>

        <div class="content_task_list back_bluegray">

            <div class="content_task_header">
                <p> در حال انجام (<?php CountDoingList(); ?>)</p>
                <div class="clear"></div>
            </div>

            <div class="content_list_body">
                <?php
                $item = DoingList();
                if ($item) {
                    foreach ($item as $value) { ?>
                        <div class="box_task" id="<?= $value->Id; ?>" onclick="GoToEdit(this.id)">
                            <?php switch ($value->Status) {
                                case "4": ?>
                                    <div class="box_task_status status_design"></div>
                                <?php
                                    break;
                                case "5": ?>
                                    <div class="box_task_status status_5"></div>
                                <?php
                                    break;
                                case "6": ?>
                                    <div class="box_task_status status_accept"></div>
                                <?php
                                    break;
                                case "7": ?>
                                    <div class="box_task_status status_edit"></div>
                            <?php
                                    break;
                            }             ?>

                            <div class="box_task_text">
                                <p class="text_task"><?= $value->Text; ?></p>

                                <p class="description_task"><?= $value->Description; ?></p>

                                <?php switch ($value->Level) {
                                    case "0": ?>
                                        <p class="date_create_task">اولویت: عادی</p>
                                    <?php break;
                                    case "1": ?>
                                        <p class="date_create_task">اولویت: فوری</p>
                                    <?php break;
                                    case "2": ?>
                                        <p class="date_create_task">اولویت: فوق العاده</p>
                                <?php break;
                                } ?>


                                <?php $id = ($value->Maker);
                                if ($id) {
                                    $item = GetUser($id);
                                    if ($item) {
                                        foreach ($item as $valueUser) { ?>
                                            <p class="date_create_task">سازنده: <?= $valueUser->Name ?></p>
                                <?php
                                        }
                                    }
                                } else {
                                } ?>


                                <?php
                                $id = ($value->Designer);
                                if ($id) {
                                    $item = GetUser($id);
                                    if ($item) {
                                        foreach ($item as $valueUser) { ?>
                                            <p class="date_create_task">طراح: <?= $valueUser->Name ?></p>
                                <?php
                                        }
                                    }
                                } else {
                                } ?>
                                </p>

                                <?php
                                $id = ($value->Editor);
                                if ($id) {
                                    $item = GetUser($id);
                                    if ($item) {
                                        foreach ($item as $valueUser) { ?>
                                            <p class="date_create_task">ادیتور: <?= $valueUser->Name ?></p>

                                <?php
                                        }
                                    }
                                } else {
                                } ?>
                                </p>

                                <p class="date_create_task">
                                    <?= $value->Year . "/" . $value->Month . "/" . $value->Day . " " . $value->Nday
                                        . " " . $value->Hour . ":" . $value->Min; ?>
                                </p>

                            </div>
                        </div>
                    <?php }
                } else { ?>

                    <div id="dont_data" class="box_dont_data">
                        <img src="./assets/image/icon/ic_no_data.svg" />
                        <p>داده ای یافت نشد !</p>
                        <span>نه طراحی نه ادیت |:</span>
                    </div>

                <?php } ?>
                <div class="clear"></div>
            </div>
        </div>

        <div class="content_task_list">

            <div class="content_task_header">
                <p>تمام شده (<?php CountEndList(); ?>)</p>
                <div class="clear"></div>
            </div>

            <div class="content_list_body">
                <?php
                $item = EndList();
                if ($item) {
                    foreach ($item as $value) { ?>
                        <div class="box_task" id="<?= $value->Id; ?>" onclick="GoToEdit(this.id)">
                            <?php switch ($value->Status) {
                                case "8": ?>
                                    <div class="box_task_status status_accept"></div>
                            <?php
                                    break;
                            } ?>

                            <div class="box_task_text">
                                <p class="text_task"><?= $value->Text; ?></p>

                                <p class="description_task"><?= $value->Description; ?></p>

                                <?php switch ($value->Level) {
                                    case "0": ?>
                                        <p class="date_create_task">اولویت: عادی</p>
                                    <?php break;
                                    case "1": ?>
                                        <p class="date_create_task">اولویت: فوری</p>
                                    <?php break;
                                    case "2": ?>
                                        <p class="date_create_task">اولویت: فوق العاده</p>
                                <?php break;
                                } ?>


                                <?php $id = ($value->Maker);
                                if ($id) {
                                    $item = GetUser($id);
                                    if ($item) {
                                        foreach ($item as $valueUser) { ?>
                                            <p class="date_create_task">سازنده: <?= $valueUser->Name ?></p>
                                <?php
                                        }
                                    }
                                } else {
                                } ?>


                                <?php
                                $id = ($value->Designer);
                                if ($id) {
                                    $item = GetUser($id);
                                    if ($item) {
                                        foreach ($item as $valueUser) { ?>
                                            <p class="date_create_task">طراح: <?= $valueUser->Name ?></p>
                                <?php
                                        }
                                    }
                                } else {
                                } ?>
                                </p>

                                <?php
                                $id = ($value->Editor);
                                if ($id) {
                                    $item = GetUser($id);
                                    if ($item) {
                                        foreach ($item as $valueUser) { ?>
                                            <p class="date_create_task">ادیتور: <?= $valueUser->Name ?></p>

                                <?php
                                        }
                                    }
                                } else {
                                } ?>
                                </p>

                                <p class="date_create_task">
                                    <?= $value->Year . "/" . $value->Month . "/" . $value->Day . " " . $value->Nday
                                        . " " . $value->Hour . ":" . $value->Min; ?>
                                </p>

                            </div>
                        </div>
                    <?php }
                } else { ?>

                    <div id="dont_data" class="box_dont_data">
                        <img src="./assets/image/icon/ic_no_data.svg" />
                        <p>داده ای یافت نشد !</p>
                        <span>هنوز تسکی تموم نشده |:</span>
                    </div>

                <?php } ?>
                <div class="clear"></div>
            </div>
        </div>

        <div class="clear"></div>
    </div>

    <?php require_once "footer.php"; ?>
    <div class="clear"></div>

</body>

<script src="assets/js/script.js"></script>


</html>