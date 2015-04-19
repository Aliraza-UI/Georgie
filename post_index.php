<?php ob_start(); 
if(isset($_GET['catg'])){
  $menu_c = ucfirst(trim($_GET['catg']));
  }
 $title = "$menu_c"." - Project - Georgie Mattingley - Visual Artist Australia";
 include 'page_header.php'; 
 require 'dashboard/controller/config.php';
 require 'dashboard/controller/functions.php';
  error_reporting(E_ERROR | E_PARSE);
  if(isset($_GET['menu'])&&($_GET['menu_id'])&&($_GET['catg'])&&($_GET['catg_id'])){
  $menu = trim($_GET['menu']);
  $menu_id = trim($_GET['menu_id']);
  $catg = trim($_GET['catg']);
  $catg_id = trim($_GET['catg_id']," ");
  $sql_sel_g = "SELECT *FROM posts where pt_catg_id='$catg_id'";
  $result = mysql_query($sql_sel_g);
  $vm =mysql_num_rows($result);
  if($vm==0){
    header("location:404.php");
  }
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <ul class="nav nav-pills nav-stacked">
        <li style="margin-top:20px;text-transform:uppercase;font-size:30px;font-family:tradegothicbold;line-height:23px;position:fixed;margin-left:5px;"><a href="index.php"style="font-size:30px;">GEORGIE<br style="line-height: 0.8;">MATTINGLEY</a></li>
      </ul>
    </div>
  </div>
</div><br>
<div class="container-fluid" onclick="nextdiv()">
  <div class="row" style="margin-left:5px;margin-right:15px;">
  	<div class="col-md-3" style="font-family:Arial;position:fixed;line-height:1px;text-align:left;margin-top:94px;text-transform:uppercase;overflow:visible;">
      <?php 
          $sql_sel_menu_u = "SELECT *FROM menu";
          $result_menu_u = mysql_query($sql_sel_menu_u) or die("Cant execute Query !!!");
          while($fetch = mysql_fetch_array($result_menu_u)){
            $menu_u = $fetch['menu_name'];
            $menu_id_u = $fetch['m_id'];
            $menu_catg_u = $fetch['catg_id'];
            $menu_catg_r_u = explode(" ", $menu_catg_u);
            $c=count($menu_catg_r_u)-1;
            $co="0";
            ?>
            <div class="menu_item">
            <?php if($menu_id==$menu_id_u){
            ?>
            <div class="cols"  style="font-family:'Arial';width:200px;height:8px;margin-left:18px;">
              <a href="gallery_index.php?page=<?php echo $menu_u; ?>&page_id=<?php echo $menu_id_u; ?>" style="text-decoration:none;margin-left:-15px;color:#666666 !important;"><b><?php echo $menu_u; ?></b></a>
            </div>
            <?php }
            else if($menu_id!=$menu_id_u){?>
              <div class="cols"  style="font-family:'Arial';width:200px;height:8px;margin-left:18px;">
                <a href="gallery_index.php?page=<?php echo $menu_u; ?>&page_id=<?php echo $menu_id_u; ?>" style="text-decoration:none;margin-left:-15px;color:#666666 !important;"><b><?php echo $menu_u; ?></b></a>
              </div>
            <?php } ?>
            <ul>
              <?php
              $co_u=0;
              while($c>$co_u){
                if($menu_id==$menu_id_u){
                  $catg_id_u =$menu_catg_r_u[$co_u];
                  $sql_sel_catg = "SELECT *FROM catg where catg_id='$catg_id_u'";
                  $result_catg_u = mysql_query($sql_sel_catg) or die("Cant execute Query !!!");
                  $fetch_c = mysql_fetch_array($result_catg_u);
                  ?>
                  <div class="classs" style="width:200px;height:11px;">
                    <li style="margin-top:5px;margin-left:0px;display:table;">
                    	<?php if($fetch_c['catg_id']==$catg_id){ ?>
                      <a href="post_index.php?menu=<?php echo $menu_u; ?> &menu_id=<?php echo $menu_id_u; ?> &catg=<?php echo $fetch_c['catg_name']; ?> &catg_id=<?php echo $fetch_c['catg_id']; ?>" style="font-family:'Arial';text-decoration:none;color:#000000 !important;text-transform:none;margin-left:-28px;"><b><?php echo $fetch_c['catg_name']; ?></b></a>
                    <?php } 
                    else{?>
                    	<a href="post_index.php?menu=<?php echo $menu_u; ?> &menu_id=<?php echo $menu_id_u; ?> &catg=<?php echo $fetch_c['catg_name']; ?> &catg_id=<?php echo $fetch_c['catg_id']; ?>" style="font-family:'Arial';text-decoration:none;color:#666666 !important;text-transform:none;margin-left:-28px;"><b><?php echo $fetch_c['catg_name']; ?></b></a>
                	<?php  } ?>
                    </li>
                  </div>
                <?php } 
                
                $co_u =$co_u+1;
              } ?>
            </ul>
            </div>
            <?php 
            $co+$co+1;
          } 
        }//--ending if og $_GET..
        else {
          header("location:index.php");
        }
      ?>
      <div class="cols"  style="font-family:'Arial';width:200px;height:8px;margin-left:18px;line-height:0">
             <a href="about.php?page=about" 
             style="text-decoration:none;margin-left:-15px;color:#666666 !important;">
             <b>ABOUT</b></a>
            </div>
            <div class="cols"  style="font-family:'Arial';width:200px;height:8px;margin-left:18px;line-height:1.2">
                <a href="contact.php?page=contact" 
                style="text-decoration:none;margin-left:-15px;color:#666666 !important;"><b>CONTACT</b></a>
            </div>
    </div>
    </div>
  </div><!--row -->
</div>
      <div id="page-wrap" style="margin-top:85px;margin-left:245px;">
      	<div class="post" style="margin-left:-300px !important;"></div>
      	<?php
      	if(isset($_GET['menu'])&&($_GET['menu_id'])&&($_GET['catg'])&&($_GET['catg_id'])){
      		$catg=$_GET['catg'];
      		$catg_id =trim($_GET['catg_id']," ");
      		$sql_sel = "SELECT *FROM posts where pt_catg_id like '$catg_id'";
      		$result = mysql_query($sql_sel) or die("Cant execute Query !!!");
      		while($fetch = mysql_fetch_array($result)){
      		    $pt_image = $fetch['pt_image'];
      		    $pt_title = $fetch['pt_title'];
      		    $pt_catg = $fetch['pt_catg'];
      		    $pt_author = $fetch['pt_author'];
      		    $pt_datetime = $fetch['pt_datetime'];
      		    $pt_content_all = $fetch['pt_content_all'];
      		    $pt_video = $fetch['pt_video'];
      		    $pt_sound = $fetch['pt_sound'];
      		    if(!empty($pt_image)){
      		    //echo $pt_image;
      		    $img_i = rtrim($pt_image,",");
      		    $p_imagges = explode(",", $img_i);
        		    $ic =count($p_imagges)-1;
        		    $m=0;
        		    ?>
        		   
        		   <?php
        		   while($m<=$ic){
        			   ?>
        			  
                 <?php
                 $path="dashboard/pt-image/$p_imagges[$ic]"; 
                 //echo $path;
                  if(file_exists("$path")){ 
                  ?>		  
                   <div class="post" style="margin-left:3px !important;" onclick="nextdiv()">
        			   <p style="text-align:justify;width:auto;">
        			    <img  src="dashboard/pt-image/<?php echo $p_imagges[$ic]; ?>" style="background-color:#000;max-height:474px;">
        			   </p>
        			   </div>
        			   <?php }else
        		    { ?>
        		      <div class="post" style="margin-left:3px !important;display:none;">
        		      <p style="text-align:justify;width:auto;display:none;">
        		     <img  src="dashboard/pt-image/<?php echo $p_imagges[$ic]; ?>" style="background-color:#000;max-height:474px;display:none;">
        			   </p>
        			   </div>
        		    
        		    <?php } $ic=$ic-1;
        		    }
              }
              if(!empty($pt_video)){
        		    $p_vodeos = explode(",", $pt_video);
        		    $ic_v =count($p_vodeos);
                $mv=0;
        		    while($mv<$ic_v){  
          			  ?>
          				<div class="post" style="margin-left:3px !important;margin-top:0px;">
          				<p style="text-align:justify;max-height:474px;">
          					<iframe style="width:700px;" height="474" src="//www.youtube.com/embed/<?php echo $p_vodeos[$mv]; ?>" frameborder="0" allowfullscreen></iframe>	
          				</p>
          				</div>
          			  <?php $mv=$mv+1;
        		    }
              }
              if(!empty($pt_sound)){
        		    $p_sounds = explode(",", $pt_sound);
        		    $ic_s =count($p_sounds);
        		    $ms=0;
        		    while($ms<$ic_s){
        			    ?>
        			    <div class="post" style="margin-left:3px !important;margin-top:0px;">
        			    <p style="text-align:justify;height:474px;">
        		      
                  <!--<iframe style="width:500px;" height="474" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/<?php echo $p_sounds[$ms]; ?>&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>-->
     <iframe width="700px;" style="margin-top:150px;" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/<?php echo $p_sounds[$ms]; ?>&amp;color=ff5500&amp;auto_play=true&amp;hide_related=false&amp;show_comments=false&amp;show_user=false&amp;show_reposts=false"></iframe>
                  </p>
        			    </div>
        			    <?php $ms=$ms+1;
        		    }
              }
        		} 
      	}
      	else if((isset($_GET['catg']))&&(isset($_GET['page']))){  
      		header("location:index.php");
      	} ?>	
        <div class="post" style="margin-left:3px !important;margin-top:0px;">
                  <p style="text-align:justify;max-height:474px;width:30px;">
                  &nbsp;
                  </p>
                  </div>
	
      </div>
    
  
<div class="container-fluid" style="height:auto;">
  <div class="row" id="firstclick">
     <div class="left text-muted" id="left" style="min-height:100px;width:300px;font-size:11px;position:fixed;margin-left:264px;font-family:Arial;">
        <div class="first"  onclick="firstDiv()">
        <b style="font-size: 12px;cursor:pointer;">
        More info
        <span class="up">
           <img src="img/down.png" style="cursor:pointer;margin-left:5px;padding-left:0px;margin-top:0px;"> 
        </span>
        </b>
        </div>
      </div>
   
  </div><br><br>
   <div class="popover-text" id="popover-text" style="display:none; position: fixed;left: 249px;width: 720px;background-color: #fff;color: #000;max-height: 145px;min-height: 135px;overflow: auto;font-family:Arial;"> <?php echo stripslashes($pt_content_all); ?></div>
</div>

<nav class="navbar navbar-default navbar-fixed-bottom" role="navigation"
    style="background-color:#fff !important;min-height:25px !important;">
    <div class="container-fluid fixed-bottom">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  style="background-color:#fff !important;padding-top:5px;" >
          <div class="right text-muted" style="padding-bottom:5px;font-size:10px;position:fixed;margin-right:-35px;font-family:Arial;min-width:420px;text-align:right;">
          <a class="text-muted" style="color:#666666 !important;" href="http://georgiemattingley.net">georgiemattingley.net&nbsp;<?php echo "20".date(y); ?></a>
          <a style="color:#666666 !important;" target="blank" href="http://creativecommons.org/licenses/by-nc-nd/3.0/" class="text-muted">&nbsp;all works licensed under 
           <mw style="border: 1px solid; padding-right: 1px; padding-left: 1px; padding-bottom: 1.5px; border-radius:25px; font-weight: bold; font-size: 10px;">cc</mw>
            <!--<img src="img/cc.png">-->
          </a>
          </div>
        </div>
      </div>
    </div>
    </nav>
  
  </div>
  </div>

<?php include 'page_footer.php'; ?>