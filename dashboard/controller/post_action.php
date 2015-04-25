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
        error_reporting(E_ERROR | E_PARSE);
        $pt_ful_catg =  htmlspecialchars(mysql_real_escape_string($_POST['pt_catg']));
        $str = explode(",",$pt_ful_catg);
        $pt_catg = $str[0];
        $pt_catg_id =$str[1];
        $sql_dup = "SELECT *FROM posts where pt_catg_id=$pt_catg_id";
        $sql_dup_res=mysql_query($sql_dup);
        $resultt = mysql_fetch_array($sql_dup_res);
        if(isset( $resultt['pt_catg_id'])==$pt_catg_id){
            header("location:../add_post.php?action=duplicate");
        }
        $pt_title = htmlspecialchars(mysql_real_escape_string($_POST['pt_title']));
        $pt_author = htmlspecialchars(mysql_real_escape_string($_POST['pt_author']));
        $pt_content_all = $_POST['pt_content_all'];
        $pt_video = $_POST['pt_video'];
        $pt_sound = $_POST['pt_sound'];
        $valid_formats = array("jpg", "png", "gif", "zip", "bmp");
        $max_file_size = 1024*1000; //10000 kb
        $path = "../pt-image/"; // Upload directory
        $path_th = "../pt-image-th/"; // Upload directory
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
                        // print_r($f);
                        // print_r($name);
                        if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$t.$name))
                        $count++; // Number of successfully uploaded file

                    }
                }
            }

            foreach ( $_FILES['files-th']['name'] as $f => $name) { 
                $t=time();    
                $pt_image.=$t.$name.",";
                if ($_FILES['files-th']['error'][$f] == 4) {
                    continue; // Skip file if any error found
                }          
                if ($_FILES['files-th']['error'][$f] == 0) {              
                    if ($_FILES['files-th']['size'][$f] > $max_file_size) {
                        $message[] = "$name is too large!.";
                        continue; // Skip large files
                    }
                    elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
                        $message[] = "$name is not a valid format";
                        continue; // Skip invalid file formats
                    }
                    else{ // No error found! Move uploaded files 
                        // print_r($f);
                        // print_r($name);
                        
                        if(move_uploaded_file($_FILES["files-th"]["tmp_name"][$f], $path_th.$t.$name))
                        $count++; // Number of successfully uploaded file
                    }
                }
            }

        }
        $sql_ins = "INSERT INTO posts(`sl_no`, `pt_catg`,`pt_catg_id`, `pt_title`, `pt_author`,`pt_content_all`, `pt_image`, `pt_video`,`pt_sound`, `pt_datetime`) VALUES (NULL, '$pt_catg','$pt_catg_id', '$pt_title', '$pt_author', '$pt_content_all', '$pt_image', '$pt_video','$pt_sound',CURRENT_TIMESTAMP)";
        	mysql_query($sql_ins);
        	//print_r($sql_ins);
            header("location:../add_post.php?action=published");

         }
    else{
        header("location:../add_post.php?action=error");
    }
	
}