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