<?php
require 'config.php';
require 'functions.php'; 
session_start();
if (!isset($_SESSION['uname'])) {
    header('location:logout.php');
} 
else if (isset($_SESSION['uname'])) {
    $uname = $_SESSION['uname'];
    if(isset($_POST['edit_event'])){
    $sl_no = mysql_real_escape_string($_POST['ev_slno']);
    $name = mysql_real_escape_string($_POST['event']);
    $place = mysql_real_escape_string($_POST['place']);
    $date = mysql_real_escape_string($_POST['tdate']);

    $sql_menu_ins = "UPDATE event SET `name`='$name',`place`='$place',`date`='$date' where `sl_no`='$sl_no'";
    mysql_query($sql_menu_ins);
   	header("location:../add_event.php");

}

}