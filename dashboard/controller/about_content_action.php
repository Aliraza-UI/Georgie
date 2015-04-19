<?php
require 'config.php';
require 'functions.php'; 
session_start();
if (!isset($_SESSION['uname'])) {
    header('location:logout.php');
} 
else if (isset($_SESSION['uname'])) {
    $uname = $_SESSION['uname'];
    if(isset($_POST['about_content'])){
        error_reporting(E_ERROR | E_PARSE);

        $cv_content = stripslashes(mysql_real_escape_string($_POST['cv_content']));
        
        
       $sql_ins = "UPDATE about_content SET `cv_content`='$cv_content' WHERE `id`='1'"; 
        
        mysql_query($sql_ins);
        	print_r($sql_ins);
            header("location:../edit_about.php?action=edited");

         
     }
    else{
        header("location:../edit_about.php?action=error");
    }
	
}