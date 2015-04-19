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
                        <small>Add CV Sections </small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">About</li>
                        <li class="active">Add About</li>
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
                                    <h3 class="box-title" style="float:none !important;">Add CV Sections </h3>
                                    
                                </div><!-- /.box-header -->
                                    <!-- form start -->
                                <form enctype="multipart/form-data" class="form-horizontal" role="form" method="post" action="controller/about_action.php">

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Enter Section Name</label>
                                        <div class="col-sm-6" style="padding-right:0px;">
                                            <input type="text" name="sec_name" class="form-control" required="required">
                                        </div>
                                        <div class="col-sm-3" >
                                            <input type="submit" class="btn btn-primary" value="Add" name="submit">
                                            <br><br>
                                        </div>

                                    </div>
                                </form>
                            </div><!-- /.box-body -->

                        </div><!-- /.box -->

                    </div>

                </section>
                
                <section class="content">
                    
                    <div class="col-md-12 col-sm-6">
                        <div class="row">
                             <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title" style="float:none !important;">All CV Sections </h3><br>
                                    <div class="col-md-12">
                                        <div class="middle">
                                            <?php
                                            $sql_sel_menu = "SELECT *FROM section ORDER BY sec_id DESC LIMIT 15";
                                            $result_menu = mysql_query($sql_sel_menu) or die("Cant execute Query !!!");
                                            $co=0;
                                            while($fetch = mysql_fetch_array($result_menu)){
                                            $menu = htmlspecialchars($fetch['sec_name']);
                                            $menu_id = htmlspecialchars($fetch['sec_id']);
                                             ?>
                                            <div class="menu-sp" style="float:left;margin-left:10px;margin-top:10px;width=80px;">
                                            <button type="button"  class="btn btn-sm btn-default" data-toggle="modal" data-target="#myModal<?php echo $co; ?>"><?php echo $menu; ?> &nbsp;&nbsp;
                                                <span class="btn btn-xs btn-danger glyphicon glyphicon-remove"></span>
                                            </button>
                                            </div>
                                            <!-- Modal -->
                                            <form method="post" class="form-horizontal" action="controller/delete_about_action.php" type="text/multipart">
                                                <div class="modal fade" id="myModal<?php echo $co; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Drop Section - <?php echo $menu; ?> ?!</h4>
                                                      </div>
                                                      <div class="modal-body">
                                                        Are you sure want to Drop this Section from CV ?
                                                        <input type="hidden" name="sec_id" value="<?php echo $menu_id; ?>">
                                                        <input type="hidden" name="sec_name" value="<?php echo $menu; ?>">
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary" name="submit_menu">Yes Sure</button>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                            </form>
                                            <?php $co=$co+1; } ?>
                                        </div>
                                        
                                    </div>
                                        
                                </div><!-- /.box-header -->
                                <br> <!-- form start -->
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div>
                </section>
               
<?php } include 'footer.php'; ?>