<?php

session_start();

$mysqli = new mysqli('localhost', 'root', '','crud') or die(mysqli_error($mysqli));

$name = '';
$location = '';
$cname = '';
$age = '';
$update = false;
$id=0;

if(isset($_POST['save'])){
    $name = $_POST['name'];
    $location = $_POST['location'];
    $cname = $_POST['cname'];
    $age = $_POST['age'];
     
    $mysqli->query("INSERT into data(name,location)  values('$name','$location')") or die($mysqli->error);
    $mysqli->query("INSERT into table_cat(owner_id,cname,age) values('data id','$cname','$age')") or die($mysqli->error);
    
    $_SESSION['message'] = "record  been saved! ";
    $_SESSION['msg_type'] = "success";

    header("location: index.php");

}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM table_cat WHERE id=$id") or die($mysqli->error());
    $mysqli->query("DELETE FROM data  WHERE id=$id") or die($mysqli->error());
    $_SESSION['message'] = "record has been delete!";
    $_SESSION['msg_type'] = "danger";

    header("location: index.php");

}

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT name,location,cname,age FROM data d join table_cat tc on d.id=tc.id ") or die($mysqli->error);
    if ($result->num_rows){
        $row = $result->fetch_array();
        $id = $row['id'];
        $name = $row['name'];
        $location = $row['location']; 
        $cname = $row['cname'];
        $age = $row['age'];
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $location = $_POST['location'];
    $cname = $_POST['cname'];
    $age = $_POST['age'];
  
    $result = $mysqli->query("UPDATE data SET name = '$name', location = '$location'  WHERE id = $id") or die($mysqli->error);
    $result1 = $mysqli-> query("UPDATE table_cat SET cname = '$cname', age = '$age' WHERE id=$id") or die($mysqli->error);
  
    $_SESSION['message'] = "Record has been updated";
    $_SESSION['msg_type'] = "warning";
  
    header("location: index.php");
  }

?>