<?php $pages = 'manage_category'; ?>
<?php 
// specifying directory 
$mydir = '/var/www/vhosts/risusventures.com/httpdocs/backup/files/'; 
$mydir2 = '/var/www/vhosts/risusventures.com/httpdocs/backup/db/'; 
  
//scanning files in a given diretory in ascending order 
$myfiles = scandir($mydir); 
$myfiles2 = scandir($mydir2); 
  
//displaying the files in the directory 
//print_r($myfiles); 

//$filename = $_FILES['video_file']['name'];


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css" media="all">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no"/>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/img/risus-03.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/img/risus-03.png" sizes="32x32">
    <title>Order Report - Risus Ventures</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/uikit/css/uikit.almost-flat.min.css"
          media="all">
    <!-- flag icons -->
    <link rel="stylesheet"
          href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/content/jquery/tutorials/bootstrap/tutorial-3/10/css/mdb.min.css"
          media="all">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"
          href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/content/jquery/tutorials/bootstrap/tutorial-3/10/css/style.css"
          media="all">
    <link rel="stylesheet"
          href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/content/jquery/tutorials/bootstrap/tutorial-3/10/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/icons/flags/flags.min.css" media="all">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/main.min.css" media="all">
    <link rel="stylesheet"
          href="<?php echo base_url(); ?>assets/bower_components/kendo-ui/styles/kendo.common-material.min.css"/>
    <link rel="stylesheet"
          href="<?php echo base_url(); ?>assets/bower_components/kendo-ui/styles/kendo.material.min.css"/>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <script src="<?php echo base_url() ?>assets/js/pages/plugins_datatables.min.js"></script>
    <?php include('analytics.php'); ?>
    <script></script>


    <script src="<?php echo base_url(); ?>assets/js/common.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/uikit_custom.min.js"></script>

<style>
.single {
padding: 30px 15px;
margin-top: 40px;
background: #fcfcfc;
border: 1px solid #f0f0f0; }
.single h3.side-title {
margin: 0;
margin-bottom: 10px;
padding: 0;
font-size: 20px;
color: #333;
text-transform: uppercase; }
.single h3.side-title:after {
content: '';
width: 60px;
height: 1px;
background: #ff173c;
display: block;
margin-top: 6px; }

.single ul {
margin-bottom: 0; }
.single li a {
color: #666;
font-size: 14px;
text-transform: uppercase;
border-bottom: 1px solid #f0f0f0;
line-height: 40px;
display: block;
text-decoration: none; }
.single li a:hover {
color: #ff173c; }
.single li:last-child a {
border-bottom: 0; }
</style>

    <style>
	.row{margin-bottom:40px;}
        .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
            font-size: 13px;
            padding: 15px !important;
        }


        .uk-table thead th {
            color: #1976d2 !important;
        }

        .tablesorter-altair .tablesorter-headerAsc .tablesorter-header-inner::after {
            color: #1976d2 !important;
        }

        .tablesorter-altair .tablesorter-header-inner::after {
            color: #1976d2 !important;
        }
		.list-unstyled li {
			display: flex;
			justify-content: space-between;
			border-bottom: 1px solid #ccc;
			text-transform: uppercase;
			line-height: 3;
			color: #5f5f5f;
		}
		.list-unstyled li:hover {
			color: red;
		}
        #preloader {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #fefefe;
            z-index: 99;
            height: 100%;
        }

        #status {
            width: 200px;
            height: 200px;
            position: absolute;
            left: 50%;
            top: 50%;

            background-repeat: no-repeat;
            background-position: center;
            margin: -100px 0 0 -100px;
        }
    </style>
    
</head>
<body class=" sidebar_main_open sidebar_main_swipe">
<?php include('header.php'); ?>
<?php include('header_top.php'); ?>

<div id="page_content" style="margin-left:0px;">
    <div id="page_content_inner">
		<h4 class="heading_a uk-margin-bottom" style="margin-bottom: 30px;">Order Backups 
			<!--<button class="md-btn" data-uk-modal="{target:'#modal_header_footer'}">Open</button>-->
			
			

</h4>
		
                         


		
        <div class="md-card uk-margin-medium-bottom">
            <div class="uk-width-large-1-1">


                <main>
                    <section class="mb-5">


                        <!--Card-->
                        <div class="card card-cascade narrower">


                            <!--Card header-->
                            
                            <!--/Card header-->

                         <div class="container"> <div class="row">
<div class="col-md-6">
	<!-- Category -->
	<div class="single category">
		<h3 class="side-title">Database Backup</h3>
		<ul class="list-unstyled">
			<?php 
			$allowed1 = array('zip');
			foreach($myfiles2 as $file1){
	if(!empty($file1)){
		
		$ext = pathinfo($file1, PATHINFO_EXTENSION);
		if (!in_array($ext, $allowed1)) {
			//echo 'error';
		}else{
			print'<li>'.str_replace(".zip","",$file1).'<span class="pull-right "><a href="http://risusventures.com/backup/db/'.$file1.'" download ><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTVxptEySeba2z2bjacKIRy4QxVFlwJCoYwXNLigWezLNbP03Zd&s"  width="25" height="25"></a></span></li>';
		}
		
		
	}
} ?>
			
		
			
		</ul>
   </div>
</div> 
<div class="col-md-6">
	<!-- Category -->
	<div class="single category">
		<h3 class="side-title">Files Backup</h3>
		<ul class="list-unstyled">
				<?php 
				$allowed = array('zip');
				foreach($myfiles as $file){
	if(!empty($file)){
		
		$ext = pathinfo($file, PATHINFO_EXTENSION);
		if (!in_array($ext, $allowed)) {
			//echo 'error';
		}else{
			print'<li>'.str_replace(".zip","",$file).'<span class="pull-right "><a href="http://risusventures.com/backup/files/'.$file.'" download ><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTVxptEySeba2z2bjacKIRy4QxVFlwJCoYwXNLigWezLNbP03Zd&s"  width="25" height="25"></a></span></li>';
		}
		
		
	}
} ?>
		</ul>
   </div>
</div> 
</div>
                                <!--Bottom Table UI-->

                            </div>
                            </div>
                            <!--/.Card content-->

                        </div>
                        <!--/.Card-->

                    </section>

                </main>


                <!-- common functions -->
                <script src="<?php echo base_url() ?>assets/js/common.min.js"></script>
                <!-- uikit functions -->
                <script src="<?php echo base_url() ?>assets/js/uikit_custom.min.js"></script>
                <!-- altair common functions/helpers -->
                <script src="<?php echo base_url() ?>assets/js/altair_admin_common.min.js"></script>

                <!-- page specific plugins -->
                <!-- datatables -->
                <script src="<?php echo base_url() ?>assets/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
                <!-- datatables colVis-->
                <script src="<?php echo base_url() ?>assets/bower_components/datatables-colvis/js/dataTables.colVis.js"></script>
                <!-- datatables tableTools-->
                <script src="<?php echo base_url() ?>assets/bower_components/datatables-tabletools/js/dataTables.tableTools.js"></script>
                <!-- datatables custom integration -->
                <script src="<?php echo base_url() ?>assets/js/custom/datatables_uikit.min.js"></script>
                <!-- kendo UI -->
                <script src="<?php echo base_url() ?>assets/js/kendoui_custom.min.js"></script>

                <!--  kendoui functions -->
                <script src="<?php echo base_url() ?>assets/js/pages/kendoui.min.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/tableExport.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery.base64.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/html2canvas.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/jspdf/libs/sprintf.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/jspdf/jspdf.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/jspdf/libs/base64.js"></script>
                <script type="text/javascript"
                        src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>