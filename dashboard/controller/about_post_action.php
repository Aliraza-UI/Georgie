<?php
require 'config.php';
require 'functions.php'; 
session_start();
if (!isset($_SESSION['uname'])) {
    header('location:logout.php');
} 
else if (isset($_SESSION['uname'])) {
    $uname = $_SESSION['uname'];
    if(isset($_POST['submit'])){
        error_reporting(E_ERROR | E_PARSE);

        $pt_ful_catg = $_POST['cv_section'];
        $str = explode(",",$pt_ful_catg);
        $pt_catg = $str[0];
        $pt_catg_id =$str[1];
        $sql_dup = "SELECT *FROM section where sec_id = '$pt_catg_id' ";
        
        $sql_dup_res=mysql_query($sql_dup);
        $resultt = mysql_fetch_array($sql_dup_res);
        $cv_year = mysql_real_escape_string($_POST['cv_year']);
        $cv_content= mysql_real_escape_string(stripslashes($_POST['cv_content']));
        $sec_id = $pt_catg_id;
        $sec_name = $pt_catg;

      
        $sql_ins = "INSERT INTO about(`sl_no`,`cv_content`,`sec_id`,`sec_name`,`cv_year`) VALUES ('','$cv_content','$sec_id','$sec_name','$cv_year')";
        
        	mysql_query($sql_ins);
        	//print_r($sql_ins);
            header("location:../edit_about.php?action=published");

         
     }
    else{
        header("location:../edit_about.php?action=error");
    }
	
}
