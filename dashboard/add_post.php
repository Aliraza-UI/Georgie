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
                        Posts
                        <small>Add Category Details in your website.</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Posts</li>
                        <li class="active">Add Posts</li>
                    </ol>
                </section>
                <section class="content">
                    <div class="col-md-3">&nbsp;</div>
                    <div class="col-md-6">
                    <div class="row">
                        <div class="box box-primary">
                            <?php if(isset($_GET['action'])){
                            if($_GET['action']=="published"){
                                ?>
                                <h5><center><p style="color:red;">*&nbsp;&nbsp;Success : Category details published Successfully...!!!
                                <br> <br> 
                                <a href="../index.php"><button type="button" class="btn btn-primary">Go to Web</button></a>
                                <a href="dashboard.php"><button type="button" class="btn btn-primary">Back to Dashboard</button></a>
                                </p></center></h5>
                                <?php

                            }
                            else if($_GET['action']=="error"){
                                ?>
                                <h5><center><p style="color:red;">*&nbsp;&nbsp; *Error :: Something Went Wrong.!!!
                                <br> <br> 
                                <a href="add_post.php"><button type="button" class="btn btn-primary">Try Again</button></a>
                                <a href="dashboard.php"><button type="button" class="btn btn-primary">Back to Dashboard</button></a>
                                </p></center></h5>
                                <?php

                            }
                            else if($_GET['action']=="duplicate"){
                                ?>
                                <h5><center><p style="color:red;">*&nbsp;&nbsp; *Error :: Post Already exists.!!!
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
                <!-- Main content -->
                <section class="content">
                    
                    <div class="col-md-3">&nbsp;</div>
                    <div class="col-md-6">
                    <div class="row">

                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title" style="float:none !important;">Add Category post</h3>
                                
                            </div><!-- /.box-header -->
                            <form enctype="multipart/form-data" role="form" method="post" action="controller/post_action.php">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Post Category</label>

                                            <select class="form-control"  name="pt_catg" required="required">
                                                <option value="">Select a Category</a>
                                                <?php 

                                                $sql_sel_menu = "SELECT *FROM catg ORDER BY catg_id DESC";

                                                $result_menu = mysql_query($sql_sel_menu) or die("Cant execute Query !!!");
                                                $co=0;
                                                while($fetch = mysql_fetch_array($result_menu)){
                                                $catg = $fetch['catg_name'];
                                                $catg_id = $fetch['catg_id'];
                                    
                                                ?>
                                                
                                                <option value="<?php echo $catg.','.$catg_id; ?>"><?php echo $catg; ?></a>
                                                <?php } ?>
                                            </select>  

                                        </div>
                                        <!--<div class="form-group">
                                            <label for="exampleInputEmail1">Post Title</label>
                                            <input type="text" class="form-control"  placeholder="Enter Post Title" name="pt_title" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Author Name</label>
                                            <input type="text" class="form-control"  value="<?php echo $uname; ?>" name="pt_author" required="required">
                                        </div>-->
                                        

                                        <div class="form-group">
                                            
                                        <label for="exampleInputEmail1">Category Content</label>
                                        --Please write the content of this category.
                                           <textarea class="form-control" name="pt_content_all"  placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                                   
                                            
                                        </div>


                                        <div class="form-group">
                                            <label for="exampleInputFile">Upload post Images :</label> Please use images without special charters <br>*NB : (quotes(',"),comma(,) not alloweded)
                                            <input type="hidden" name="MAX_FILE_SIZE" value="4194304" /> 
                                            <input type="file" id="file" name="files[]" required="required" multiple="multiple" accept="image/*" />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputFile">Upload Youtube Video ID :</label>Paste Multiple ID seperated with comma(,).
                                            <input type="text" name="pt_video" class="form-control">
                                        </div>
                                        <!--<iframe width="640" height="390" src="//www.youtube.com/embed/RFinNxS5KN4" frameborder="0" allowfullscreen></iframe>-->
                                         <div class="form-group">
                                            <label for="exampleInputFile">Upload Sound cloud ID :</label>Paste Multiple ID seperated with comma(,).
                                            <input type="text" name="pt_sound" class="form-control">
                                        </div>
                                        
                                        
                                        
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary" name="submit">Publish</button>
                                        <a href="dashboard.php"><button type="button" class="btn btn-primary">Cancel</button></a>
                                    </div>
                                </form>
                        </div><!-- /.box -->
                    </div>
 
                    </div>
                </section>
                
<?php include 'footer.php'; ?>
<?php } ?>