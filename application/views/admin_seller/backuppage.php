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
		.btlback{
			float: right;
			margin: -2px 0px 0px 0px;
			background: #673ab7;
			color: #fff;
			padding: 6px 15px;
			border-radius: 8px;
			border: 2px solid #673ab7;
		}
    </style>
    
</head>
<body class=" sidebar_main_open sidebar_main_swipe">
<?php include('header.php'); ?>
<?php include('header_top.php'); ?>

<div id="page_content" style="margin-left:0px;">
    <div id="page_content_inner">
		<h4 class="heading_a uk-margin-bottom" style="margin-bottom: 30px;">Order Reports 
			<!--<button class="md-btn" data-uk-modal="{target:'#modal_header_footer'}">Open</button>-->
			
			

</h4>
		
       <div class="uk-modal" id="modal_header_footer">
                                <div class="uk-modal-dialog">
									<button type="button" class="uk-modal-close uk-close"></button>
                                 
	
									
									
									<div class="customerdatares"></div>
									
									
									<button style="display:none" id="exlbtn" onclick="exportTableToExcel('order1')" class="md-btn">Export Excel File</button>
                                  
                                </div>
		    
                            </div>
                         


		
        <div class="md-card uk-margin-medium-bottom">
            <div class="uk-width-large-1-1">


                <main>
                    <section class="mb-5">


                        <!--Card-->
                        <div class="card card-cascade narrower">

<form method='post' action='download.php'>
                            <!--Card header-->
                            <div class="view view-cascade py-3 gradient-card-header info-color-dark mx-4 d-flex justify-content-between align-items-center" style="padding: 10px;">


                                <a href="" class="white-text mx-3"> View Report </a>

                                

                                    
								<button class="btn btn-outline-white btn-rounded btn-sm px-2 waves-effect waves-light"
                                            href="#" data-uk-tooltip="{pos:'bottom'}" title="XLS"
                                            onclick="$('#order').tableExport({type:'excel',escape:'false'});">
                                        <i class="fa fa-download mt-0"></i>
                                    </button>
									
									<input class="btlback" type='submit' value='Generate Backup' name='Export'>
                               

                            </div>
                            <!--/Card header-->

                           
							
                            <div class="card-body card-body-cascade">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-sm" id="order" style="border: 2px solid whitesmoke !important;">
                                        <thead>
                                        <tr>
                                            <th style="color:#1976d2"><b>S.No.</b></th>
                                        <th style="width:140px !important;color:#1976d2"><b>Principal Name</b></th>
                                        <th style="width:140px !important;color:#1976d2"><b>Customer Name</b></th>
                                        <th style="width:140px !important;color:#1976d2"><b>Company Name</b></th>
                                        <th style="color:#1976d2"><b>Products</b></th>
                                        <th style="color:#1976d2"><b>Qty</b></th>
                                        <th style="color:#1976d2"><b>Invoice No</b></th>

                                        <!--<th  style="color:#1976d2"><b>EUR</b></th>-->
                                        <th style="color:#1976d2"><b>Order Date</b></th>
                                        <th style="color:#1976d2"><b>place Date</b></th>
                                        <th style="color:#1976d2"><b>payment Date</b></th>
                                        <th style="color:#1976d2"><b>Order No.</b></th>
                                        <th style="width:110px !important;color:#1976d2"><b>PO</b></th>
                                        <th style="color:#1976d2"><b>USD/EUR</b></th>
                                        <!--<th style="width:100px !important;color:#1976d2"><b>Adjust amount</b></th>-->
                                            <!--<th><strong>Total USD</strong></th>
                                            <th><strong>Total EUR</strong></th>-->

                                        </tr>
                                        </thead>
                                        <tbody>
                                       <?php $i = 1;

										$user_arr = array();
                                    foreach ($list_order as $order) {
										
										// echo '<pre>';
										// print_r($order);
										
										
                                        $order_products = explode(';--order--;', $order['orders_products']);
                                        ?>
                                        <tr>

                                            <td style="text-align:center;"><?php echo $i++; ?></td>
                                            <td style="text-align:center;"
                                                style="text-align:center;"><?php echo " " . $order['Principal_person']; ?></td>
                                            <td style="text-align:center;"><?php echo $order['customer_person']; ?></td>
                                            <td style="text-align:center;"><?php if(!empty($order['p_c_id'])){
																if($order['p_c_id']=='42'){
																	echo 'Corina Hendriks';
																}elseif($order['p_c_id']=='43'){
																	echo 'Roel Hebben';
																}
																elseif($order['p_c_id']=='44'){
																	echo 'Arno Kerssemakers';
																}
																elseif($order['p_c_id']=='45'){
																	echo 'Sonja';
																}
																elseif($order['p_c_id']=='46'){
																	echo 'Mark Segeren';
																}else{
																
																}
															} ?></td>
                                            <td style="text-align:center;"> <?php
                                                if (!empty($order_products)) {
                                                    foreach ($order_products as $order_product) {
                                                        $order_product = explode('--info--', $order_product);
                                                        echo '<li>' . $order_product[3] . '</li>'; ?><br>
                                                    <?php }
                                                } ?> </td>
                                            <td><?php
                                                if (!empty($order_products)) {
                                                    foreach ($order_products as $order_product) {
                                                        $order_product = explode('--info--', $order_product);
                                                        echo '<li style="list-style-type: none;">' . $order_product[4] . '</li>'; ?>
                                                        <br>
                                                    <?php }
                                                } ?></td>
                                            <td style="text-align:center;" style="text-align:center;"
                                                style="text-align:center;" style="text-align:center;"
                                                style="text-align:center;"><?php echo $order['invoice_no']; ?></td>

                                            <!--<td><?php echo $order['totaleur']; ?></td>-->
                                            <td style="text-align:center;" style="text-align:center;"><?php echo $order['orderdate']; ?></td>
                                            <td style="text-align:center;" style="text-align:center;"><?php echo $order['datecretaed']; ?></td>
                                            <td style="text-align:center;" style="text-align:center;"><?php echo $order['paymentexpecteddate']; ?></td>
                                            <td style="text-align:center;" style="text-align:center;"
                                                style="text-align:center;"><?php echo $order['order_no'];//echo '00'.$order['id']?> </td>
                                            <td style="text-align:center;"
                                                style="text-align:center;">
                                                <?php
                                                if (!empty($order_products)) {
                                                    foreach ($order_products as $order_product) {
                                                        $order_product = explode('--info--', $order_product);
                                                        echo '<li style="list-style-type: none;">' . $order_product[8] . '</li>'; ?>
                                                        <br>
                                                    <?php }
                                                }
                                                ?>
                                            </td>
                                            <td style="text-align:center;"><?php echo round($order['totalusd'], 2) . '/' . round($order['totaleur'], 2); ?></td>
                                            <!--<td style="text-align:center;"><?php echo $order['acceptmoney']; ?></td>-->
                                            
                                        </tr>
										 <?php
										 $str3 ='';
                                                if (!empty($order_products)) {
                                                    foreach ($order_products as $order_product) {
                                                        $order_product = explode('--info--', $order_product);
                                                       $str3 .= ' ' . $order_product[3] . ' '; ?>
                                                    <?php }
                                                } ?> 
												<?php
												$qty='';
                                                if (!empty($order_products)) {
                                                    foreach ($order_products as $order_product) {
                                                        $order_product = explode('--info--', $order_product);
                                                        $qty .= $order_product[4]; ?>
                                                       
                                                    <?php }
                                                } ?>
												 <?php
												 $sdsf='';
                                                if (!empty($order_products)) {
                                                    foreach ($order_products as $order_product) {
                                                        $order_product = explode('--info--', $order_product);
                                                       $sdsf .= $order_product[8]; ?>
                                                    <?php }
                                                }
                                                ?>
												
												
										<?php
										$na='';
										if(!empty($order['p_c_id'])){
																if($order['p_c_id']=='42'){
																	$na= 'Corina Hendriks';
																}elseif($order['p_c_id']=='43'){
																	$na= 'Roel Hebben';
																}
																elseif($order['p_c_id']=='44'){
																	$na= 'Arno Kerssemakers';
																}
																elseif($order['p_c_id']=='45'){
																	$na= 'Sonja';
																}
																elseif($order['p_c_id']=='46'){
																	$na= 'Mark Segeren';
																}else{
																
																}
										}
																$cggh ='';
																$cggh = round($order['totalusd'], 2) . '/' . round($order['totaleur'], 2);
																
																$date1=date_create($order['orderdate']);
																$date2=date_create($order['datecretaed']);
																$date3=date_create($order['paymentexpecteddate']);
																

																
							$user_arr[] = array($order['Principal_person'],$order['customer_person'],$na,$str3,$qty,$order['invoice_no'],date_format($date1,"Y/m/d"),date_format($date2,"Y/m/d"),date_format($date3,"Y/m/d"),$order['order_no'],$sdsf,$cggh,$order['acceptmoney']);
								
								?>
										
                                    <?php }
									
                                    $i++;
$serialize_user_arr = serialize($user_arr);
									?>
                                        </tbody>
                                    </table>
                                </div>
								<textarea name='export_data' style='display: none;'><?php echo $serialize_user_arr; ?></textarea>
                                <!--Bottom Table UI-->
                                </form>
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
					

</script>
</body>
</html>