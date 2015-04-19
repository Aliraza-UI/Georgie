<?php
require 'config.php';
require 'functions.php'; 
session_start();
if (!isset($_SESSION['uname'])) {
    header('location:logout.php');
} 
else if (isset($_SESSION['uname'])) {
    $uname = $_SESSION['uname'];
    if(isset($_POST['submit_contact'])){
    $content_first = mysql_real_escape_string($_POST['content_first']);
    $content_second = mysql_real_escape_string($_POST['content_second']);
//echo  $content_first;
//echo  $content_second;

    $sql_menu_upd = "UPDATE contact SET `content_first` = '$content_first', `content_second` = '$content_second'";
    //print_r($sql_menu_upd);
    mysql_query($sql_menu_upd);
   	//print_r($sql_menu_ins);
    header("location:../add_contact.php?action=success");

}

}