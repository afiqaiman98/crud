<?php
include "process.php";
session_start();

// try from code merang bagi
$suid = $spwd = "";
$suid = $_POST["suid"];
$spwd = $_POST["spwd"];

//cri user dlm db
	$sqlUserLogin = "select * from users where userUid = '$suid' and user_password = '$spwd'";
	$res = mysqli_query($mysqli,$sqlUserLogin);

	if($res == 1){
		$_SESSION['userUid'] = $suid;
		header("location:index.php?successLogin=true");
		}

	//redirect to login
	else {
	header("location:login.php?msg=failed");
	die;
	}

