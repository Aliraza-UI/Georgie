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
    $menu_item = mysql_real_escape_string($_POST['menu']);
    $sql_menu_ins = "INSERT INTO menu (`m_id`, `menu_name`, `menu_catg`, `time`) VALUES ('', '$menu_item', '', CURRENT_TIMESTAMP)";
    mysql_query($sql_menu_ins);
   	//print_r($sql_menu_ins);
    header("location:../add_menu.php");

}

}