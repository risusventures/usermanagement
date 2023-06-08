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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Risus Ventures</title>
    

    <!-- uikit -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/uikit/css/uikit.almost-flat.min.css"
          media="all">

    <!-- flag icons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/icons/flags/flags.min.css" media="all">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    


    <!---date picker--->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <link rel="stylesheet"
          href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/jquery.comiseo.daterangepicker.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.min.css" media="all">
    <script id="script_e1">
        $(function () {
            $("#e1").daterangepicker();
        });
    </script>
  


    <script>// makes sure the whole site is loaded
        jQuery(window).load(function () {
            // will first fade out the loading animation
            jQuery("#status").fadeOut();
            // will fade out the whole DIV that covers the website.
            jQuery("#preloader").delay(1000).fadeOut("slow");
        })
    </script>

</head>
<body class="sidebar_main_open sidebar_main_swipe" style="background-color:white;">
<?php include('header.php'); ?>
<?php include('header_top.php'); ?>
<div id="page_content" style="margin-left:0px;">
    <div id="page_content_inner">
        <h3 class="heading_a uk-margin-bottom">Manage Principal <button class="btn btn-white btn-rounded mr-md-3 z-depth-1a waves-effect waves-light"
                                    onclick="location.reload();" style="float: right;"><i class="uk-icon-refresh uk-icon-small"></i> Reset Filter</button></h3>
        <div class="md-card uk-margin-medium-bottom">
            <div class="uk-width-large-1-1">
                <?php if ($_GET['message'] == 'already') {
                    echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">
         <a href="#" class="uk-alert-close uk-close"></a>You are already registered</div>';
                } ?>
                <?php if ($_GET['message'] == 'success') {
                    echo '<div class="uk-alert uk-alert-success" data-uk-alert="">
                    <a href="#" class="uk-alert-close uk-close"></a>Added Principal Successfully......</div>';
                } ?>
                <?php if ($_GET['message'] == 1) {
                    echo '<div class="uk-alert uk-alert-info" data-uk-alert="">
    <a href="#" class="uk-alert-close uk-close"></a>Principal Update  Successfully......</div>';
                } ?>
                <?php if ($_GET['customer'] == 'deleted') {
                    echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">
    <a href="#" class="uk-alert-close uk-close"></a>Principal successfully deleted.........</div>';
                } ?>
                <!-- large chart -->
                <!---datepicker--->
                <main>
                    <section class="mb-5">
                        <!--Card-->


                        <div class="card card-cascade narrower">
                            <?php //echo form_open(site_url('exportPrincipal'),array('method'=>'GET'));?>
                            <div class="view view-cascade py-3 gradient-card-header info-color-dark mx-4 d-flex justify-content-between align-items-center">
                                <div class="md-card-toolbar-actions" style="display: none;">
                                    <div class="col-md-4"><p><input class="raw" id="e1" name="recort_filter"><input
                                                    type="submit" value="Reports"
                                                    style="height:30px;background-color: #1976D2;border: none;color: white;"/>
                                        </p>
                                    </div>
                                </div><?php echo form_close(); ?>
                               
                            </div>


                            <!---datepicker--->

                            <!-- circular charts -->
                            <div class="card-body card-body-cascade">
                                <div class="table-responsive">
                                    <table class="table" id="ts_pager_filter"
                                           style="border: 2px solid whitesmoke !important;">
                                        <thead>
                                        <tr>

                                            <th style="color:#1976d2"><b>S.No.</b></th>
                                            <th style="color:#1976d2"><b>Name</b></th>
                                            <th style="color:#1976d2"><b>Phone</b></th>
                                            <th style="color:#1976d2"><b>City </b></th>
                                            <th style="color:#1976d2"><b>Country</b></th>
                                            <th style="color:#1976d2"><b>Reg. Date</b></th>
                                            <th class="filter-false remove sorter-false uk-text-center"
                                                style="color:#1976d2"><b>Actions</b></th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php $i = 1;
                                        foreach ($list_principal as $principal) { ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $principal['Principal_person']; ?></td>
                                                <td><?php echo $principal['Principal_phone']; ?></td>
                                                <td><?php echo $principal['Principal_city']; ?></td>
                                                <td><?php echo $principal['Principal_country']; ?></td>
                                                <td><?php echo date('m-d-Y h:i:s A ', strtotime($principal['add_on'])); ?></td>
                                                <td>
                                                    <a href="<?php echo site_url() ?>/principal/updatePrincipal?id=<?php echo $principal['Principal_id']; ?>"
                                                       Title="edit"><i class="material-icons"
                                                                       style="font-size:28px;color:#1976D2;">edit</i></a>
                                                    <a href="#" data-uk-tooltip="{pos:'bottom'}" Title="view"
                                                       data-uk-modal="{target:'#modal_header_footer1_<?php echo $principal['Principal_id']; ?>'}"><i
                                                                class="material-icons"
                                                                style="font-size:28px;color:#1976D2;">remove_red_eye</i></a>


                                                    <!-----view model---->
                                                    <div class="uk-modal"
                                                         id="modal_header_footer1_<?php echo $principal['Principal_id']; ?>"
                                                         aria-hidden="true" style="display: none; overflow-y: auto;">
                                                        <?php echo form_open(site_url('Principal/view_Principal'), array('id' => 'contactname', 'name' => 'contactname', 'class' => 'uk-form-stacked', 'enctype' => 'multipart/form-data')); ?>
                                                        <input type="hidden" name="uid" class="md-input label-fixed"
                                                               value="<?php echo $principal['Principal_id']; ?>"
                                                               data-parsley-id="4">
                                                        <div class="uk-modal-dialog" style="top: 88px;">
                                                            <div class="uk-modal-header"><h3 class="uk-modal-title">
                                                                    Principal Detail</h3></div>
                                                            <hr style="border:2px solid #e0e0e0;"></hr>
                                                            <p>
                                                            <div class="md-card">
                                                                <div class="md-card-content large-padding">
                                                                    <div class="uk-grid " data-uk-grid-margin="">
                                                                        <div class="uk-width-medium-1-2">
                                                                            <div class="parsley-row">
                                                                                <div class="md-input-wrapper md-input-filled">
                                                                                    <label for="fullname"> <b>MSG ID
                                                                                            :</b> <?php echo $principal['short_name'] . $principal['Principal_id']; ?>
                                                                                    </label></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="uk-grid " data-uk-grid-margin="">
                                                                        <div class="uk-width-medium-1-2">
                                                                            <div class="parsley-row">
                                                                                <div class="md-input-wrapper md-input-filled">
                                                                                    <label>Company Name<span
                                                                                                class="req">*</span></label><input
                                                                                            type="text"
                                                                                            name="Principal_company"
                                                                                            class="md-input label-fixed"
                                                                                            readonly
                                                                                            value="<?php echo $principal['Principal_person']; ?>"
                                                                                            data-parsley-id="4"
                                                                                            required><span
                                                                                            class="md-input-bar"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <!--<div class="uk-width-medium-1-2">
<div class="parsley-row">
<div class="md-input-wrapper md-input-filled"><label for="fullname">Contact Person<span class="req">*</span></label><input type="text" name="Principal_person" class="md-input label-fixed" value="<?php echo $principal['Principal_person']; ?>" data-parsley-id="6" required='required'><span class="md-input-bar"></span></div>   
                               </div>
                            </div>-->
                                                                        <div class="uk-width-medium-1-2">
                                                                            <div class="parsley-row">
                                                                                <div class="md-input-wrapper md-input-filled">
                                                                                    <label for="fullname">Phone<span
                                                                                                class="req">*</span></label><input
                                                                                            type="number"
                                                                                            name="Principal_phone"
                                                                                            class="md-input label-fixed"
                                                                                            readonly
                                                                                            value="<?php echo $principal['Principal_phone']; ?>"
                                                                                            data-parsley-id="10"><span
                                                                                            class="md-input-bar"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <!--<div class="uk-grid " data-uk-grid-margin="">
<div class="uk-width-medium-1-2">
<div class="parsley-row">
<div class="md-input-wrapper md-input-filled"><label for="email">Email Address<span class="req">*</span></label><input type="text" name="Principal_email" class="md-input label-fixed" value="<?php echo $principal['Principal_email']; ?>" data-parsley-id="8"><span class="md-input-bar"></span></div>
</div>
</div>

<div class="uk-width-medium-1-2">
<div class="parsley-row">
<div class="md-input-wrapper md-input-filled"><label for="fullname">Phone<span class="req">*</span></label><input type="number" name="Principal_phone" class="md-input label-fixed" value="<?php echo $principal['Principal_phone']; ?>" data-parsley-id="10"><span class="md-input-bar"></span></div>
                                </div>
                            </div>
                        </div>-->

                                                                    <div class="uk-grid " data-uk-grid-margin="">
                                                                        <div class="uk-width-medium-1-2">
                                                                            <div class="parsley-row">
                                                                                <div class="md-input-wrapper md-input-filled">
                                                                                    <label for="fullname">Address<span
                                                                                                class="req">*</span></label><input
                                                                                            type="text"
                                                                                            name="Principal_address"
                                                                                            class="md-input label-fixed"
                                                                                            readonly
                                                                                            value="<?php echo $principal['Principal_address']; ?>"
                                                                                            data-parsley-id="12"><span
                                                                                            class="md-input-bar"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="uk-width-medium-1-2">
                                                                            <div class="parsley-row">
                                                                                <div class="md-input-wrapper md-input-filled">
                                                                                    <label for="email">City<span
                                                                                                class="req">*</span></label><input
                                                                                            type="text"
                                                                                            name="Principal_city"
                                                                                            readonly
                                                                                            class="md-input label-fixed"
                                                                                            readonly
                                                                                            value="<?php echo $principal['Principal_city']; ?>"
                                                                                            data-parsley-id="14"><span
                                                                                            class="md-input-bar"></span>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="uk-grid " data-uk-grid-margin="">
                                                                        <!--						    <div class="uk-width-medium-1-2">
                                <div class="parsley-row">
                                    <div class="md-input-wrapper md-input-filled"><label for="fullname">State<span class="req">*</span></label><input type="text" name="Principal_state" class="md-input label-fixed" value="<?php echo $principal['Principal_state']; ?>" data-parsley-id="16"><span class="md-input-bar"></span></div>
                                    
                                </div>
                            </div>-->
                                                                        <div class="uk-width-medium-1-2">
                                                                            <div class="parsley-row">
                                                                                <div class="md-input-wrapper md-input-filled">
                                                                                    <label for="fullname">Country<span
                                                                                                class="req">*</span></label><input
                                                                                            type="text"
                                                                                            name="Principal_country"
                                                                                            readonly
                                                                                            class="md-input label-fixed"
                                                                                            value="<?php echo $principal['Principal_country']; ?>"
                                                                                            data-parsley-id="18"><span
                                                                                            class="md-input-bar"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="uk-width-medium-1-2">
                                                                            <div class="parsley-row">
                                                                                <div class="md-input-wrapper md-input-filled">
                                                                                    <label for="email">Postal Code<span
                                                                                                class="req">*</span></label><input
                                                                                            type="number"
                                                                                            name="Principal_postal_code"
                                                                                            readonly
                                                                                            class="md-input label-fixed"
                                                                                            value="<?php echo $principal['Principal_postal_code']; ?>"
                                                                                            data-parsley-id="20"><span
                                                                                            class="md-input-bar"></span>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <br>


                                                                    <?php
                                                                    $principal_contacts = explode(',', $principal['principal_contacts_details']);
                                                                    if (!empty($principal_contacts)) {
                                                                        $a = 1;
                                                                        foreach ($principal_contacts as $contact) {
                                                                            $contact = explode('-', $contact);
                                                                            ?>
                                                                            <?php echo '<b><h3>Contact:' . $a++ . '</h3></b><br>'; ?>
                                                                            <div class="uk-grid "
                                                                                 data-uk-grid-margin="">
                                                                                <div class="uk-width-medium-1-2">


                                                                                    <div class="parsley-row">
                                                                                        <div class="md-input-wrapper md-input-filled">
                                                                                            <label for="fullname">Name<span
                                                                                                        class="req">*</span></label><input
                                                                                                    type="text"
                                                                                                    name="Principal_country"
                                                                                                    readonly
                                                                                                    class="md-input label-fixed"
                                                                                                    value="<?php echo $contact[0]; ?>"
                                                                                                    data-parsley-id="18"><span
                                                                                                    class="md-input-bar"></span>
                                                                                        </div>
                                                                                    </div>


                                                                                </div>
                                                                                <div class="uk-width-medium-1-2">
                                                                                    <div class="parsley-row">
                                                                                        <div class="md-input-wrapper md-input-filled">
                                                                                            <label for="email">Email<span
                                                                                                        class="req">*</span></label><input
                                                                                                    type="text"
                                                                                                    name="Principal_postal_code"
                                                                                                    class="md-input label-fixed"
                                                                                                    readonly
                                                                                                    value="<?php echo $contact[1]; ?>"
                                                                                                    data-parsley-id="20"><span
                                                                                                    class="md-input-bar"></span>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <br>


                                                                        <?php }
                                                                    }

                                                                    ?>
                                                                    <div class="uk-grid " data-uk-grid-margin="">
                                                                        <?php
                                                                        $principal_contacts = explode(',', $principal['principal_products']);
                                                                        if (!empty($principal_contacts)) {
                                                                            $j = 1;
                                                                            foreach ($principal_contacts as $contact) { ?>

                                                                                <!--         echo "<p>Price:{$contact['product_price']}     Name:{$contact['product_name']}</p>";-->


                                                                                <div class="uk-width-medium-1-2"
                                                                                     style="float:left">
                                                                                    <?php echo '<b><h4>Product:' . $j++ . '</h4></b>'; ?>


                                                                                    <div class="parsley-rowss"
                                                                                         style="margin-bottom:20px">
                                                                                        <h3><?php echo $contact; ?> </h3>
                                                                                    </div>


                                                                                </div>
                                                                                <!--             <div class="uk-width-medium-1-2" style="display:none">
                                <div class="parsley-row">
                                    <div class="md-input-wrapper md-input-filled"><label for="email">Product Price<span class="req">*</span></label><input type="text" name="Principal_postal_code" class="md-input label-fixed" readonly value="" data-parsley-id="20"><span class="md-input-bar"></span></div>
                                    
                                </div>
                            </div>-->


                                                                                <?php
                                                                            }
                                                                        }

                                                                        ?>    </div>
                                                                    <div class="uk-grid" data-uk-grid-margin="">
                                                                        <!--						      <div class="uk-width-medium-1-1">
                                <div class="parsley-row">
                                    <div class="md-input-wrapper md-input-filled"><label for="fullname">Country<span class="req">*</span></label><input type="text" name="Principal_country" class="md-input label-fixed" value="<?php echo $principal['Principal_country']; ?>" data-parsley-id="18"><span class="md-input-bar"></span></div>
                                </div>
                            </div>-->

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </p>
                                                            <div class="uk-modal-footer uk-text-right">
                                                                <button type="button"
                                                                        class="md-btn md-btn-flat uk-modal-close"
                                                                        style="background-color:#1976D2;">Close
                                                                </button>
                                                            </div>
                                                        </div>

                                                        <?php echo form_close(); ?>
                                                    </div>
                                                    <!----view modelend --->


                                                    <a href="<?php echo site_url() ?>/Principal/delete_principal/<?php echo $principal['Principal_id']; ?>"
                                                       onclick="return ConfirmDialog()" data-uk-tooltip="{pos:'bottom'}"
                                                       Title="Delete" onclick="return ConfirmDialog()"><i
                                                                class="material-icons"
                                                                style="font-size:28px;color:#1976D2;"></i></a> &nbsp;

                                                </td>
                                            </tr>
                                        <?php }
                                        $i++; ?>
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
                            <!--/.Card content-->

                        </div>
                        <!--/.Card-->

                    </section>

                </main>


                <div class="md-fab-wrapper">
                    <a class="md-fab md-fab-accent" href="<?php echo site_url() ?>/addPrincipal"
                       Title="Add New Principal">
                        <i class="material-icons"></i>
                    </a>
                </div>
                <div id="preloader">
                    <div id="status"></div>
                </div>
                <!-- common functions -->
                <!-- altair common functions/helpers -->
	<script src="<?php echo base_url() ?>assets/js/common.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/uikit_custom.min.js"></script>
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


                <script>
                    $(document).ready(function () {
                        $('#ts_pager_filter').DataTable();
                    });
                </script>

</body>

</html>