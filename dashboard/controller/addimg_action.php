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
        $pt_catg = mysql_real_escape_string($_POST['catg']);
        $str = explode(",",$pt_catg);
        $pt_catg = $str[0];
        $pt_catg_id =$str[1];

        $sql_sel_oimg = "SELECT pt_image from posts where pt_catg_id ='$pt_catg_id' ";
        $res =mysql_query($sql_sel_oimg);
        $rowe=mysql_fetch_array($res);
        $old_img = $rowe['pt_image'];
       
        
        $valid_formats = array("jpg", "png", "gif", "zip", "bmp");
        $max_file_size = 1024*1000; //10000 kb
        $path = "../pt-image/"; // Upload directory
        $pathth = "../pt-image-th/"; // Upload directory
        $count = 0;
        $pt_image="";
        if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
            // Loop $_FILES to exeicute all files
            foreach ( $_FILES['files']['name'] as $f => $name) { 
                $t=time();    
                $pt_image.=$t.$name.",";
                if ($_FILES['files']['error'][$f] == 4) {
                    continue; // Skip file if any error found
                }          
                if ($_FILES['files']['error'][$f] == 0) {              
                    if ($_FILES['files']['size'][$f] > $max_file_size) {
                        $message[] = "$name is too large!.";
                        continue; // Skip large files
                    }
                    elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
                        $message[] = "$name is not a valid format";
                        continue; // Skip invalid file formats
                    }
                    else{ // No error found! Move uploaded files 
                        if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$t.$name))
                        $count++; // Number of successfully uploaded file
                    }
                }
            }

            foreach ( $_FILES['filesth']['name'] as $f => $name) { 
                $t=time();    
                $pt_image.=$t.$name.",";
                if ($_FILES['filesth']['error'][$f] == 4) {
                    continue; // Skip file if any error found
                }          
                if ($_FILES['filesth']['error'][$f] == 0) {              
                    if ($_FILES['filesth']['size'][$f] > $max_file_size) {
                        $message[] = "$name is too large!.";
                        continue; // Skip large files
                    }
                    elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
                        $message[] = "$name is not a valid format";
                        continue; // Skip invalid file formats
                    }
                    else{ // No error found! Move uploaded files 
                        if(move_uploaded_file($_FILES["filesth"]["tmp_name"][$f], $pathth.$t.$name))
                        $count++; // Number of successfully uploaded file
                    }
                }
            }
        }

        //$str= rtrim($pt_image, ",");

        $up_img =$pt_image.$old_img;
        $id = $pt_catg.",".$pt_catg_id;

        $sql_upd = "UPDATE posts SET `pt_image`='$up_img', `pt_datetime`=CURRENT_TIMESTAMP where `pt_catg_id` = '$pt_catg_id'";
        	mysql_query($sql_upd);
        	//print_r($sql_upd);

            header("location:../add_images.php?action=added&catg=$id");
        }
    else{
        header("location:../add_images.php?action=error");
    }
	
}
