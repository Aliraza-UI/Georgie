<?php
require 'config.php';
require 'functions.php'; 
session_start();
if (!isset($_SESSION['uname'])) {
    header('location:logout.php');
} 
else if (isset($_SESSION['uname'])) {
    $uname = $_SESSION['uname'];
    if(isset($_POST['delete'])){
    
    $sec_id = mysql_real_escape_string($_POST['sec_id']);
    $sl_no = mysql_real_escape_string($_POST['sl_no']);

    $sql_menu_del = "DELETE FROM about where sl_no='$sl_no'";
    //print_r($sql_menu_del);
    mysql_query($sql_menu_del);
   	
    header("location:../edit_about.php");

}

}