hello<?php $pages = 'manage_category'; ?>
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

    <!--  datatables functions -->
    <script src="<?php echo base_url() ?>assets/js/pages/plugins_datatables.min.js"></script>
    <?php include('analytics.php'); ?>
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
        <h4 class="heading_a uk-margin-bottom">View Order</h4>
        <div class="md-card uk-margin-medium-bottom">
            <?php if ($_GET['ab'] == 1) {
                echo '<div class="uk-alert uk-alert-success" data-uk-alert="">
    <a href="#" class="uk-alert-close uk-close"></a> Your Order has been Submitted......</div>';
            } ?>
            <?php if ($_GET['Order'] == success) {
                echo '<div class="uk-alert uk-alert-success" data-uk-alert="">
    <a href="#" class="uk-alert-close uk-close"></a>Order Tracking Details Added Successfully......</div>';
            } ?>
            <?php if ($_GET['payment'] == success) {
                echo '<div class="uk-alert uk-alert-success" data-uk-alert="">
    <a href="#" class="uk-alert-close uk-close"></a>Amount paid Successfully......</div>';
            } ?>
            <?php if ($_GET['payment'] == error) {
                echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">
    <a href="#" class="uk-alert-close uk-close"></a>Payment Already Compeleted......</div>';
            } ?>
            <?php if ($_GET['payment'] == deleted) {
                echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">
    <a href="#" class="uk-alert-close uk-close"></a>Payment successfully deleted.........</div>';
            } ?>
            <div class="md-card-content">
                <?php if ($_GET['order'] == deleted) {
                    echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">
    <a href="#" class="uk-alert-close uk-close"></a>Order successfully deleted.........</div>';
                } ?>
                <div class="md-card-content" style="padding:0px;">
                    <div class="md-card-content" style="padding:0px;">
                        <?php if ($_GET['order_track'] == deleted) {
                            echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">
    <a href="#" class="uk-alert-close uk-close"></a> Record Deleted Successfully.........</div>';
                        } ?>
                        <?php if ($_GET['updated'] == success) {
                            echo '<div class="uk-alert uk-alert-success" data-uk-alert="">
    <a href="#" class="uk-alert-close uk-close"></a>Order Successfully Updated......</div>';
                        } ?>
                        <a href="<?php echo site_url(); ?>/exportOrder" class="btn btn-warning btn-sm dropdown-toggle"
                           style="background-color:#1976D2;border:none;padding: 8px;"><i class="material-icons"
                                                                                         style="color:white;">view_list</i>
                            Export Table Data</a>

                        <div class="uk-overflow-container">
                            <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair"
                                   id="ts_pager_filter">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Order No.</th>
                                    <th>Event Date</th>
                                    <th>Order Date</th>
                                    <th>Contact Name</th>
                                    <th>Total Amount</th>
                                    <th>Paid</th>
                                    <th>Balance</th>
                                    <th>Status</th>
                                    <th class="filter-false remove sorter-false uk-text-center ">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1;
                                foreach ($order as $order) { ?>
                                    <tr>
                                        <td></td>
                                        <td><?php echo $order['invoice_no']; ?></td>
                                        <td><?php echo $order['invoice_date']; ?></td>
                                        <td><?php echo $order['party_date']; ?></td>
                                        <td><?php echo $order['customer_person']; ?></td>
                                        <td><p class="uk-icon-gbp">
                                                &nbsp;<?php echo $order['Total_amount'] . '.00'; ?></p></td>
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
                                        <td>  <?php
                                            $pp_id = $order['id'];
                                            $q = $this->db->query("SELECT sum(invoice_paid_amount) as status_amount FROM `payment` WHERE invoice_id='$pp_id'");
                                            $pays = $q->result_array();
                                            $payment_status = $pays[0]['status_amount'];
                                            $status = $order['status'];
                                            if (($payment_status == 0) && ($status != 'canceled')) {
                                                $message = 'Quotation';
                                                $this->db->query("UPDATE invoice SET status= '$message' WHERE id= '$pp_id'");
                                                echo '<span class="uk-badge uk-badge-danger" style="padding: 3px 29px;">' . $message . '</span>';
                                            } elseif ((($payment_status == $order['Total_amount'])) && ($status != 'canceled')) {
                                                $message = 'Paid';
                                                $this->db->query("UPDATE invoice SET status= '$message' WHERE id= '$pp_id'");
                                                echo '<span class="uk-badge uk-badge-success" style="padding: 3px 29px;">' . $message . '</span>';
                                            } elseif ((($payment_status < $order['Total_amount']) && ($payment_status > 0)) && ($status != 'canceled')) {
                                                $message = 'Due';
                                                $this->db->query("UPDATE invoice SET status= '$message' WHERE id= '$pp_id'");
                                                echo '<span class="uk-badge uk-badge-danger" style="">' . $message . '</span>';
                                            } elseif ((($payment_status > $order['Total_amount']) && ($payment_status > 0)) && ($status != 'canceled')) {
                                                $message = 'Partial';
                                                $this->db->query("UPDATE invoice SET status= '$message' WHERE id= '$pp_id'");
                                                echo '<span class="uk-badge uk-badge-success" style="padding: 3px 29px;background-color:#0D8ECF;">' . $message . '</span>';
                                            } else {
                                                $message = 'canceled';
                                                $this->db->query("UPDATE invoice SET status= '$message' WHERE id= '$pp_id'");
                                                echo '<span class="uk-badge uk-badge-danger" style="padding: 3px 29px;">' . $message . '</span>';
                                            }
                                            ?></td>
                                        <td>
                                            <!---Add Payment--->

                                            <a href="#"
                                               data-uk-modal="{target:'#modal_header_footer_<?php echo $order['invoice_no']; ?>'}"
                                               data-uk-tooltip="{pos:'bottom'}" Title="Add Payment"><i
                                                        class="material-icons" style="font-size:28px;color:#1976D2;">&#xE146;</i></a>
                                            <div class="uk-modal"
                                                 id="modal_header_footer_<?php echo $order['invoice_no']; ?>"
                                                 aria-hidden="true" style="display: none; overflow-y: auto;">
                                                <div class="uk-modal-dialog" style="top: 88px;">
                                                    <?php echo form_open(site_url('seller/add_payment')) ?>
                                                    <div class="uk-modal-header"><h3 class="uk-modal-title">Add Payment
                                                            (Order No.<?php echo $order['invoice_no']; ?>)</h3></div>
                                                    <hr style="border:2px solid #e0e0e0;"></hr>
                                                    <input type="hidden" name="invoice_number"
                                                           value="<?php echo $order['invoice_no']; ?>">
                                                    <input type="hidden" name="payment_id"
                                                           value="<?php echo $order['id']; ?>">
                                                    <input type="hidden" value="<?php echo $order['customer_id'] ?>"
                                                           name="customer_id">
                                                    <input type="hidden" value="<?php echo $order['Total_amount']; ?>"
                                                           name="total_amount">
                                                    <p>
                                                    <div class="md-card-content">
                                                        <div class="uk-grid" data-uk-grid-margin="">
                                                            <div class="uk-width-medium-1-1">
                                                                <div class="uk-form-row">
                                                                    <div class="uk-grid">
                                                                        <div class="uk-width-medium-1-2">
                                                                            <div class="md-input-wrapper md-input-filled">
                                                                                <label>Date</label><input type="date"
                                                                                                          id="payment_date"
                                                                                                          name="payment_date"
                                                                                                          class="md-input label-fixed"
                                                                                                          value="<?php echo $order['invoice_date']; ?>"
                                                                                                          required><span
                                                                                        class="md-input-bar"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="uk-width-medium-1-2">
                                                                            <div class="md-input-wrapper md-input-filled">
                                                                                <label>Amount Paid</label><input
                                                                                        type="number" id="payment_paid"
                                                                                        name="payment_paid"
                                                                                        class="md-input label-fixed"
                                                                                        required><span
                                                                                        class="md-input-bar"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="uk-form-row">
                                                                    <div class="uk-grid">
                                                                        <div class="uk-width-medium-1-2">
                                                                            <div class="md-input-wrapper md-input-filled">
                                                                                <select name="mode_of_payment"
                                                                                        style="padding:10px;"
                                                                                        class="uk-width-medium-1-1 status">
                                                                                    <option>Select Mode Of Payment
                                                                                    </option>
                                                                                    <option value="Cash">Cash</option>
                                                                                    <option value="Cheques">Cheques
                                                                                    </option>
                                                                                    <option value="Debit Cards/Credit Cards">
                                                                                        Debit Cards/Credit Cards
                                                                                    </option>
                                                                                    <option value="Internet Banking / NEFT">
                                                                                        Internet Banking / NEFT
                                                                                    </option>
                                                                                </select>
                                                                                <span class="md-input-bar"></span></div>
                                                                        </div>
                                                                        <div class="uk-width-medium-1-2">
                                                                            <div class="md-input-wrapper">
                                                                                <label>Note</label><input type="Text"
                                                                                                          class="md-input"
                                                                                                          id="payment_note"
                                                                                                          name="payment_note"
                                                                                                          required><span
                                                                                        class="md-input-bar"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="uk-form-row" style="display:none">
                                                                    <div class="md-input-wrapper"><input type="hidden"
                                                                                                         class="md-input"
                                                                                                         id=""
                                                                                                         name="company_name"
                                                                                                         value="<?php echo $order['name']; ?>"
                                                                                                         hidden><span
                                                                                class="md-input-bar"></span></div>
                                                                </div>
                                                                <div class="uk-form-row" style="display:none">
                                                                    <div class="md-input-wrapper"><input type="hidden"
                                                                                                         class="md-input"
                                                                                                         id=""
                                                                                                         name="company_email"
                                                                                                         value="<?php echo $order['company_email']; ?>"
                                                                                                         hidden><span
                                                                                class="md-input-bar"></span></div>
                                                                </div>
                                                                <div class="uk-form-row" style="display:none">
                                                                    <div class="md-input-wrapper"><input type="hidden"
                                                                                                         class="md-input"
                                                                                                         id=""
                                                                                                         name="company_address"
                                                                                                         value="<?php echo $order['company_address']; ?>"
                                                                                                         hidden><span
                                                                                class="md-input-bar"></span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </p>
                                                    <div class="uk-modal-footer uk-text-right">
                                                        <button type="button" class="md-btn md-btn-flat uk-modal-close"
                                                                style="background-color:#1976D2;">Close
                                                        </button>
                                                        <input type="submit"
                                                               class="md-btn md-btn-flat md-btn-flat-primary"
                                                               style="background-color:#1976D2;color:white;"
                                                               value="ADD PAYMENT">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php echo form_close(); ?>

                                            <!---Add Payment--->


                                            <!--print---->
                                            <a href="<?php echo site_url() ?>/printOrder/<?php echo $order['id']; ?>"
                                               target="_blank" data-uk-tooltip="{pos:'bottom'}"
                                               title=" <?php if ($order[status] != 'Quotation') {
                                                   echo 'Invoice With Payment';
                                               } else {
                                                   echo 'Quotation With Payment';
                                               } ?>"><i class="material-icons" style="font-size:28px;color:#1976D2;">&#xE53E;</i></a>
                                            <a href="<?php echo site_url() ?>/printOrder/<?php echo $order['id']; ?>?without=payment"
                                               target="_blank" data-uk-tooltip="{pos:'bottom'}"
                                               title="<?php if ($order[status] != 'Quotation') {
                                                   echo 'Invoice Without Payment';
                                               } else {
                                                   echo 'Quotation Without Payment';
                                               } ?>"><i class="material-icons" style="font-size:28px;color:#1976D2;">&#xE8AD;</i></a>
                                            <a href="<?php echo site_url() ?>/seller/edit_order/<?php echo $order['id']; ?>"
                                               target="_blank" data-uk-tooltip="{pos:'bottom'}" title="Edit"><i
                                                        class="material-icons" style="font-size:28px;color:#1976D2;">&#xE254;</i></a>
                                            <!---Print-->
                                            <?php if ($order[status] != 'Paid') { ?>  <a
                                                    href="<?php echo site_url() ?>/seller/delete_invoice/<?php echo $order['invoice_no']; ?>"
                                                    data-uk-tooltip="{pos:'bottom'}" title="Delete"><i
                                                        class="material-icons" style="font-size:28px;color:#1976D2;"
                                                        onclick="return ConfirmDialog()">&#xE872;</i></a>
                                            <?php } ?>
                                        </td>


                                    </tr>
                                <?php }
                                $i++; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="md-fab-wrapper">
            <a class="md-fab md-fab-accent" href="<?php echo site_url('addOrder'); ?>" id="recordAdd"
               title="Create New Order" data-uk-tooltip="{pos:'bottom'}">
                <i class="material-icons"></i>
            </a>
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
        <!-- tablesorter -->
        <script src="<?php echo base_url(); ?>assets/bower_components/tablesorter/dist/js/jquery.tablesorter.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/bower_components/tablesorter/dist/js/jquery.tablesorter.widgets.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/bower_components/tablesorter/dist/js/widgets/widget-alignChar.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/bower_components/tablesorter/dist/js/extras/jquery.tablesorter.pager.min.js"></script>

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
        <script type="text/javascript">

            function ConfirmDialog() {

                var x = confirm('Do You Want Delete Record..');
                if (x) {
                    return true;
                } else {
                    return false;
                }
            }
        </script>
        <script type="text/javascript">
            function ShowHideDiv(chkPassport) {
                var dvPassport = document.getElementById("dvPassport");
                dvPassport.style.display = chkPassport.checked ? "block" : "none";
            }
        </script>

        <script type="text/javascript">
            $(function () {
                $("#chkPassport").click(function () {
                    if ($(this).is(":checked")) {
                        $("#dvPassport").show();
                    } else {
                        $("#dvPassport").hide();
                    }
                });
            });
        </script>
        <script type="text/javascript">

            function ConfirmDialog_status() {

                var x = confirm('Do You Want Order Cancel..');
                if (x) {
                    return true;
                } else {
                    return false;
                }
            }
        </script>

</body>
</html>