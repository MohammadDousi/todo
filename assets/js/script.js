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
  location.assign("edit.php?Id=" + Id);
}

function GoToEditProfile() {
  location.assign("edit-profile.php");
}



/////////////////////////////////////
////// cheek img real
//////////////////////////////////////
function onchangeImg() {
  imgInp.onchange = (evt) => {
    const [file] = imgInp.files;
    if (file) {
      img.src = URL.createObjectURL(file);
    }
  };
}

/////////////////////////////////////
////// show password login
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
    case "edit-profile":
      show = "صفحه اصلی / پروفایل / ویرایش اطلاعات";
      break;
    case "insert.php":
      show = "صفحه اصلی / تسک جدید";
      break;
    case "edit.php":
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
  var back = document.getElementById("profile_admin");
}

window.onclick = function (e) {
  if (!e.target.matches(".dropbtn")) {
    var myDropdown = document.getElementById("myDropdown");
    if (myDropdown.classList.contains("show")) {
      myDropdown.classList.remove("show");
    }
  }
};

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
