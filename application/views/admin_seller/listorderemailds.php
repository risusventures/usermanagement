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
    <title>Risus Ventures</title>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- uikit -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/uikit/css/uikit.almost-flat.min.css"
          media="all">

    <!-- flag icons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/icons/flags/flags.min.css" media="all">

    <!-- altair admin -->
    <script src="<?php echo base_url(); ?>assets/js/common.min.js"></script>
    <!-- uikit functions -->
    <script src="<?php echo base_url(); ?>assets/js/uikit_custom.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bower_components/tablesorter/dist/js/extras/jquery.tablesorter.pager.min.js"></script>

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

        .uk-modal-header {
            margin-bottom: auto !important;
            margin: auto !important;
        }

        .uk-modal-footer {
            margin-top: auto !important;
            margin: auto !important;
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
<body class=" sidebar_main_open sidebar_main_swipe" style="background-color:white;">
<?php include('header.php'); ?>
<?php include('header_top.php'); ?>
<div id="page_content" style="margin-left:0px;">
    <div id="page_content_inner">
        <h4 class="heading_a uk-margin-bottom">View Business Emails</h4>
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
            } } ?>
            <?php if(!empty($_GET['customer'])){  if ($_GET['customer'] == 'deleted') {
                echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">
    <a href="#" class="uk-alert-close uk-close"></a>Order successfully deleted.........</div>';
            } ?>

            <?php if ($_GET['customer'] == 'email') {
                echo '<div class="uk-alert uk-alert-info" data-uk-alert="">
    <a href="#" class="uk-alert-close uk-close"></a>Email Successfully Sent......</div>';
            } } ?>


        </div>


        <div class="uk-grid" data-uk-grid-margin data-uk-grid-match="{target:'.md-card-content'}" style="">
            <div class="uk-width-medium-1-1">
                <div class="md-card">
                    <!--                        <div style="width: 100%">
                                           <div id="chartdiv" style="width: 100%; height: 400px; background-color: #FFFFFF;" ></div>
                                        </div>-->
                </div>
            </div>

        </div>
        <br>
        <div class="uk-overflow-container uk-margin-bottom">
            <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair"
                   id="ts_pager_filter">
                <thead>
                <tr>

                    <th>S.No.</th>
                    <th>Principal Short name</th>
                    <th>Customer Short name</th>
                    <th>Message Id</th>
                    <th>Action</th>


                </tr>
                </thead>

                <tbody>
                <?php $i = 1;
                foreach ($getorderemailidsdata as $order) {

                    $iddddd = $order['id'];

                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php if (!empty($order['pid'])) {
                                $ff = explode('::', $order['pid']);
                                if (count($ff) > 1) {
                                    echo $ff[1];
                                }
                            } ?></td>
                        <td><?php if (!empty($order['cid'])) {
                                $ff = explode('::', $order['cid']);
                                if (count($ff) > 1) {
                                    echo $ff[1];
                                }
                            } ?></td>
                        <?php
                        $messageId = $order['messageid'];
                        ?>
                        <td><?php echo str_replace('undefined - ', '', $messageId); ?></td>
                        <td>
                            <!-- Button here view/delete edit/ -->
                            <a href="<?php echo site_url() ?>/seller/update_businesss?id=<?php echo $iddddd; ?>"
                               Title="edit"><i class="material-icons" style="font-size:28px;color:#1976D2;">edit</i></a>

                            <a href="#" data-uk-tooltip="{pos:'bottom'}" Title="view"
                               data-uk-modal="{target:'#modal_header_footer1_<?php echo $iddddd; ?>'}"><i
                                        class="material-icons" style="font-size:28px;color:#1976D2;">remove_red_eye</i></a>

                            <a href="<?php echo site_url() ?>/seller/delete_businesss/<?php echo $iddddd; ?>"
                               onclick="return ConfirmDialog()" data-uk-tooltip="{pos:'bottom'}" Title="Delete"
                               onclick="return ConfirmDialog()"><i class="material-icons"
                                                                   style="font-size:28px;color:#1976D2;">delete</i></a>

                            <a href="<?php echo site_url() ?>/seller/sendemail_businesss?id=<?php echo $iddddd; ?>"
                               data-uk-tooltip="{pos:'bottom'}" Title="Email"><i class="material-icons"
                                                                                 style="font-size:28px;color:#1976D2;">email</i></a>


                            <div class="uk-modal" id="modal_header_footer1_<?php echo $order['id']; ?>"
                                 aria-hidden="true" style="display: none; overflow-y: auto;">

                                <div class="modal-dialog" style="">
                                    <div class="uk-modal-header">
                                        <h3 class="uk-modal-title">Message Detail</h3>

                                    </div>

                                    <div class="uk-modal-content" style="
    background: white;
">
                                        <div class="modal-body">
                                            <div class="uk-grid" data-uk-grid-margin="">
                                                <div class="parsley-row">
                                                    <?php
                                                    $messageId = $order['messageid'];
                                                    echo str_replace('undefined - ', '', $messageId) . '<br /><br />';
                                                    if (!empty($order['pid']) && !empty($order['cid'])) {
                                                        $ee1 = explode('::', $order['pid']);
                                                        $ee2 = explode('::', $order['cid']);
                                                        if (count($ee1) > 1 && count($ee2) > 1) {
                                                            echo $ee1['1'] . ' / ' . $ee2['1'];
                                                        } else if (count($ee1) > 1 && count($ee2) <= 1) {
                                                            echo ' ' . $ee1['1'];
                                                        } else if (count($ee1) <= 1 && count($ee2) > 1) {
                                                            echo ' ' . $ee2['1'];
                                                        }
                                                        echo '<br /><br />';
                                                        echo 'Dear ' . $order['pidcid'] . ' / ' . $order['cidcid'] . '<br /><br />';
                                                    } else if (!empty($order['pid']) && empty($order['cid'])) {
                                                        $ee = explode('::', $order['pid']);
                                                        if (count($ee) > 1) {
                                                            echo $ee['1'] . '<br /><br />';
                                                        }
                                                        echo 'Dear ' . $order['pidcid'] . '<br /><br />';
                                                    } else if (empty($order['pid']) && !empty($order['cid'])) {
                                                        $ee = explode('::', $order['cid']);
                                                        if (count($ee) > 1) {
                                                            echo $ee['1'] . '<br /><br />';
                                                        }
                                                        echo 'Dear ' . $order['cidcid'] . '<br /><br />';
                                                    }
                                                    echo $order['messages'];
                                                    ?>
                                                </div>
                                            </div>
                                            <!--<div class="uk-grid" data-uk-grid-margin="" style="">
                                                <div class="uk-width-medium-1-2">
                                                    <div class="parsley-row">
                                                        <div class="md-input-wrapper md-input-filled">
                                                            <label for="fullname"> <b>MSG ID
                                                                    :</b> <?php /*echo $order['messageid'] */?>  </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="uk-grid " data-uk-grid-margin="">
                                                <div class="uk-width-medium-1-2">
                                                    <div class="">
                                                        <div class="">
                                                            <label for="fullname">Principle Shortname</label><span
                                                                    class="col-lg-12"><?php /*if (!empty($order['pid'])) {
                                                                    $ee = explode('::', $order['pid']);
                                                                    if (count($ee) > 1) {
                                                                        echo $ee['1'];
                                                                    }
                                                                } */?></span></div>
                                                    </div>
                                                </div>
                                                <div class="uk-width-medium-1-2">
                                                    <div class="">
                                                        <div class="">
                                                            <label for="fullname">Principal Detail</label><span
                                                                    class="col-lg-12">  <?php /*echo $order['pidcid']; */?> </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="uk-grid " data-uk-grid-margin="">
                                                <div class="uk-width-medium-1-2">
                                                    <div class="">
                                                        <div class="">
                                                            <label for="fullname">Customer Shortname</label><span
                                                                    class="col-lg-12">  <?php /*if (!empty($order['cid'])) {
                                                                    $ee = explode('::', $order['cid']);
                                                                    if (count($ee) > 1) {
                                                                        echo $ee['1'];
                                                                    }
                                                                } */?></span></div>
                                                    </div>
                                                </div>
                                                <div class="uk-width-medium-1-2">
                                                    <div class="">
                                                        <div class="">
                                                            <label for="fullname">Customer Detail</label><span
                                                                    class="col-lg-12">  <?php /*echo $order['cidcid']; */?>                           </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="uk-grid " data-uk-grid-margin="">
                                                <div class="uk-width-medium-1">
                                                    <div class="">
                                                        <div class=""><span
                                                                    class="col-lg-12"> <?php /*echo $order['messages'] */?></span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>-->
                                        </div>
                                    </div>

                                    <div class="uk-modal-footer uk-text-right">
                                        <button type="button" class="md-btn md-btn-flat uk-modal-close"
                                                style="background-color:#1976D2;">Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php
                    $i++;
                }


                //   foreach ($getorderemailidsdata as $order) {

                //       $orderdetail=  $this->product_model->edit_order_model($order['order_id']);

                ?>
                <!--                     <tr>
                         <td><?php echo $i; ?></td>
                         <td><?php if (!empty($orderdetail['order'])) {
                    echo "Order number: <br>" . $orderdetail['order']['order_no'];
                } else {
                    echo "Open Email";
                } ?></td>
                         <td><?php // if(!empty($orderdetail['order'])){  ?> 
                                <a href="<?php echo site_url('seller/listallemails') . "?id=" . $order['order_id'] ?>"  Title="view"><i class="material-icons" style="font-size:28px;color:#1976D2;">remove_red_eye</i></a>
                        <?php // } ?></td>
                    </tr>-->
                <?php // $i++; }  ?>


                </tbody>
            </table>
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


<div id="preloader">
    <div id="status"></div>
</div>
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

<!-- date picker -->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/2.3.1/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.comiseo.daterangepicker.js"></script>

<!-- date picker -->


</body>

</html>