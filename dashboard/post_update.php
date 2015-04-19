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
                    <h1>
                        Edit Post
                        <small>Edit an Existing post in website.</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Posts</li>
                        <li class="active">Edit Posts</li>
                    </ol>
                </section>
                <section class="content">
                    <div class="col-md-3">&nbsp;</div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="box box-primary">
                                <?php if(isset($_GET['action'])){
                                if($_GET['action']=="updated"){
                                    ?>
                                    <h5><center><p style="color:red;">*&nbsp;&nbsp;Success :: Category Details updated
                                    <br> <br> 
                                    <a href="../blog.php"><button type="button" class="btn btn-primary">Preview</button></a>
                                    <a href="dashboard.php"><button type="button" class="btn btn-primary">Back to Dashboard</button></a>
                                    </p></center></h5>
                                    <?php

                                }
                                else if($_GET['action']=="error"){
                                    ?>
                                    <h5><center><p style="color:red;">*&nbsp;&nbsp; Error :: Something Went Wrong.!!!
                                    <br> <br> 
                                    <a href="add_post.php"><button type="button" class="btn btn-primary">Try Again</button></a>
                                    <a href="dashboard.php"><button type="button" class="btn btn-primary">Back to Dashboard</button></a>
                                    </p></center></h5>
                                    <?php
                                }
                            }
                            ?>
                            </div>
                        </div>
                    </div>
                </section>
    <div class="container" style="max-width:1000px;">
        <div class="row">
            <div class="col-md-4">
                <br><br>
                <div class="row">
                    <form enctype="multipart/form-data" class="form-horizontal" role="form" method="post" action="">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title" style="float:none !important;">Select Category </h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <div class="form-group">
                            
                            <div class="col-md-8" style="padding-right:0px;padding-top:10px;">
                                <select class="form-control" name="catg_edit">
                                    <option value="none" required="required">Please Select</option>
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
                            <div class="col-sm-1" style="padding-right:0px;padding-top:10px;">
                                <input type="submit" class="btn btn-sm btn-primary" value="Edit" name="cat_submit">
                            </div>
                        </div>
                        <br>
                    </div><!-- /.box-body -->
                    </form>
                    
                </div><!-- /.box -->
            </div>
       
    <?php
    if(isset($_POST['cat_submit'])){
        $data=mysql_real_escape_string($_POST['catg_edit']);
        if(($data=='none')){
            echo "<h5 style='color:#ff0a00;'>*&nbsp;&nbsp;&nbsp;Select a category</h5>";
        }
        else{
        $spilt = explode(",", $data);
        $catg =$spilt[0];
        $catg_id_u=$spilt[1];
        $sql_sel_edit = "SELECT *FROM posts where pt_catg_id ='$catg_id_u'";
        $result_edit = mysql_query($sql_sel_edit);
        $eres = mysql_fetch_array($result_edit);
        $pt_title = $eres['pt_title'];
        $pt_author = $eres['pt_author'];
        $pt_content_all = $eres['pt_content_all'];
        $pt_video = $eres['pt_video'];
        $pt_sound = $eres['pt_sound'];
    ?>
    
        <div class="col-md-7">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title" style="float:none !important;">Edit Category Data</h3>
                </div>
            
            <form enctype="multipart/form-data" role="form" method="post" action="controller/update_action.php">

                <div class="box-body">
                    
                    <!--<div class="form-group">
                        <label for="exampleInputEmail1">Post Title</label>
                        <input type="text" class="form-control"  placeholder="Enter Post Title" name="pt_title" value="<?php echo $pt_title; ?>" required="required">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Author Name</label>
                        <input type="text" class="form-control"   name="pt_author" value="<?php echo $pt_author; ?>" required="required">
                    </div>-->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category Content</label>
                        --Please write the content of this category.
                        
                                <textarea class="form-control" name="pt_content_all"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $pt_content_all; ?></textarea>
                            
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Upload Youtube Video ID :Paste Multiple ID seperated with comma(,).</label>
                        <input type="text" name="pt_video" value="<?php echo $pt_video; ?>" class="form-control">
                    </div>
                    <!--<iframe width="640" height="390" src="//www.youtube.com/embed/RFinNxS5KN4" frameborder="0" allowfullscreen></iframe>-->
                    <div class="form-group">
                        <label for="exampleInputFile">Upload SOund cloud ID :Paste Multiple ID seperated with comma(,).</label>
                        <input type="text" name="pt_sound" value="<?php echo $pt_sound; ?>" class="form-control">
                    </div>
                    <input type="hidden" name="pt_catgo" value="<?php  echo $catg_id_u; ?>" >
                    <input type="hidden" name="pt_catg_n" value="<?php echo  $catg; ?>" >
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary" name="submit">Publish</button>
                    <a href="dashboard.php"><button type="button" class="btn btn-primary">Cancel</button></a>
                </div>
            </form>
        </div>
        </div><!-- /.box -->
    </div>
 </div>               
<?php } } include 'footer.php'; ?>
<?php } ?>