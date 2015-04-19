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
    $menu_item = mysql_real_escape_string($_POST['menu']);
    $menu_id = mysql_real_escape_string($_POST['menu_id']);

    $sql_menu_del = "DELETE FROM menu where m_id=$menu_id and menu_name='$menu_item'";
    //print_r($sql_menu_del);
    mysql_query($sql_menu_del);
   	
    header("location:../add_menu.php");

}

}