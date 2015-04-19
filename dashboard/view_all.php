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
                        <small>View all or delete published Blog posts in your website. </small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Posts</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <?php if(isset($_GET['action'])){
                            if($_GET['action']=="deleted"){
                                ?>
                                <h5><center><p style="color:red;">*&nbsp;&nbsp;Selected post Deleted Successfully...!!!
                                
                                </p></center></h5>
                                <?php

                            }
                            else if($_GET['action']=="error"){
                                ?>
                                <h5><center><p style="color:red;">*&nbsp;&nbsp; *Error :: Something went wrong...!!!
                                
                                
                                </p></center></h5>
                                <?php

                            }
                            
                        }
                        ?>

                </section>
                <section class="content">
                   
                    
                    <div class="col-md-12">
                    <div class="row">

                        <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title" style="float:none !important;">All Published Blog posts</h3>
                                    
                                   
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                     <div class="box-body">
                                         <table class="table table-striped table-responsive">

                                        <tr>
                                            <td style="width:5px;"><strong>ID</strong></td>
                                            <td><strong>Title</strong></td>
                                            <td><strong>Description</strong></td>
                                            <td><strong>Category</strong></td>
                                            <td><strong>Published</strong></td>
                                            <td><strong>Action</strong></td>
                                        </tr>
                                
                                    
                                        <?php 
                                            if(isset($_GET['process']) && ($_GET['process']=="prev")){
                                                
                                                    $p = $_GET['p'];
                                                    $n = $_GET['n'];
                                                   
                                                    $prev = ($p)-10;
                                                    $next = ($n)-10;

                                                    if($prev<0 || $next<0){

                                                        echo "No Any previouse post to show";
                                                        ?>
                                                        <a href ="view_all.php?process=next&p=-10&n=0"><button type="button" class="btn btn-success" > View posts</button></a>
                                                        <?php
                                                        
                                                    }
                                                    else
                                                    {

                                                    $sql_sel_p = "SELECT *FROM posts ORDER BY pt_datetime DESC limit $prev,$next";
                                                    $result = mysql_query($sql_sel_p) or die("Cant execute Query !!!");
                                                    goto cont;
                                                }

                                                
                                            }
                                        
                                            if(isset($_GET['process']) && ($_GET['process']=="next")){
                                                
                                                    $p= $_GET['p'];
                                                    $n = $_GET['n'];

                                                    

                                                    $prev = $p+10;
                                                    $next = $n+10;

                                                $sql_sel = "SELECT *FROM posts";
                                                $result = mysql_query($sql_sel) or die("Cant execute Query !!!");
                                                $total = mysql_num_rows($result);
                                                if(($next-10)>=$total){
                                                    echo "No more posts exists.";
                                                    goto end;
                                                }
                                                    else
                                                    {
                                                    
                                                    $sql_sel_n = "SELECT *FROM posts ORDER BY pt_datetime DESC limit $prev,$next";
                                                    $result = mysql_query($sql_sel_n) or die("Cant execute Query !!!");
                                                    goto cont;
                                                }
                                                

                                            }

                                            
                                            if(!isset($_GET['process'])){
                                                $prev = 0;
                                                $next = 10;

                                            $sql_sel = "SELECT *FROM posts ORDER BY pt_datetime DESC limit $prev,$next";
                                            $result = mysql_query($sql_sel) or die("Cant execute Query !!!");

                                            } ?>

                                           
                                        <?php
                                       if(isset($result)){
                                        cont:
                                        $i=0;
                                         while($fetch = mysql_fetch_array($result)){

                                        $pt_slno=$fetch['sl_no'];
                                        $pt_image =$fetch['pt_image'];
                                        $pt_title = $fetch['pt_title'];
                                        $pt_catg = $fetch['pt_catg'];
                                        $pt_author = $fetch['pt_author'];
                                        $pt_content =$fetch['pt_content_all'];
                                        $pt_datetime =$fetch['pt_datetime'];
                                       
                                        //print_r($pt_image);echo "---".$img_width."---".$img_height;
                                        ?>
                                        <tr>
                                            <td style="font-size: small;width:5px;"><?php echo $pt_slno; ?></td>
                                            <td style="font-size: small;"><?php echo $pt_title; ?></td>
                                            <td style="font-size: small; text-align:justify; max-height:60px;"><?php echo $pt_content; ?></td>
                                            <td style="font-size: small;"><?php echo $pt_catg; ?></td>
                                            <td style="font-size: small;"><?php echo $pt_datetime; ?></td>
                                            <td style="font-size: small;">
                                                
                                                    <button type="submit" class="btn btn-primary" name="delete<?php echo $i; ?>" data-toggle="modal" data-target="#myModal<?php echo $i; ?>">Delete</button>


                                                <!-- Modal -->
                                            <form enctype="multipart/form-data" role="form" method="post" action="controller/delete_action.php">
                                            <div class="modal fade" id="myModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                              <div class="modal-dialog">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Delete Blog post !!!</h4>
                                                  </div>
                                                  <div class="modal-body">

                                                     Are you sure to delete post =>&quot;<?php echo $pt_title; ?> &quot;<br>
                                                     Press &quot;Yes sure &quot; button to confirm or </br>
                                                     Press &quot; Cancel &quot; button to quit.
                                                     <?php echo $prev; ?>
                                                     <?php echo $next; ?>
                                                    <input type="hidden" name="pt_slno" value="<?php echo $pt_slno; ?>">
                                                     <input type="hidden" name="pt_title" value="<?php echo $pt_title; ?>">
                                                

                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary" name="delete">Yes sure</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>

                                            </form>
                                         </td>

                                        </tr>

                                        <?php $i=$i+1; 
                                     } ?>
                                </table>
                                <?php end: ?>
                                    <br><center>
                                        <a href ="view_all.php?process=prev&p=<?php echo $prev; ?>&n=<?php echo $next; ?>"><button type="button" class="btn btn-success" > Prev</button></a>
                                        <a href ="view_all.php?process=next&p=<?php echo $prev; ?>&n=<?php echo $next; ?>"><button type="button" class="btn btn-success" >Next  </button></a>
                                    </center>
                                        
                                    </div>
                                    <?php } ?><!-- /.box-body -->

                                    <!--<div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a href="dashboard.php"><button type="button" class="btn btn-primary">Cancel</button></a>
                                    </div> -->
                               
                        </div><!-- /.box -->

                    </div>

                    </div>

                </section>
                



<?php include 'footer.php'; ?>
<?php } ?>