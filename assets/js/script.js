function GetTagName(tag) {
  temp = document.getElementById("SearchTagName").value;
  result = temp.replace(tag, "");
  document.getElementById("SearchTagName").value = result + "" + tag;
}

function GoToIndex() {
  location.assign("index.php");
}

function GoToInsert() {
  location.assign("insert.php");
}

function GoToEdit(Id) {
  location.assign("edit2.php?Id=" + Id);
}

function GoToProfile() {
  location.assign("profile.php");
}

function GoToEditProfile() {
  location.assign("profile_edit.php");
}

/////////////////////////////////////
////// cheek img real
//////////////////////////////////////

function onchangeImg() {
  imgInp.onchange = (evt) => {
    if (file) {
      img.src = URL.createObjectURL(file);
    }
  };
}

/////////////////////////////////////
////// show password login & profile edit
//////////////////////////////////////

function ShowPass() {
  var eye = document.getElementById("eye-pass");
  var pass = document.getElementById("pass");
  eye.onclick = function () {
    if (pass.type === "text") {
      pass.type = "password";
      eye.src = "assets/image/icon/ic_eye.svg";
    } else {
      pass.type = "text";
      eye.src = "assets/image/icon/ic_eye_red.svg";
    }
  };
}

function CurrentPass() {
  var eye = document.getElementById("current-pass-eye");
  var pass = document.getElementById("current-pass");
  eye.onclick = function () {
    if (pass.type === "text") {
      pass.type = "password";
      eye.src = "assets/image/icon/ic_eye.svg";
    } else {
      pass.type = "text";
      eye.src = "assets/image/icon/ic_eye_red.svg";
    }
  };
}

function NewPass() {
  var eye = document.getElementById("new-pass-eye");
  var pass = document.getElementById("new-pass");
  eye.onclick = function () {
    if (pass.type === "text") {
      pass.type = "password";
      eye.src = "assets/image/icon/ic_eye.svg";
    } else {
      pass.type = "text";
      eye.src = "assets/image/icon/ic_eye_red.svg";
    }
  };
}

function NewPassRepet() {
  var eye = document.getElementById("new-pass-repet-eye");
  var pass = document.getElementById("new-pass-repet");
  eye.onclick = function () {
    if (pass.type === "text") {
      pass.type = "password";
      eye.src = "assets/image/icon/ic_eye.svg";
    } else {
      pass.type = "text";
      eye.src = "assets/image/icon/ic_eye_red.svg";
    }
  };
}

/////////////////////////////////////
////// change show addrees user in header
//////////////////////////////////////

function HeaderAddress() {
  var show,
    address = window.location.href;
  start = address.lastIndexOf("/");
  end = address.lastIndexOf(".");
  address = address.substring(start + 1, end);

  switch (address) {
    case "index":
      show = "صفحه اصلی";
      break;
    case "profile":
      show = "صفحه اصلی / پروفایل";
      break;
    case "profile_edit":
      show = "صفحه اصلی / پروفایل / ویرایش اطلاعات";
      break;
    case "insert":
      show = "صفحه اصلی / تسک جدید";
      break;
    case "edit":
      show = "صفحه اصلی / ویرایش تسک";
      break;
  }

  document.getElementById("header-address").innerText = show;
}

/////////////////////////////////////
////// index page
//////////////////////////////////////

function Fun_profile_admin() {
  document.getElementById("myDropdown").classList.toggle("show");
}

/////////////////////////////////////
////// select radio insert and edit page
//////////////////////////////////////

function usual() {
  document.getElementById("radio_usual").checked = true;
  var hid = document.getElementById("usual");
  hid.style.backgroundColor = "#2196F3";
  hid.style.Color = "#ffffff";
  hid.style.boxShadow = "0 0 15px rgba(29, 107, 242, 16%)";
  hid.style.fontWeight = "bold";

  document.getElementById("radio_force").checked = false;
  var hid = document.getElementById("force");
  hid.style.backgroundColor = "transparent";
  hid.style.boxShadow = "0 0 0 transparent";
  hid.style.fontWeight = "normal";

  document.getElementById("radio_vforce").checked = false;
  var hid = document.getElementById("vforce");
  hid.style.backgroundColor = "transparent";
  hid.style.boxShadow = "0 0 0 transparent";
  hid.style.fontWeight = "normal";
}

function force() {
  document.getElementById("radio_force").checked = true;
  var hid = document.getElementById("force");
  hid.style.backgroundColor = "#2196F3";
  hid.style.Color = "#ffffff";
  hid.style.boxShadow = "0 0 15px rgba(29, 107, 242, 16%)";
  hid.style.fontWeight = "bold";

  document.getElementById("radio_usual").checked = false;
  var hid = document.getElementById("usual");
  hid.style.backgroundColor = "transparent";
  hid.style.boxShadow = "0 0 0 transparent";
  hid.style.fontWeight = "normal";

  document.getElementById("radio_vforce").checked = false;
  var hid = document.getElementById("vforce");
  hid.style.backgroundColor = "transparent";
  hid.style.boxShadow = "0 0 0 transparent";
  hid.style.fontWeight = "normal";
}

function vforce() {
  document.getElementById("radio_vforce").checked = true;
  var hid = document.getElementById("vforce");
  hid.style.backgroundColor = "#2196F3";
  hid.style.Color = "#ffffff";
  hid.style.boxShadow = "0 0 15px rgba(29, 107, 242, 16%)";
  hid.style.fontWeight = "bold";

  document.getElementById("radio_force").checked = false;
  var hid = document.getElementById("force");
  hid.style.backgroundColor = "transparent";
  hid.style.boxShadow = "0 0 0 transparent";
  hid.style.fontWeight = "normal";

  document.getElementById("radio_usual").checked = false;
  var hid = document.getElementById("usual");
  hid.style.backgroundColor = "transparent";
  hid.style.boxShadow = "0 0 0 transparent";
  hid.style.fontWeight = "normal";
}
