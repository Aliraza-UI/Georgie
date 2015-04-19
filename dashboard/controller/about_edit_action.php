<?php
require 'config.php';
require 'functions.php'; 
session_start();
if (!isset($_SESSION['uname'])) {
    header('location:logout.php');
} 
else if (isset($_SESSION['uname'])) {
    $uname = $_SESSION['uname'];
    if(isset($_POST['edit'])){
        error_reporting(E_ERROR | E_PARSE);

        $cv_section = $_POST['cv_section'];
        $cv_year = stripslashes(mysql_real_escape_string($_POST['cv_year']));
        $cv_content= mysql_real_escape_string(stripslashes($_POST['cv_content']));
        $sec_id = stripslashes(mysql_real_escape_string($_POST['sec_id']));
        $sl_no = stripslashes(mysql_real_escape_string($_POST['sl_no']));
        
        $sql_ins = "UPDATE about SET `cv_content`='$cv_content',`sec_name`=' $cv_section',`cv_year`='$cv_year' where `sl_no`='$sl_no' AND `sec_id` ='$sec_id'"; 
        
        mysql_query($sql_ins);
        	//print_r($sql_ins);
            header("location:../edit_about.php?action=edited");

         
     }
    else{
        header("location:../edit_about.php?action=error");
    }
	
}