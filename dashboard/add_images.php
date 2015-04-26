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
            <div class="col-md-4">
                <br>
                <div class="row">
                    <form enctype="multipart/form-data" class="form-horizontal" role="form" method="post" action="controller/addimg_action.php">
                    <div class="box box-primary" style="height:200px;">
                        <div class="box-header">
                            
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">&nbsp;</label>
                            <div class="col-md-8" style="padding-right:0px;padding-top:10px;">
                                <select class="form-control" name="catg">
                                    <option class="form-control" value="no">Choose Category</option>
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
                        </div>
                       
                            
                        
                        <br><br><br>
                    </div><!-- /.box-body -->
                    
                    
                </div><!-- /.box -->
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <br>
                <div class="row">
                    <div class="box box-primary"style="color:red;height:200px;">
                        <div class="box-header"></div><!-- /.box-header -->
                        <div class="col-md-12">
                            <center><label for="exampleInputFile">Upload post Images :</label> 
                            Please use images without special charters <br>*NB : (quotes(',"),comma(,) not alloweded)</center>
                            <input type="hidden" name="MAX_FILE_SIZE" value="4194304" /> 
                            <center><input type="file" id="file" name="files[]" required="required" multiple="multiple" accept="image/*" /></center>

                            <br><br>

                            <center><label for="exampleInputFile">Upload post thumbnail :</label> 
                            Please use images without special charters <br>*NB : (quotes(',"),comma(,) not alloweded)</center>
                            <input type="hidden" name="MAX_FILE_SIZE" value="4194304" /> 
                            <center><input type="file" id="fileth" name="filesth[]" required="required" multiple="multiple" accept="image/*" /></center>
                        </div><br>

                        <?php
                        
                        if(isset($_GET['action'])&&($_GET['action']=='error')){
                            echo "*Error : Something went wrong";
                        }
                        if(isset($_GET['action'])&&($_GET['action']=='edited')){
                            echo "*Success : Image Details Updated";
                        }
                        ?>
                        <br><br><br><br><br>
                    </div>
                    <br><br>
                </div>
            </div>
        </div>
         <div class="col-md-2">
            <div class="form-group">
                <br>
                <div class="row">
                    <div class="box box-primary"style="color:red;">
                        <div class="box-header"></div>
                        <div class="col-md-12" style="padding-right:0px;padding-top:10px;">
                            <center><input type="submit" class="btn btn-md btn-primary" value="Add Image" name="submit"></center>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
if(isset($_GET['action'])&&($_GET['action']=='added')){?>
<div class="container" style="max-width:980px;">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title" style="float:none !important;">Added Images : <?php echo "*Success : Image Details Added"; ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    $data=$_GET['catg'];
    $spilt = explode(",", $data);
    $catg =$spilt[0];
    $catg_id_u=$spilt[1];
?>
<div class="container" style="max-width:980px;">
    <div class="row">
        <div class="col-md-12">
          <?php
          $sql_sel_catg = "SELECT pt_image,pt_catg FROM posts where pt_catg_id=$catg_id_u";
          $result_catg_u = mysql_query($sql_sel_catg) or die("Cant execute Query !!!");
          $fetch_c = mysql_fetch_array($result_catg_u);
          $pt_images = $fetch_c['pt_image'];
          $splt_images =explode(",",$pt_images);
          $cc=count($splt_images)-1;
          //echo $cc;
          $nw=0;
          while($cc>$nw){
            
          ?>
          <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-header">
                    <h5 class="box-title"style="font-size:16px;width:100%;"><?php echo $fetch_c['pt_catg']; ?></h5>
                    <center><img src="pt-image/<?php echo $splt_images[$nw]; ?>" width="150" height="100"></center>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="menu-sp" style="float:left;margin-left:35px;margin-top:5px;width=80px;">
                    <center>
                    <button type="button"  class="btn btn-xs btn-danger" data-toggle="modal"
                    data-target="#myModal_del<?php echo $nw; ?>">Delete&nbsp;&nbsp;&nbsp;&nbsp;<span class="btn btn-xs btn-warning glyphicon glyphicon-remove"></span></button>
                    </center>
                </div>
            </div>
            </div>

                <!-- Modal -->
                <form method="post" class="form-horizontal" action="controller/del_image_action.php" type="text/multipart">
                    <div class="modal fade" id="myModal_del<?php echo $nw; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                Are You sure want to delete this Image??
                                <div class="modal-body">  
                                    <input type="hidden" name="catg_id" value="<?php echo $catg_id_u; ?>">
                                    <input type="hidden" name="img_name" value="<?php echo $splt_images[$nw]; ?>">
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
            </div>
            <?php $nw =$nw+1;  } ?>
          </div>
        </div>
                
    </div>
</div>
<?php } ?>
<?php include 'footer.php'; ?>
<?php } ?>