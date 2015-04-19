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
<?php include'header.php'; ?>
    <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Dashboard
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>
            <!-- Main content -->
            
                <br/>
                <div class="container">
                    <div class="row">
                       <div class="col-xs-1">&nbsp;</div>
                        <div class="col-md-8" style="margin-left:-85px;">
                            <div class="row">
                                <div class="box box-primary">
                                    <div class="box-header">
                                        <h3 class="box-title" style="float:none !important;">Website Analytics</h3>
                                    </div>
                                    <div class="box-body">
                                         <table class="table table-striped table-responsive">

                                        <tr>
                                            <td style="width:5px;"><strong>No</strong></td>
                                            <td><strong>IP</strong></td>
                                            <td><strong>URL</strong></td>
                                            <td><strong>Browser</strong></td>
                                            <td><strong>Country</strong></td>
                                            <td><strong>Time</strong></td>
                                        </tr>
                                        <?php
                                        $sql_sel_tr = "SELECT *FROM track ORDER BY sl_no DESC LIMIT 10";
                                        $res = mysql_query($sql_sel_tr);
                                        $n=1;
                                        while($rows =mysql_fetch_array($res)){
                                        
                                        ?>
                                        <tr>
                                            <td style="width:5px;"><strong><?php echo $n; ?></strong></td>
                                            <td><strong><?php echo $rows['ip_address']; ?></strong></td>
                                            <td><strong><?php echo $rows['page_url']; ?></strong></td>
                                            <td><strong><?php echo $rows['browser']; ?></strong></td>
                                            <td><strong><?php echo $rows['country']; ?></strong></td>
                                            <td><strong><?php echo $rows['time']; ?></strong></td>
                                        </tr>
                                        <?php $n=$n+1; } ?>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-3" style="margin-left:25px;">
                            <div class="row">
                                <div class="box box-primary">
                                    <div class="box-header"><center>
                                        <h3 class="box-title" style="float:none !important;">Quick View</h3></center>
                                    </div>
                                    <div class="box-body">
                                        <table class="table table-striped table-responsive">
                                        <tr>
                                            <td><strong>Total Visitors</strong></td>
                                        </tr>
                                        <tr>
                                            <td><strong>
                                                <?php
                                                $sql_total="SELECT DISTINCT ip_address FROM track";
                                                $resl = mysql_query($sql_total);
                                                $res_arr = mysql_num_rows($resl);
                                                echo $res_arr; ?>
                                            </strong></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Total Visitors Today</strong></td>
                                        </tr>
                                        <tr>
                                            <td><strong><?php
                                                $date = date('y-m-d');
                                                $sql_total="SELECT DISTINCT ip_address FROM track WHERE time LIKE('%20$date%')";
                                                $resl = mysql_query($sql_total);
                                                $res_arr = mysql_num_rows($resl);
                                                echo $res_arr; ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Total Page Views</strong></td>
                                        </tr>
                                        <tr>
                                            <td><strong><?php
                                                
                                                $sql_total="SELECT *FROM track;";
                                                $resl = mysql_query($sql_total);
                                                $res_arr = mysql_num_rows($resl);
                                                echo $res_arr; ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td><strong>
                                                <button class="btn btn-large  btn-block btn-primary" onclick="location.href='view_analytics.php'">View Analytics</button>
                                                </strong></td>
                                        </tr>
                                        <br/>
                                        <tr>
                                            <td style="text-align:center;border-top-color: #3c8dbc;"><strong><h4><b>Web Anlysis</b></h4></strong></td>
                                        </tr>
                                        <tr>
                                            <td><strong> Menu Added</strong></td>
                                        </tr>
                                        <tr>
                                            <td><strong><?php
                                                
                                                $sql_total="SELECT *FROM menu;";
                                                $resl = mysql_query($sql_total);
                                                $res_arr = mysql_num_rows($resl);
                                                echo $res_arr; ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td><strong> Category Added</strong></td>
                                        </tr>
                                        <tr>
                                            <td><strong><?php
                                                
                                                $sql_total="SELECT *FROM catg;";
                                                $resl = mysql_query($sql_total);
                                                $res_arr = mysql_num_rows($resl);
                                                echo $res_arr; ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Category Using</strong></td>
                                        </tr>
                                        <tr>
                                            <td><strong><?php
                                                
                                                $sql_total="SELECT *FROM posts;";
                                                $resl = mysql_query($sql_total);
                                                $res_arr = mysql_num_rows($resl);
                                                echo $res_arr; ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Used Images</strong></td>
                                        </tr>
                                        <tr>
                                            <td><strong><?php
                                                
                                                $sql_total="SELECT *FROM media;";
                                                $resl = mysql_query($sql_total);
                                                $res_arr = mysql_num_rows($resl);
                                                echo $res_arr; ?></strong></td>
                                        </tr>
                                        
                                        <tr>
                                            <?php
                                            $sql_sel = "SELECT * FROM background  ORDER BY sl_no DESC LIMIT 1";
                                            $result = mysql_query($sql_sel) or die("Cant execute Query !!!");
                                            $fetch = mysql_fetch_array($result);
                                            $bg_photo =mysql_real_escape_string($fetch['bg_photo']);
                                            ?>
                                            <td><img src="bg-image/<?php echo $bg_photo; ?>" width="255" height="150">
                                                <br>
                                                <button class="btn btn-block btn-lg btn-warning" onclick="location.href='background.php'">
                                                Change Background
                                                </button></td>
                                        </tr>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            
<?php include'footer.php'; ?> 
<?php } ?>          