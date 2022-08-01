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
    <title>صفحه اصلی</title>
</head>

<body>

    <div class="header">
        <div class="profile_admin" id="profile_admin">
            <button class="dropbtn" onclick="Fun_profile_admin()"></button>
            <img class="profile_admin_img" src="/assets/image/pic_user/<?php echo $_SESSION['UserOk']['avator']; ?>">
            <p><?php echo $_SESSION['UserOk']['name']; ?></p>
            <img class="profile_admin_more" src="./assets/image/icon/ic_more.svg">

            <div class="dropdown">
                <div class="dropdown_content" id="myDropdown">
                    <form method="POST">
                        <input class="sub_dropdown" type="submit" name="profile" onclick="<?php if (isset($_POST['profile'])) header('location:profile.php'); ?>" value="پروفایل">
                        <input class="sub_dropdown" type="submit" name="logout" onclick="<?php if (isset($_POST['logout'])) logout(); ?>" value="خروج">

                    </form>
                </div>
            </div>

        </div>

        <img class="header_logo" src="/assets/image/logo/sepehrlogo.png">

        <div class="clear"></div>
    </div>

    <div class="clear"></div>
    </div>

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
                        <span>تسک جدید ثبت کنید :)</span>
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
                        <span>تسک جدید ثبت کنید :)</span>
                    </div>

                <?php } ?>
                <div class="clear"></div>
            </div>
        </div>

        <div class="clear"></div>
    </div>

    <div class="footer">
        <p class="copyright">
            طراحی با
            <svg style="vertical-align: middle;" xmlns="http://www.w3.org/2000/svg" width="17" height="17" xmlns:xusual="http://www.w3.org/1999/xusual" viewBox="0 0 48 48" version="1.1">
                <g id="surface1">
                    <path style=" fill:#f44336;" d="M 34 6 C 29.824219 6 26.148438 8.136719 24 11.371094 C 21.851563 8.136719 18.175781 6 14 6 C 7.371094 6 2 11.371094 2 18 C 2 29.941406 24 42 24 42 C 24 42 46 30.046875 46 18 C 46 11.371094 40.628906 6 34 6 ">
                    </path>
                </g>
            </svg>
            - محمد دوسی
        </p>

        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</body>

<script src="assets/js/script.js"></script>

</html>