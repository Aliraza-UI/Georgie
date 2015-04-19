<?php
require 'config.php';
require 'functions.php'; 
session_start();
if (!isset($_SESSION['uname'])) {
    header('location:logout.php');
} 
else if (isset($_SESSION['uname'])) {
    $uname = $_SESSION['uname'];
    if(isset($_POST['submit_update'])){
    	$med_id = mysql_real_escape_string($_POST['med_id']);
        $mcatg_id = mysql_real_escape_string($_POST['catg_id']);
        $mcatg_name = mysql_real_escape_string($_POST['catg']);
        $img_title = mysql_real_escape_string($_POST['img_title']);
        $img_name = mysql_real_escape_string($_POST['img_name']);
        $img_medium = mysql_real_escape_string($_POST['img_medium']);
        $img_location = mysql_real_escape_string($_POST['img_location']);
        $img_credit = mysql_real_escape_string($_POST['img_credit']);
        $img_year = mysql_real_escape_string($_POST['img_year']);
        $sql_sel_img="SELECT *FROM media ORDER BY med_id DESC limit 1";
        $res_med=mysql_query($sql_sel_img);
        $res = mysql_fetch_array($res_med);
        if(!isset($res['width'])){
            $w = 250;
            $h = 250;
            goto end;
        }
        else{
            $w = $res['width'];
            $h = $res['height'];
        
            if(($w>149&&$w<199) && ($h>149&&$h<199)){
                $w=$w+100;
                $h=$h+100;
                goto end;
            }
            if(($w>248&&$w<298) && ($h>248&&$h<298)){
                $w=$w+100;
                $h=$h+100;
               goto end;

            }
            if(($w>347&&$w<397) && ($h>347&&$h<397)){
                $w=$w-200;
                $h=$h-200;
                goto end;
            }
        	
        }
       end:
        $width = $w;
        $height = $h;
        $sql_add_img = "UPDATE `media` SET `mcatg_id`='$mcatg_id',`mcatg_name`='$mcatg_name',`img_title`='$img_title',`img_name`='$img_name',`img_medium`='$img_medium',`img_location`='$img_location',`img_credit`='$img_credit',`img_year`='$img_year',`width`='$width',`height`='$height' WHERE `med_id`='$med_id'";
        mysql_query($sql_add_img);
        //print_r($sql_add_img);
        header("location:../add_imgdata.php?action=edited");
    }
    else{
        header("location:../add_imgdata.php?action=error");
    }
	
}
