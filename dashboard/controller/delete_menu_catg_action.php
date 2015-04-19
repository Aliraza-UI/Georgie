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
    echo  $menu_item; 
    echo $menu_id;

    $sql_menu_del = "UPDATE menu SET `menu_catg`='',`catg_id`='' where m_id=$menu_id";
    //print_r($sql_menu_del);
    mysql_query($sql_menu_del);
    
    header("location:../menu_category.php");

}

}