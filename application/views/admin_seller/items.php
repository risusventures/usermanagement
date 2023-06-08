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

    <title>Cater Manage</title>


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
        <h4 class="heading_a uk-margin-bottom">View All Items</h4>
        <div class="md-card">
            <?php if ($_GET['message'] == already) {
                echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">
         <a href="#" class="uk-alert-close uk-close"></a>Your Item are already inserted</div>';
            } ?>
            <?php if ($_GET['message'] == success) {
                echo '<div class="uk-alert uk-alert-success" data-uk-alert="">
                    <a href="#" class="uk-alert-close uk-close"></a>Added Item Successfully......</div>';
            } ?>
            <?php if ($_GET['message'] == 1) {
                echo '<div class="uk-alert uk-alert-info" data-uk-alert="">
    <a href="#" class="uk-alert-close uk-close"></a>Item Update  Successfully......</div>';
            } ?>
            <?php if ($_GET['customer'] == deleted) {
                echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">
    <a href="#" class="uk-alert-close uk-close"></a>Item successfully deleted.........</div>';
            } ?>

            <div class="md-card-content">


                <div class="uk-overflow-container uk-margin-bottom">
                    <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair"
                           id="ts_pager_filter">
                        <thead>
                        <tr>

                            <th>S.No.</th>
                            <th>Name Of Items</th>
                            <th class="filter-false remove sorter-false uk-text-center">Actions</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php $i = 1;
                        foreach ($items as $item) { ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $item['item_name']; ?></td>
                                <td>
                                    <a href="#" data-uk-tooltip="{pos:'bottom'}" Title="edit"
                                       data-uk-modal="{target:'#modal_header_footer_<?php echo $item['id']; ?>'}"><i
                                                class="material-icons" style="font-size:28px;color:#1976D2;"></i></a>
                                    <div class="uk-modal" id="modal_header_footer_<?php echo $item['id']; ?>"
                                         aria-hidden="true" style="display: none; overflow-y: auto;">
                                        <?php echo form_open(base_url('seller/update_item'), array('id' => 'contactname', 'name' => 'contactname', 'class' => 'uk-form-stacked', 'enctype' => 'multipart/form-data')); ?>
                                        <input type="hidden" name="uid" class="md-input label-fixed"
                                               value="<?php echo $item['id']; ?>" data-parsley-id="4">
                                        <div class="uk-modal-dialog" style="top: 88px;">
                                            <div class="uk-modal-header"><h3 class="uk-modal-title">Update Item</h3>
                                            </div>
                                            <hr style="border:2px solid #e0e0e0;"></hr>
                                            <p>
                                            <div class="md-card">
                                                <div class="md-card-content large-padding">

                                                    <div class="uk-grid " data-uk-grid-margin="">
                                                        <div class="uk-width-medium-1-2">
                                                            <div class="parsley-row">
                                                                <div class="md-input-wrapper md-input-filled"><label>Item
                                                                        Name<span class="req">*</span></label><input
                                                                            type="text" name="item_name"
                                                                            class="md-input label-fixed"
                                                                            value="<?php echo $item['item_name']; ?>"
                                                                            data-parsley-id="4" required><span
                                                                            class="md-input-bar"></span></div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            </p>
                                            <div class="uk-modal-footer uk-text-right">
                                                <button type="button" class="md-btn md-btn-flat uk-modal-close"
                                                        style="background-color:#1976D2;">Close
                                                </button>
                                                <button type="submit" class="md-btn md-btn-flat md-btn-flat-primary"
                                                        style="background-color:#1976D2;color:white"
                                                        onClick="return ConfirmDialog1()">Submit
                                                </button>
                                            </div>
                                        </div>

                                        <?php echo form_close(); ?>
                                    </div>
                                    <a href="<?php echo base_url() ?>seller/delete_item/<?php echo $item['id']; ?>"
                                       onclick="return ConfirmDialog()" data-uk-tooltip="{pos:'bottom'}" Title="Delete"
                                       onclick="return ConfirmDialog()"><i class="material-icons"
                                                                           style="font-size:28px;color:#1976D2;"></i></a>
                                    &nbsp;

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
</div>
<div class="uk-modal" id="modal_header_footer_customers" aria-hidden="true" style="display: none; overflow-y: auto;">
    <?php echo form_open(base_url('seller/item_submit'), array('id' => 'contactname', 'name' => 'contactname', 'class' => 'uk-form-stacked', 'enctype' => 'multipart/form-data', 'onsubmit' => 'return validateentry();')); ?>
    <div class="uk-modal-dialog" style="top: 88px;">
        <div class="uk-modal-header"><h3 class="uk-modal-title">Add New Item</h3></div>
        <hr style="border:2px solid #e0e0e0;"></hr>
        <p>
        <div class="md-card">
            <div class="md-card-content large-padding">

                <div class="uk-grid " data-uk-grid-margin="">
                    <div class="uk-width-medium-1-2">
                        <div class="parsley-row">
                            <div class="md-input-wrapper"><label for="fullname">Item Name<span
                                            class="req">*</span></label><input type="text" name="item_name"
                                                                               class="md-input" value=""
                                                                               data-parsley-id="4" required><span
                                        class="md-input-bar"></span></div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
        </p>
        <div class="uk-modal-footer uk-text-right">
            <button type="button" class="md-btn md-btn-flat uk-modal-close" style="background-color:#1976D2;">Close
            </button>
            <button type="submit" class="md-btn md-btn-flat md-btn-flat-primary"
                    style="background-color:#1976D2;color:white">Submit
            </button>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
<div class="md-fab-wrapper">
    <a class="md-fab md-fab-accent" href="#" id="recordAdd" data-uk-modal="{target:'#modal_header_footer_customers'}"
       data-uk-tooltip="{pos:'bottom'}" Title="Add New Item">
        <i class="material-icons"></i>
    </a>
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


</body>

</html>