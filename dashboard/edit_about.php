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

<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        About 
                        <small>Edit CV Sections </small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">About</li>
                        <li class="active">Edit Section</li>
                    </ol>
                </section>
                
                 <!-- Main content -->
                <section class="content">
                    <div class="col-md-6">
                    <div class="row">

                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title" style="float:none !important;">Add Section data</h3>
                                
                            </div><!-- /.box-header -->
                            <form enctype="multipart/form-data" role="form" method="post" action="controller/about_post_action.php">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Sections</label>

                                            <select class="form-control"  name="cv_section" required="required">
                                                <option value="">Select Section</a>
                                                <?php 

                                                $sql_sel_menu = "SELECT *FROM section ORDER BY sec_id DESC";

                                                $result_menu = mysql_query($sql_sel_menu) or die("Cant execute Query !!!");
                                                $co=0;
                                                while($fetch = mysql_fetch_array($result_menu)){
                                                $catg = $fetch['sec_name'];
                                                $catg_id = $fetch['sec_id'];
                                    
                                                ?>
                                                
                                                <option value="<?php echo $catg.','.$catg_id; ?>"><?php echo $catg; ?></a>
                                                <?php } ?>
                                            </select>  

                                        </div>
                                      
                                        <div class="form-group">
                                            <label for="exampleInputFile">Year
                                            <input type="text" name="cv_year" class="form-control" required="required">
                                        </div>

                                        <div class="form-group">
                                            
                                        <label for="exampleInputEmail1">Details</label>
                                        
                                           <textarea   required="required" class="form-control" name="cv_content"  placeholder="Place some text here" style="width: 100%; height: 150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                                   
                                            
                                        </div>
                                        </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary" name="submit">Add to CV</button>
                                        <a href="dashboard.php"><button type="button" class="btn btn-primary">Cancel</button></a>
                                    </div>
                                </form>
                        </div><!-- /.box -->
                    </div><br>
                    <!-- content of about page -->
                    <form enctype="multipart/form-data" role="form" method="post" action="controller/about_content_action.php">
                    <?php
                    $sql_sel_r = "SELECT `cv_content` FROM about_content WHERE id=1";
                    $res_sel = mysql_query($sql_sel_r);
                    $row_r = mysql_fetch_array($res_sel); 
                    ?>
                     <input type="text" name="cv_content" value="<?php echo $row_r['cv_content']; ?> " class="form-control" required="required">
                     <input type="submit" value="update" name="about_content" rows="4">
 		    </form>
 		    <!-- End of content -->
                    </div>
                    &nbsp; &nbsp; &nbsp; &nbsp;
                    <div class="col-md-6">
                    <div class="row">

                        <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title" style="float:none !important;">CV Data</h3>
                                    
                                   
                                </div>
                               
                                     <div class="box-body">
                                         <table class="table table-striped table-responsive">

                                        <tr>
                                            
                                            <td><strong>Section</strong></td>
                                            <td><strong>Year</strong></td>
                                            <td><strong>Content</strong></td>
                                            <td><strong>Action</strong></td>
                                        </tr>
                                        <?php
                                	 $sql_sel_con = "SELECT *FROM about ORDER BY sl_no DESC";
        				$result_sec_con = mysql_query($sql_sel_con) or die("Cant execute Query !!!");
        				$i=0;
        				while($fet = mysql_fetch_array($result_sec_con)){ ?>
                                	<tr>
                                	
                                           
                                            <td style="font-size: small;"><?php echo stripslashes(mysql_real_escape_string($fet['sec_name'])); ?></td>
                                            
                                            <td style="font-size: small;"><?php echo $fet['cv_year']; ?></td>
                                            <td style="font-size: small;word-break:break-word;max-width:350px; "><?php echo stripslashes(mysql_real_escape_string($fet[cv_content])); ?></td>
                                            <td style="font-size: small;">
                                                
                                                    <button type="submit"  class="btn btn-primary btn-xs" name="edit<?php echo $i; ?>" data-toggle="modal" data-target="#myModal_edit<?php echo $i; ?>">Edit</button><br>
                                 		    <button type="submit" style="margin-top:2px;" class="btn btn-primary btn-xs" name="delete<?php echo $i; ?>" data-toggle="modal" data-target="#myModal<?php echo $i; ?>">Delete</button>

                                                <!-- Modal -->
                                            <form enctype="multipart/form-data" role="form" method="post" action="controller/about_delete_action.php">
                                            <div class="modal fade" id="myModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                              <div class="modal-dialog">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Delete CV data !!!</h4>
                                                  </div>
                                                  <div class="modal-body">

                                                     Are you sure to delete CV data ?<br>
                                                     Press &quot;Yes sure &quot; button to confirm or </br>
                                                     Press &quot; Cancel &quot; button to quit.
                                                    
                                                    <input type="hidden" name="sec_id" value="<?php echo $fet['sec_id']; ?>">
                                                    <input type="hidden" name="sl_no" value="<?php echo $fet['sl_no']; ?>">
                                                

                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary" name="delete">Yes sure</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>

                                            </form>
                                            
                                            <form enctype="multipart/form-data" role="form" method="post" action="controller/about_edit_action.php">
                                            <div class="modal fade" id="myModal_edit<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                              <div class="modal-dialog">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Edit CV Data !!!</h4>
                                                  </div>
                                                  <div class="modal-body">
						    
						    
						    <div class="form-group">
                                            <label for="exampleInputEmail1">Sections</label>

                                            <input type="text" name="cv_section" value="<?php echo $fet['sec_name']; ?>" class="form-control" required="required">
                                               
                                            </select>  

                                        </div>
                                      
                                        <div class="form-group">
                                            <label for="exampleInputFile">Year
                                            <input type="text" name="cv_year" value="<?php echo $fet['cv_year']; ?>" class="form-control" required="required">
                                        </div>

                                        <div class="form-group">
                                            
                                        <label for="exampleInputEmail1">Details</label>
                                        
                                           <textarea   required="required" class="form-control"  name="cv_content"  style="width: 100%; height: 150px; font-size: 14px;">
                                           <?php echo mysql_real_escape_string(stripslashes($fet['cv_content'])); ?>
                                           </textarea>
                                                   
                                            
                                        </div>
                                        <input type="hidden" name="sec_id" value="<?php echo $fet['sec_id']; ?>">
                                        <input type="hidden" name="sl_no" value="<?php echo $fet['sl_no']; ?>">
                                                

                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary" name="edit">Edit</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>

                                            </form>
                                         </td>

                                        </tr>
                                        <?php $i=$i+1; } ?>
                                        
                                        </table>
                                        </div>
                                        </div>
                                        </div>
                                        
                                    
                </section>
               
<?php } include 'footer.php'; ?>