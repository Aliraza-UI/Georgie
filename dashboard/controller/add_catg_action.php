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
    $catg_item = htmlspecialchars(mysql_real_escape_string($_POST['catg']));
    echo $catg_item;
    $sql_menu_ins = "INSERT INTO catg (`catg_id`, `catg_name`, `menu`, `time`) VALUES ('', '$catg_item', '', CURRENT_TIMESTAMP)";
    mysql_query($sql_menu_ins);
   	
    header("location:../add_catg.php");

}

}