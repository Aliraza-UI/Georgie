<?php
require 'config.php';
require 'functions.php'; 
session_start();
if (!isset($_SESSION['uname'])) {
    header('location:logout.php');
} 
else if (isset($_SESSION['uname'])) {
    $uname = $_SESSION['uname'];
    if(isset($_POST['submit_event'])){

    $name = mysql_real_escape_string($_POST['event']);
    $place = mysql_real_escape_string($_POST['place']);
    $date = mysql_real_escape_string($_POST['tdate']);

    $sql_menu_ins = "INSERT INTO event (`sl_no`, `name`, `place`,`date`,`time`) VALUES ('', '$name', '$place','$date', CURRENT_TIMESTAMP)";
    mysql_query($sql_menu_ins);
   	header("location:../add_event.php");

}

}