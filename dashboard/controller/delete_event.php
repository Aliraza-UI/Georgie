<?php ob_start();
require 'config.php';
require 'functions.php'; 
session_start();
if (!isset($_SESSION['uname'])) {
    header('location:logout.php');
} 
else if (isset($_SESSION['uname'])) {
    $uname = $_SESSION['uname'];
    if(isset($_POST['de_event'])){

    $sl_no = mysql_real_escape_string($_POST['ev_slno']);
    //echo $sl_no;
    $sql_menu_ins = "DELETE FROM event where sl_no=$sl_no";
    
    mysql_query($sql_menu_ins);
    header("location:../add_event.php");

}

}