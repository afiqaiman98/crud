<?php
    include_once 'header.php';
    include_once 'process.php';

 
    // if (isset($_POST['save'])) {
    //     $sname =$_POST['id'];
    //     $semail = $_POST['cname'];
    //     $suid = $_POST['age'];
    //     $spwd = $_POST['breed'];
    
    
    
    //     $sql = "INSERT into users(userName,userEmail,userUid,userPwd) values('$sname','$semai','$suid','$spwd')";
    
    //     if (!mysqli_query($mysqli, $sql)) {
    //         die();
    //     }
    
    
    //     header("location: login.php?successRegister=true");
    // }



$sql = "INSERT into users(userName,userEmail,userUid,userPwd) VALUES ('$_POST[sname]','$_POST[semail]','$_POST[suid]','$_POST[spwd]')";

if(!mysqli_query($mysqli,$sql)){
	die();
}

header("Location: login.php?successRegister=true");

?>