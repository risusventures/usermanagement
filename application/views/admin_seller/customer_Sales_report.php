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
    <title>FinacBooks</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/uikit/css/uikit.almost-flat.min.css"
          media="all">
    <!-- flag icons -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/icons/flags/flags.min.css" media="all">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/main.min.css" media="all">
    <link rel="stylesheet"
          href="<?php echo base_url(); ?>assets/bower_components/kendo-ui/styles/kendo.common-material.min.css"/>
    <link rel="stylesheet"
          href="<?php echo base_url(); ?>assets/bower_components/kendo-ui/styles/kendo.material.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <link rel="stylesheet"
          href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.min.css">
    <link rel="stylesheet"
          href="http://tamble.github.io/jquery-ui-daterangepicker/daterangepicker-master/jquery.comiseo.daterangepicker.css"/>
    <!-- altair admin -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.min.css" media="all">
    <?php include('analytics.php'); ?>
    <script id="script_e1">
        $(function () {
            $("#e1").daterangepicker();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".buyer").change(function () {
                var id = $(this).val();
                $.ajax
                ({
                    type: "GET",
                    url: "<?php echo base_url(); ?>seller/load_customer/" + id,
                    data: id,
                    cache: false,
                    success: function (html) {
                        var res = html.split("||");
                        var res1 = res[0];
                        var res2 = res[1];
                        $(".seller_email").val(res1);
                        $(".seller_address").val(res2);
                    }
                });
            });
        });

    </script>
    <script src="<?php echo base_url(); ?>assets/js/common.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/uikit_custom.min.js"></script>
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
    <script>
        function myFunction() {
            location.reload();
        }
    </script>
</head>
<body class=" sidebar_main_open sidebar_main_swipe">
<?php include('header.php'); ?>
<?php include('header_top.php'); ?>
<div id="page_content" style="margin-left:0px;">
    <div id="page_content_inner">
        <div class="md-card">
            <?php echo form_open('seller/customer_sales_report', array('method' => 'GET')); ?>
            <div class="md-card-content">
                <div class="uk-grid" data-uk-grid-margin="">
                    <div class="uk-width-medium-5-10">
                        <div class="md-input-wrapper"><h2>Customer Sales Report</h2><?php if (isset($_GET['submit'])) {
                                echo '<strong>Date : ' . $start_date . '&nbsp;To&nbsp;' . $end_date . '</strong><br><br> Company Name : ' . $customer_records[0]['customer_company'] . '<br> Email : ' . $customer_records[0]['customer_email'] . '<br>Phone : ' . $customer_records[0]['customer_phone'];
                            } ?></div><?php foreach ($start_date as $start) {
                            echo $start;
                        } ?>
                    </div>
                    <div class="uk-width-medium-2-10">
                        <div class="md-input-wrapper">
                            <select style="width:100%;height:34px;border-radius: 5px;margin-top: 4px;" class="buyer"
                                    name="customer_company_name" required>
                                <option value="">Select Customer</option>
                                <?php foreach ($list_customer as $list_customer) { ?>
                                    <option value="<?php echo $list_customer['customer_id']; ?>"><?php echo $list_customer['customer_company']; ?></option>
                                <?php } ?>
                            </select><br><br>
                            <input type="text" class="seller_email"
                                   style="width:100%;height:25px;border-radius: 5px;margin-top: 4px;"
                                   Placeholder="Please Enter Email" required="required">
                        </div>
                    </div>
                    <div class="uk-width-medium-3-10">
                        <div class="md-input-wrapper"><input class="raw" id="e1" name="chart_filter"
                                                             style="height:50px;font-size:15px;"
                                                             required="required"><input type="submit"
                                                                                        class="md-btn md-btn-primary uk-margin-small-top"
                                                                                        style="margin-left:30px;"
                                                                                        value="Filter" name="submit"/>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
        <div class="uk-grid uk-grid-width-large-1-6 uk-grid-width-medium-1-2 uk-grid-medium uk-sortable sortable-handler"
             data-uk-sortable="" data-uk-grid-margin="">
            <div style="">
                <div class="md-card">
                    <div class="md-card-content">
                        <div class="uk-float-right uk-margin-top uk-margin-small-right"><span
                                    class="peity_visitors peity_data" style="display: none;">5,3,9,6,5,9,7</span>
                            <svg class="peity" height="28" width="48">
                                <rect fill="#d84315" x="1.3714285714285717" y="12.444444444444443"
                                      width="4.114285714285715" height="15.555555555555557"></rect>
                                <rect fill="#d84315" x="8.228571428571428" y="18.666666666666668"
                                      width="4.114285714285716" height="9.333333333333332"></rect>
                                <rect fill="#d84315" x="15.085714285714287" y="0" width="4.1142857142857086"
                                      height="28"></rect>
                                <rect fill="#d84315" x="21.942857142857147" y="9.333333333333336"
                                      width="4.114285714285707" height="18.666666666666664"></rect>
                                <rect fill="#d84315" x="28.800000000000004" y="12.444444444444443"
                                      width="4.114285714285707" height="15.555555555555557"></rect>
                                <rect fill="#d84315" x="35.65714285714286" y="0" width="4.114285714285707"
                                      height="28"></rect>
                                <rect fill="#d84315" x="42.51428571428572" y="6.222222222222221"
                                      width="4.114285714285707" height="21.77777777777778"></rect>
                            </svg>
                        </div>
                        <span class="uk-text-muted uk-text-small ">Total Sales</span>
                        <h2 class="uk-margin-remove"><span class="uk-icon-inr"
                                                           style="font-size: 20px;">&nbsp;<?php foreach ($total_sales as $sales) {
                                    $total = $sales['total_amount'];
                                    if ($total) {
                                        echo number_format($total, 2);
                                    } else {
                                        echo number_format(0, 2);
                                    }
                                } ?></span></h2>
                    </div>
                </div>
            </div>
            <div style="">
                <div class="md-card">
                    <div class="md-card-content">
                        <div class="uk-float-right uk-margin-top uk-margin-small-right"><span
                                    class="peity_sale peity_data" style="display: none;">5,3,9,6,5,9,7,3,5,2</span>
                            <svg class="peity" height="28" width="64">
                                <polygon fill="#d1e4f6"
                                         points="0 27.5 0 12.5 7.111111111111111 18.5 14.222222222222221 0.5 21.333333333333332 9.5 28.444444444444443 12.5 35.55555555555556 0.5 42.666666666666664 6.5 49.77777777777777 18.5 56.888888888888886 12.5 64 21.5 64 27.5"></polygon>
                                <polyline fill="none"
                                          points="0 12.5 7.111111111111111 18.5 14.222222222222221 0.5 21.333333333333332 9.5 28.444444444444443 12.5 35.55555555555556 0.5 42.666666666666664 6.5 49.77777777777777 18.5 56.888888888888886 12.5 64 21.5"
                                          stroke="#0288d1" stroke-width="1" stroke-linecap="square"></polyline>
                            </svg>
                        </div>
                        <span class="uk-text-muted uk-text-small">Total Paid</span>
                        <h2 class="uk-margin-remove"><span class="uk-icon-inr" style="font-size: 20px;">&nbsp;<?php
                                foreach ($records as $key) {
                                    $invoice_id = $key['id'];
                                    $query = $this->db->query("select sum(invoice_paid_amount) as paid from payment where invoice_id='$invoice_id'");
                                    $a = $data[0]['paid'] = $query->result_array();
                                    foreach ($a as $a) {
                                        $sum += $a['paid'];
                                    }
                                }
                                if ($sum) {
                                    echo $sum;
                                } else {
                                    echo number_format(0, 2);
                                } ?></span></h2>
                    </div>
                </div>
            </div>
            <div style="">
                <div class="md-card">
                    <div class="md-card-content">
                        <div class="uk-float-right uk-margin-top uk-margin-small-right"><span
                                    class="peity_orders peity_data" style="display: none;">64/100</span>
                            <svg class="peity" height="24" width="24">
                                <path d="M 12 0 A 12 12 0 1 1 2.7538410866905263 19.649087876984275 L 7.376920543345263 15.824543938492138 A 6 6 0 1 0 12 6"
                                      fill="#8bc34a"></path>
                                <path d="M 2.7538410866905263 19.649087876984275 A 12 12 0 0 1 11.999999999999998 0 L 11.999999999999998 6 A 6 6 0 0 0 7.376920543345263 15.824543938492138"
                                      fill="#eee"></path>
                            </svg>
                        </div>
                        <span class="uk-text-muted uk-text-small">Total Pending</span>
                        <h2 class="uk-margin-remove"><span class="uk-icon-inr"
                                                           style="font-size: 20px;">&nbsp;<?php foreach ($total_pending as $sales) {
                                    echo number_format($sales['pending_amount'], 2);
                                } ?></span></h2>
                    </div>
                </div>
            </div>
            <div style="">
                <div class="md-card">
                    <div class="md-card-content">
                        <div class="uk-float-right uk-margin-top uk-margin-small-right"><span
                                    class="peity_live peity_data" style="display: none;">2,5,3,9,6,5,9,7,3,5,2,2,7,7,1,8,2,6,7,6</span>
                            <svg class="peity" height="28" width="64">
                                <polygon fill="#efebe9"
                                         points="0 27.5 0 21.5 3.3684210526315788 12.5 6.7368421052631575 18.5 10.105263157894736 0.5 13.473684210526315 9.5 16.842105263157894 12.5 20.210526315789473 0.5 23.57894736842105 6.5 26.94736842105263 18.5 30.31578947368421 12.5 33.68421052631579 21.5 37.05263157894737 21.5 40.421052631578945 6.5 43.78947368421052 6.5 47.1578947368421 24.5 50.526315789473685 3.5 53.89473684210526 21.5 57.263157894736835 9.5 60.63157894736842 6.5 64 9.5 64 27.5"></polygon>
                                <polyline fill="none"
                                          points="0 21.5 3.3684210526315788 12.5 6.7368421052631575 18.5 10.105263157894736 0.5 13.473684210526315 9.5 16.842105263157894 12.5 20.210526315789473 0.5 23.57894736842105 6.5 26.94736842105263 18.5 30.31578947368421 12.5 33.68421052631579 21.5 37.05263157894737 21.5 40.421052631578945 6.5 43.78947368421052 6.5 47.1578947368421 24.5 50.526315789473685 3.5 53.89473684210526 21.5 57.263157894736835 9.5 60.63157894736842 6.5 64 9.5"
                                          stroke="#5d4037" stroke-width="1" stroke-linecap="square"></polyline>
                            </svg>
                        </div>
                        <span class="uk-text-muted uk-text-small">Total Due</span>
                        <h2 class="uk-margin-remove" id="peity_live_text"><span class="uk-icon-inr"
                                                                                style="font-size: 20px;">&nbsp;<?php if ($total > $sum) {
                                    echo number_format($total - $sum, 2);
                                } else {
                                    echo number_format(0, 2);
                                } ?></span></h2>
                    </div>
                </div>
            </div>
            <div style="">
                <div class="md-card">
                    <div class="md-card-content">
                        <div class="uk-float-right uk-margin-top uk-margin-small-right"><span
                                    class="peity_live peity_data" style="display: none;">2,5,3,9,6,5,9,7,3,5,2,2,7,7,1,8,2,6,7,6</span>
                            <svg class="peity" height="28" width="64">
                                <polygon fill="#efebe9"
                                         points="0 27.5 0 21.5 3.3684210526315788 12.5 6.7368421052631575 18.5 10.105263157894736 0.5 13.473684210526315 9.5 16.842105263157894 12.5 20.210526315789473 0.5 23.57894736842105 6.5 26.94736842105263 18.5 30.31578947368421 12.5 33.68421052631579 21.5 37.05263157894737 21.5 40.421052631578945 6.5 43.78947368421052 6.5 47.1578947368421 24.5 50.526315789473685 3.5 53.89473684210526 21.5 57.263157894736835 9.5 60.63157894736842 6.5 64 9.5 64 27.5"></polygon>
                                <polyline fill="none"
                                          points="0 21.5 3.3684210526315788 12.5 6.7368421052631575 18.5 10.105263157894736 0.5 13.473684210526315 9.5 16.842105263157894 12.5 20.210526315789473 0.5 23.57894736842105 6.5 26.94736842105263 18.5 30.31578947368421 12.5 33.68421052631579 21.5 37.05263157894737 21.5 40.421052631578945 6.5 43.78947368421052 6.5 47.1578947368421 24.5 50.526315789473685 3.5 53.89473684210526 21.5 57.263157894736835 9.5 60.63157894736842 6.5 64 9.5"
                                          stroke="#5d4037" stroke-width="1" stroke-linecap="square"></polyline>
                            </svg>
                        </div>
                        <span class="uk-text-muted uk-text-small">Total Advance</span>
                        <h2 class="uk-margin-remove" id="peity_live_text"><span class="uk-icon-inr"
                                                                                style="font-size: 20px;">&nbsp;<?php if ($total < $sum) {
                                    echo number_format($sum - $total, 2);
                                } else {
                                    echo number_format(0, 2);
                                } ?></span></h2>
                    </div>
                </div>
            </div>
            <div style="">
                <div class="md-card">
                    <div class="md-card-content">
                        <div class="uk-float-right uk-margin-top uk-margin-small-right"><span
                                    class="peity_live peity_data" style="display: none;">2,5,3,9,6,5,9,7,3,5,2,2,7,7,1,8,2,6,7,6</span>
                            <svg class="peity" height="28" width="64">
                                <polygon fill="#efebe9"
                                         points="0 27.5 0 21.5 3.3684210526315788 12.5 6.7368421052631575 18.5 10.105263157894736 0.5 13.473684210526315 9.5 16.842105263157894 12.5 20.210526315789473 0.5 23.57894736842105 6.5 26.94736842105263 18.5 30.31578947368421 12.5 33.68421052631579 21.5 37.05263157894737 21.5 40.421052631578945 6.5 43.78947368421052 6.5 47.1578947368421 24.5 50.526315789473685 3.5 53.89473684210526 21.5 57.263157894736835 9.5 60.63157894736842 6.5 64 9.5 64 27.5"></polygon>
                                <polyline fill="none"
                                          points="0 21.5 3.3684210526315788 12.5 6.7368421052631575 18.5 10.105263157894736 0.5 13.473684210526315 9.5 16.842105263157894 12.5 20.210526315789473 0.5 23.57894736842105 6.5 26.94736842105263 18.5 30.31578947368421 12.5 33.68421052631579 21.5 37.05263157894737 21.5 40.421052631578945 6.5 43.78947368421052 6.5 47.1578947368421 24.5 50.526315789473685 3.5 53.89473684210526 21.5 57.263157894736835 9.5 60.63157894736842 6.5 64 9.5"
                                          stroke="#5d4037" stroke-width="1" stroke-linecap="square"></polyline>
                            </svg>
                        </div>
                        <span class="uk-text-muted uk-text-small">Total Canceled</span>
                        <h2 class="uk-margin-remove" id="peity_live_text"><span class="uk-icon-inr"
                                                                                style="font-size: 20px;">&nbsp;<?php foreach ($total_canceled as $sales) {
                                    echo number_format($sales['canceled_amount'], 2);
                                } ?></span></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="md-card uk-margin-medium-bottom">
            <div class="uk-overflow-container">
                <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair"
                       id="ts_pager_filter">
                    <thead>
                    <tr>
                        <th></th>
                        <th>S.No.</th>
                        <th>Order No.</th>
                        <th>Date</th>
                        <th>Company Name</th>
                        <th>Total Amount</th>
                        <th>Paid</th>
                        <th>Balance</th>
                        <th>Status</th>
                        <th>Sales Person</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1;
                    foreach ($records as $key) { ?>
                        <tr>
                            <td></td>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $key['invoice_no']; ?></td>
                            <td><?php echo $key['invoice_date']; ?></td>
                            <td><?php echo $key['customer_company']; ?></td>
                            <td><p class="uk-icon-inr">&nbsp;<?php echo $key['Total_amount'] . '.00'; ?><p></p></td>
                            <td><p class="uk-icon-inr">&nbsp;<?php $invoice = $key['id'];
                                    $paid_balance = $this->db->query("select sum(invoice_paid_amount) as paid_balance from payment where invoice_id='$invoice' ");
                                    $b = $paid_balance->result_array();
                                    foreach ($b as $paid_balance) {
                                        if ($paid_balance['paid_balance']) {
                                            echo $paid_balance['paid_balance'] . '.00';
                                        } else {
                                            echo '0.00';
                                        }
                                    } ?></p></td>
                            <td><p class="uk-icon-inr">&nbsp;<?php if (Key['Total_amount']) {
                                        echo $key['Total_amount'] - $paid_balance['paid_balance'] . '.00';
                                    } ?></p></td>
                            <td><?php echo $key['status']; ?></td>
                            <td><i class="material-icons">person</i>&nbsp;<?php echo $key['sales_person'];
                                echo $records['total_sales1']; ?></td>
                        </tr>
                        <?php $i++;
                    } ?>
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
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/2.3.1/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.comiseo.daterangepicker.js"></script>

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
<!-- tablesorter -->
<script src="<?php echo base_url(); ?>assets/bower_components/tablesorter/dist/js/jquery.tablesorter.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/tablesorter/dist/js/jquery.tablesorter.widgets.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/tablesorter/dist/js/widgets/widget-alignChar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/tablesorter/dist/js/extras/jquery.tablesorter.pager.min.js"></script>

<!--  tablesorter functions -->
<script src="<?php echo base_url(); ?>assets/js/pages/plugins_tablesorter.min.js"></script>


</body>
</html>