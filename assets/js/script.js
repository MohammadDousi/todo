function GetTagName(tag) {
    temp = document.getElementById("SearchTagName").value;
    result = temp.replace(tag, "");
    document.getElementById("SearchTagName").value = result +""+ tag;
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


/////////////////////////////////////
////// index page 
//////////////////////////////////////

function Fun_profile_admin() {
    document.getElementById("myDropdown").classList.toggle("show");
    var back = document.getElementById("profile_admin");
}

window.onclick = function(e) {
    if (!e.target.matches('.dropbtn')) {
        var myDropdown = document.getElementById("myDropdown");
        if (myDropdown.classList.contains('show')) {
            myDropdown.classList.remove('show');
        }
    }
}

/////////////////////////////////////
////// select radio insert and edit page
//////////////////////////////////////


function usual() {
    document.getElementById("radio_usual").checked = true;
    var hid = document.getElementById("usual");
    hid.style.backgroundColor = "#cfd8dc";
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
    hid.style.backgroundColor = "#cfd8dc";
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
    hid.style.backgroundColor = "#cfd8dc";
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
