<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css" media="all">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>

    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/finacbook_icon.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/finacbook_icon.png" sizes="32x32">

    <title>cater Manage</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/uikit/css/uikit.almost-flat.min.css"
          media="all">

    <!-- flag icons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/icons/flags/flags.min.css" media="all">

    <!-- altair admin -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.min.css" media="all">
    <script src="<?php echo base_url(); ?>assets/js/common.min.js"></script>
    <!-- uikit functions -->
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


</head>
<body class=" sidebar_main_open sidebar_main_swipe">
<?php include('header.php'); ?>
<?php include('header_top.php'); ?>
<div id="page_content" style="margin-left:0px;">
    <div id="page_content_inner">
        <div class="md-card">
            <?php foreach ($detail_customer as $customer_1) {
                $cus_id = $customer_1['customer_id'];
            } ?>
            <div class="uk-grid">
                <div class="uk-width-1-1">
                    <div class="md-card">
                        <div class="md-card-toolbar">
                            <h3 class="md-card-toolbar-heading-text">
                                <b></b>
                            </h3>
                        </div>
                        <div class="md-card-content">
                            <div class="mGraph-wrapper">
                                <div class="uk-grid uk-grid-width-large-1-3 uk-grid-width-medium-1-2 uk-grid-medium uk-sortable sortable-handler"
                                     data-uk-sortable="" data-uk-grid-margin="">
                                    <div style="">
                                        <div class="md-card">
                                            <div class="md-card-content">
                                                <div class="uk-float-right uk-margin-top uk-margin-small-right"><i
                                                            class="material-icons"
                                                            style="font-size:35px;color:rgb(25, 118, 210)"></i></div>
                                                <span class="uk-text-muted uk-text-small" style="color:red">Name</span>
                                                <h2 class="uk-margin-remove"><span class="countUpMe"
                                                                                   style="font-size:17px;"><?php echo $detail_customer[0]['customer_company']; ?></span>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="">
                                        <div class="md-card">
                                            <div class="md-card-content">
                                                <div class="uk-float-right uk-margin-top uk-margin-small-right"><i
                                                            class="material-icons"
                                                            style="font-size:35px;color:rgb(25, 118, 210)"></i></div>
                                                <span class="uk-text-muted uk-text-small">Email</span>
                                                <h2 class="uk-margin-remove"><span class="countUpMe"
                                                                                   style="font-size:17px;"><?php echo $detail_customer[0]['customer_email']; ?></span>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="">
                                        <div class="md-card">
                                            <div class="md-card-content">
                                                <div class="uk-float-right uk-margin-top uk-margin-small-right"><i
                                                            class="material-icons"
                                                            style="font-size:35px;color:rgb(25, 118, 210)"></i></div>
                                                <span class="uk-text-muted uk-text-small">Phone</span>
                                                <h2 class="uk-margin-remove"><span class="countUpMe"
                                                                                   style="font-size:17px;"><?php echo $detail_customer[0]['customer_phone']; ?></span>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-grid-margin" style="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <?php echo form_open(base_url('seller/profile_filter/' . $cus_id), array('id' => 'contactname', 'name' => 'contactname', 'class' => 'uk-form-stacked', 'onsubmit' => 'return validateentry();', 'enctype' => 'multipart/form-data', 'method' => 'GET')); ?>
            <input type="hidden" value="<?php echo $cus_id; ?>">
            <div class="uk-grid" data-uk-grid-margin="">
                <div class="uk-width-large-1-2 uk-width-medium-1-1">
                </div>
                <div class="uk-width-large-1-4 uk-width-medium-1-1">
                    <div class="uk-input-group">
                        <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                        <div class="md-input-wrapper md-input-filled"><label for="uk_dp_1"></label>
                            <select name="month_year" style="width: 100%;height: 35px;">
                                <option>Select Year</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                            </select><span class="md-input-bar"></span></div>
                    </div>
                </div>
                <div class="uk-width-large-1-6 uk-width-medium-1-1">
                    <div class="uk-input-group">
                        <input type="submit" class="md-btn md-btn-success" value="Filter" submit="Filter">
                    </div>
                </div>
            </div>
            <?php echo form_close(); ?>


            <div class="md-card-content">
                <div class="mGraph-wrapper">
                    <div class="uk-grid uk-grid-width-large-1-1 uk-grid-width-medium-1-1 uk-grid-medium uk-sortable sortable-handler"
                         data-uk-sortable="" data-uk-grid-margin="">
                        <div class="uk-grid" data-uk-grid-margin data-uk-grid-match="{target:'.md-card-content'}"
                             style="">
                            <div class="uk-width-medium-1-1">
                                <div class="md-card">
                                    <div style="width: 100%">
                                        <div id="chartdiv"
                                             style="width: 100%; height: 400px; background-color: #FFFFFF;"></div>
                                    </div>
                                </div>
                            </div>


                            <div class="uk-grid-margin" style="">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="uk-grid uk-grid-width-small-1-2 uk-grid-width-large-1-3 uk-grid-width-xlarge-1-4 uk-text-center uk-sortable sortable-handler"
                     id="dashboard_sortable_cards" data-uk-sortable="" data-uk-grid-margin="">
                    <div>
                        <div class="md-card md-card-hover md-card-overlay" style="background-color:#932ab6">
                            <div class="md-card-content uk-flex uk-flex-center uk-flex-middle">
                                <span style="font-size:35px;color:white"><h2 style="color:white;" class="uk-icon-inr">&nbsp;<?php if ($detail_customer[0]['total_Sales_customers']) {
                                            echo number_format($detail_customer[0]['total_Sales_customers'], 2);
                                        } else {
                                            echo number_format(0, 2);
                                        } ?></h2><br><b style="font-size: 26px;">Total Sales</b></span>
                            </div>
                            <div class="md-card-overlay-content">
                                <div class="uk-clearfix md-card-overlay-header">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="md-card md-card-hover md-card-overlay"
                             style="background-color: rgba(0, 128, 0, 0.68);">
                            <div class="md-card-content uk-flex uk-flex-center uk-flex-middle">
                                <span style="font-size:35px;color:white;"><h2
                                            style="color:white;"><?php echo $detail_customer[0]['customer_count']; ?></h2><b
                                            style="font-size: 26px;">Total Order</b></span>
                            </div>
                            <div class="md-card-overlay-content">
                                <div class="uk-clearfix md-card-overlay-header">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="md-card md-card-hover md-card-overlay" style="background-color:#f88529">
                            <div class="md-card-content uk-flex uk-flex-center uk-flex-middle">
                                <span style="font-size:35px;color:white"><h2 style="color:white;" class="uk-icon-inr">&nbsp;<?php if ($amount_detail[0]['total_customer_paid']) {
                                            echo number_format($amount_detail[0]['total_customer_paid'], 2);
                                        } else {
                                            echo number_format(0, 2);
                                        } ?></h2><br><b
                                            style="font-size: 26px;">Total paid (<?php echo $detail_customer[0]['customer_paid']; ?>)</b></span>
                            </div>
                            <div class="md-card-overlay-content">
                                <div class="uk-clearfix md-card-overlay-header">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="md-card md-card-hover md-card-overlay" style="background-color:#fa3031;">
                            <div class="md-card-content uk-flex uk-flex-center uk-flex-middle">
                                <span style="font-size:35px;color:white;"><h2
                                            style="color:white;"><?php echo $detail_customer[0]['customer_canceled']; ?></h2><b
                                            style="font-size: 26px;">Canceled</b></span>
                            </div>
                            <div class="md-card-overlay-content">
                                <div class="uk-clearfix md-card-overlay-header">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-grid uk-grid-width-small-1-2 uk-grid-width-large-1-3 uk-grid-width-xlarge-1-4 uk-text-center uk-sortable sortable-handler"
                     id="dashboard_sortable_cards" data-uk-sortable="" data-uk-grid-margin="">
                    <div>
                        <div class="md-card md-card-hover md-card-overlay" style="background-color:#1976D2">
                            <div class="md-card-content uk-flex uk-flex-center uk-flex-middle">
                                <span style="font-size:35px;color:white"><h2 style="color:white;" class="uk-icon-inr">&nbsp;<?php if (($detail_customer[0]['total_Sales_customers']) > ($amount_detail[0]['total_customer_paid'])) {
                                            echo number_format($detail_customer[0]['total_Sales_customers'] - $amount_detail[0]['total_customer_paid'], 2);
                                        } else {
                                            echo number_format(0, 2);
                                        } ?></h2><br><b
                                            style="font-size: 26px;">Total Due (<?php echo $detail_customer[0]['customer_due']; ?> )</b></span>
                            </div>
                            <div class="md-card-overlay-content">
                                <div class="uk-clearfix md-card-overlay-header">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="md-card md-card-hover md-card-overlay" style="background-color:rgb(114, 114, 114)">
                            <div class="md-card-content uk-flex uk-flex-center uk-flex-middle">
                                <span style="font-size:35px;color:white;"><h2 style="color:white;" class="uk-icon-inr">&nbsp;<?php if ($detail_customer[0]['total_Sales_customers'] < ($amount_detail[0]['total_customer_paid'])) {
                                            echo number_format($amount_detail[0]['total_customer_paid'] - $detail_customer[0]['total_Sales_customers'], 2);
                                        } else {
                                            echo number_format(0, 2);
                                        } ?></h2><br><b style="font-size: 26px;">Total Advance</b></span>
                            </div>
                            <div class="md-card-overlay-content">
                                <div class="uk-clearfix md-card-overlay-header">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="md-card md-card-hover md-card-overlay" style="background-color:#1d0707">
                            <div class="md-card-content uk-flex uk-flex-center uk-flex-middle">
                                <span style="font-size:35px;color:white"><h2
                                            style="color:white;"><?php echo $detail_customer[0]['customer_pending']; ?></h2><b
                                            style="font-size: 26px;">Total Pending</b></span>
                            </div>
                            <div class="md-card-overlay-content">
                                <div class="uk-clearfix md-card-overlay-header">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="md-card-content">
                    <div class="uk-overflow-container uk-margin-bottom">
                        <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair"
                               id="ts_pager_filter">
                            <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Order No.</th>
                                <th>Date</th>
                                <th>Company Name</th>
                                <th>Total Amount</th>
                                <th>Paid</th>
                                <th>Balance</th>
                                <th>Status</th>
                                <th>Sales Person</th>
                                <th class="filter-false remove sorter-false uk-text-center">Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php $i = 1;
                            foreach ($detail_customer as $key) { ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $key['invoice_no']; ?></td>
                                    <td><?php echo $key['invoice_date']; ?></td>
                                    <td><?php echo $key['customer_company']; ?></td>
                                    <td><p class="uk-icon-inr">&nbsp;<?php echo $key['Total_amount'] . '.00'; ?></p>
                                    </td>
                                    <td><p class="uk-icon-inr">
                                            &nbsp;<?php $payment = $this->db->query("select sum(invoice_paid_amount) as customer_paid from payment where invoice_id='" . $key['id'] . "'");
                                            $data = $payment->result_array();
                                            foreach ($data as $customer_report) {
                                                if ($customer_report['customer_paid']) {
                                                    echo $customer_report['customer_paid'] . '.00';
                                                } else {
                                                    echo '<p class="uk-icon-inr">&nbsp;0.00</p>';
                                                }
                                            }
                                            ?></p></td>
                                    <td><?php $balance = $key['Total_amount'] - $customer_report['customer_paid'];
                                        if ($balance) {
                                            echo '<p class="uk-icon-inr">&nbsp;' . $balance . '.00<p>';
                                        } else {
                                            echo '<p class="uk-icon-inr">&nbsp;0.00</p>';
                                        } ?></td>
                                    <td><?php if ($key['status'] == 'Paid') {
                                            echo '<span class="uk-badge uk-badge-success" style="padding: 3px 29px;">Paid</span>';
                                        } elseif ($key['status'] == 'Due') {
                                            echo '<span class="uk-badge uk-badge-success" style="padding: 3px 29px;background-color:#0D8ECF;">Due</span>';
                                        } elseif ($key['status'] == 'Pending') {
                                            echo '<span class="uk-badge uk-badge-success" style="padding: 3px 29px;background-color:#FCD202;">Pending</span>';
                                        } elseif ($key['status'] == 'canceled') {
                                            echo '<span class="uk-badge uk-badge-danger" style="padding: 3px 29px;background-color:red;">Canceled</span>';
                                        }
                                        ?></td>
                                    <td><i class="material-icons">&#xE7FD;</i>&nbsp;<?php echo $key['sales_person']; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>seller/print_invoice/<?php echo $key['id']; ?>"><i
                                                    class="material-icons"
                                                    style="font-size:28px;color:#1976D2;"></i></a> <a
                                                href="<?php echo base_url(); ?>seller/delete_invoice/<?php echo $key['id']; ?>"
                                                onclick="return ConfirmDialog()"><i class="material-icons"
                                                                                    style="font-size:28px;color:#1976D2;"></i></a>
                                    </td>
                                </tr>
                            <?php }
                            $i++; ?>
                            </tbody>
                        </table>
                    </div>
                    <ul class="uk-pagination ts_pager">
                        <li data-uk-tooltip title="Select Page">
                            <select class="ts_gotoPage ts_selectize"></select>
                        </li>
                        <li class="first"><a href="javascript:void(0)"><i class="uk-icon-angle-double-left"></i></a>
                        </li>
                        <li class="prev"><a href="javascript:void(0)"><i class="uk-icon-angle-left"></i></a></li>
                        <li><span class="pagedisplay"></span></li>
                        <li class="next"><a href="javascript:void(0)"><i class="uk-icon-angle-right"></i></a></li>
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
                </div>
            </div>

        </div>
    </div>
    <div id="preloader">
        <div id="status"></div>
    </div>

    <!-- common functions -->
    <!-- altair common functions/helpers -->
    <script src="<?php echo base_url(); ?>assets/js/altair_admin_common.min.js"></script>

    <!-- page specific plugins -->
    <!-- tablesorter -->
    <script src="<?php echo base_url(); ?>assets/bower_components/tablesorter/dist/js/jquery.tablesorter.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bower_components/tablesorter/dist/js/jquery.tablesorter.widgets.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bower_components/tablesorter/dist/js/widgets/widget-alignChar.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bower_components/tablesorter/dist/js/extras/jquery.tablesorter.pager.min.js"></script>

    <!--  tablesorter functions -->
    <script src="<?php echo base_url(); ?>assets/js/pages/plugins_tablesorter.min.js"></script>
    <script type="text/javascript">

        function ConfirmDialog() {
            var x = confirm('Do You Want Delete This Record..');
            if (x) {
                return true;
            } else {
                return false;
            }
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

    <script type="text/javascript" src="http://www.amcharts.com/lib/3/amcharts.js"></script>
    <script type="text/javascript" src="http://www.amcharts.com/lib/3/serial.js"></script>
    <?php

    $chart = $this->db->query("select month as m,month_id as id from chart_month ");
    $b = $chart->result_array();
    $i = 1;
    foreach ($b as $c) {
        $id = $c['id'];
        $query = $this->db->query("SELECT date_format( on_date, '%m' ) as month, SUM( Total_amount) as total_sales FROM invoice WHERE seller_id = '$user_id' and `on_date` LIKE '%-$id-%'
and `on_date` LIKE '%$month_year-%' and customer_id='$cus_id' and `on_date` LIKE '%2016-%'  AND on_date >= date_sub( now( ) , INTERVAL 12 MONTH ) GROUP BY date_format( on_date, '%b' ) ORDER BY date_format( on_date, '%m' ) ASC");
        $amount = $query->result_array();

        $pending = $this->db->query("SELECT date_format(on_date, '%m' ) as month, SUM(Total_amount) as total_pending FROM invoice WHERE status='pending' and seller_id = '$user_id' and `on_date` LIKE '%-$id-%' and `on_date` LIKE '%$month_year-%' and customer_id='$cus_id' and `on_date` LIKE '%2016-%' AND on_date >= date_sub( now( ) , INTERVAL 12 MONTH ) GROUP BY date_format( on_date, '%b' ) ORDER BY date_format( on_date, '%m' ) ASC");
        $pending_amount = $pending->result_array();


        $paid = $this->db->query("SELECT date_format( add_on, '%m' ) as month, SUM(invoice_paid_amount) as total_paid FROM payment WHERE seller_id = '$user_id' and `add_on` LIKE '%-$id-%'  and `add_on` LIKE '%$month_year-%' and customer_id='$cus_id'  AND add_on >= date_sub( now( ) , INTERVAL 12 MONTH ) GROUP BY date_format( add_on, '%b' ) ORDER BY date_format( add_on, '%m' ) ASC");
        $paid_amount = $paid->result_array();


//$due_amount = $amount[0]['total_sales']-$paid_amount[0]['total_paid'];
        if ($amount[0]['total_sales'] > $paid_amount[0]['total_paid']) {
            $due_amount = $amount[0]['total_sales'] - $paid_amount[0]['total_paid'];
        } else {
            $due_amount = 0;
        }

        $aa = $amount[0]['total_sales'];
        $bb = $paid_amount[0]['total_paid'];
        if ($aa < $bb) {
            $advance_amount = $bb - $aa;
        } else {
            $advance_amount = 0;
        }

        $canceled = $this->db->query("SELECT date_format(on_date, '%m' ) as month, SUM(Total_amount) as total_canceled FROM invoice WHERE status='canceled' and seller_id = '$user_id' and `on_date` LIKE '%-$id-%' and `on_date` LIKE '%$month_year-%' and customer_id='$cus_id' and `on_date` LIKE '%2016-%' AND on_date >= date_sub( now( ) , INTERVAL 12 MONTH ) GROUP BY date_format( on_date, '%b' ) ORDER BY date_format( on_date, '%m' ) ASC");
        $canceled_amount = $canceled->result_array();

        $total = count($b);
        $str .= "{";
        $str .= '"month":"' . $c['m'] . '",';
        $str .= '"total_sales":"' . $amount[0]['total_sales'] . '",';
        $str .= '"total_pending":"' . $pending_amount[0]['total_pending'] . '",';
        $str .= '"total_paid":"' . $paid_amount[0]['total_paid'] . '",';
        $str .= '"total_due":"' . $due_amount . '",';
        $str .= '"total_advance":"' . $advance_amount . '",';
        $str .= '"total_canceled":"' . $canceled_amount[0]['total_canceled'] . '"';
        $str .= '}';

        if ($total > $i) {
            $str .= ",";
        }
        $i++;

    }
    ?>

    <!-- amCharts javascript code -->
    <script type="text/javascript">
        AmCharts.makeChart("chartdiv",
            {
                "type": "serial",
                "categoryField": "month",
                "colors": [
                    "#F60",
                    "#FCD202",
                    "#B0DE09",
                    "#0D8ECF",
                    "#727272",
                    "#FA3031",
                    "#CC0000",
                    "#00CC00",
                    "#0000CC",
                    "#DDDDDD",
                    "#999999",
                    "#333333",
                    "#990000"
                ],
                "startDuration": 1,
                "categoryAxis": {
                    "gridPosition": "start"
                },
                "trendLines": [],
                "graphs": [
                    {
                        "balloonText": "[[title]] of [[category]]:[[value]]",
                        "fillAlphas": 1,
                        "id": "AmGraph-1",
                        "title": "Total Sales",
                        "type": "column",
                        "valueField": "total_sales"
                    },
                    {
                        "balloonText": "[[title]] of [[category]]:[[value]]",
                        "fillAlphas": 1,
                        "id": "AmGraph-2",
                        "title": "Total Pending",
                        "type": "column",
                        "valueField": "total_pending"
                    },
                    {
                        "balloonText": "[[title]] of [[category]]:[[value]]",
                        "fillAlphas": 1,
                        "id": "AmGraph-3",
                        "title": "Total Paid",
                        "type": "column",
                        "valueField": "total_paid"
                    },
                    {
                        "balloonText": "[[title]] of [[category]]:[[value]]",
                        "fillAlphas": 1,
                        "id": "AmGraph-4",
                        "title": "Total Due",
                        "type": "column",
                        "valueField": "total_due"
                    },
                    {
                        "balloonText": "[[title]] of [[category]]:[[value]]",
                        "fillAlphas": 1,
                        "id": "AmGraph-5",
                        "title": "Total Advance",
                        "type": "column",
                        "valueField": "total_advance"
                    },
                    {
                        "balloonText": "[[title]] of [[category]]:[[value]]",
                        "fillAlphas": 1,
                        "id": "AmGraph-6",
                        "title": "Total Canceled",
                        "type": "column",
                        "valueField": "total_canceled",
                        "colors": "red"
                    }
                ],
                "guides": [],
                "valueAxes": [
                    {
                        "id": "ValueAxis-1",
                        "title": "Amount"
                    }
                ],
                "allLabels": [],
                "balloon": {},
                "legend": {
                    "enabled": true,
                    "useGraphSettings": true
                },
                "titles": [
                    {
                        "alpha": 0.97,
                        "id": "15",
                        "size": 21,
                        "text": "Sales"
                    }
                ],
                "dataProvider": [
                    <?php echo $str;?>
                ]
            }
        );
    </script>


</body>

</html>