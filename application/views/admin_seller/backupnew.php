<?php $pages = 'manage_category'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css" media="all">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no"/>
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
    <script>// makes sure the whole site is loaded
        jQuery(window).load(function () {
            // will first fade out the loading animation
            jQuery("#status").fadeOut();
            // will fade out the whole DIV that covers the website.
            jQuery("#preloader").delay(1000).fadeOut("slow");
        })
    </script>
</head>
<body class=" sidebar_main_open sidebar_main_swipe">
<?php include('header.php'); ?>
<?php include('header_top.php'); ?>

<?php
if(isset($_POST)){


//load helpers

$this->load->helper('file');
$this->load->helper('download');
$this->load->library('zip');

//load database
$this->load->dbutil();

//create format
$db_format=array('format'=>'zip','filename'=>'backup.sql');

$backup=& $this->dbutil->backup($db_format);

// file name

$dbname='backup-on-'.date('d-m-y H:i').'.zip';
$save='assets/db_backup/'.$dbname;

// write file

write_file($save,$backup);

// and force download
force_download($dbname,$backup);

}
	
?>
<div id="page_content" style="margin-left:0px;">
    <div id="page_content_inner">
		<h4 class="heading_a uk-margin-bottom" style="margin-bottom: 30px;">Order Reports 
			<!--<button class="md-btn" data-uk-modal="{target:'#modal_header_footer'}">Open</button>-->
			<form method="POST">
			
			<button type="submit" class="md-btn" style="margin-top:3px;">Submit</button>
			
			</form>
			

</h4>
		
       
                         


		
        <div class="md-card uk-margin-medium-bottom">
            <div class="uk-width-large-1-1">


                <main>
                    <section class="mb-5">


                        <!--Card-->
                        <div class="card card-cascade narrower">


                            <!--Card header-->
                            <div class="view view-cascade py-3 gradient-card-header info-color-dark mx-4 d-flex justify-content-between align-items-center">


                                <a href="" class="white-text mx-3"> View Report </a>

                                <div>

                                    
								<button class="btn btn-outline-white btn-rounded btn-sm px-2 waves-effect waves-light"
                                            href="#" data-uk-tooltip="{pos:'bottom'}" title="XLS"
                                            onclick="$('#order').tableExport({type:'excel',escape:'false'});">
                                        <i class="fa fa-download mt-0"></i>
                                    </button>
                                </div>

                            </div>
                            <!--/Card header-->

                           
                            <div class="card-body card-body-cascade">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-sm" id="order" style="border: 2px solid whitesmoke !important;">
                                        <thead>
                                        <tr>
                                            <th><strong>S. No.</strong></th>
                                            <th><strong>Order No.</strong></th>
                                            <th><strong>Qtr</strong></th>
                                            <th><strong>Principal Name</strong></th>
                                            <th><strong>PO Number</strong></th>
                                            <th><strong>Customer Name</strong></th>
                                            <th><strong>P Name</strong></th>
                                            <th><strong>P Qty</strong></th>
                                            <th><strong>Subtotal</strong></th>
                                            <th><strong>Currency</strong></th>
                                            <th><strong>Commission</strong></th>
                                            <!--<th><strong>Total USD</strong></th>
                                            <th><strong>Total EUR</strong></th>-->

                                        </tr>
                                        </thead>
                                        <tbody>
                                        
                                        </tbody>
                                    </table>
                                </div>
                                <!--Bottom Table UI-->
                                <div class="d-flex justify-content-between" style="float:right;">

                                    <!--Name-->
                                    <div class="select-wrapper mdb-select colorful-select dropdown-primary mt-2 hidden-md-down"
                                         style="display:none;"><span class="caret">▼</span><input type="text"
                                                                                                  class="select-dropdown"
                                                                                                  readonly="true"
                                                                                                  data-activates="select-options-da569603-de11-4dd2-9709-70349bed66c1"
                                                                                                  value="">
                                        <ul id="select-options-da569603-de11-4dd2-9709-70349bed66c1"
                                            class="dropdown-content select-dropdown w-100"
                                            style="width: 181px; position: absolute; top: -159px; left: 0px; opacity: 1; display: none;">
                                            <li class="disabled "><span class="filtrable">  Rows number</span></li>
                                            <li class="active"><span class="filtrable">  10 rows</span></li>
                                            <li class=" "><span class="filtrable">  25 rows</span></li>
                                            <li class=" "><span class="filtrable">  50 rows</span></li>
                                            <li class=" "><span class="filtrable">  100 rows</span></li>
                                        </ul>
                                        <select class="mdb-select colorful-select dropdown-primary mt-2 hidden-md-down initialized">
                                            <option value="" disabled="">Rows number</option>
                                            <option value="1" selected="">10 rows</option>
                                            <option value="2">25 rows</option>
                                            <option value="3">50 rows</option>
                                            <option value="4">100 rows</option>
                                        </select></div>

                                    

                                </div>
                                <!--Bottom Table UI-->

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

                <script>
                    $(function () {
                        // enable hires images
                        altair_helpers.retina_images();
                        // fastClick (touch devices)
                        if (Modernizr.touch) {
                            FastClick.attach(document.body);
                        }
                    });
                </script>
				
				<script>
				 function getfilterdata() {
        var duration = $('#duration').val();
		var yearduration = $('#yearduration').val();
        var customed = $('#customed').val();


        jQuery.ajax({
            type: "POST",
            url: 'http://risusventures.com/usermanagement2/latestwork/kunal/seller/reportsfilter',
            data: {'duration': duration,'yearduration': yearduration,'cid':customed},
            // dataType: "json",
            success: function (data) {
				//jQuery(".customercontactdiv").removeClass('hide');
                jQuery(".customerdatares").html(data);
				$("#exlbtn").css("display", "block");
            }
        });
}
					

function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}
</script>
</body>
</html>