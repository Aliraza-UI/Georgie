<?php
require 'controller/config.php';
require 'controller/functions.php';
session_start();
if (!isset($_SESSION['uname'])) {
    header('location:logout.php');
}
else if (isset($_SESSION['uname'])) {
    $uname = $_SESSION['uname'];
?>
<?php include 'header.php'; ?>
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Image Data - Media.
        <small>Add Details of Images that you added for category</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Media</li>
        <li class="active">Image Data Details</li>
    </ol>
</section>

<!-- Main content -->

    <div class="container" style="max-width:950px;">
        <div class="row">
            <div class="col-md-6">
                <br><br>
                <div class="row">
                    <form enctype="multipart/form-data" class="form-horizontal" role="form" method="post" action="">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title" style="float:none !important;">Select Category </h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">&nbsp;</label>
                            <div class="col-md-4" style="padding-right:0px;padding-top:10px;">
                                <select class="form-control" required="required" name="catg">
                                    <option class="form-control" value="">Choose Category</option>
                                    <?php
                                    $sql_sel_menu = "SELECT *FROM catg ORDER BY catg_id DESC";
                                    $result_menu = mysql_query($sql_sel_menu) or die("Cant execute Query !!!");
                                    $co=0;
                                    while($fetch = mysql_fetch_array($result_menu)){
                                    $catg = $fetch['catg_name'];
                                    $catg_id = $fetch['catg_id'];
                                    ?>
                                    <option class="form-control"  value="<?php echo $catg.','.$catg_id; ?>"> <?php echo  $catg ?> </option>
                                    
                                    <?php } ?>
                                 </select>
                            </div>
                            <div class="col-md-4" style="padding-right:0px;padding-top:10px;">
                                <input type="submit" class="btn btn-md btn-primary" value="List images" name="submit">
                            </div>
                        </div>
                        <br>
                    </div><!-- /.box-body -->
                    </form>
                    
                </div><!-- /.box -->
            </div>
            <div class="col-md-6">
                <br><br>
                <div class="row">
                    <div class="box box-primary"style="color:red;">
                        <div class="box-header">
                            <h3 class="box-title" style="float:none !important;">&nbsp; </h3>
                        </div><!-- /.box-header -->
                        <?php
                            if(isset($_GET['action'])&&($_GET['action']=='added')){
                                echo "*Success : Image Details Added";
                            }
                            if(isset($_GET['action'])&&($_GET['action']=='error')){
                                echo "*Error : Something went wrong";
                            }
                            if(isset($_GET['action'])&&($_GET['action']=='edited')){
                                echo "*Success : Image Details Updated";
                            }
                            ?>
                            <br><br>
                    </div>
                    <br><br>
                </div>
            </div>
            
            
        </div>
    </div>


<div class="container" style="max-width:980px;">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title" style="float:none !important;">Category Images</h3>
                </div>
            </div>
                                       
            
        </div>
    </div>
</div>
<?php
if(isset($_POST['submit'])){
    $data=mysql_real_escape_string($_POST['catg']);
    $spilt = explode(",", $data);
    $catg =$spilt[0];
    $catg_id_u=$spilt[1];
    //echo $catg."---".$catg_id_u;
    
?>
<div class="container" style="max-width:980px;">
    <div class="row">
        <div class="col-md-12">
          <?php
          $sql_sel_catg = "SELECT pt_image,pt_catg FROM posts where pt_catg_id='$catg_id_u' ORDER BY sl_no DESC limit 1";
          $result_catg_u = mysql_query($sql_sel_catg) or die("Cant execute Query !!!");
          $fetch_c = mysql_fetch_array($result_catg_u);
          $pt_images = $fetch_c['pt_image'];
          //echo $pt_images;
          $splt_images =explode(",",$pt_images);
          $cc=count($splt_images)-1;
          //echo $cc;
          if($cc<=0||(!isset($cc))){
            echo "Oops No image file Uploaded to this category";
          }
          $tc=0;
          while($cc>$tc){
            
           ?>
           <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-header">
                    <h5 class="box-title"style="font-size:16px;width:100%;"><?php echo $fetch_c['pt_catg']; ?></h5>
                    <center><img src="pt-image/<?php echo $splt_images[$tc]; ?>" width="150" height="100"></center>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="menu-sp" style="float:left;margin-left:35px;margin-top:5px;width=80px;">
                    <center>
                    <?php 
                    $img_name_c = $splt_images[$tc];
                    $sql_sel_img ="SELECT *FROM media where img_name ='$img_name_c' ORDER BY med_id DESC LIMIT 1";
                    $resul_med = mysql_query($sql_sel_img);
                    //print_r($resul_med);
                    $ci = mysql_num_rows($resul_med);
                    
                    //print_r($fetch_med);
                    if($ci == 0){
                    ?>
                        <button type="button"  class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal_add<?php echo $tc; ?>">
                            Add Data
                        </button>
                        <button type="button"  class="btn btn-sm btn-default" data-toggle="modal"
                        data-target="#myModal_del<?php echo $tc; ?>"><span class="btn btn-xs btn-danger glyphicon glyphicon-remove"></span>
                        </button>
                        <?php } else if($ci>0){?>
                        <button type="button"  class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal_edit<?php echo $tc; ?>">
                            Edit Data
                        </button>
                         <button type="button"  class="btn btn-sm btn-default" data-toggle="modal"
                        data-target="#myModal_del<?php echo $tc; ?>"><span class="btn btn-xs btn-danger glyphicon glyphicon-remove"></span>
                        </button>
                        <?php } ?>
                    </center>
                </div>
                <!-- Modal -->
                <form method="post" class="form-horizontal" action="controller/add_media_action.php" type="text/multipart">
                    <div class="modal fade" id="myModal_add<?php echo $tc; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Add Image Details -</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Line 1</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="img_title" class="form-control" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Line 2</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="img_medium" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Line 3</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="img_location" class="form-control" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Line 4</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="img_credit" class="form-control">
                                        </div>
                                    </div>
                                     <!--<div class="form-group">
                                        <label class="col-sm-3 control-label">Year</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="img_year" class="form-control">
                                        </div>
                                    </div>-->
                                    
                                    <input type="hidden" name="catg_id" value="<?php echo $catg_id_u; ?>">
                                    <input type="hidden" name="img_name" value="<?php echo $splt_images[$tc]; ?>">
                                    <input type="hidden" name="catg" value="<?php echo $catg; ?>">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary" name="submit_add">Add </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form method="post" class="form-horizontal" action="controller/del_image_action.php" type="text/multipart">
                <div class="modal fade" id="myModal_del<?php echo $tc; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Delete Image ?</h4>
                                </div>
                                <div class="modal-body">
                                    Are you sure want to remove this pic?!
                                    <input type="hidden" name="catg_id" value="<?php echo $catg_id_u; ?>">
                                    <input type="hidden" name="img_name" value="<?php echo $splt_images[$tc]; ?>">
                                    <input type="hidden" name="catg" value="<?php echo $catg; ?>">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary" name="submit_del">Yes </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <form method="post" class="form-horizontal" action="controller/edit_media_action.php" type="text/multipart">
                    <div class="modal fade" id="myModal_edit<?php echo $tc; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Update Image Details</h4>
                                </div>
                                 <div class="modal-body">
                                    <?php 
                                    $img_name_c = $splt_images[$tc];
                                        $sql_sel_img ="SELECT *FROM media where img_name ='$img_name_c' ORDER BY med_id DESC LIMIT 1";
                                        $resul_med = mysql_query($sql_sel_img);
                                        //print_r($resul_med);
                                        $fetch_med = mysql_fetch_array($resul_med);
                                        //print_r($fetch_med);
                                        

                                    ?>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Line 1</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="img_title" value="<?php echo $fetch_med['img_title']; ?>" class="form-control" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Line 2</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="img_medium" value="<?php echo $fetch_med['img_medium']; ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Line 3</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="img_location" value="<?php echo $fetch_med['img_location']; ?>" class="form-control" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Line 4</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="img_credit" value="<?php echo $fetch_med['img_credit']; ?>" class="form-control">
                                        </div>
                                    </div>
                                     <!--<div class="form-group">
                                        <label class="col-sm-3 control-label">Year</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="img_year" value="<?php echo $fetch_med['img_year']; ?>" class="form-control">
                                        </div>
                                    </div> -->
                                    <input type="hidden" name="med_id" value="<?php echo $fetch_med['med_id']; ?> ">
                                    <input type="hidden" name="catg_id" value="<?php echo $fetch_med['mcatg_id']; ?> ">
                                    <input type="hidden" name="img_name" value="<?php echo $fetch_med['img_name']; ?>" >
                                    <input type="hidden" name="catg" value="<?php echo $fetch_med['mcatg_name']; ?>">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary" name="submit_update">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
          </div>
          <?php $tc =$tc+1;  } ?>
          


        </div>
                
    </div>
</div>
<?php } ?>
<?php include 'footer.php'; ?>
<?php } ?>