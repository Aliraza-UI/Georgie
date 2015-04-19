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

    $menu_item_ = mysql_real_escape_string($_POST['menu']);
    $menu_id = explode(",", $menu_item_);
    $menu_item = mysql_real_escape_string($menu_id[0]);
    $menu_id =mysql_real_escape_string($menu_id[1]);
    $count = 0;
    
    $categories='';
   	if(!empty($_POST['check_list'])) {
    	foreach($_POST['check_list'] as $check) {

            $categories.= $check.','; 
            $count = $count+1;
    	}
	}
	$d=2*$count;
	//echo $categories;
	$catg = explode(",", $categories);
	$c=0;
	$r_catg='';
	$r_catg_id='';

	while($d>$c){
		
		if($c%2!=0){
			$r_catg_id.=htmlspecialchars($catg[$c]).' ';
		}else
		{
			$r_catg.=$catg[$c].' ';
		}
		$c=$c+1;
		
	}

	//echo $menu_item.'===='.$menu_id."====".$r_catg."----".$r_catg_id;
	$menu_catg = htmlspecialchars($r_catg);
	$catg_id  = htmlspecialchars($r_catg_id);

	echo $menu_catg;
	$sql_update_menu = "UPDATE `menu` set `catg_id`='$catg_id' where `m_id`='$menu_id'";
	print_r($sql_update_menu);
	mysql_query($sql_update_menu);
	
	header("location:../menu_category.php");
}

	


}