<?php

session_start();

$mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));

$name = '';
$location = '';
$cname = '';
$age = '';
$breed = '';
$update = false;
$cat_id= 0;
$id=0;



if (isset($_POST['save'])) {
    $owner_id = $_POST['id'];
    $cat_id =$_POST['cat_id'];
    $cname = $_POST['cname'];
    $age = $_POST['age'];
    $breed = $_POST['breed'];



    $sql = "INSERT into table_cat(owner_id,cname,age,breed) values($owner_id,'$cname','$age','$breed')";

    if (!mysqli_query($mysqli, $sql)) {
        die();
    }

    $_SESSION['message'] = "record  been saved! ";
    $_SESSION['msg_type'] = "success";

    header("location: display.php");
}

if (isset($_GET['delete'])) {
    $cat_id = $_GET['delete'];
    $mysqli->query("DELETE  FROM table_cat WHERE cat_id=".$cat_id."") or die($mysqli->error);
    $_SESSION['message'] = "record has been delete!";
    $_SESSION['msg_type'] = "danger";

    header("location: display.php");
}



// sql to delete a record
// $sql = "DELETE  FROM table_cat WHERE cat_id=$id";

// if (!$mysqli->query($sql) === TRUE) {
//   echo "Error deleting record: " . $mysqli->error;
// } else {
//     echo "Record deleted successfully";
    
// }






if (isset($_GET['edit'])) {
    $cat_id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM table_cat where cat_id=".$cat_id."") or die($mysqli->error);
    if ($result->num_rows) {
        $row = $result->fetch_array();
        $cat_id = $row['cat_id'];
        $cname = $row['cname'];
        $age = $row['age'];
        $breed = $row['breed'];
    }
}

if (isset($_POST['update'])) {
    $cat_id = $_POST['id'];
    $cname = $_POST['cname'];
    $age = $_POST['age'];
    $breed = $_POST['breed'];

    $result = $mysqli->query("UPDATE table_cat SET cname = '$cname', age = '$age' , breed = '$breed' WHERE cat_id=$cat_id") or die($mysqli->error);

    $_SESSION['message'] = "Record has been updated";
    $_SESSION['msg_type'] = "warning";

    header("location: display.php");
}
