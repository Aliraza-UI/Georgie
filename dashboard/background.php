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
                    Background 
                    <small>Update your website Home-page background</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Background</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <br/><br/><br/>
                <div class="col-md-3">&nbsp;</div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title" style="float:none !important;">Recommendations</h3> 
                                <br> &nbsp;&nbsp;&nbsp; Quality : High Quality images 
                                <br> &nbsp;&nbsp;&nbsp; Size : less than 2MB.
                            </div><!-- /.box-header -->
                            <!-- form start -->
                            <form enctype="multipart/form-data" role="form" method="post" action="controller/background_action.php">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Image Caption</label>
                                        <input type="text" class="form-control"  placeholder="Enter caption" name="bg_caption">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Upload background image</label>
                                        <input type="hidden" name="MAX_FILE_SIZE" value="4194304" /> 
                                        <input type="file" name="bg_photo" required="required">
                                        <p class="help-block">*Please Follow the above Recommendations.</p>
                                    </div>
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                    <a href="dashboard.php"><button type="button" class="btn btn-primary">Cancel</button></a>
                                </div>
                            </form>
                        </div><!-- /.box -->
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="col-md-3">&nbsp;</div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="box box-primary">
                            <?php if(isset($_GET['action'])){
                            if($_GET['action']=="updated"){
                                ?>
                                <h5><center><p style="color:red;">*&nbsp;&nbsp;Background Image changed Successfully...!!!
                                <br> <br> 
                                <a href="../index.php"><button type="button" class="btn btn-primary">Preview</button></a>
                                <a href="dashboard.php"><button type="button" class="btn btn-primary">Back to Dashboard</button></a>
                                </p></center></h5>
                                <?php

                            }
                            if($_GET['action']=="size_error"){
                                ?>
                                <h5><center><p style="color:red;">*&nbsp;&nbsp;The selected Image is too large...!!!
                                <br> <br> 
                                <a href="../index.php"><button type="button" class="btn btn-primary">Try Again</button></a>
                                <a href="dashboard.php"><button type="button" class="btn btn-primary">Back to Dashboard</button></a>
                                </p></center></h5>
                                <?php

                            }
                            if($_GET['action']=="type_error"){
                                ?>
                                <h5><center><p style="color:red;">*&nbsp;&nbsp;The File type not supprted, use png,jpg,jpeg etc...!!!
                                <br> <br> 
                                <a href="../index.php"><button type="button" class="btn btn-primary">Try Again</button></a>
                                <a href="dashboard.php"><button type="button" class="btn btn-primary">Back to Dashboard</button></a>
                                </p></center></h5>
                                <?php

                            }
                            
                           if($_GET['action']=="upload_error"){
                                ?>
                                <h5><center><p style="color:red;">*&nbsp;&nbsp;Something went wrong...!!! please try again..
                                    <br> <br> 
                                <a href="background.php"><button type="button" class="btn btn-primary">Try Again !</button></a>
                                <a href="dashboard.php"><button type="button" class="btn btn-primary">Back to Dashboard</button></a>
                                </p></center></h5>
                                <?php
                            }
                        }
                        ?>
                        <br>
                    </div>
                </div>
            </div>
        </section>
<?php include 'footer.php'; ?>
<?php } ?>