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
    $sec_name = mysql_real_escape_string($_POST['sec_name']);
    $sql_menu_ins = "INSERT INTO section (`sec_id`, `sec_name`) VALUES ('', '$sec_name')";
    mysql_query($sql_menu_ins);
    //print_r($sql_menu_ins);
    header("location:../add_about.php");

}

}