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
    <title>Yearly Reports - Risus Ventures</title>
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/uikit/css/uikit.almost-flat.min.css"
          media="all">

    <!-- flag icons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/icons/flags/flags.min.css" media="all">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <?php include('analytics.php'); ?>
   
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
<div id="page_content" style="margin-left:0px;">
    <div id="page_content_inner">
        <h4 class="heading_a uk-margin-bottom">Sales Reports
        <button class="btn btn-outline-white btn-rounded btn-sm px-2 waves-effect waves-light" style="float: right;" href="#"  title="XLS" onclick="$('#order').tableExport({type:'excel',escape:'false'});"><i class="material-icons">cloud_download</i>
        </button></h4>
        <div class="md-card">
            <div class="">

                <main>
                    <section class="mb-5">


                        <!--Card-->
                        <div class="card card-cascade narrower">


                            <?php
                            $q = "SELECT cid FROM `orders` group by cid";
                            $query = $this->db->query($q);
                            $queryResult = $query->result_array();

                            ?>
                           
                            <!--/.Card content-->


     <div class="card-body card-body-cascade">
                            <div class="table-responsive">
                                <table class="table" id="order"
                                       style="border: 2px solid whitesmoke !important;">
                                    <thead>
                                    <tr>
                                            <th><strong>S.No.</strong></th>
                                            <th><strong>Company Name</strong></th>
                                            <th><strong>Product Name</strong></th>
                                            <th><strong><?php echo date('Y') - 4; ?></strong></th>
                                            <th><strong><?php echo date('Y') - 3; ?></strong></th>
                                            <th><strong><?php echo date('Y') - 2; ?></strong></th>
                                            <th><strong><?php echo date('Y') - 1; ?></strong></th>
                                            <th><strong><?php echo date('Y'); ?></strong></th>
                                            <th><strong> Q1 <?php echo date('Y'); ?></strong></th>
                                            <th><strong> Q2 <?php echo date('Y'); ?></strong></th>
                                            <th><strong> Q3 <?php echo date('Y'); ?></strong></th>
                                            <th><strong> Q4 <?php echo date('Y'); ?></strong></th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                     <?php
                                        $kkk = 0;
                                        foreach ($queryResult as $customer) {
                                            $cid = $customer['cid'];
                                            $fourth = date('Y') - 4;
                                            $third = date('Y') - 3;
                                            $two = date('Y') - 2;
                                            $one = date('Y') - 1;
                                            $current = date('Y');

                                            $q = "select id from orders where cid='$cid'";
                                            $orders = $this->db->query($q)->result_array();
                                            if (!empty($orders)) {
                                                $oid = array();
                                                foreach ($orders as $id) {
                                                    $oid[] = $id['id'];
                                                }
                                                $oids = implode(',', $oid);
                                                $qqq = "select product_id from orders_products where order_id in ($oids) group by product_id";
                                                $orders_products = $this->db->query($qqq)->result_array();
                                                if (!empty($orders_products)) {

                                                    $qqq = "SELECT * FROM `customers` where customer_id='$cid' limit 1";
                                                    $customersdetails = $this->db->query($qqq)->row_array();

                                                    foreach ($orders_products as $order_pr) {
                                                        $product_id = $order_pr['product_id'];
                                                        $aaa = "SELECT * FROM `principal_products` where id='$product_id' limit 1";
                                                        $productdetails = $this->db->query($aaa)->row_array();
                                                        $kkk++;
                                                        ?>
                                        
                                            <tr>
                                                            <td><?php echo $kkk; ?></td>
                                                            <td><?php echo $customersdetails['customer_person']; ?></td>
                                                            <td><?php echo $productdetails['product_name']; ?></td>
                                                            <td>
                                                                <?php
                                                                $q1 = "select sum(p_quntity) as qty from orders_products join orders on orders.id = orders_products.order_id where orders_products.product_id='$product_id' and orders_products.orderdate like '%$fourth%' and orders.cid = '$cid' limit 1";
                                                                $fourdata = $this->db->query($q1)->row_array();
                                                                if (isset($fourdata['qty']) && !empty($fourdata['qty'])) {
                                                                    echo $fourdata['qty'];
                                                                } else {
                                                                    echo "0";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $q1 = "select sum(p_quntity) as qty from orders_products join orders on orders.id = orders_products.order_id where orders_products.product_id='$product_id' and orders_products.orderdate like '%$third%' and orders.cid = '$cid' limit 1";
                                                                $fourdata = $this->db->query($q1)->row_array();
                                                                if (isset($fourdata['qty']) && !empty($fourdata['qty'])) {
                                                                    echo $fourdata['qty'];
                                                                } else {
                                                                    echo "0";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $q1 = "select sum(p_quntity) as qty from orders_products join orders on orders.id = orders_products.order_id where orders_products.product_id='$product_id' and orders_products.orderdate like '%$two%' and orders.cid = '$cid' limit 1";
                                                                $fourdata = $this->db->query($q1)->row_array();
                                                                if (isset($fourdata['qty']) && !empty($fourdata['qty'])) {
                                                                    echo $fourdata['qty'];
                                                                } else {
                                                                    echo "0";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $q1 = "select sum(p_quntity) as qty from orders_products join orders on orders.id = orders_products.order_id where orders_products.product_id='$product_id' and orders_products.orderdate like '%$one%' and orders.cid = '$cid' limit 1";
                                                                $fourdata = $this->db->query($q1)->row_array();
                                                                if (isset($fourdata['qty']) && !empty($fourdata['qty'])) {
                                                                    echo $fourdata['qty'];
                                                                } else {
                                                                    echo "0";
                                                                }
                                                                ?>
                                                            </td>

                                                            <td>
                                                                <?php
                                                                $q1 = "select sum(p_quntity) as qty from orders_products join orders on orders.id = orders_products.order_id where orders_products.product_id='$product_id' and orders_products.orderdate like '%$current%' and orders.cid = '$cid' limit 1";
                                                                $fourdata = $this->db->query($q1)->row_array();
                                                                if (isset($fourdata['qty']) && !empty($fourdata['qty'])) {
                                                                    echo $fourdata['qty'];
                                                                } else {
                                                                    echo "0";
                                                                }
                                                                ?>
                                                            </td>

                                                            <td>
                                                                <?php

                                                                $q1 = "select sum(p_quntity) as qty from orders_products join orders on orders.id = orders_products.order_id where orders_products.product_id='$product_id' and (orders_products.orderdate like '%$current-01-%' or  orders_products.orderdate like '%$current-02-%' or orders_products.orderdate like '%$current-03-%') and orders.cid = '$cid' limit 1";
                                                                $fourdata = $this->db->query($q1)->row_array();
                                                                if (isset($fourdata['qty']) && !empty($fourdata['qty'])) {
                                                                    echo $fourdata['qty'];
                                                                } else {
                                                                    echo "0";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php

                                                                $q1 = "select sum(p_quntity) as qty from orders_products join orders on orders.id = orders_products.order_id where orders_products.product_id='$product_id' and (orders_products.orderdate like '%$current-04-%' or  orders_products.orderdate like '%$current-05-%' or orders_products.orderdate like '%$current-06-%') and orders.cid = '$cid' limit 1";
                                                                $fourdata = $this->db->query($q1)->row_array();
                                                                if (isset($fourdata['qty']) && !empty($fourdata['qty'])) {
                                                                    echo $fourdata['qty'];
                                                                } else {
                                                                    echo "0";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php

                                                                $q1 = "select sum(p_quntity) as qty from orders_products join orders on orders.id = orders_products.order_id where orders_products.product_id='$product_id' and (orders_products.orderdate like '%$current-07-%' or  orders_products.orderdate like '%$current-08-%' or orders_products.orderdate like '%$current-09-%') and orders.cid = '$cid' limit 1";
                                                                $fourdata = $this->db->query($q1)->row_array();
                                                                if (isset($fourdata['qty']) && !empty($fourdata['qty'])) {
                                                                    echo $fourdata['qty'];
                                                                } else {
                                                                    echo "0";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php

                                                                $q1 = "select sum(p_quntity) as qty from orders_products join orders on orders.id = orders_products.order_id where orders_products.product_id='$product_id' and (orders_products.orderdate like '%$current-10-%' or  orders_products.orderdate like '%$current-11-%' or orders_products.orderdate like '%$current-12-%') and orders.cid = '$cid' limit 1";
                                                                $fourdata = $this->db->query($q1)->row_array();
                                                                if (isset($fourdata['qty']) && !empty($fourdata['qty'])) {
                                                                    echo $fourdata['qty'];
                                                                } else {
                                                                    echo "0";
                                                                }
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }

                                            }

                                        }

                                        ?>

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

                        </div>
                        <!--/.Card-->

                    </section>

                </main>

 <!-- altair admin -->
    <script src="<?php echo base_url(); ?>assets/js/common.min.js"></script>
    <!-- uikit functions -->
    <script src="<?php echo base_url(); ?>assets/js/uikit_custom.min.js"></script>
               <script src="<?php echo base_url(); ?>assets/js/altair_admin_common.min.js"></script>

            <!-- page specific plugins -->
            <!-- tablesorter -->
            <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.min.css" media="all">
            <script src="<?php echo base_url(); ?>assets/bower_components/tablesorter/dist/js/jquery.tablesorter.min.js"></script>
            <script src="<?php echo base_url(); ?>assets/bower_components/tablesorter/dist/js/extras/jquery.tablesorter.pager.min.js"></script>
            <script src="<?php echo base_url(); ?>assets/bower_components/tablesorter/dist/js/jquery.tablesorter.widgets.min.js"></script>
            <script src="<?php echo base_url(); ?>assets/bower_components/tablesorter/dist/js/widgets/widget-alignChar.min.js"></script>

            <!--  tablesorter functions -->
            <script src="<?php echo base_url(); ?>assets/js/pages/plugins_tablesorter.min.js"></script>


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