<div class="header">

    <div class="profile_admin" id="profile_admin">

        <button class="dropbtn" onclick="Fun_profile_admin()"></button>
        <img class="profile_admin_img" src="/assets/image/pic_user/<?php echo $_SESSION['UserOk']['avator']; ?>">
        <p class="name-profile"><?php echo $_SESSION['UserOk']['name']; ?></p>
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


    <img class="img-address" src="assets/image/icon/ic_three-dots.svg" alt="#">
    <p class="header-address" id="header-address"></p>

    <!-- <img class="header_logo" src="/assets/image/logo/sepehrlogo.png"> -->
    <div class="clear"></div>
</div>


<script src="assets/js/script.js"></script>
<script>
    HeaderAddress();
</script>