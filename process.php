<?php

session_start();

$mysqli = new mysqli('localhost', 'root', '','crud') or die(mysqli_error($mysqli));

$name = '';
$cname = '';
$location = '';
$update = false;
$id=0;

if(isset($_POST['save'])){
    $name = $_POST['name'];
    $cname = $_POST['cname'];
    $location = $_POST['location'];
    
    $mysqli->query("INSERT into data(name,catname,location) values('$name','$cname','$location')") or die($mysqli->error);

    $_SESSION['message'] = "record has been saved!";
    $_SESSION['msg_type'] = "success";

    header("location: index.php");

}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] = "record has been delete!";
    $_SESSION['msg_type'] = "danger";

    header("location: index.php");

}

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM data where id=$id") or die($mysqli->error());
    if ($result->num_rows){
        $row = $result->fetch_array();
        $name = $row['name'];
        $cname = $row['cname'];
        $location = $row['location'];
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $cname = $_POST['cname'];
    $location = $_POST['location'];
  
    $result = $mysqli->query("UPDATE data SET name = '$name', catname = '$cname', location = '$location'  WHERE id = $id") or die($mysqli->error);
  
    $_SESSION['message'] = "Record has been updated";
    $_SESSION['msg_type'] = "warning";
  
    header("location: index.php");
  }

?>