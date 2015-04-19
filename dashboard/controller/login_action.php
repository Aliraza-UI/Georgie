<?php
require 'config.php';
require 'functions.php'; 

if(isset($_POST['login_submit'])){
	$user_name =mysql_real_escape_string($_POST['user_name']);
	$user_password =sha1(mysql_real_escape_string($_POST['user_password']));
	$sql_sel = "SELECT *FROM account where `user_name` ='$user_name' AND `user_password`='$user_password' ";
	$result = mysql_query($sql_sel) or die("Cant execute Query !!!".mysql_error());
	$count = mysql_num_rows($result);
		if($count=='1'){
		session_start();
		$_SESSION['uname'] = $user_name;
			header("location:../dashboard.php?page=dashboard");
		}
		else{
			header("location:../login.php?action=error");
					 
		}
	
}