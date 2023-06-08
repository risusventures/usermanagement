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
    <!-- flag icons -->
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
</head>
<body class=" sidebar_main_open sidebar_main_swipe">
<?php include('header.php'); ?>
<?php include('header_top.php'); ?>
<div id="page_content" style="margin-left:0px;">
    <div id="page_content_inner">
        <h4 class="heading_a uk-margin-bottom">Export Table Data ( order Report )</h4>
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
                </ul>
            </div>
            <div class="uk-overflow-container">
                <table class="uk-table uk-table-striped" id="order">
                    <thead>
                    <tr>
                        <?php

                        $_product_curency = $_product_quantitydata = $_product_namedata = $pric_name_whole_data = $pric_name = array();
                        $productname = array();

                        //    $q="SELECT * FROM `orders` where orderdate>='$from_date' and orderdate<='$to_date'";
                        $q = "SELECT * FROM `orders`";

                        $orders = $this->db->query($q)->result_array();
                        // echo '<pre>'; print_r($orders); echo '</pre>';
                        ?>
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

                        <th>Adjusted Invoice amnt</th>
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
                                            <?php echo $single_order['id']; ?>
                                        </td>
                                        <td>
                                            <?php echo $pricipaldata['Principal_person']; ?>
                                        </td>
                                        <!--                                    <td>
                                        <?php //echo $principal_contactsdata['name'];
                                        ?>
                                    </td>-->
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
                                            <?php echo $p_commision; ?>
                                        </td>
                                        <td>
                                            <?php echo $single_order['totalusd']; ?>
                                        </td>
                                        <td>
                                            <?php echo $single_order['totaleur']; ?>
                                        </td>
                                        <td>
                                            <?php echo $single_order['acceptmoney']; ?>
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
</div>
</div>
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
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

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

</body>
</html>