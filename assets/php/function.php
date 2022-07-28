<?php
function Login()
{
    global $con;

    if (isset($_POST['Mobile']) && isset($_POST['Pass'])) {

        $mobile = $_POST['Mobile'];
        $pass = $_POST['Pass'];
        if (preg_match("/^09[0-9]{9}$/", $mobile)) {

            $query = 'SELECT * FROM dbuser WHERE Mobile = :mobile AND `Password` = :pass LIMIT 1';
            $query = str_replace(";", "", $query);
            $stmt = $con->prepare($query);
            $stmt->bindParam(':mobile', $mobile, PDO::PARAM_STR);
            $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                $_SESSION['UserOk'] = [
                    'id' => $row['Id'], 'name' => $row['Name'],
                    'password' => $row['Password'], 'tagname' => $row['TagName'],
                    'mobile' => $row['Mobile'], 'avator' => $row['Avator'],
                    'lastseen' => $row['Lastseen'], 'job' => $row['Job']
                ];
                if ($_SESSION) {
                    header('location:index.php');
                }
            } else {
                header('location:login.php?login=error');
            }
        } else {
            header('location:login.php?login=e_mobile_num');
        }
    } else {
        header('location:login.php?login=e_mobile_send');
    }
}

function logout()
{
    session_start();
    session_destroy();
    unset($_SESSION['UserOk']);
    header('Location:login.php');
}

//////////////////////////////////
////     count list 
//////////////////////////////////

function CountStartList()
{
    global $con;
    $CountStartList = $con->query('SELECT COUNT(*) FROM dbtask Where `Status` = "create"  OR `Status` = "edit" OR `Status` = "error"')->fetchColumn();
    echo $CountStartList;
}

function CountDoingList()
{
    global $con;
    $CountDoingList = $con->query('SELECT COUNT(*) FROM dbtask Where `Status` = "design" OR `Status` = "videoedit"')->fetchColumn();
    echo $CountDoingList;
}

function CountEndList()
{
    global $con;
    $CountEndList = $con->query('SELECT COUNT(*) FROM dbtask Where `Status` = "accept"')->fetchColumn();
    echo $CountEndList;
}

//////////////////////////////////
////     get list 
//////////////////////////////////

function StartList()
{

    global $con;

    $query = 'SELECT * FROM `dbtask` Where `Status` = "create"  OR `Status` = "edit" OR `Status` = "error" ORDER BY Id DESC';
    $query  = str_replace(";", "", $query);
    $stmt = $con->prepare($query);
    $stmt->execute();

    if ($stmt) {
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    } else {
        echo "Error";
    }
}

function DoingList()
{

    global $con;

    $query = 'SELECT * FROM `dbtask` Where `Status` = "design" OR `Status` = "videoedit" ORDER BY Id DESC';
    $query  = str_replace(";", "", $query);
    $stmt = $con->prepare($query);
    $stmt->execute();

    if ($stmt) {
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    } else {
        echo "Error";
    }
}

function EndList()
{

    global $con;

    $query = 'SELECT * FROM `dbtask` Where `Status` = "accept" ORDER BY Id DESC';
    $query  = str_replace(";", "", $query);
    $stmt = $con->prepare($query);
    $stmt->execute();

    if ($stmt) {
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    } else {
        echo "Error";
    }
}

function AddTask()
{

    global $con;

    if (isset($_POST['TextTask']) && (isset($_POST['usual']) || isset($_POST['force']) || isset($_POST['vforce']))) {

        $text = $_POST['TextTask'];
        $description = $_POST['Description'];
        if (isset($_POST['usual'])) {
            $level = 0;
        } else if (isset($_POST['force'])) {
            $level = 1;
        } else if (isset($_POST['vforce'])) {
            $level = 2;
        }

        $tag = $_POST['SearchAddTag'];

        $Date = jdate('Y/n/j - H:i');

        $query = 'INSERT INTO dbtask VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
        $query  = str_replace(";", "", $query);
        $stmt = $con->prepare($query);
        $stmt->execute([0, $text, $description, $_SESSION['UserOk']['id'], 0, 0, "create", $level, jdate('Y'), jdate('n'), jdate('j'), jdate('l'), jdate('H'), jdate('i'), $tag]);

        if ($stmt) {
            return true;
        } else {
            return false;
        }
    } else {
        echo "ErrorGetData";
    }
}

function GetItemSingle()
{
    global $con;

    if (isset($_GET['Id'])) {

        $Id = $_GET['Id'];
        $query = 'SELECT * FROM `dbtask` WHERE Id = :Id';
        $query  = str_replace(";", "", $query);
        $stmt = $con->prepare($query);
        $stmt->bindValue(':Id', $Id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt) {
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } else {
            echo "Error";
        }
    } else {
        echo "ErrorGetId";
    }
}

function EditTask()
{

    global $con;

    if (isset($_POST['TextTask']) && isset($_POST['status'])) {

        $Id = $_GET['Id'];
        $text = $_POST['TextTask'];
        $Description = $_POST['Description'];
        // if (isset($_POST['usual'])) {
        //     $level = 0;
        // } else if (isset($_POST['force'])) {
        //     $level = 1;
        // } else if (isset($_POST['vforce'])) {
        //     $level = 2;
        // }

        $status = $_POST['status'];
        $tag = $_POST['SearchAddTag'];


        $query = 'UPDATE dbtask SET `Text` = :task , `Description` = :description , `Status` = :status , `Tag` = :tag  WHERE Id = :id';
        $query  = str_replace(";", "", $query);
        $stmt = $con->prepare($query);
        $stmt->bindparam(':task', $text, PDO::PARAM_STR);
        $stmt->bindparam(':description', $Description, PDO::PARAM_STR);
        $stmt->bindparam(':status', $status, PDO::PARAM_STR);
        // $stmt->bindparam(':level', $level, PDO::PARAM_INT);
        $stmt->bindparam(':tag', $tag, PDO::PARAM_STR);
        $stmt->bindparam(':id', $Id, PDO::PARAM_INT);
        $stmt->execute();

        $status = $stmt->execute();

        if ($status) {
            echo "UpdateData";
            return true;
        } else {
            $errors = $stmt->errorInfo();
            echo "ErrorUpdateData";
            return false;
        }
    } else {
        echo "ErrorGetData";
    }
}

function DelTask()
{

    global $con;

    if (isset($_GET['Id'])) {

        $Id = $_GET['Id'];

        $query = 'DELETE FROM dbtask where Id = :id';
        $query  = str_replace(";", "", $query);
        $stmt = $con->prepare($query);
        $stmt->bindparam(':id', $Id, PDO::PARAM_INT);
        $status = $stmt->execute();

        if ($status) {
            echo "DeleteTask";
            return true;
        } else {
            $errors = $stmt->errorInfo();
            echo "ErrorDeleteTask";
            return false;
        }
    }
}

function SelectTag()
{
    global $con;

    $query = 'SELECT `TagName` FROM `dbuser`';
    $query = str_replace(";", "", $query);
    $stmt = $con->prepare($query);
    $stmt->execute();

    // if ($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
    //     echo json_encode($result, JSON_UNESCAPED_UNICODE);
    // } else {
    //     echo "ErrorGetData";
    // }

    if ($stmt) {
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    } else {
        echo "Error";
    }
}

function GetUser($Id)
{
    global $con;
    if ($Id) {

        $query = 'SELECT * FROM `dbuser` WHERE Id = :Id';
        $query  = str_replace(";", "", $query);
        $stmt = $con->prepare($query);
        $stmt->bindValue(':Id', $Id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt) {
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } else {
            echo "Error";
        }
    } else {
        echo "ErrorGetId";
    }
}


function ProfileEdit()
{

    global $con;

    if (isset($_POST['name']) && isset($_POST['pass']) && isset($_POST['mobile'])) {

        $File_image = $_FILES['Image']['name'];
        $Type = $_FILES['Image']['type'];
        $Size = $_FILES['Image']['size'];
        $Temp = $_FILES['Image']['tmp_name'];


        if ($Size == 0 || null || "") {
            $File_image = "defult_profile_user.jpg";
        } else {
            $Type = str_replace("image/", ".", $Type);

            $File_image = jdate("Ymj") . substr(uniqid(), 1) . jdate("His") . $Type;
            $File_image = str_replace(' ', '-', $File_image);
            $path = $_SERVER['DOCUMENT_ROOT'] . "./assets/image/pic_user/" . $File_image;

            if ($File_image) {
                if ($Type == ".jpg" || ".jpeg" || ".png") {
                    if (!file_exists($path)) {
                        if ($Size < 1000000) {
                            move_uploaded_file($Temp, $path);
                        } else {
                            echo "image Size is up !";
                        }
                    } else {
                        echo "image name is already. change name image";
                    }
                } else {
                    echo "Type is not support.";
                }
            } else {
                echo "name is empty.";
            }
        }

        $query = 'UPDATE dbuser SET `Name` = :name , `Password` = :pass , `Mobile` = :mobile , `Avator` = :avator WHERE Id = :id';
        $query  = str_replace(";", "", $query);
        $stmt = $con->prepare($query);
        $stmt->bindparam(':name', $_POST['name'], PDO::PARAM_STR);
        $stmt->bindparam(':pass', $_POST['pass'], PDO::PARAM_STR);
        $stmt->bindparam(':mobile', $_POST['mobile'], PDO::PARAM_STR);
        $stmt->bindparam(':avator', $File_image, PDO::PARAM_STR);
        $stmt->bindparam(':id', $_SESSION['UserOk']['id'], PDO::PARAM_INT);
        $stmt->execute();

        $status = $stmt->execute();

        if ($status) {

            $query = 'SELECT * FROM dbuser WHERE Id = :id LIMIT 1';
            $query = str_replace(";", "", $query);
            $stmt = $con->prepare($query);
            $stmt->bindParam(':id', $_SESSION['UserOk']['id'], PDO::PARAM_STR);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                $_SESSION['UserOk'] = [
                    'id' => $row['Id'], 'name' => $row['Name'],
                    'password' => $row['Password'], 'tagname' => $row['TagName'],
                    'mobile' => $row['Mobile'], 'avator' => $row['Avator'],
                    'lastseen' => $row['Lastseen'], 'job' => $row['Job']
                ];
            }
            return true;
        } else {
            $errors = $stmt->errorInfo();
            echo "ErrorUpdateData";
            return false;
        }

    } else {
        echo "ErrorGetData";
    }
}
