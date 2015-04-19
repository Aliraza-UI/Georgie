<?php  ob_start();
 include 'page_header.php'; 
 require 'dashboard/controller/config.php';
 require 'dashboard/controller/functions.php';
 error_reporting(E_ERROR | E_PARSE);
 //error_reporting(E_ALL); ini_set('display_errors', 'On'); 
 if(isset($_GET['page'])){
  $menu = trim($_GET['page']);
  }
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <ul class="nav nav-pills nav-stacked">
        <li style="margin-top:20px;text-transform:uppercase;font-size:30px;font-family:tradegothicbold;line-height:23px;position:fixed;margin-left:5px;">
          <a href="index.php"style="font-size:30px;">GEORGIE<br style="line-height: 0.8;">MATTINGLEY</h3></a>
        </li>
      </ul>
    </div>
  </div>
</div><br>
<div class="container-fluid">
  <div class="row" style="margin-left:5px;">
    <div class="col-lg-4 col-md-4 col-sm-6" 
      style="font-family:Arial;position:fixed;line-height:1px;text-align:left;margin-top:94px;text-transform:uppercase;">
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
        <div class="cols"  style="font-family:'Arial';width:200px;height:8px;margin-left:18px;">
          <a href="gallery_index.php?page=<?php echo $menu_u; ?>&page_id=<?php echo $menu_id_u; ?>" style="text-decoration:none;color:#666666 !important;margin-left:-15px;"><b><?php echo $menu_u; ?></b>
          </a>
        </div>
        <ul>
        </ul>
      </div>
      <?php $co+$co+1; 
       }
       if($menu == 'about'){
      ?>
      <div class="cols"  style="font-family:'Arial';width:200px;height:8px;margin-left:18px;line-height:0">
        <a href="about.php?page=about" style="text-decoration:none;margin-left:-15px;color:#000000 !important;">
          <b>ABOUT</b>
        </a>
      </div>
      <?php } else {?>

      <div class="cols"  style="font-family:'Arial';width:200px;height:8px;margin-left:18px;line-height:0">
        <a href="about.php?page=about" style="text-decoration:none;margin-left:-15px;color:#666666 !important;">
          <b>ABOUT</b>
        </a>
      </div>
      <?php }  if($menu == 'contact'){ ?>

      <div class="cols"  style="font-family:'Arial';width:200px;height:8px;margin-left:18px;line-height:1.2">
        <a href="contact.php?page=contact" style="text-decoration:none;margin-left:-15px;color:#000000 !important;">
          <b>CONTACT</b>
        </a>
      </div>
      <?php } else {?>
      <div class="cols"  style="font-family:'Arial';width:200px;height:8px;margin-left:18px;line-height:1.2">
        <a href="contact.php?page=contact" style="text-decoration:none;margin-left:-15px;color:#666666 !important;">
          <b>CONTACT</b>
        </a>
      </div>
      <?php } ?>

    </div>
    <div class="col-md-2" style="min-width:300px;height:30%;margin-top:35%;">&nbsp;</div>
   <div class="col-lg-8 col-md-8 col-sm-8 visible-md-block visible-sm-block visible-lg-block"  style="margin-top:85px;position:inherit;min-width:300px;font-family:'Arial';color:#666666;">
     <?php
                    $sql_sel_r = "SELECT `cv_content` FROM about_content WHERE id=1";
                    $res_sel = mysql_query($sql_sel_r);
                    $row_r = mysql_fetch_array($res_sel); 
                    ?>
       <p><?php echo $row_r['cv_content']; ?></p>
       <p style="font-weight:700;">CV</p>
       <?php
      $sql_sel_sec = "SELECT *FROM section";
      $result_sec_u = mysql_query($sql_sel_sec) or die("Cant execute Query !!!");
      while($fet = mysql_fetch_array($result_sec_u)){
      $sec_id = mysql_real_escape_string($fet['sec_id']);
      
        $sql_sel_con = "SELECT *FROM about where `sec_id`='$sec_id' ORDER BY `cv_year` DESC";
        $result_sec_con = mysql_query($sql_sel_con) or die("Cant execute Query !!!");
        $cu = mysql_num_rows($result_sec_con);
        //echo $cu;
        ?> 
        <p style="font-weight:700;text-transform:uppercase;"><?php echo $fet['sec_name']; ?></p> 
        <?php 
        $ot =1;
        while($cont = mysql_fetch_array($result_sec_con)){
          if($ot==$cu){
            ?>
            <div class="col-md-1" style="margin:0;padding:0;"><?php echo $cont['cv_year']; ?> </div>
            <div class="col-md-11" style="margin-bottom:15px;padding:0;word-break:break-word;"><?php echo $cont[cv_content]; ?> </div>
             
           <?php $ot=1;}
           else{?>
           <div class="col-md-1" style="margin:0;padding:0;"><?php echo $cont['cv_year']; ?> </div>
           <div class="col-md-11" style="margin:0;padding:0;word-break:break-word;"><?php echo $cont[cv_content]; ?> </div>
           

          <?php  } $ot=$ot+1; }
            }
            ?>
     </div>
     <div class="col-xs-8 visible-xs-block"  style="max-height:700px;overflow:auto;margin-top:85px;position:inherit;min-width:300px;font-family:'Arial';color:#666666;">
      <p style="font-weight:700;">ABOUT</p>
      <?php
                    $sql_sel_r = "SELECT `cv_content` FROM about_content WHERE id=1";
                    $res_sel = mysql_query($sql_sel_r);
                    $row_r = mysql_fetch_array($res_sel); 
                    ?>
       <p><?php echo $row_r['cv_content']; ?></p>
       <p style="font-weight:700;">CV</p>
       <?php
      $sql_sel_sec = "SELECT *FROM section";
      $result_sec_u = mysql_query($sql_sel_sec) or die("Cant execute Query !!!");
      while($fet = mysql_fetch_array($result_sec_u)){
      $sec_id = mysql_real_escape_string($fet['sec_id']);
      
        $sql_sel_con = "SELECT *FROM about where `sec_id`='$sec_id'  ORDER BY `cv_year` DESC";
        $result_sec_con = mysql_query($sql_sel_con) or die("Cant execute Query !!!");
        ?> <p style="font-weight:700;text-transform:uppercase;"><?php echo $fet['sec_name']; ?></p> 
        <?php 
        while($cont = mysql_fetch_array($result_sec_con)){
            ?>
             <div class="col-md-2" ><?php echo $cont['cv_year']; ?> </div>
             <div class="col-md-10" style="word-break:break-word;"><?php echo $cont[cv_content]; ?> </div><br><br>
           <?php  }
            }
            ?>
     </div>
     
   <nav class="navbar navbar-default" role="navigation"style="background-color:#fff !important;min-height:100px !important;position:inherit;">
  <div class="container-fluid fixed-bottom">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  style="background-color:#fff !important;padding-top:5px;">
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
  </div>
</div>

<!-- jQuery Version 1.11.0 -->
<script src="js/jquery-1.11.0.js"></script>
<?php include 'page_footer.php'; ?>