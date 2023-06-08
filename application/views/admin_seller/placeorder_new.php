<!doctype html>
<html lang="en">
<meta charset="UTF-8">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css" media="all">
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<meta charset="UTF-8">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css" media="all">
<meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Remove Tap Highlight on Windows Phone IE -->
<meta name="msapplication-tap-highlight" content="no"/>
<head>
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/img/risus-03.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/img/risus-03.png" sizes="32x32">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/codemirror/lib/codemirror.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/uikit/css/uikit.almost-flat.min.css"
          media="all">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/icons/flags/flags.min.css" media="all">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.min.css" media="all">
    <link href="<?php echo base_url(); ?>assets/css/jquery-ui.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
  
 <link rel="stylesheet" href="https://altair-html.tzdthemes.com/bower_components/select2/dist/css/select2.min.css">

    <!--<script type="text/javascript" src="bootstrap-datetimepicker.de.js" charset="UTF-8"></script>-->

    <title>Risus Ventures</title>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    
    <!---load customer value---->
    <script type="text/javascript">
        $(document).ready(function () {
            $(".buyer").change(function () {
                var id = $(this).val();
                $.ajax
                ({
                    type: "GET",
                    url: "<?php echo site_url(); ?>/seller/load_customer/" + id,
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
    <!--<script type="text/javascript">
      $(document).ready(function () {

        var navListItems = $('div.setup-panel div a'),
                allWells = $('.setup-content'),
                allNextBtn = $('.nextBtn');

        allWells.hide();

        navListItems.click(function (e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                    $item = $(this);

            if (!$item.hasClass('disabled')) {
                navListItems.removeClass('btn-primary').addClass('btn-default');
                $item.addClass('btn-primary');
                allWells.hide();
                $target.show();
                $target.find('input:eq(0)').focus();
            }
        });

        allNextBtn.click(function(){
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                curInputs = curStep.find("input[type='text'],input[type='url']"),
                isValid = true;

            $(".form-group").removeClass("has-error");
            for(var i=0; i<curInputs.length; i++){
                if (!curInputs[i].validity.valid){
                    isValid = false;
                    $(curInputs[i]).closest(".form-group").addClass("has-error");
                }
            }

            if (isValid)
                nextStepWizard.removeAttr('disabled').trigger('click');
        });

        $('div.setup-panel div a.btn-primary').trigger('click');
    });

    </script>-->
    <script type="text/javascript">
        function validate() {

            if (document.ClassSearch.buyer_company_name.value == "") {
                alert("Please enter a Seller Company Name ! First Create Business Profile ");
                document.ClassSearch.buyer_company_name.focus();
                return false;
            }
            if (document.ClassSearch.seller_email.value == "") {
                alert("Please enter a Buyer Email ! ");
                document.ClassSearch.seller_email.focus();
                return false;
            }
            if (document.forms.ClassSearch.seller_company_name.value == "-1") {
                alert("Please Select Buyer Company Name");
                return false;
            }
            return (true);
            if (document.ClassSearch.seller_address.value == "") {
                alert("Please enter a Buyer Email ! ");
                document.ClassSearch.seller_address.focus();
                return false;
            }

        }
    </script>
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

            background-repeat: no-repeat;
            background-position: center;
            margin: -100px 0 0 -100px;
        }

        [class*=" flag-"] {
                background-image: none !important;
        }
		
	.uk-dropdown-active .uk-dropdown-shown {
    left: 1109.75px !important;
    top: 8px;
    min-width: 238px;
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
        $(function () {
            $("#skills").autocomplete({
                source: '<?php echo base_url();?>seller/load_Sales_person'
            });
        });
    </script>

</head>
<body class="disable_transitions sidebar_main_open sidebar_main_swipe">
<?php include('header.php'); ?>
<?php include('header_top.php'); ?>


<div id="page_content" style="margin-left: 0px;">
    <div id="page_content_inner">
        <h2 class="heading_b uk-margin-bottom">Add New Order </h2>
       
                <div class="">
                    <!--                        <div class="stepwizard">
                                                <div class="stepwizard-row setup-panel">
                                                    <div class="stepwizard-step">
                                                        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                                                        <p>Step 1</p>
                                                    </div>
                                                    <div class="stepwizard-step">
                                                        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                                                        <p>Step 2</p>
                                                    </div>
                                                    <div class="stepwizard-step">
                                                        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                                                        <p>Step 3</p>
                                                    </div>
                                                </div>
                                            </div>-->
                    <div class="md-card">
                        <div class="md-card-content large-padding">
                            <?php
							if(!empty($_GET['message'])){
							if ($_GET['message'] == 'already') {
                                echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">
                    <a href="#" class="uk-alert-close uk-close"></a>You are already registered</div>';
                            } ?>
                            <?php if ($_GET['message'] == 1) {
                                echo '<div class="uk-alert uk-alert-success" data-uk-alert="">
                    <a href="#" class="uk-alert-close uk-close"></a>Added order Successfully......</div>';
                            } 
							}
							?>
                            <?php echo form_open(site_url('seller/saveorder'), array('id' => 'contactform', 'name' => 'contactform', 'class' => 'uk-form-stacked', 'enctype' => 'multipart/form-data')); ?>

                            <div class="row setup-content" id="step">
                                <div class="col-xs-12">
                                    <div class="col-md-12">
                                        <div class="uk-grid">
                                            <div class="uk-width-medium-1-1  principal_sarea ">

                                                <div class="hide principal_sname principal_sname">

                                                </div>
                                            </div>

                                        </div>

                                        <div class="uk-grid">
                                            <div class="uk-width-medium-1-3 uk-row-first">
                                               <!--  <h4>Select Principal</h4> -->
                                                <?php
                                                if (!empty($list_principal)) {
                                                    echo "<select class='js-select2-template uk-width-1-1' id='list_principal' onchange='getprinciple()' name='principal_id' required><option value=''>Select Principal</option>";
                                                    foreach ($list_principal as $principal) {
                                                        ?>
                                                        <option value="<?php echo $principal['Principal_id']; ?>"><?php echo $principal['Principal_person']; ?></option>
                                                        <!--                                                        <label><input type="checkbox" name="pcheck[]" onclick="showprincipalcontact('<?php echo $principal['Principal_id'] ?>')"  class="pcheck"   id="mytable<?php echo $principal['Principal_id']; ?>" value="<?php echo $principal['Principal_id'] ?>"><?php echo $principal['Principal_person']; ?></label>-->

                                                        <?php
                                                    }
                                                    echo "</select>";
                                                }
                                                // echo '<pre>'; print_r($list_principal); echo '</pre>';
                                                ?>

                                            </div>
                                            <div class="uk-width-medium-1-3 principal_contactsarea">

                                                <div class="hide principal_contactsdiv">
                                                </div>
                                            </div>
                                             <div class="uk-width-medium-1-3 assignedarea ">

                                                <div class="hide assigneddiv assigneddiv">

                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-3 customercontact ">

                                                <div class="hide customercontactdiv">

                                                </div>
                                            </div>
                                             
                                        </div>
                                         <div class="uk-grid">
                                             <div class="uk-width-medium-1-1 productarea ">

                                                <div class="productdiv">

                                                </div>
                                            </div>
                                         </div>

                                        
                                        <div class="uk-grid">
                                            <!-- <div class="col-md-2 productarea ">
                                                       <div class="md-input-wrapper">
                                                           <label for="fullname">PO Number <span class="req">*</span></label>
                                                              <input type="text" name="po_number" class="md-input" value="" >
                                                                 <span class="md-input-bar"></span>
                                                         </div>
                                                 </div>-->
                                            <div class="uk-width-medium-1-6 productarea ">
                                                <div class="md-input-wrapper">
                                                    <label for="fullname">Order no <span class="req">*</span></label>
                                                    <input type="text" name="orderno" class="md-input" value="">
                                                    <span class="md-input-bar"></span>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-6 productarea ">
                                                <div class="md-input-wrapper">
                                                    <label for="fullname">Invoice no<span class="req">*</span></label>
                                                    <input type="text" name="invoiceno" class="md-input" value="">
                                                    <span class="md-input-bar"></span>
                                                </div>
                                            </div>

                                            <div class="uk-width-medium-1-5 productarea ">
                                                <div class="uk-input-group">
                                                  <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                                    <div class="md-input-wrapper"><label for="uk_dp_start">order delivery date</label>
                                                   
                                                        <input type="text" name="orderdate" class="md-input"  data-uk-datepicker="{format:'YYYY-MM-DD'}" required>

                                                   </div>

                                                </div>
                                            </div>
                                             <div class="uk-width-medium-1-5 productarea ">
                                                <div class="uk-input-group">
                                                    <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                                    <div class="md-input-wrapper"><label for="uk_dp_start">order placement date</label>
                                                   
                                                        <!--<input type="text" name="datecretaed" value="<?php //echo date("Y-m-d"); ?>" required> -->
                                                        <input type="text" name="datecretaed" class="md-input" data-uk-datepicker="{format:'YYYY-MM-DD'}" required>
                                                    </div>

                                                </div>
                                            </div>

                                           
                                            <div class="uk-width-medium-1-5 productarea ">
                                                 <div class="uk-input-group">
                                                    <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                                    <div class="md-input-wrapper"><label for="uk_dp_start">payment expected date</label>
                                                        <!--<input type="text" name="datecretaed" value="<?php //echo date("Y-m-d"); ?>" required> -->
                                                        <input type="text" name="paymentexpecteddate" class="md-input"
                                                               data-uk-datepicker="{format:'YYYY-MM-DD'}" required>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <!-- <div class="uk-grid">

                                            <div class="col-md-3 productarea ">

                                                <div id="reapeat1" style="margin-top: 20px">
                                                    <div class="uk-grid " data-uk-grid-margin>
                                                        <div class="uk-width-1-2">
                                                            <input type="file" name="attachments[]" class="md-input"
                                                                   value=""/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </br><br>

                                        </div> -->
                                        <div class="uk-grid productarea" id="reapeat1">

                                            <div class="uk-width-medium-1-3 ">
<div style="background: #e6e6e6;padding: 5px;">
                                                 <input type="file" name="attachments[]" class="md-input"
                                                                   value=""/>
                                                                   </div>
                                            </div>
                                    

                                        </div>

                                    
                                                <div class="uk-grid productarea" >
                                                    <div class="uk-width-1-2">
                                                        <button type="button" class="md-btn md-btn-success"
                                                                onclick="add_more()" name="add">Add More
                                                        </button>
                                                    </div>

                                                </div>
                                            

                                        <div class="uk-grid">
                                            <div class="uk-width-medium-1-4 productarea">
                                                <div class="md-input-wrapper md-input-filled">
                                                    <label>Remark</label>
                                                    <textarea rows="3" cols="30" class="md-input autosized" name="remark"></textarea>
                                                    <span class="md-input-bar"></span>
                                                </div>
                                            </div>
                                            <!--<div class="col-md-4 productarea ">
                                                <div class="md-input-wrapper">
                                                    <h5>INCO Terms</h5>
                                                    <textarea rows="4" cols="50" name="inco_term" ></textarea>
                                                    <span class="md-input-bar"></span>
                                                </div>
                                             </div> -->
                                            <div class="uk-width-medium-1-4 productarea">
                                                 <div class="md-input-wrapper md-input-filled">
                                                    <label>Remark 2</label>
                                                    <textarea rows="3" cols="30" class="md-input autosized" name="delivery_terms"></textarea>
                                                    <span class="md-input-bar"></span>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-4  productarea">
                                                <div class="md-input-wrapper md-input-filled">
                                                    <label>Payment term</label>
                                                    <textarea rows="3" cols="30" class="md-input autosized" name="payment_term"></textarea>
                                                    <span class="md-input-bar"></span>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-4  productarea">
                                                <div class="md-input-wrapper md-input-filled">
                                                    <label>Destination</label>
                                                    <textarea rows="3" cols="30" name="destination" class="md-input autosized"></textarea>
                                                    <span class="md-input-bar"></span>
                                                </div>
                                            </div>
                                             
                                        </div>

                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-1 productarea">
                                            <button type="submit" class="md-btn md-btn-primary" name="submit" onclick="return verify_upload()" style="float: right;">Submit</button>
                                        </div>
                                    </div>
                                      
                                    </div>
                                </div>


                            </div>


                            <?php echo form_close(); ?>

                        </div>
                    </div>

                </div>
            
    </div>
</div>

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>assets/js/common.min.js"></script>
<!-- uikit functions -->
<script src="<?php echo base_url(); ?>assets/js/uikit_custom.min.js"></script>
<!-- altair common functions/helpers -->
<script src="<?php echo base_url(); ?>assets/js/altair_admin_common.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/ion.rangeslider/js/ion.rangeSlider.min.js"></script>
<!-- htmleditor (codeMirror) -->


<!-- jquery steps -->
<script src="<?php echo base_url(); ?>assets/js/custom/wizard_steps.min.js"></script>
<!-- handlebars.js -->
<script src="<?php echo base_url(); ?>assets/bower_components/handlebars/handlebars.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom/handlebars_helpers.min.js"></script>


<!-- altair common functions/helpers -->
<script src="<?php echo base_url(); ?>assets/js/altair_admin_common.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/ion.rangeslider/js/ion.rangeSlider.min.js"></script>
<!-- htmleditor (codeMirror) -->
<script src="<?php echo base_url(); ?>assets/js/uikit_htmleditor_custom.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/jquery.inputmask/dist/jquery.inputmask.bundle.js"></script>
  <!-- select2 -->
    <script src="https://altair-html.tzdthemes.com/bower_components/select2/dist/js/select2.min.js"></script>
 <!--  forms advanced functions -->
    <script src="https://altair-html.tzdthemes.com/assets/js/pages/forms_advanced.min.js"></script>
 


<script>
    function add_more() {
        var hml = '<div class="uk-width-medium-1-3"><div style="background: #e6e6e6;padding: 5px;    padding-top: 10px;"><input name="attachments[]" class="md-input" value="" type="file"></div><span class="md-input-bar"></span></div>'


        jQuery("#reapeat1").append(hml);
    }
</script>
<script>
    function generatetotal() {
        var selected = $('input:checkbox:checked.checkboxes').map(function () {
            return this.value;
        }).get();

        var ttotal = 0;

        for (var k = 0; k < selected.length; k++) {
            var pss = selected[k];
            var subprice = parseFloat($("#subprice" + pss).val());
            if (subprice > 0) {
            } else {
                subprice = 0
            }
            ttotal = parseFloat(ttotal + subprice);

        }
        $("#totalprice").val(ttotal);
    }

    function calc(id) {
        //console.log(id);
        var qty = parseFloat($("#cunt" + id).val());
        var price = parseFloat($("#price" + id).val());
        var sub = parseFloat(qty * price);

        $("#subprice" + id).val(sub.toFixed(2));


        generatetotal();
    }

</script>


<script>
    function showproducts() {
        var selectedprinipal = $('#list_principal').val();
        var customers_principal_assigned = $('#customers_principal_assigned').val();


        jQuery.ajax({
            type: "get",
            url: '<?php echo site_url('ajax/customercontact') ?>',
            data: {'pid': selectedprinipal, cid: customers_principal_assigned},
            // dataType: "json",
            success: function (data) {
//                       jQuery(".customercontactdiv").removeClass('hide');
//                        jQuery(".customercontactdiv").html(data);

            }
        });

        jQuery.ajax({
            type: "get",
            url: '<?php echo site_url('ajax/getproducts') ?>',
            data: {'pid': selectedprinipal, cid: customers_principal_assigned},
            // dataType: "json",
            success: function (data) {

                jQuery(".productdiv").html(data);

            }
        });


    }

    function getprinciple() {
        var selected = $('#list_principal').val();
        jQuery.ajax({
            type: "get",
            url: '<?php echo site_url('ajax/getprincipalcontact') ?>',
            data: {'pid': selected},
            dataType: "json",
            success: function (data) {
                var datas = data.data;
                for (var k = 0; k < datas.length; k++) {
                    var p = datas[k].pid;
                    var principal_contactshtml = datas[k].principal_contactshtml;
                    var customers_principal_assigned_html = datas[k].customers_principal_assigned_html;
                    var customers_principal_sname_html = datas[k].customers_principal_sname_html;
                    jQuery(".principal_sname").removeClass('hide');
                    jQuery(".assigneddiv").removeClass('hide');
                    jQuery(".principal_contactsdiv").removeClass('hide');
                    jQuery(".principal_contactsdiv").html(principal_contactshtml);
                    jQuery(".assigneddiv").html(customers_principal_assigned_html);
                    jQuery(".principal_sname").html(customers_principal_sname_html);
                    console.log(data);
                }
                assigncustomers();

            }
        });

        generate_message_id()

    }

    function generate_message_id() {
        var principal_contacts = $("#principal_contacts").val();


        jQuery.ajax({
            type: "get",
            url: '<?php echo site_url('ajax/customer_messageid') ?>',
            data: {'principal_contacts': principal_contacts},
            dataType: "json",
            success: function (data) {
                console.log(data);

                assigncustomers();
            }
        });

    }

    function showprincipalcontact(pid) {

        var selected = $('input:checkbox:checked.pcheck').map(function () {
            return this.value;
        }).get();


        if (selected.length > 0) {


            jQuery.ajax({
                type: "get",
                url: '<?php echo site_url('ajax/getprincipalcontact') ?>',
                data: {'pid': selected},
                dataType: "json",
                success: function (data) {
                    var datas = data.data;
                    for (var k = 0; k < datas.length; k++) {
                        var p = datas[k].pid;
                        var principal_contactshtml = datas[k].principal_contactshtml;
                        var customers_principal_assigned_html = datas[k].customers_principal_assigned_html;

                        jQuery(".assigneddiv" + p).removeClass('hide');
                        jQuery(".principal_contactsdiv" + p).removeClass('hide');
                        jQuery(".principal_contacts" + p).html(principal_contactshtml);
                        jQuery(".assigned" + p).html(customers_principal_assigned_html)

                    }
                    assigncustomers();
//                    jQuery(".assigneddiv"+pisd).removeClass('hide');
//                    jQuery(".principal_contactsdiv"+pisd).removeClass('hide');
//                    jQuery(".principal_contacts"+pisd).html(data.principal_contactshtml);
//                    jQuery(".assigned"+pisd).html(data.customers_principal_assigned_html)
                    //console.log(data);
                }

            });


        }


        var selected = $('input:checkbox:not(:checked).pcheck').map(function () {
            return this.value;
        }).get();
        for (var k = 0; k < selected.length; k++) {

            var un = selected[k];
            jQuery(".assigneddiv" + un).addClass('hide');
            jQuery(".principal_contactsdiv" + un).addClass('hide');
            jQuery(".principal_contacts" + un).html('');
            jQuery(".assigned" + un).html('');
            console.log("uncheck" + un);

        }

    }


</script>
<script>
    function assigncustomers() {
        var select = jQuery('#customers_principal_assigned');

        select.html(select.find('option').sort(function (x, y) {
            // to change to descending order switch "<" for ">"
            return jQuery(x).text() > jQuery(y).text() ? 1 : -1;
        }));

        select.prepend("<option value='' selected='selected'>Please select</option>");
    }

    $(document).ready(function () {

        $("#principal_contacts").change(function () {
            generate_message_id()
        });

    });

    //datepicker
    $(function () {
        $.fn.datepicker.defaults.format = "dd-mm-yyyy";
        $('#invoiceDate1').datepicker({
            startDate: '-3d',
            autoclose: true,
            clearBtn: true,
            todayHighlight: true
        });
    });

</script>
</body>
</html>