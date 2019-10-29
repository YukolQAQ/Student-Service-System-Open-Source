<?php
require("app/core_auth.php");
$menu=2;
$orgname=$_SESSION["orgname"];
$suauth=$_SESSION["suauth"];
$iden=$_SESSION["iden"];
if($iden<>"yes" and $suauth<>"1" and $orgname<>"院团委"){
	mysqli_close($con);
	header("refresh:0;url=tw_main.php?did=14");
	exit();
}

//检查是否是科创中心成员

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">
	<link href="css/dataTables.bootstrap.css" rel="stylesheet">
    <title>第二课堂凭证审核</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link href="fa/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-daterangepicker/daterangepicker.css" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
    <link href="css/dataTables.bootstrap.css" rel="stylesheet">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
<?php include("public_gift.php"); ?>
  <section id="container" class="">
      <?php include("public_header.php"); include("public_sidebar.php"); ?>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <section class="panel">
                          <header class="panel-heading">
                              待审核的申请
                          </header>
                          <div class="table-responsive">
                          	<table class="table table-bordered table-striped table-hover dataTable">
                             <caption>所有待审核的申请</caption>
                              <thead>
                              <tr>
                                  <th>活动名称</th>
                                  <th>举办时间</th>
                                  <th>单位</th>
                                  <th>分值</th>
                                  <th>所属板块</th>
                                  <th>备注</th>
                                  <th>详情</th>
                                  <th>操作</th>
                              </tr>
                              </thead>
                              <tfoot>
                              <tr>
                                  <th>活动名称</th>
                                  <th>举办时间</th>
                                  <th>单位</th>
                                  <th>分值</th>
                                  <th>所属板块</th>
                                  <th>备注</th>
                                  <th>详情</th>
                                  <th>操作</th>
                              </tr>
                              </tfoot>
                              <tbody>
                              <?php 
								  $sign_result=mysqli_query($con,"select * from stu_erkeku where status='审核中';");
								  while($sign=mysqli_fetch_row($sign_result)){
								?>
                              <tr>
                                  <td><?php echo $sign[1]; ?></td>
                                  <td><?php echo $sign[2]; ?></td>
                                  <td><?php echo $sign[3]; ?></td>
                                  <td><?php echo $sign[4]; ?></td>
                                  <td><?php echo $sign[5]; ?></td>
                                  <td><?php echo $sign[6]; ?></td>
                                  <td><a href="qr_sign_record.php?actid=<?php echo base64_encode($sign[8]); ?>" target="_blank">签到记录</a></td>
                                  <td><a href="app/sec_card_pass.php?eid=<?php echo $sign[0]."&actid=".$sign[8]."&upsn=".$sign[10]; ?>" class="btn btn-xs btn-success">
                                  通过
                              </a>
                              <a href="app/sec_card_unpass.php?eid=<?php echo $sign[0]; ?>" class="btn btn-xs btn-danger">
                                  不通过
                              </a></td>
								
                              </tr>
                              <?php } ?>
                              </tbody>
                          </table>
                          </div>
                      </section>
              <section class="panel">
                          <header class="panel-heading">
                              已通过的申请
                          </header>
                          <div class="table-responsive">
                          	<table class="table table-bordered table-striped table-hover dataTable js-exportable">
                             <caption>所有已通过的申请</caption>
                              <thead>
                              <tr>
                                  <th>活动名称</th>
                                  <th>举办时间</th>
                                  <th>单位</th>
                                  <th>分值</th>
                                  <th>所属板块</th>
                                  <th>备注</th>
                              </tr>
                              </thead>
                              <tfoot>
                              <tr>
                                  <th>活动名称</th>
                                  <th>举办时间</th>
                                  <th>单位</th>
                                  <th>分值</th>
                                  <th>所属板块</th>
                                  <th>备注</th>
                              </tr>
                              </tfoot>
                              <tbody>
                              <?php 
								  $sign_result=mysqli_query($con,"select * from stu_erkeku where status='已通过';");
								  while($sign=mysqli_fetch_row($sign_result)){
								?>
                              <tr>
                                  <td><?php echo $sign[1]; ?></td>
                                  <td><?php echo $sign[2]; ?></td>
                                  <td><?php echo $sign[3]; ?></td>
                                  <td><?php echo $sign[4]; ?></td>
                                  <td><?php echo $sign[5]; ?></td>
                                  <td><?php echo $sign[6]; ?></td>								
                              </tr>
                              <?php } ?>
                              </tbody>
                          </table>
                          </div>
                      </section>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>

    <script src="js/jquery-ui-1.9.2.custom.min.js"></script>

    <!--custom switch-->
    <script src="js/bootstrap-switch.js"></script>
    <!--custom tagsinput-->
    <script src="js/jquery.tagsinput.js"></script>
    <!--custom checkbox & radio-->
    <script type="text/javascript" src="js/ga.js"></script>

    <script type="text/javascript" src="assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="assets/bootstrap-daterangepicker/date.js"></script>
    <script type="text/javascript" src="assets/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script type="text/javascript" src="assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
    <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>


  <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

  <!--script for this page-->
  <script src="js/form-component.js"></script>
  
  <!-- TABLE -->
	<script src="js/bootstrap.js"></script>
	<script src="js/jquery-datatable/jquery.dataTables.js"></script>
    <script src="js/jquery-datatable/dataTables.bootstrap.js"></script>
    <script src="js/jquery-datatable/dataTables.buttons.min.js"></script>
    <script src="js/jquery-datatable/buttons.flash.min.js"></script>
    <script src="js/jquery-datatable/jszip.min.js"></script>
    <script src="js/jquery-datatable/pdfmake.min.js"></script>
    <script src="js/jquery-datatable/vfs_fonts.js"></script>
    <script src="js/jquery-datatable/buttons.html5.min.js"></script>
    <script src="js/jquery-datatable/buttons.print.min.js"></script>
    <script src="js/jquery-datatable/jquery-datatable.js"></script>
	<!-- TABLE -->

  </body>
</html>
<?php mysqli_close($con); ?>