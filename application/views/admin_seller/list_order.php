<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css" media="all">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>

    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/img/risus-03.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/img/risus-03.png" sizes="32x32">

    <title>View Orders - Risus Ventures</title>
    
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- uikit -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/uikit/css/uikit.almost-flat.min.css"
          media="all">
    <!-- flag icons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/icons/flags/flags.min.css" media="all">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.min.css" media="all">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/jquery.comiseo.daterangepicker.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.min.css" media="all">
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

    <script id="script_e1">
        jQuery(function () {
            $("#e1").daterangepicker();
        });
    </script>
   
    <script>// makes sure the whole site is loaded
        jQuery(window).load(function () {
            // will first fade out the loading animation
            jQuery("#status").fadeOut();
            // will fade out the whole DIV that covers the website.
            jQuery("#preloader").delay(1000).fadeOut("slow");
        })
    </script>
	<style>
	.tablesorter-altair .tablesorter-header-inner {
    position: relative;
    padding: 0 0px 0 0 !important;
}
	</style>

</head>
<body class=" sidebar_main_open sidebar_main_swipe" style="background-color:white;">
<?php include('header.php'); ?>
<?php include('header_top.php'); ?>
<div id="page_content" style="margin-left:0px;">
    <div id="page_content_inner">
        <h3 class="heading_a uk-margin-bottom">Manage Order  <button type="button"
                                        class="btn btn-outline-white btn-rounded btn-sm px-2 waves-effect waves-light"
                                        href="#" onclick="location.reload();" style="float: right;">
                                   <i class="material-icons">cloud_download</i>
                                </button></h3>

        <div class="md-card">
            <?php if(!empty($_GET['message'])){ if ($_GET['message'] == 'already') {
                echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">
         <a href="#" class="uk-alert-close uk-close"></a>You are already registered</div>';
            } ?>
            <?php if ($_GET['message'] == 'success') {
                echo '<div class="uk-alert uk-alert-success" data-uk-alert="">
                    <a href="#" class="uk-alert-close uk-close"></a>Added Order Successfully......</div>';
            } ?>
            <?php if ($_GET['message'] == 1) {
                echo '<div class="uk-alert uk-alert-info" data-uk-alert="">
    <a href="#" class="uk-alert-close uk-close"></a>Order Update  Successfully......</div>';
            } 
			
			}?>
            <?php if(!empty($_GET['orders'])){ if ($_GET['orders'] == 'deleted') {
                echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">
    <a href="#" class="uk-alert-close uk-close"></a>Order successfully deleted.........</div>';
            } 
			}
			?>
            <!---datepicker--->

            <main>
                <section class="mb-5">


                    <!--Card-->
                    <div class="card card-cascade narrower">

                        <div class="card-body card-body-cascade">
                            <div class="table-responsive">
                                <table class="table" id="ts_pager_filter"
                                       style="border: 2px solid whitesmoke !important;">
                                    <thead>
                                    <tr>

                                        <th style="color:#1976d2"><b>S.No.</b></th>
                                        <th style="width:140px !important;color:#1976d2"><b>Principal Name</b></th>
                                        <th style="width:150px !important;color:#1976d2"><b>Customer Name</b></th>
                                        <th style="width:130px !important;color:#1976d2"color:#1976d2"><b>Products</b></th>
                                        <th style="color:#1976d2"><b>Qty</b></th>
                                        <!---->

                                        <!--<th  style="color:#1976d2"><b>EUR</b></th>-->
                                        <th style="width:130px !important;color:#1976d2"><b>Order Date</b></th>
                                        <th style="width:110px !important;color:#1976d2"><b>Order No.</b></th>
										<th style="width:130px !important;color:#1976d2"><b>Invoice No</b></th>
                                        <th style="width:90px !important;color:#1976d2"><b>PO</b></th>
                                        <th style="color:#1976d2"><b>USD/EUR</b></th>
                                        <!--<th style="width:100px !important;color:#1976d2"><b>Adjust amount</b></th>-->
                                        <th class="filter-false remove sorter-false uk-text-center"
                                            style="width:150px !important;color:#1976d2;"><b>Actions</b></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php $i = 1;


                                    foreach ($list_order as $order) {
									//	echo '<pre>';
			//print_r($order);
			//exit;
										
                                        $order_products = explode(';--order--;', $order['orders_products']);
                                        ?>
                                        <tr>

                                            <td style="text-align:center;"><?php echo $i++; ?></td>
                                            <td style="text-align:center;"
                                                style="text-align:center;"><?php echo " " . $order['Principal_person']; ?></td>
                                            <td style="text-align:center;"><?php echo $order['customer_person']; ?></td>
                                            <td style="text-align:center;"> <?php
                                                if (!empty($order_products)) {
                                                    foreach ($order_products as $order_product) {
                                                        $order_product = explode('--info--', $order_product);
														if(array_key_exists(3,$order_product)){
                                                        echo '<li>' . $order_product[3] . '</li><br>'; 
														}
														?>
                                                    <?php }
                                                } ?> </td>
                                            <td><?php
                                                if (!empty($order_products)) {
                                                    foreach ($order_products as $order_product) {
                                                        $order_product = explode('--info--', $order_product);
														if(array_key_exists(4,$order_product)){
                                                        echo '<li style="list-style-type: none;">' . $order_product[4] . '</li><br>'; 
														
														}?>
                                                        
                                                    <?php }
                                                } ?></td>
                                           <!-- <td style="text-align:center;" style="text-align:center;">
										   <?php echo $order['invoice_no']; ?>
										   </td>-->

                                            <!--<td><?php echo $order['totaleur']; ?></td>-->
                                            <td style="text-align:center;" style="text-align:center;"
                                                style="text-align:center;"
                                                style="text-align:center;"><?php echo $order['orderdate']; ?></td>
                                            <td style="text-align:center;" style="text-align:center;"
                                                style="text-align:center;"><?php echo $order['order_no']; ?> </td>
                                            <td style="text-align:center;" style="text-align:center;">
										   <?php echo $order['invoice_no']; ?>
										   </td>
											<td style="text-align:center;"
                                                style="text-align:center;">
                                                <?php
                                                if (!empty($order_products)) {
                                                    foreach ($order_products as $order_product) {
                                                        $order_product = explode('--info--', $order_product);
														if(array_key_exists(8,$order_product)){
                                                        echo '<li style="list-style-type: none;">' . $order_product[8] . '</li>'; }?>
                                                        <br>
                                                    <?php }
                                                }
                                                ?>
                                            </td>
                                            <td style="text-align:center;"><?php 
											if($order['acceptmoney']!=''){
												if($order['totalusd']!=''){
													echo round((float)str_replace( ',', '', $order['acceptmoney']),2).'/0';
												}else{
													echo '0/'.round((float)str_replace( ',', '', $order['acceptmoney']),2);
												}
												}else{ 
													echo round($order['totalusd'], 2) . '/' . round($order['totaleur'], 2);
												} 
												?></td>
                                            <!--<td style="text-align:center;"><?php echo $order['acceptmoney']; ?></td>-->
                                            <td style="text-align:center;">
                                                <a href="<?php echo site_url('seller/updateorder'); ?>?id=<?php echo $order['orderId']; ?>"
                                                   Title="Edit"><i class="material-icons"
                                                                   style="font-size:20px;color:#1976D2;">edit</i></a>
                                                <!--  <a href=""  data-uk-modal="{target:'#modal_header_footer1_<?php echo $order['orderId']; ?>'}" title="view" ><i class="material-icons" style="font-size:28px;color:#1976D2;">remove_red_eye</i></a>-->

                                                <a href="<?php echo site_url() ?>/seller/delete_order/<?php echo $order['orderId']; ?>"
                                                   onclick="return ConfirmDialog()" title="Delete"
                                                   onclick="return ConfirmDialog()"><i class="material-icons"
                                                                                       style="font-size:20px;color:#1976D2;"></i></a>
                                                &nbsp;
                                                <a href="<?php echo site_url() ?>/printOrder/<?php echo $order['orderId']; ?>"
                                                   title="Print Invoice"><i class="material-icons" style="font-size:20px;color:#1976D2;">print</i></a>
                                                <a  title="Quickview" href="<?php echo base_url();?>orderview/<?php echo $order['orderId']; ?>">
                                                  <i  class="material-icons" style="font-size:20px;color:#1976D2;">remove_red_eye</i></a>

                                        
                                            </td>
                                        </tr>
                                    <?php }
                                    $i++; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!--Bottom Table UI-->
                            <ul class="uk-pagination ts_pager">
                                <li data-uk-tooltip title="Select Page">
                                    <select class="ts_gotoPage ts_selectize"></select>
                                </li>
                                <li class="first"><a href="javascript:void(0)"><i class="uk-icon-angle-double-left"></i></a>
                                </li>
                                <li class="prev"><a href="javascript:void(0)"><i class="uk-icon-angle-left"></i></a>
                                </li>
                                <li><span class="pagedisplay"></span></li>
                                <li class="next"><a href="javascript:void(0)"><i class="uk-icon-angle-right"></i></a>
                                </li>
                                <li class="last"><a href="javascript:void(0)"><i class="uk-icon-angle-double-right"></i></a>
                                </li>
                                <li data-uk-tooltip title="Page Size">
                                    <select class="pagesize ts_selectize">
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                    </select>
                                </li>
                            </ul>
                            <!--Bottom Table UI-->

                        </div>
                        <!--/.Card content-->

                    </div>
                    <!--/.Card-->

                </section>

            </main>


        </div>
        <!--Bottom Table UI-->

    </div>
    <!--/.Card content-->

</div>

<div class="md-fab-wrapper">
    <a class="md-fab md-fab-accent" href="<?php echo site_url(); ?>/placeOrder" id="recordAdd" Title="Add New Order">
        <i class="material-icons"></i>
    </a>
</div>
<div id="preloader">
    <div id="status"></div>
</div>


<!-- common functions -->
<!-- altair common functions/helpers -->
<script src="<?php echo base_url() ?>assets/js/common.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/uikit_custom.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/altair_admin_common.min.js"></script>

<!-- page specific plugins -->
<!-- tablesorter -->
<script src="<?php echo base_url(); ?>assets/bower_components/tablesorter/dist/js/jquery.tablesorter.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/tablesorter/dist/js/extras/jquery.tablesorter.pager.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/tablesorter/dist/js/jquery.tablesorter.widgets.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/tablesorter/dist/js/widgets/widget-alignChar.min.js"></script>

<!--  tablesorter functions -->
<script src="<?php echo base_url(); ?>assets/js/pages/plugins_tablesorter.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
<!-- date picker -->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/2.3.1/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.comiseo.daterangepicker.js"></script>

<!-- date picker -->

<script type="text/javascript">

    function ConfirmDialog() {
        var x = confirm('Do You Want Delete This Record..');
        if (x) {
            return true;
        } else {
            return false;
        }
    }

    function abcd() {
        alert();
    }


</script>
<script type="text/javascript">
    function ConfirmDialog1() {
        var x = confirm("Are you sure to Update record?")
        if (x) {
            return true;
        } else {
            return false;
        }
    }


</script>
<script type="text/javascript">
    // When the document is ready
    $('#datepicker2').datepicker({
        format: 'dd/mm/yyyy',

        autoclose: true,
    })
</script>
<script type="text/javascript">
    // When the document is ready


    $('#datepicker1').datepicker({
        format: 'dd/mm/yyyy',

        autoclose: true,
    })
</script>

</body>

</html>