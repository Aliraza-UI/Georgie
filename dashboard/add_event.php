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
                        Event 
                        <small>Add UPCOMING Events to your website </small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Event</li>
                        <li class="active">Add Event</li>
                    </ol>
                </section>
                <div class="container">
                	<br><br>
                	<div class="row">
	                	<form method="post" action="controller/event_action.php" enctype="multipart/data">
	                		<div class="col-md-3">&nbsp;</div>
	                		<div class="col-md-6">
	                		<div class="form-group">
	                            <label class="col-md-2 control-label">Event</label>
	                            <div class="col-md-6">
	                            	<input type="text" name="event" class="form-control">
	                            </div>
	                        </div><br><br>
	                        <div class="form-group">
	                            <label class="col-md-2 control-label">Place</label>
	                            <div class="col-md-6">
	                            	<input type="text" name="place" class="form-control">
	                            </div>
	                        </div><br><br>
	                        <div class="form-group">
	                            <label class="col-md-2 control-label">Date</label>
	                            <div class="col-md-6">
	                            	<input type="text" name="tdate" class="form-control" placeholder="From date(d-m) - To date(d-m-y)">
	                            </div>
	                        </div><br><br>
	                        <div class="form-group">
	                            <label class="col-md-2 control-label"></label>
	                            <div class="col-md-6">
	                            	<input type="submit" class="btn btn-sm btn-danger" name="submit_event" value="Add Event" class="form-control">
	                            </div>
	                        </div>


	                		</div>
	                		<div class="col-md-2">&nbsp;</div>
	                	</form>
                	</div>
                </div>
                <br><br>
                <div class="container">
                    <div class="row">
                        <div class="col-md-2">&nbsp;</div>
                        <div class="col-md-7">
                            <div class="row">
                                <div class="box box-primary">
                                    <div class="box-header">
                                        <h3 class="box-title" style="float:none !important;">View All Events</h3>
                                    </div>
                                    <div class="box-body">
                                         <table class="table table-striped table-responsive">

                                        <tr>
                                            <td style="width:5px;"><strong>No</strong></td>
                                            <td><strong>Event</strong></td>
                                            <td><strong>Place</strong></td>
                                            <td><strong>Date</strong></td>
                                            <td><strong>Edit</strong></td>
                                            <td><strong>Delete</strong></td>
                                        </tr>
                                        <?php
                                        $sql_sel_tr = "SELECT *FROM event ORDER BY sl_no DESC LIMIT 10";
                                        $res = mysql_query($sql_sel_tr);
                                        $n=1;
                                        while($rows =mysql_fetch_array($res)){
                                        
                                        ?>
                                        <tr>
                                            <td style="width:5px;"><strong><?php echo $n; ?></strong></td>
                                            <td><strong><?php echo $rows['name']; ?></strong></td>
                                            <td><strong><?php echo $rows['place']; ?></strong></td>
                                            <td><strong><?php echo $rows['date']; ?></strong></td>
                                            <td><button type="submit" class="btn btn-primary" name="Edit<?php echo $n; ?>" data-toggle="modal" data-target="#myModal_edit<?php echo $n; ?>">Edit</button></td>
                                            <td><button type="submit" class="btn btn-primary" name="delete<?php echo $n; ?>" data-toggle="modal" data-target="#myModal<?php echo $n; ?>">Delete</button></td>
                                            
                                        </tr>
                                        <form enctype="multipart/form-data" role="form" method="post" action="controller/edit_event.php">
                                            <div class="modal fade" id="myModal_edit<?php echo $n; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                              <div class="modal-dialog">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Edit event  !!!</h4>
                                                  </div>
                                                  <div class="modal-body">

                                                    <input type="hidden" name="ev_slno" value="<?php echo $rows['sl_no']; ?>">
                                                    
                                 <div class="form-group">
	                            <label class="col-md-2 control-label">Event</label>
	                            <div class="col-md-6">
	                            	<input type="text" name="event" value="<?php echo $rows['name']; ?>" class="form-control">
	                            </div>
	                        </div><br><br>
	                        <div class="form-group">
	                            <label class="col-md-2 control-label">Place</label>
	                            <div class="col-md-6">
	                            	<input type="text" name="place" value="<?php echo $rows['place']; ?>" class="form-control">
	                            </div>
	                        </div><br><br>
	                        <div class="form-group">
	                            <label class="col-md-2 control-label">Date</label>
	                            <div class="col-md-6">
	                            	<input type="text" name="tdate" value="<?php echo $rows['date']; ?>" class="form-control" placeholder="From date(d-m) - To date(d-m-y)">
	                            </div>
	                        </div><br><br>
	                        
	                        		</div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary" name="edit_event">Edit</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>

                                            </form>
                                        <form enctype="multipart/form-data" role="form" method="post" action="controller/delete_event.php">
                                            <div class="modal fade" id="myModal<?php echo $n; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                              <div class="modal-dialog">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Delete Event  !!!</h4>
                                                  </div>
                                                  <div class="modal-body">

                                                     Are you sure want to delete Event =>&quot;<?php echo $rows['name']; ?> &quot;<br>
                                                     Press &quot;Yes sure &quot; button to confirm or </br>
                                                     Press &quot; Cancel &quot; button to quit.
                                                     
                                                    <input type="hidden" name="ev_slno" value="<?php echo $rows['sl_no']; ?>">
                                                     
                                                

                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary" name="de_event">Yes sure</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>

                                            </form>
                                        <?php $n=$n+1; } ?>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>






<?php } include 'footer.php'; ?>