<?php  ob_start();
if(isset($_GET['page'])){
  $menu_c = ucfirst(trim($_GET['page']));
  }
 $title = "$menu_c"." - Gallery - Georgie Mattingley - Visual Artist Australia";
 include 'page_header.php'; 
 require 'dashboard/controller/config.php';
 require 'dashboard/controller/functions.php';
 error_reporting(E_ERROR | E_PARSE);
 //error_reporting(E_ALL); ini_set('display_errors', 'On'); 
 if(isset($_GET['page'])&&($_GET['page_id'])){
  $menu = trim($_GET['page']);
  $menu_id = trim($_GET['page_id']);
  $sql_sel_g = "SELECT *FROM menu where m_id='$menu_id'";
  $result = mysql_query($sql_sel_g);
  $emp = mysql_fetch_array($result);
  $d = $emp['catg_id'];
  if(empty($d)) {
  header('location:404.php');
  }
?>
<style>
.nav>li>a:focus{
color:#fff;
cursor:pointer;
}
</style>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <ul class="nav nav-pills nav-stacked logoinside">
        <li style="margin-top:20px;text-transform:uppercase;font-size:30px;font-family:tradegothicbold;line-height:23px;position:fixed;margin-left:5px;">
          <a href="index.php"style="font-size:30px;"><img src="img/georgie-title-1.svg" width="130" alt="GEORGIE MATTINGLEY" /></a>
          <!-- GEORGIE<br style="line-height: 0.8;">MATTINGLEY -->
        </li>
      </ul>
    </div>
  </div>
</div><br>

<div class="container-fluid">
  <div class="row">
    <div class="leftnv">
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
        <?php if($menu_id==$menu_id_u){?>
        <div class="cols"  style="font-family:'Arial';width:200px;height:8px;margin-left:18px;">
          <a href="gallery_index.php?page=<?php echo $menu_u; ?>&page_id=<?php echo $menu_id_u; ?>" style="text-decoration:none;color:#000000 !important;margin-left:-15px;"><b><?php echo $menu_u; ?></b>
          </a>
        </div>
        <?php }
        else if($menu_id!=$menu_id_u){?>
        <div class="cols"  style="font-family:'Arial';width:200px;height:8px;margin-left:18px;">
          <a href="gallery_index.php?page=<?php echo $menu_u; ?>&page_id=<?php echo $menu_id_u; ?> " style="text-decoration:none;margin-left:-15px;color:#666666 !important;"><b><?php echo $menu_u; ?></b></a>
        </div>
        <?php } ?>
        <ul>
        <?php

            if($menu_id==$menu_id_u){
                $menu_catg_u = $fetch['catg_id'];
                $menu_childs = str_replace(" ",",",$menu_catg_u);

                $menu_child_comma_seprated = trim($menu_childs, ",");

                $sql_sel_catg = "SELECT * FROM catg where catg_id IN( $menu_child_comma_seprated ) order by catg_name asc";
                $result_catg_u = mysql_query($sql_sel_catg) or die("Cant execute Query !!!");
                //$fetch_c = mysql_fetch_array($result_catg_u);
                $dataRows = array();
                while ($array = mysql_fetch_row($result_catg_u)) {
                    $dataRows[] = $array;
                }

                /*echo '<pre>';
                print_r($dataRows);
                echo '</pre>';*/
            foreach($dataRows as $menuRows){
          ?>

            <div class="classs" style="height:11px;">
                <li style="margin-top:5px;margin-left:0px;display:table;">
                    <a href="post_index.php?menu=<?php echo $menu_u; ?> &menu_id=<?php echo $menu_id_u; ?> &catg=<?php echo $menuRows[1]; ?> &catg_id=<?php echo $menuRows[0]; ?>"
                       style="font-family:'Arial';text-decoration:none;color:#666666 !important;text-transform:none;margin-left:-28px;"><b><?php echo $menuRows[1]; ?></b>
                    </a>
                </li>
            </div>

          <?php
                }//end if foreach
            } //end of if


        /*$co_u=0;
        $ca_arr = array();
         while($c>$co_u){
         if($menu_id==$menu_id_u){
           $catg_id_u =$menu_catg_r_u[$co_u];
           $sql_sel_catg = "SELECT *FROM catg where catg_id='$catg_id_u' order by catg_name asc";
           $result_catg_u = mysql_query($sql_sel_catg) or die("Cant execute Query !!!");
           $fetch_c = mysql_fetch_array($result_catg_u);
           $re = $fetch_c['catg_name'];
           $catg_arr.= $re.",";
           */?><!--
        <div class="classs" style="height:11px;">
          <li style="margin-top:5px;margin-left:0px;display:table;">
              <a href="post_index.php?menu=<?php /*echo $menu_u; */?> &menu_id=<?php /*echo $menu_id_u; */?> &catg=<?php /*echo $fetch_c['catg_name']; */?> &catg_id=<?php /*echo $fetch_c['catg_id']; */?>"
                 style="font-family:'Arial';text-decoration:none;color:#666666 !important;text-transform:none;margin-left:-28px;"><b>*<?php /*echo $fetch_c['catg_name']; */?></b>
              </a>
          </li>
        </div>
       
        <?php /*  }
        else if($menu_id==$menu_id_u){
        $catg_id_u = $menu_catg_r_u[$co_u];
        $sql_sel_catg = "SELECT *FROM catg where catg_id='$catg_id_u'";
        $result_catg_u = mysql_query($sql_sel_catg) or die("Cant execute Query !!!");
        $fetch_c = mysql_fetch_array($result_catg_u);
        */?>
        <div class="classs" style="height:11px;display:none;">
          <li style="margin-top:5px;margin-left:0px;display:table;">
            <a href="post_index.php?menu=<?php /*echo $menu_u; */?> &menu_id=<?php /*echo $menu_id_u; */?> &catg=<?php /*echo $fetch_c['catg_name']; */?> &catg_id=<?php /*echo $fetch_c['catg_id']; */?>"
              style="font-family:'Arial';text-decoration:none;color:#666666 !important;text-transform:none;margin-left:-28px;"><b><?php /*echo $fetch_c['catg_name']; */?></b>
            </a>
          </li>
        </div>
        --><?php /*}
        $co_u =$co_u+1;
        }*/

    $ca_arr = rtrim($catg_arr,",");
    $cat_ar_t = explode(",",$ca_arr);
    asort($cat_ar_t);
   //print_r($cat_ar_t); ?>
        </ul>
      </div>
      <?php $co+$co+1; 
      } }//--ending if og $_GET..
      ?>
      
 
      <div class="cols"  style="font-family:'Arial';width:200px;height:8px;margin-left:18px;line-height:0">
        <a href="about.php?page=about" style="text-decoration:none;margin-left:-15px;color:#666666 !important;">
          <b>ABOUT</b>
        </a>
      </div>
      <div class="cols"  style="font-family:'Arial';width:200px;height:8px;margin-left:18px;line-height:1.2">
        <a href="contact.php?page=contact" style="text-decoration:none;margin-left:-15px;color:#666666 !important;">
          <b>CONTACT</b>
        </a>
      </div>
    </div>
  
      <?php 
      $img_array = array();
     
      $img_count = 0;
      if(isset($_GET['page'])&&($_GET['page_id'])){
        $menu_name = mysql_real_escape_string($_GET['page']);
        $menu_id_q = $_GET['page_id'];
        //echo $menu_id_q;
        $width_q = "SELECT img_width FROM size";
        $width_res = mysql_query($width_q);
        $wid=array('200','170','200','170','200','170','200','170','200','170','200','170');
        $sql_sel_catg = "SELECT catg_id FROM menu where m_id='$menu_id_q'";
        $result = mysql_query($sql_sel_catg);
        $res_fet = mysql_fetch_array($result);
        $catg = $res_fet['catg_id'];
        $catg_sep = explode(" ",$catg);
        $qt = count($catg_sep)-1;
        $q = 0;
        $m = 0;
        $w=0;
         while($q<$qt){
          $real_cat_id = $catg_sep[$q];
          //echo $real_cat_id;
          $sql_sel_img="SELECT *FROM media where mcatg_id=$real_cat_id" ;
          $res_med=mysql_query($sql_sel_img) or die(mysql_error());
          while($rows=mysql_fetch_array($res_med)){ 
           $img_ids =$rows['med_id'];
             $image_url= $rows['img_name'];
             
             
                 $path="dashboard/pt-image/$image_url"; 
                 $img_array.= $image_url;
                 $img_id.= $img_ids.",";
                 $img_count =  $img_count+1;
                 } 
       
        $q=$q+1;
      }
    //echo  $img_count;
         $tc =$img_count;
      ?>
      
      
    <!-- new gallery starts -->
     <div class="gallerycontainer">

    <?php
    
    $wid=array('180','190','180','190','180','190','180','190','180','190','180','190');
   
    $ic=0;
    $d=0;
    $w=0;
    $ni=0;
    $avc = rtrim($img_id,",");
    $img_ar_t = explode(",",$avc);
    shuffle($img_ar_t);
    //print_r($img_ar_t);
    while($ic<$tc)
    {
    if($w =='12'){
              $w=0;
            }
    $sql_sel_img = "SELECT *FROM media WHERE `med_id`=$img_ar_t[$ic]";
    $ex_q = mysql_query($sql_sel_img);
    $re_ro = mysql_fetch_array($ex_q);
    $image_url=  $re_ro['img_name'];
             $img_title =  $re_ro['img_title'];
             $mcatg_name =  $re_ro['mcatg_name'];
             $img_year =  $re_ro['img_year'];
             $img_medium =  $re_ro['img_medium'];
             $img_location = $re_ro['img_location'];
             $img_credit =  $re_ro['img_credit'];
             $real_catg_id = $re_ro['mcatg_id'];
             $pos ="dashboard/pt-image/$image_url";
             
             list($width, $height, $type, $attr) = getimagesize("dashboard/pt-image/$image_url");
             // echo $height;
    if($w==1||$w==3||$w==5||$w==7||$w==9||$w==11){
    $ni = $d+1;
      ?>
    <div class="img-list" valign="top">
    <?php } else { ?> 
    <div class="img-list" valign="top">
   
    <?php } ?>
    <a href="#" id="dis<?php echo $d; ?>" class="gallery-bx">
      <img class="thumbnail" src="dashboard/pt-image-th/<?php echo $image_url; ?>" data-toggle="modal" data-target="#myModal_image<?php echo $d; ?>" align="left" height="<?php echo $height; ?>">
    </a>
        

        <!--new -->

        <!--end -->
      <form method="post" class="form-horizontal" action="" type="text/multipart">
          <div class="modal bs-example-modal-lg" id="myModal_image<?php echo $d; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="margin:0 auto;width:auto;">
              <div class="modal-content" style="margin-top:0;">
              <div class="modal-header">
            	   <button class="close" type="button" data-dismiss="modal">×</button>
                 <a href="#" class="al-next" data-dismiss="modal"><img src="img/next.svg"/></a>
                 <a href="#" class="al-prev" data-dismiss="modal"><img src="img/prev.svg"/></a>
              </div>
                <div class="modal-body">
                              
			              <center class="popimgih">
                    	<img class="img-responsive popimgih" id="modal_img<?php echo $d; ?>" src="dashboard/pt-image/<?php echo $image_url; ?>" >
                    </center>
                  
                </div>
                <center>
                  <div class="footer" 
                    style="width:100%;min-height:55px;color:#fff;font-family:'Arial';font-weight:600;">
                    <div class="row modal-textrow">
                      
                      <div class="col-md-5" style="text-align:left;line-height:1.2;">
                        <?php echo stripslashes($img_title); ?><br>
                        <?php echo stripslashes($img_medium); ?><br>
                        <?php echo stripslashes($img_location); ?><br>
                        <?php echo stripslashes($img_credit); ?><br>
                       </div>
                       <div class="col-md-1">&nbsp;</div>
                      <div class="col-md-6" style="text-align:right;line-height:1.5;">More about this project :
                        <p style="font-family:tradegothicbold;text-transform: uppercase;font-size:20px;height:17px;">
                          <df title="Click here to View more" style="cursor:pointer;color:#fff !important;" onclick="location.href='post_index.php?menu=<?php echo $menu_name; ?>&menu_id=<?php echo $menu_id_q; ?>&catg=<?php echo $mcatg_name; ?> &catg_id=<?php echo $real_catg_id; ?>'">
                          <?php echo stripslashes($mcatg_name); ?>
                          <df>
                        </p>
                      </div>
                      


                      
                    </div> 
                  </div>
                </center>
              </div>
            </div>
          </div>
      </form>

      </div>  
      
  <?php
  $ic=$ic+1;
    $d=$d+1;
    $ni=$ni+1;   
   $w=$w+1;
    }}
   ?>
     
    </div>     
    <!--$d=$d+1 statrs -->
  
    <!-- gallery ends -->
    </div> 
  </div>
</div><!-- //container -->



<nav class="navbar navbar-default" role="navigation"style="background-color:#fff !important;min-height:100px !important;position:inherit;">
  <div class="container-fluid fixed-bottom">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  style="background-color:#fff !important;padding-top:5px;" >
        <div class="right text-muted" style="padding-bottom:5px;font-size:10px;position:fixed;margin-right:-20px;font-family:Arial;">&nbsp;
        </div>
      </div>
    </div>
  </div>
</nav>
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
<!-- jQuery Version 1.11.0 -->
<script src="js/jquery-1.9.1.js"></script>
<script src="js/masonry.pkgd.min.js"></script>
<script src="js/imagesloaded.pkgd.min"></script>
<script>

$( ".img-list" ).css("height","auto");
var $container = $('.gallerycontainer');
// initialize
$container.masonry({
  columnWidth: 250,
  itemSelector: '.img-list'
});

interval = setInterval(function () {
  $container.masonry('destroy');

  $container.masonry({
    columnWidth: 250,
    itemSelector: '.img-list'
  });

}, 200);

var $container1 = $('.gallerycontainer').masonry();
// layout Masonry again after all images have loaded
$container1.imagesLoaded( function() {
  // alert("loaded");
  $container.masonry();
  clearInterval(interval);
});

</script>
<?php include 'page_footer.php'; ?>