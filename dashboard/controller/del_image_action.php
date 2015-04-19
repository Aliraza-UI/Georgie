<?php
require 'config.php';
require 'functions.php'; 
session_start();
if (!isset($_SESSION['uname'])) {
    header('location:logout.php');
} 
else if (isset($_SESSION['uname'])) {
    $uname = $_SESSION['uname'];
    if(isset($_POST['submit_del'])){
    $catg_item = mysql_real_escape_string($_POST['catg']);
    $catg_id = mysql_real_escape_string($_POST['catg_id']);
    $img_name = mysql_real_escape_string($_POST['img_name']);
    $sql_sel = "SELECT pt_image FROM posts where pt_catg_id=$catg_id";
    $exec_sel = mysql_query($sql_sel);
    $res = mysql_fetch_array($exec_sel);
    $img = $res['pt_image'];
    $str = explode(",",$img);
    $c=count($str)-1;
    $n=0;
    $up_img='';
    $ups_img='';
    
    while($c>$n){
        $r_img = $str[$n];
        if($r_img==$img_name){
            $ups_img.='';
        }
        else if($r_img!=$img_name)
        $up_img.=$str[$n].',';
        $n=$n+1;
    }

    $sql_img_del = "UPDATE posts SET pt_image = '$up_img' where pt_catg_id=$catg_id";
    //print_r($sql_menu_del);
    mysql_query($sql_img_del);

    $sql_med_upd = "DELETE FROM media where mcatg_id =$catg_id AND img_name='$img_name'"; 
    mysql_query($sql_med_upd);
	
    header("location:../add_imgdata.php");

}

}