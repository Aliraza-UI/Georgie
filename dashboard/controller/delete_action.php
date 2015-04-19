<?php ob_start();
require 'config.php';
require 'functions.php'; 
session_start();
if (!isset($_SESSION['uname'])) {
    header('location:logout.php');
} 
else if (isset($_SESSION['uname'])) {
    $uname = $_SESSION['uname'];

    //getting post array values..//
    if(isset($_POST['delete'])){
    $pt_slno = $_POST['pt_slno'];
    
    //echo $pt_slno;
    //$pt_image =$_POST['pt_image'];

    $sql_del = "DELETE FROM posts WHERE sl_no LIKE('".mysql_real_escape_string($pt_slno)."')";
    $sel_result = mysql_query($sql_del);
  
    	header("location:../view_all.php?action=deleted");
    }
    else
    {
        header("location:../view_all.php?action=error");
    }
	
}
