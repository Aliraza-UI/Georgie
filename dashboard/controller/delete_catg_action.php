<?php
require 'config.php';
require 'functions.php'; 
session_start();
if (!isset($_SESSION['uname'])) {
    header('location:logout.php');
} 
else if (isset($_SESSION['uname'])) {
    $uname = $_SESSION['uname'];
    if(isset($_POST['submit_menu'])){
    $catg_item = mysql_real_escape_string($_POST['catg']);
    $catg_id = mysql_real_escape_string($_POST['catg_id']);

    $sql_menu_del = "DELETE FROM catg where catg_id=$catg_id and catg_name='$catg_item'";
    //print_r($sql_menu_del);
    mysql_query($sql_menu_del);
   	
    header("location:../add_catg.php");

}

}