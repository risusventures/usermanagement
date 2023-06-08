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
    <link rel="stylesheet"
          href="<?php echo base_url() ?>assets/bower_components/weather-icons/css/weather-icons.min.css" media="all">
    <link rel="stylesheet"
          href="<?php echo base_url() ?>assets/bower_components/metrics-graphics/dist/metricsgraphics.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/chartist/dist/chartist.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/uikit/css/uikit.almost-flat.min.css"
          media="all">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/icons/flags/flags.min.css" media="all">
    <link rel='stylesheet' href="https://fonts.googleapis.com/css?family=Roboto:400,400italic,700">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/main.min.css" media="all">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
    <?php include('analytics.php'); ?>
    <style>
        .t-10 {
            width = "10%;"
        }
    </style>
</head>

<body class=" sidebar_main_open sidebar_main_swipe">
<?php include('header.php'); ?><!-- main header end -->
<?php include('aside.php'); ?>
<div id="page_content">
    <div id="page_content_inner">

        <h3 class="heading_a uk-margin-bottom"><u>Order Report</u></h3>
        <div class="md-card uk-margin-large-bottom1">
            <div class="md-card-content">
                <div class="md-cardsss">
                    <?php
                    if (isset($_GET['from_date']) && !empty($_GET['from_date'])) {
                        $from_date = $_GET['from_date'];
                    } else {
                        $from_date = @date('Y-m-01');
                    }

                    if (isset($_GET['to_date']) && !empty($_GET['to_date'])) {
                        $to_date = $_GET['to_date'];
                    } else {
                        $to_date = @date("Y-m-d");
                    }


                    $_product_curency = $_product_quantitydata = $_product_namedata = $pric_name_whole_data = $pric_name = array();

                    $productname = array();

                    $q = "SELECT * FROM `orders`";

                    $orders = $this->db->query($q)->result_array();
                    // echo '<pre>'; print_r($orders); echo '</pre>';
                    ?>
                    <div class="uk-overflow-container uk-margin-bottom">
                        <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair"
                               id="ts_pager_filter">
                            <thead>
                            <tr>

                                <th class="t-10">Oder No.</th>
                                <th class="t-10">Principal Name</th>
                                <th class="t-10">Principal Contact</th>
                                <th class="t-10">Customer Name</th>
                                <th class="t-10">Product Name</th>
                                <th class="t-10">Product Quantity</th>
                                <th class="t-10">Subtotal</th>
                                <th class="t-10">Currency</th>
                                <th class="t-10">Total USD</th>
                                <th class="t-10">Total</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (!empty($orders)) {
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
                                            $p_subtotal = $sp['p_subtotal'];
                                            $pric_name_whole_data[$pid][$currency][] = $sp['p_subtotal'];
                                            $_product_namedata[$sp['product_id']][] = $sp['p_subtotal'];
                                            $_product_quantitydata[$sp['product_id']][] = $sp['p_quntity'];
                                            $productname[$sp['product_id']] = $p_name;
                                            $_product_curency[$sp['product_id']] = $currency;
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $single_order['order_no']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $pricipaldata['Principal_person']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $principal_contactsdata['name']; ?>
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


                        <?php
                        // echo '<pre>'; print_r($pric_name_whole_data); echo '</pre>';
                        if (!empty($pric_name_whole_data)) {
                            ?>
                            <div class="panel panel-default"
                                 style="display: block;float: left;margin-top: 20px;width: 100%;">
                                <div class="panel-heading">Principal Collection</div>
                                <div class="panel-body">
                                    <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair">
                                        <thead>
                                        <th>Principal Name</th>
                                        <th>Currency</th>
                                        <th>Amount</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($pric_name_whole_data as $pkey => $dd) {
                                            foreach ($dd as $currency => $pricearray) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $pric_name[$pkey]; ?></td>
                                                    <td><?php echo $currency; ?></td>
                                                    <td><?php echo array_sum($pricearray); ?></td>
                                                </tr>

                                                <?php
                                            }

                                        }
                                        ?>
                                        </tbody>

                                    </table>

                                </div>
                            </div>
                            <?php
                        }
                        ?>


                        <?php
                        // echo '<pre>'; print_r($_product_namedata); echo '</pre>';
                        // echo '<pre>'; print_r($_product_quantitydata); echo '</pre>';
                        if (!empty($_product_namedata)) {
                            ?>
                            <div class="panel panel-default"
                                 style="display: block;float: left;margin-top: 20px;width: 100%;">
                                <div class="panel-heading">Product Data</div>
                                <div class="panel-body">
                                    <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair">
                                        <thead>
                                        <th>Product Name</th>
                                        <th>quantity</th>
                                        <th>Amount</th>
                                        <th>Currency</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($_product_namedata as $pkey => $dd) {

                                            ?>
                                            <tr>
                                                <td><?php echo $productname[$pkey]; ?></td>
                                                <td><?php echo array_sum($_product_quantitydata[$pkey]); ?></td>
                                                <td><?php echo array_sum($dd); ?></td>
                                                <td><?php echo $_product_curency[$pkey]; ?></td>
                                            </tr>

                                            <?php

                                        }
                                        ?>
                                        </tbody>

                                    </table>

                                </div>
                            </div>
                            <?php
                        }
                        ?>

                    </div>


                </div>
            </div>
        </div>


    </div>
</div>

<!-- secondary sidebar -->
<!-- secondary sidebar end -->

<!-- google web fonts -->

<script src="<?php echo base_url() ?>assets/js/common.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/uikit_custom.min.js"></script>
<!-- altair common functions/helpers -->
<script src="<?php echo base_url() ?>assets/js/altair_admin_common.min.js"></script>

<!-- page specific plugins -->
<!-- d3 -->
<script src="<?php echo base_url() ?>assets/js/autocomplete.js1"></script>
<script src="<?php echo base_url() ?>assets/bower_components/d3/d3.min.js"></script>
<!-- metrics graphics (charts) -->
<script src="<?php echo base_url() ?>assets/bower_components/metrics-graphics/dist/metricsgraphics.min.js"></script>
<!-- chartist (charts) -->
<script src="<?php echo base_url() ?>assets/bower_components/chartist/dist/chartist.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/c3js-chart/c3.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/chartist/dist/chartist.min.js"></script>

<!--  charts functions -->
<script src="<?php echo base_url() ?>assets/js/pages/plugins_charts.min.js"></script>
<!-- maplace (google maps) -->
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="<?php echo base_url() ?>assets/bower_components/maplace.js/src/maplace-0.1.3.js"></script>
<!-- peity (small charts) -->
<script src="<?php echo base_url() ?>assets/bower_components/peity/jquery.peity.min.js"></script>
<!-- easy-pie-chart (circular statistics) -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
<!-- countUp -->
<script src="<?php echo base_url() ?>assets/bower_components/countUp.js/countUp.min.js"></script>
<!-- handlebars.js -->
<script src="<?php echo base_url() ?>assets/bower_components/handlebars/handlebars.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/custom/handlebars_helpers.min.js"></script>
<!-- CLNDR -->
<script src="<?php echo base_url() ?>assets/bower_components/clndr/src/clndr.js"></script>
<!-- fitvids -->
<script src="<?php echo base_url() ?>assets/bower_components/fitvids/jquery.fitvids.js"></script>

<!--  dashbord functions -->
<script src="<?php echo base_url() ?>assets/js/pages/dashboard.min.js"></script>
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

 