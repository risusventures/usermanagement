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
    

    <!-- uikit -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/uikit/css/uikit.almost-flat.min.css"
          media="all">

    <!-- flag icons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/icons/flags/flags.min.css" media="all">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- altair admin -->
   

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.min.css" media="all">
    <script id="script_e1">
        $(function () {
            $("#e1").daterangepicker();
        });
    </script>
   
    <!-- datepicker-->


   
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
        <h3 class="heading_a uk-margin-bottom">Manage Customers  <button class="btn btn-white btn-rounded mr-md-3 z-depth-1a waves-effect waves-light"
                                    onclick="location.reload();" style="float: right;"><i class="uk-icon-refresh uk-icon-small"></i> Reset Filter
                            </button></h3>
        <div class="md-card">
            <?php
			if (!empty($_GET['message'])){
			if ($_GET['message'] == 'already') {
                echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">
         <a href="#" class="uk-alert-close uk-close"></a>You are already registered</div>';
            } ?>
            <?php if ($_GET['message'] == 'success') {
                echo '<div class="uk-alert uk-alert-success" data-uk-alert="">
                    <a href="#" class="uk-alert-close uk-close"></a>Added Customer Successfully......</div>';
            } ?>
            <?php if ($_GET['message'] == 1) {
                echo '<div class="uk-alert uk-alert-info" data-uk-alert="">
    <a href="#" class="uk-alert-close uk-close"></a>Customer Update  Successfully......</div>';
            } 
			}
			if (!empty($_GET['customer'])){
			?>
            <?php if ($_GET['customer'] == 'deleted') {
                echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">
    <a href="#" class="uk-alert-close uk-close"></a>customer successfully deleted.........</div>';
            } ?>
            <?php if ($_GET['customer'] == 'updatedcurrencies') {
                echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">
    <a href="#" class="uk-alert-close uk-close"></a>currencies updated successfully.........</div>';
            }
		}
			?>
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
                                        <th style="color:#1976d2"><b>Phone<b></th>
                                        <th style="color:#1976d2"><b>City</b></th>
                                        <th style="color:#1976d2"><b>Country</b></th>
                                        <th style="color:#1976d2"><b>Reg. Date</b></th>
                                        <th class="filter-false remove sorter-false uk-text-center"
                                            style="color:#1976d2"><b>Actions</b></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php $i = 1;
                                    foreach ($list_customer as $customer) { ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $customer['customer_person']; ?></td>
                                            <td><?php echo $customer['customer_phone']; ?></td>
                                            <td><?php echo $customer['customer_city']; ?></td>
                                            <td><?php echo $customer['customer_country']; ?></td>
                                            <td><?php echo date('m-d-Y h:i:s A ', strtotime($customer['add_on'])); ?></td>
                                            <td>
                                                <a href="<?php echo site_url() ?>/seller/updatecustomers?id=<?php echo $customer['customer_id']; ?>"
                                                   Title="edit"><i class="material-icons"
                                                                   style="font-size:28px;color:#1976D2;">edit</i></a>
                                                <a href="#" data-uk-tooltip="{pos:'bottom'}" Title="view"
                                                   data-uk-modal="{target:'#modal_header_footer1_<?php echo $customer['customer_id']; ?>'}"><i
                                                            class="material-icons"
                                                            style="font-size:28px;color:#1976D2;">remove_red_eye</i></a>
                                                <!--view model-->

                                                <div class="uk-modal"
                                                     id="modal_header_footer1_<?php echo $customer['customer_id']; ?>"
                                                     aria-hidden="true" style="display: none; overflow-y: auto;">
                                                    <?php echo form_open(site_url('seller/update_customer'), array('id' => 'contactname', 'name' => 'contactname', 'class' => 'uk-form-stacked', 'enctype' => 'multipart/form-data')); ?>
                                                    <input type="hidden" name="uid" class="md-input label-fixed"
                                                           value="<?php echo $customer['customer_id']; ?>"
                                                           data-parsley-id="4">
                                                    <div class="uk-modal-dialog" style="top: 88px;">
                                                        <div class="uk-modal-header"><h3 class="uk-modal-title">Customer
                                                                Detail</h3>

                                                        </div>
                                                        <hr style="border:2px solid #e0e0e0;"></hr>
                                                        <p>
                                                        <div class="md-card">
                                                            <div class="md-card-content large-padding">
                                                                <div class="uk-grid " data-uk-grid-margin=""
                                                                     style="display:none;">
                                                                    <div class="uk-width-medium-1-2">
                                                                        <div class="parsley-row">
                                                                            <div class="md-input-wrapper md-input-filled">
                                                                                <label for="fullname"> <b>MSG ID
                                                                                        :</b> <?php echo $customer['short_name'] . $customer['customer_id']; ?>
                                                                                </label></div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <div class="uk-grid " data-uk-grid-margin="">


                                                                    <div class="uk-width-medium-1-2">
                                                                        <div class="parsley-row">
                                                                            <div class="md-input-wrapper md-input-filled">
                                                                                <label for="fullname">Contact
                                                                                    Person<span
                                                                                            class="req">*</span></label><input
                                                                                        type="text"
                                                                                        name="customer_person" readonly
                                                                                        class="md-input label-fixed"
                                                                                        value="<?php echo $customer['customer_person']; ?>"
                                                                                        data-parsley-id="6"
                                                                                        required='required'><span
                                                                                        class="md-input-bar"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="uk-width-medium-1-2">
                                                                        <div class="parsley-row">
                                                                            <div class="md-input-wrapper md-input-filled">
                                                                                <label for="fullname">Phone<span
                                                                                            class="req">*</span></label><input
                                                                                        type="number" readonly
                                                                                        name="customer_phone"
                                                                                        class="md-input label-fixed"
                                                                                        value="<?php echo $customer['customer_phone']; ?>"
                                                                                        data-parsley-id="10"><span
                                                                                        class="md-input-bar"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <div class="uk-grid " data-uk-grid-margin="">
                                                                    <div class="uk-width-medium-1-2">
                                                                        <div class="parsley-row">
                                                                            <div class="md-input-wrapper md-input-filled">
                                                                                <label for="fullname">Address<span
                                                                                            class="req">*</span></label><input
                                                                                        type="text" readonly
                                                                                        name="customer_address"
                                                                                        class="md-input label-fixed"
                                                                                        value="<?php echo $customer['customer_address']; ?>"
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
                                                                                        type="text" readonly
                                                                                        name="customer_city"
                                                                                        class="md-input label-fixed"
                                                                                        value="<?php echo $customer['customer_city']; ?>"
                                                                                        data-parsley-id="14"><span
                                                                                        class="md-input-bar"></span>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="uk-grid " data-uk-grid-margin="">

                                                                    <div class="uk-width-medium-1-2">
                                                                        <div class="parsley-row">
                                                                            <div class="md-input-wrapper md-input-filled">
                                                                                <label for="email">Postal Code<span
                                                                                            class="req">*</span></label><input
                                                                                        type="number" readonly
                                                                                        name="customer_postal_code"
                                                                                        class="md-input label-fixed"
                                                                                        value="<?php echo $customer['customer_postal_code']; ?>"
                                                                                        data-parsley-id="20"><span
                                                                                        class="md-input-bar"></span>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="uk-width-medium-1-2">
                                                                        <div class="parsley-row">
                                                                            <div class="md-input-wrapper md-input-filled">
                                                                                <label for="fullname">Country<span
                                                                                            class="req">*</span></label><input
                                                                                        type="text" readonly
                                                                                        name="customer_country"
                                                                                        class="md-input label-fixed"
                                                                                        value="<?php echo $customer['customer_country']; ?>"
                                                                                        data-parsley-id="18"><span
                                                                                        class="md-input-bar"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <?php
                                                                $customer_contacts = explode(',', $customer['customers_contacts']);
                                                                if (!empty($customer_contacts)){
                                                                $a = 1;
                                                                foreach ($customer_contacts

                                                                         as $contact){
                                                                $contact = explode('-', $contact);
                                                                ?>
                                                            <?php echo '<b><h3>Contact:' . $a++ . '</h3></b><br>'; ?>
                                                                <div class="uk-grid " data-uk-grid-margin="">
                                                                    <div class="uk-width-medium-1-2">


                                                                        <div class="parsley-row">
                                                                            <div class="md-input-wrapper md-input-filled">
                                                                                <label for="fullname">Name<span
                                                                                            class="req">*</span></label><input
                                                                                        type="text"
                                                                                        name="customer_country" readonly
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
                                                                    $customers_principals = explode(';',$customer['customers_principals']);
                                                                    if (!empty($customers_principals)) {
                                                                    $a = 1;
                                                                    echo "Assigned Principal and products:";

                            foreach ($customers_principals as $signleasssiedproduct){
								
								if(!empty($signleasssiedproduct)){                                                                    $signleasssiedproduct = explode('-', $signleasssiedproduct);
                                                                    $price = $signleasssiedproduct[2];
								}
                                                                    ?>
                                                                </br></br>
                                                                <div class="uk-grid " data-uk-grid-margin="">
                                                                    <div class="uk-width-medium-1-4">


                                                                        <div class="parsley-row">
                                                                            <div class="md-input-wrapper md-input-filled">
                                                                                <label for="fullname">Principal
                                                                                    name</label>
                                                                                <br>
                                                                                <span style="margin-left:2px;">
                                        <?php if(!empty($signleasssiedproduct)){ echo $signleasssiedproduct[0];} ?>
                                        </span>
                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                    <div class="uk-width-medium-1-4">
                                                                        <div class="parsley-row">
                                                                            <div class="md-input-wrapper md-input-filled">
                                                                                <label for="email">Product name<span
                                                                                            class="req"></span></label><br>
                                                                                <span style="margin-left: 2px;">
                                        <?php
                                        if(!empty($signleasssiedproduct[1])){ echo $signleasssiedproduct[1] . " <br>  Price " . $price; }
                                        ?>
                                    
                                        </span>
                                                                            </div>

                                                                        </div>
                                                                    </div>

                                                                    <div class="uk-width-medium-1-4">
                                                                        <div class="parsley-row">
                                                                            <div class="md-input-wrapper md-input-filled">
                                                                                <label for="email">commission %<span
                                                                                            class="req"></span></label><br>
																					<span style="margin-left: 2px;">
                                <?php if(!empty($signleasssiedproduct[3])){ echo $signleasssiedproduct[3]; } ?> </span>
                                                                            </div>

                                                                        </div>
                                                                    </div>

                                                                    <div class="uk-width-medium-1-4">
                                                                        <div class="parsley-row">
                                                                            <div class="md-input-wrapper md-input-filled">
                                                                                <label for="email"> Currency<span
                                                                                            class="req"></span></label><br><span
                                                                                        style="margin-left: 2px;"">
                                                                                <?php if(!empty($signleasssiedproduct[4])){ echo $signleasssiedproduct[4]; } ?></span>
                                                                            </div>

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            <br>
                                                            <?php
                                                            $a++;
                                                            }
                                                            }

                                                            ?>


                                                            </div>


                                                        </div>
                                                        </p>
                                                        <div class="uk-modal-footer uk-text-right">
                                                            <button type="button"
                                                                    class="md-btn md-btn-flat uk-modal-close"
                                                                    style="background-color:#1976D2;">Close
                                                            </button>
                                                            <!--<button type="submit" class="md-btn md-btn-flat md-btn-flat-primary" style="background-color:#1976D2;color:white" onClick="return ConfirmDialog1()">Submit</button>-->
                                                        </div>
                                                    </div>

                                                    <?php echo form_close(); ?>
                                                </div>


                                                <!--end--->


                                                <a href="<?php echo site_url() ?>/seller/delete_customer/<?php echo $customer['customer_id']; ?>"
                                                   onclick="return ConfirmDialog()" data-uk-tooltip="{pos:'bottom'}"
                                                   Title="Delete" onclick="return ConfirmDialog()"><i
                                                            class="material-icons"
                                                            style="font-size:28px;color:#1976D2;"></i></a> &nbsp;

                                                <!--<a href="<?php /*echo site_url() */?>/seller/update_currencies/<?php /*echo $customer['customer_id']; */?>"
                                                   onclick="return ConfirmDialog()" data-uk-tooltip="{pos:'bottom'}"
                                                   Title="Update Currencies" onclick="return ConfirmDialog()"><i
                                                            class="fa fa-refresh"
                                                            style="font-size:28px;color:#1976D2;"></i></a> &nbsp;-->

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
                <a class="md-fab md-fab-accent" href="<?php echo site_url() ?>/addCustomer" id="recordAdd"
                   Title="Add New Customer">
                    <i class="material-icons"></i>
                </a>
            </div>
            <div id="preloader">
                <div id="status"></div>
            </div>
            <!-- common functions -->
            <!-- altair common functions/helpers -->
 <!-- altair admin -->
    <script src="<?php echo base_url(); ?>assets/js/common.min.js"></script>
    <!-- uikit functions -->
    <script src="<?php echo base_url(); ?>assets/js/uikit_custom.min.js"></script>
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


</body>

</html>