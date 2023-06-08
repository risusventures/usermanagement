<?php $pages = 'manage_category'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css" media="all">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no"/>
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/finacbook_icon.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/finacbook_icon.png" sizes="32x32">
    <title>Cater Manage</title>
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
    <style>
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
            background-image: url(http://www.finacbooks.com/assets/img/ajax-loader.gif);
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
    <?php include('analytics.php'); ?>
</head>
<body class=" sidebar_main_open sidebar_main_swipe">
<?php include('header.php'); ?>
<?php include('header_top.php'); ?>
<?php
$months = array(
    '01' => 'January',
    '02' => 'February',
    '03' => 'March',
    '04' => 'April',
    '05' => 'May',
    '06' => 'June',
    '07' => 'July ',
    '08' => 'August',
    '09' => 'September',
    '10' => 'October',
    '11' => 'November',
    '12' => 'December',
);
?>
<div id="page_content" style="margin-left:0px;">
    <div id="page_content_inner">
        <h4 class="heading_a uk-margin-bottom">Export Table Data</h4>
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

     <!--<div>
 <div class="md-card md-card-hover" style="height:60px;">
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
                        <th style="">Order No.</th>
                        <th>Date</th>
                        <th>Event date</th>
                        <th>Order month</th>
                        <th>Contact Person</th>
                        <th>Total Amount</th>
                        <th>Paid</th>
                        <th>Balance</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($order as $order) { ?>
                        <tr>
                            <td><?php echo $order['invoice_no']; ?></td>
                            <td><?php echo $order['invoice_date']; ?></td>

                            <td><?php echo $order['party_date']; ?></td>
                            <td><?php $ed = explode("/", $order['party_date']);
                                if (isset($ed[1])) {
                                    $month = $ed[1];
                                    echo $months[$month];
                                }


                                ?></td>
                            <td><?php echo $order['customer_person']; ?></td>
                            <td><p class="uk-icon-gbp">&nbsp;<?php echo $order['Total_amount'] . '.00'; ?></a></td>
                            <td><p class="uk-icon-gbp">&nbsp;<?php $invoice = $order['id'];
                                    $paid_balance = $this->db->query("select sum(invoice_paid_amount) as paid_balance from payment where invoice_id='$invoice' ");
                                    $b = $paid_balance->result_array();
                                    foreach ($b as $paid_balance) {
                                        if ($paid_balance['paid_balance']) {
                                            echo $paid_balance['paid_balance'] . '.00';
                                        } else {
                                            echo '0.00';
                                        }
                                    } ?></p></td>
                            <td><p class="uk-icon-gbp">
                                    &nbsp;<?php $balance = $order['Total_amount'] - $paid_balance['paid_balance'];
                                    if ($balance) {
                                        echo $balance . '.00';
                                    } else {
                                        echo '0.00';
                                    } ?></p></td>
                            <td><?php echo $order['status']; ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<div id="preloader">
    <div id="status"></div>
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