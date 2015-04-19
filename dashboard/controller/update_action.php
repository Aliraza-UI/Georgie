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
        //error_reporting(E_ERROR | E_PARSE);
        $pt_catg = mysql_real_escape_string($_POST['pt_catgo']);
        $pt_catg_name = mysql_real_escape_string($_POST['pt_catg_n']);
        $pt_title = mysql_real_escape_string($_POST['pt_title']);
        $pt_author = mysql_real_escape_string($_POST['pt_author']);
        $pt_content_all = mysql_real_escape_string($_POST['pt_content_all']);
        $pt_video = mysql_real_escape_string($_POST['pt_video']);
        $pt_sound = mysql_real_escape_string($_POST['pt_sound']);
        $sql_upd = "UPDATE posts SET `pt_catg`='$pt_catg_name',`pt_catg_id`='$pt_catg', `pt_title`='$pt_title', `pt_author`='$pt_author',`pt_content_all`='$pt_content_all',`pt_video`='$pt_video',`pt_sound`='$pt_sound', `pt_datetime`=CURRENT_TIMESTAMP where `pt_catg_id` = '$pt_catg'";
        	mysql_query($sql_upd);
        	//print_r($sql_upd);
            header("location:../post_update.php?action=updated");
        }
    else{
        header("location:../post_update.php?action=error");
    }
	
}
