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
    <title>Risus Ventures</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/uikit/css/uikit.almost-flat.min.css"
          media="all">
    <link rel="stylesheet"
          href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/content/jquery/tutorials/bootstrap/tutorial-3/10/css/mdb.min.css"
          media="all">

    <link rel="stylesheet"
          href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/content/jquery/tutorials/bootstrap/tutorial-3/10/css/style.css"
          media="all">
    <!-- flag icons -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/icons/flags/flags.min.css" media="all">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/main.min.css" media="all">
    <link rel="stylesheet"
          href="<?php echo base_url(); ?>assets/bower_components/kendo-ui/styles/kendo.common-material.min.css"/>
    <link rel="stylesheet"
          href="<?php echo base_url(); ?>assets/bower_components/kendo-ui/styles/kendo.material.min.css"/>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
    <link rel="stylesheet"
          href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/content/jquery/tutorials/bootstrap/tutorial-3/10/css/bootstrap.min.css"/>
    <script src="<?php echo base_url() ?>assets/js/pages/plugins_datatables.min.js"></script>
    <?php include('analytics.php'); ?>
    <script></script>


    <script src="<?php echo base_url(); ?>assets/js/common.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/uikit_custom.min.js"></script>


    <style>
        .tablesorter-altair .tablesorter-header-inner {
            position: relative;
            padding: 0 0px 0 0 !important;
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
        <h4 class="heading_a uk-margin-bottom">Yearly Reports</h4>
        <div class="md-card uk-margin-medium-bottom">
            <div class="uk-width-large-1-1">
                <ul class="md-list">
                    <li>
                        <div class="md-list-content">
 <span class="uk-text-small uk-text-muted"> 
 <!--<div class="uk-grid uk-grid-width-small-1-2 uk-grid-width-large-1-3 uk-grid-width-xlarge-1-3 uk-text-center uk-sortable sortable-handler" id="dashboard_sortable_cards" data-uk-sortable="" data-uk-grid-margin="">-->
 <div class="uk-grid uk-grid-width-small-1-1 uk-text-center uk-sortable sortable-handler" id="dashboard_sortable_cards"
      data-uk-sortable="" data-uk-grid-margin="">
 <div>
<div class="md-card md-card-hover" style="height:60px;">
 <a href="#" data-uk-tooltip="{pos:'bottom'}" title="XLS"
    onclick="$('#order').tableExport({type:'excel',escape:'false'});"><img
             src="<?php echo base_url(); ?>assets/file_icon/xls.png"></a>
 </div>
  </div>

 <div>
 <!-- <div class="md-card md-card-hover" style="height:60px;">
 <a href="#" data-uk-tooltip="{pos:'bottom'}" title="PDF" onclick="$('#order').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});"><img src="<?php echo base_url(); ?>assets/file_icon/pdf.png"></a>
 </div></div>

<div>
 <div class="md-card md-card-hover" style="height:60px;">
 <a href="#" data-uk-tooltip="{pos:'bottom'}" title="CSV" onclick="$('#order').tableExport({type:'csv',escape:'false'});"><img src="<?php echo base_url(); ?>assets/file_icon/csv.png"></a>
 </div></div>-->
   </div>
     </span>
                        </div>
                    </li>
            </div>
            </ul>

            <?php
            $_product_curency = $_product_quantitydata = $_product_namedata = $pric_name_whole_data = $pric_name = array();
            $productname = array();
            $q = "SELECT * FROM `orders`";
            $orders = $this->db->query($q)->result_array();

            ?>
            <div class="card-body card-body-cascade">
                <div class="table-responsive">
                    <table class="table" id="ts_pager_filter" style="border: 2px solid whitesmoke !important;">
                        <thead>
                        <tr>
                            <th>SNo.</th>
                            <th>Oder No.</th>
                            <th>Principal Name</th>
                            <th>PO Number</th>
                            <th>Customer Name</th>
                            <th>Product Name</th>
                            <th>Product Quantity</th>
                            <th>Subtotal</th>
                            <th>Currency</th>
                            <th>Commission</th>
                            <th>Total USD</th>
                            <th>Total EUR</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (!empty($orders)) {
                            $i = 1;
                            foreach ($orders as $single_order) {
                                $oid = $single_order['id'];
                                $pid = $single_order['pid'];
                                $cid = $single_order['cid'];
                                $p_c_id = $single_order['p_c_id'];
                                $orderdate = $single_order['orderdate'];
                                $pricipaldata = $this->db->query("select * from Principal where Principal_id='$pid'")->row_array();
                                $customersdata = $this->db->query("select * from customers where customer_id ='$cid'")->row_array();
                                $principal_contactsdata = $this->db->query("select * from principal_contacts where id ='$p_c_id'")->row_array();
                                $orderProducts = $this->db->query("select * from orders_products where order_id ='$oid'")->result_array();

                                $pric_name[$pid] = $pricipaldata['Principal_person'];

                                if (!empty($orderProducts)) {
                                    foreach ($orderProducts as $sp) {
                                        $currency = $sp['currency'];
                                        $p_name = $sp['p_name'];
                                        $p_quntity = $sp['p_quntity'];
                                        $p_commision = $sp['p_commision'];
                                        $p_po = $sp['po'];
                                        $p_subtotal = $sp['p_subtotal'];
                                        $pric_name_whole_data[$pid][$currency][] = $sp['p_subtotal'];
                                        $_product_namedata[$sp['product_id']][] = $sp['p_subtotal'];
                                        $_product_quantitydata[$sp['product_id']][] = $sp['p_quntity'];
                                        $productname[$sp['product_id']] = $p_name;
                                        $_product_curency[$sp['product_id']] = $currency;
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $i++; ?>
                                            </td>
                                            <td>
                                                <?php echo $single_order['order_no'] . " / " . $orderdate; ?>
                                            </td>
                                            <td>
                                                <?php echo $pricipaldata['Principal_person']; ?>
                                            </td>
                                            <td>
                                                <?php echo $p_po; ?>
                                            </td>
                                            <td>
                                                <?php echo $customersdata['customer_person']; ?>
                                            </td>
                                            <td>
                                                <?php echo $p_name; ?>
                                            </td>
                                            <td>
                                                <?php echo $p_quntity; ?>
                                            </td>
                                            <td>
                                                <?php echo $p_subtotal; ?>
                                            </td>

                                            <td>
                                                <?php echo $currency; ?>
                                            </td>
                                            <td>
                                                <?php echo(($p_commision * $p_subtotal) / 100); ?>
                                            </td>
                                            <td>
                                                <?php echo $single_order['totalusd']; ?>
                                            </td>
                                            <td>
                                                <?php echo $single_order['totaleur']; ?>
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
            </div>
        </div>
        <ul class="uk-pagination ts_pager">
            <li data-uk-tooltip title="Select Page">
                <select class="ts_gotoPage ts_selectize"></select>
            </li>
            <li class="first"><a href="javascript:void(0)"><i class="uk-icon-angle-double-left"></i></a></li>
            <li class="prev"><a href="javascript:void(0)"><i class="uk-icon-angle-left"></i></a></li>
            <li><span class="pagedisplay"></span></li>
            <li class="next"><a href="javascript:void(0)"><i class="uk-icon-angle-right"></i></a></li>
            <li class="last"><a href="javascript:void(0)"><i class="uk-icon-angle-double-right"></i></a></li>
            <li data-uk-tooltip title="Page Size">
                <select class="pagesize ts_selectize">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                </select>
            </li>
        </ul>
    </div>
</div>
</div>

<main>
    <section class="mb-5">


        <!--Card-->
        <div class="card card-cascade narrower">

            <!--Card header-->
            <div class="view view-cascade py-3 gradient-card-header info-color-dark mx-4 d-flex justify-content-between align-items-center">

                <div>
                    <button type="button"
                            class="btn btn-outline-white btn-rounded btn-sm px-2 waves-effect waves-light">
                        <i class="fa fa-th-large mt-0"></i>
                    </button>
                    <button type="button"
                            class="btn btn-outline-white btn-rounded btn-sm px-2 waves-effect waves-light">
                        <i class="fa fa-columns mt-0"></i>
                    </button>
                </div>

                <a href="" class="white-text mx-3">Table name</a>

                <div>
                    <button type="button"
                            class="btn btn-outline-white btn-rounded btn-sm px-2 waves-effect waves-light">
                        <i class="fa fa-pencil mt-0"></i>
                    </button>
                    <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2 waves-effect waves-light"
                            data-toggle="modal" data-target="#modalConfirmDelete">
                        <i class="fa fa-remove mt-0"></i>
                    </button>
                    <button type="button"
                            class="btn btn-outline-white btn-rounded btn-sm px-2 waves-effect waves-light">
                        <i class="fa fa-info-circle mt-0"></i>
                    </button>
                </div>

            </div>
            <!--/Card header-->

            <!--Card content-->
            <div class="card-body card-body-cascade">
                <?php
                $_product_curency = $_product_quantitydata = $_product_namedata = $pric_name_whole_data = $pric_name = array();
                $productname = array();
                $q = "SELECT * FROM `orders`";
                $orders = $this->db->query($q)->result_array();

                ?>
                <div class="table-responsive">

                    <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair"
                           id="ts_pager_filter" style="border: 2px solid whitesmoke !important;">
                        <thead>
                        <tr>
                            <th>S No.</th>
                            <th>Oder No.</th>
                            <th>Principal Name</th>
                            <th>PO Number</th>
                            <th>Customer Name</th>
                            <th>Product Name</th>
                            <th>Product Quantity</th>
                            <th>Subtotal</th>
                            <th>Currency</th>
                            <th>Commission</th>
                            <th>Total USD</th>
                            <th>Total EUR</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (!empty($orders)) {
                            $i = 1;
                            foreach ($orders as $single_order) {
                                $oid = $single_order['id'];
                                $pid = $single_order['pid'];
                                $cid = $single_order['cid'];
                                $p_c_id = $single_order['p_c_id'];
                                $orderdate = $single_order['orderdate'];
                                $pricipaldata = $this->db->query("select * from Principal where Principal_id='$pid'")->row_array();
                                $customersdata = $this->db->query("select * from customers where customer_id ='$cid'")->row_array();
                                $principal_contactsdata = $this->db->query("select * from principal_contacts where id ='$p_c_id'")->row_array();
                                $orderProducts = $this->db->query("select * from orders_products where order_id ='$oid'")->result_array();

                                $pric_name[$pid] = $pricipaldata['Principal_person'];

                                if (!empty($orderProducts)) {
                                    foreach ($orderProducts as $sp) {
                                        $currency = $sp['currency'];
                                        $p_name = $sp['p_name'];
                                        $p_quntity = $sp['p_quntity'];
                                        $p_commision = $sp['p_commision'];
                                        $p_po = $sp['po'];
                                        $p_subtotal = $sp['p_subtotal'];
                                        $pric_name_whole_data[$pid][$currency][] = $sp['p_subtotal'];
                                        $_product_namedata[$sp['product_id']][] = $sp['p_subtotal'];
                                        $_product_quantitydata[$sp['product_id']][] = $sp['p_quntity'];
                                        $productname[$sp['product_id']] = $p_name;
                                        $_product_curency[$sp['product_id']] = $currency;
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $i++; ?>
                                            </td>
                                            <td>
                                                <?php echo $single_order['order_no'] . " / " . $orderdate; ?>
                                            </td>
                                            <td>
                                                <?php echo $pricipaldata['Principal_person']; ?>
                                            </td>
                                            <td>
                                                <?php echo $p_po; ?>
                                            </td>
                                            <td>
                                                <?php echo $customersdata['customer_person']; ?>
                                            </td>
                                            <td>
                                                <?php echo $p_name; ?>
                                            </td>
                                            <td>
                                                <?php echo $p_quntity; ?>
                                            </td>
                                            <td>
                                                <?php echo $p_subtotal; ?>
                                            </td>

                                            <td>
                                                <?php echo $currency; ?>
                                            </td>
                                            <td>
                                                <?php echo(($p_commision * $p_subtotal) / 100); ?>
                                            </td>
                                            <td>
                                                <?php echo $single_order['totalusd']; ?>
                                            </td>
                                            <td>
                                                <?php echo $single_order['totaleur']; ?>
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

                <hr class="my-0">

                <!--Bottom Table UI-->
                <div class="d-flex justify-content-between">

                    <!--Name-->
                    <div class="select-wrapper mdb-select colorful-select dropdown-primary mt-2 hidden-md-down"><span
                                class="caret">▼</span><input type="text" class="select-dropdown" readonly="true"
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

                    <!--Pagination -->
                    <nav class="my-4">
                        <ul class="pagination pagination-circle pg-blue mb-0">

                            <!--First-->
                            <li class="page-item disabled">
                                <a class="page-link waves-effect waves-effect">First</a>
                            </li>

                            <!--Arrow left-->
                            <li class="page-item disabled">
                                <a class="page-link waves-effect waves-effect" aria-label="Previous">
                                    <span aria-hidden="true">«</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>

                            <!--Numbers-->
                            <li class="page-item active">
                                <a class="page-link waves-effect waves-effect">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link waves-effect waves-effect">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link waves-effect waves-effect">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link waves-effect waves-effect">4</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link waves-effect waves-effect">5</a>
                            </li>

                            <!--Arrow right-->
                            <li class="page-item">
                                <a class="page-link waves-effect waves-effect" aria-label="Next">
                                    <span aria-hidden="true">»</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>

                            <!--First-->
                            <li class="page-item">
                                <a class="page-link waves-effect waves-effect">Last</a>
                            </li>

                        </ul>
                    </nav>
                    <!--/Pagination -->

                </div>
                <!--Bottom Table UI-->

            </div>
            <!--/.Card content-->

        </div>
        <!--/.Card-->

    </section>

</main>


<!-- common functions -->
<!-- altair common functions/helpers -->
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
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>


<!-- date picker -->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/2.3.1/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.comiseo.daterangepicker.js"></script>

<!-- date picker -->


</body>
</html>