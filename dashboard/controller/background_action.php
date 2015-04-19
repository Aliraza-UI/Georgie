<?php
require 'config.php';
require 'functions.php'; 
session_start();
if (!isset($_SESSION['uname'])) {
    header('location:logout.php');
} 
else if (isset($_SESSION['uname'])) {
    $uname = $_SESSION['uname'];
	//$bg_caption = Fix($_POST['bg_caption']);
	$bg_caption=mysql_real_escape_string($_POST['bg_caption']); 
	//$bg_photo = Fix($_POST['bg_photo']);
        $target_dir = "../bg-image/";
        $bg_photo = basename($_FILES["bg_photo"]["name"]);
        $target_file = $target_dir . basename($_FILES["bg_photo"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["bg_photo"]["tmp_name"]);
            if($check !== false) {
                //echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                //echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
       
        if ($_FILES["bg_photo"]["size"] > 1000000) {
            header("location:../background.php?action=size_error");
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" && $imageFileType != "JPEG" ) {
            //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            header("location:../background.php?action=type_error");
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            //echo "Sorry, your file was not uploaded.";
            header("location:../background.php?action=upload_error");
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["bg_photo"]["tmp_name"], $target_file)) {

                $sql_ins = "INSERT INTO background(`sl_no`, `bg_caption`, `bg_photo`, `bg_datetime`) VALUES (NULL, '$bg_caption', '$bg_photo', CURRENT_TIMESTAMP);";
                 mysql_query($sql_ins);
                 header("location:../background.php?action=updated");

                //echo "The file ". basename( $_FILES["bg_photo"]["name"]). " has been uploaded.";
            } 
        }

    	
	
	
		
	
}


