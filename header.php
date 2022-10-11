<div class="header">

    <div class="profile_admin" id="profile_admin">

        <button class="dropbtn" onmouseover="Fun_profile_admin()"></button>
        <img class="profile_admin_img" src="/assets/image/pic_user/<?php echo $_SESSION['UserOk']['avator']; ?>">
        <p class="name_profile"><?php echo $_SESSION['UserOk']['name']; ?></p>
        <img class="profile_admin_more" src="./assets/image/icon/ic_more.svg">

        <div class="dropdown" onmouseout="Fun_profile_admin()">
            <div class="dropdown_content" id="myDropdown">
                <form method="POST">
                    <input class="sub_dropdown" type="button" onclick="GoToProfile()" value="پروفایل">
                    <input class="sub_dropdown" type="button" onclick="" value="تنظیمات">
                    <input class="sub_dropdown" type="submit" name="logout" onclick="<?php if (isset($_POST['logout'])) logout(); ?>" value="خروج">
                </form>
            </div>
        </div>
    </div>

    <div class="address">
    <img class="header_logo" src="./assets/image/logo/sepehrlogo.png">
        <img class="img-address" src="assets/image/icon/ic_three_dots.svg" alt="#">
        <p class="header-address" id="header-address"></p>
    </div>
    <div class="clear"></div>
    
</div>


<script src="assets/js/script.js"></script>

<script>
    HeaderAddress();
</script>