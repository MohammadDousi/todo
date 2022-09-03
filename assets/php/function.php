<?php
function Login()
{
    global $con;

    if (isset($_POST['mobile']) && isset($_POST['pass'])) {

        $mobile = $_POST['mobile'];
        $pass = $_POST['pass'];

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
                    'lastseen' => $row['Lastseen']
                ];
                if ($_SESSION) {

                    $query = 'UPDATE dbuser SET `Lastseen` = :lastseen WHERE Id = :id';
                    $query  = str_replace(";", "", $query);
                    $stmt = $con->prepare($query);
                    $stmt->bindparam(':lastseen', jdate('Y/n/j - H:i'), PDO::PARAM_STR);
                    $stmt->bindparam(':id', $_SESSION['UserOk']['id'], PDO::PARAM_INT);
                    $stmt->execute();

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
    $CountStartList = $con->query('SELECT COUNT(*) FROM dbtask Where `Status` = 3  OR `Status` = 9 OR `Status` = 10')->fetchColumn();
    echo $CountStartList;
}

function CountDoingList()
{
    global $con;
    $CountDoingList = $con->query('SELECT COUNT(*) FROM dbtask Where `Status` = 4 OR `Status` = 5 OR `Status` = 6 OR `Status` = 7')->fetchColumn();
    echo $CountDoingList;
}

function CountEndList()
{
    global $con;
    $CountEndList = $con->query('SELECT COUNT(*) FROM dbtask Where `Status` = 8 ')->fetchColumn();
    echo $CountEndList;
}

//////////////////////////////////
////     get list 
//////////////////////////////////

function StartList()
{

    global $con;

    $query = 'SELECT * FROM `dbtask` Where `Status` = 3 OR `Status` = 9 OR `Status` = 10 ORDER BY Id DESC';
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

    $query = 'SELECT * FROM `dbtask` Where `Status` = 4 OR `Status` = 5 OR `Status` = 6 OR `Status` = 7 ORDER BY Id DESC';
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

    $query = 'SELECT * FROM `dbtask` Where `Status` = 8 ORDER BY Id DESC';
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

    if (isset($_POST['TextTask']) && (isset($_POST['Level']))) {

        $text = $_POST['TextTask'];
        $description = $_POST['Description'];
        $level = $_POST['Level'];
        $tag = $_POST['SearchAddTag'];


        $query = 'INSERT INTO dbtask VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
        $query  = str_replace(";", "", $query);
        $stmt = $con->prepare($query);
        $stmt->execute([
            0, $text, $description, $_SESSION['UserOk']['id'], 0, 0, 3,
            $level, jdate('Y'), jdate('n'), jdate('j'), jdate('l'), jdate('H'), jdate('i'), $tag
        ]);

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

        $message ="" ;

        $status = $_POST['status'];
        $tag = $_POST['SearchAddTag'];

        switch ($status) {
            case 4:
            case 6:
                $query = 'UPDATE dbtask SET `Text` = :task , `Description` = :description ,
                                `Designer` = :designer , `Status` = :status , `Tag` = :tag  WHERE Id = :id';
                break;
            case 5:
            case 7:
                $query = 'UPDATE dbtask SET `Text` = :task , `Description` = :description ,
                                `Editor` = :editor , `Status` = :status , `Tag` = :tag  WHERE Id = :id';
                break;
            default:
                $query = 'UPDATE dbtask SET `Text` = :task , `Description` = :description ,
                             `Status` = :status , `Tag` = :tag  WHERE Id = :id';
                break;
        }

        $query  = str_replace(";", "", $query);
        $stmt = $con->prepare($query);
        $stmt->bindparam(':task', $text, PDO::PARAM_STR);
        $stmt->bindparam(':description', $Description, PDO::PARAM_STR);
        switch ($status) {
            case 4:
            case 6:
                $stmt->bindparam(':designer', $_SESSION['UserOk']['id'], PDO::PARAM_INT);
                break;
            case 5:
            case 7:
                $stmt->bindparam(':editor', $_SESSION['UserOk']['id'], PDO::PARAM_INT);
                break;
        }
        $stmt->bindparam(':status', $status, PDO::PARAM_STR);
        $stmt->bindparam(':tag', $tag, PDO::PARAM_STR);
        $stmt->bindparam(':id', $Id, PDO::PARAM_INT);
        $stmt->execute();

        $status = $stmt->execute();

        if ($status) {
            $errors = $stmt->errorInfo();

            $message = "ویرایش توسط " .$_SESSION['UserOk']['name']. " انجام شد." ;

                $query = 'INSERT INTO dbhistory VALUES (?,?,?,?,?)';
                $query  = str_replace(";", "", $query);
                $stmt = $con->prepare($query);
                $stmt->execute([
                    0, $_SESSION['UserOk']['id'], $Id, $message  , jdate('Y/n/j-H:i')]);

                if ($stmt) {
                    return true;
                } else {
                    return false;
                }

            // echo "UpdateData";
            return true;
        } else {
            $errors = $stmt->errorInfo();
            // echo "ErrorUpdateData";
            return false;
        }
    } else {
        // echo "ErrorGetData";
    }
}

function PerUser()
{

    global $con;
    $query = 'SELECT * FROM `dbpermission` Where `Iduser` = :id';
    $query  = str_replace(";", "", $query);
    $stmt = $con->prepare($query);
    $stmt->bindparam(':id', $_SESSION['UserOk']['id'], PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt) {
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    } else {
        echo "Error";
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

    if (isset($_POST['mobile'])) {

        if (preg_match("/^09[0-9]{9}$/", $_POST['mobile'])) {


            $File_image = $_FILES['Image']['name'];
            $Type = $_FILES['Image']['type'];
            $Size = $_FILES['Image']['size'];
            $Temp = $_FILES['Image']['tmp_name'];

            $upload_path = $_SERVER['DOCUMENT_ROOT'] . "/assets/image/pic_user/";

            if ($Size == 0 || null || "") {
                $File_image = $_SESSION['UserOk']['avator'];
            } else {
                $Type = str_replace("image/", ".", $Type);

                $File_image = jdate("Ymj") . substr(uniqid(), 1) . jdate("His") . $Type;
                $File_image = str_replace(' ', '-', $File_image);
                $path = $upload_path . $File_image;

                if ($File_image) {
                    if ($Type == ".jpg" || ".jpeg" || ".png") {
                        if (!file_exists($path)) {
                            if ($Size < 2000000) {
                                move_uploaded_file($Temp, $path);
                                $path = $upload_path . $_SESSION['UserOk']['avator'];
                                unlink($path);
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

            $current_pass = $_POST['current-pass'];
            $new_pass = $_POST['new-pass'];
            $new_pass_repet = $_POST['new-pass-repet'];

            if (($new_pass != "" || null) && ($new_pass_repet != "" || null) && ($current_pass != "" || null)) {

                if (($current_pass == $_SESSION['UserOk']['password'])) {

                    if ($new_pass == $new_pass_repet) {
                        $pass = $_POST['new-pass'];
                    } else {
                        echo "pass new no";
                        goto end;
                    }
                } else {
                    echo "currentpass no";
                    goto end;
                }
            } else {
                $pass = $_SESSION['UserOk']['password'];
            }


            $query = 'UPDATE dbuser SET `Password` = :pass , `Mobile` = :mobile , `Avator` = :avator WHERE Id = :id';
            $query  = str_replace(";", "", $query);
            $stmt = $con->prepare($query);
            $stmt->bindparam(':pass', $pass, PDO::PARAM_STR);
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
                        'lastseen' => $row['Lastseen']
                    ];
                }
                return true;
            } else {
                $errors = $stmt->errorInfo();
                echo "ErrorUpdateData";
                return false;
            }
            end:
        } else {
            echo "ErrorGetMobile";
        }
    } else {
        echo "ErrorGetData";
    }
}


//////////////////////////////////
////     new user
//////////////////////////////////

function NewUser()
{
    global $con;

    if (isset($_POST['name']) && isset($_POST['mobile']) && isset($_POST['pass']) && isset($_POST['tagname'])) {

        if (preg_match("/^09[0-9]{9}$/", $_POST['mobile'])) {

            $query = 'SELECT Mobile FROM `dbuser` WHERE `Mobile` = :mobile';
            $query  = str_replace(";", "", $query);
            $stmt = $con->prepare($query);
            $stmt->bindValue(':mobile', $_POST['mobile'], PDO::PARAM_INT);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$row) {

                $query = 'INSERT INTO dbuser VALUES (?,?,?,?,?,?,?,?,?)';
                $query  = str_replace(";", "", $query);
                $stmt = $con->prepare($query);
                $stmt->execute([0, 0, $_POST['name'], $_POST['pass'], $_POST['tagname'], $_POST['mobile'], 0, jdate('Y/n/j - H:i'), 0]);

                if ($stmt) {

                    $query = 'SELECT Id FROM `dbuser` WHERE `Mobile` = :mobile';
                    $query  = str_replace(";", "", $query);
                    $stmt = $con->prepare($query);
                    $stmt->bindValue(':mobile', $_POST['mobile'], PDO::PARAM_INT);
                    $stmt->execute();

                    $row = $stmt->fetch(PDO::FETCH_ASSOC);

                    if (isset($_POST['design'])) {
                        $design = 1;
                    } else {
                        $design = 0;
                    }

                    if (isset($_POST['videoedit'])) {
                        $videoedit = 1;
                    } else {
                        $videoedit = 0;
                    }

                    if (isset($_POST['adesign'])) {
                        $adesign = 1;
                    } else {
                        $adesign = 0;
                    }

                    if (isset($_POST['avideoedit'])) {
                        $avideoedit = 1;
                    } else {
                        $avideoedit = 0;
                    }

                    if (isset($_POST['end'])) {
                        $end = 1;
                    } else {
                        $end = 0;
                    }

                    if (isset($_POST['edit'])) {
                        $edit = 1;
                    } else {
                        $edit = 0;
                    }

                    if (isset($_POST['error'])) {
                        $error = 1;
                    } else {
                        $error = 0;
                    }

                    $query = 'INSERT INTO dbpermission VALUES (?,?,?,?,?,?,?,?,?,?)';
                    $query  = str_replace(";", "", $query);
                    $stmt = $con->prepare($query);
                    $stmt->execute([0, $row['Id'], 0, $design, $videoedit, $adesign, $avideoedit, $end, $edit, $error]);
                } else {
                    return false;
                }
            } else {
            }
        } else {
        }
    } else {
        echo "ErrorGetData";
    }
}


//////////////////////////////////
////     new user
//////////////////////////////////

function HistoryTask($idtask)
{

    global $con;

    $query = 'SELECT * FROM `dbhistory` Where `IdTask` = :id ORDER BY Id DESC';
    $query  = str_replace(";", "", $query);
    $stmt = $con->prepare($query);
    $stmt->bindparam(':id', $idtask, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt) {
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    } else {
        echo "Error";
    }
}


function GroupDigi_Mobile($mobile)
{

    $m1 = mb_substr($mobile, 0, 4);
    $m2 = mb_substr($mobile, 4, 3);
    $m3 = mb_substr($mobile, 7, 2);
    $m4 = mb_substr($mobile, 9, 2);

    return $m1 . " " . $m2 . " " . $m3 . " " . $m4;
}

function ReadMore($value)
{
    if (strlen($value) >= 50) {
        return mb_substr($value, 0, 48, 'utf-8') . '...';
    } else {
        return mb_substr($value, 0, 100, 'utf-8');
    }
}
