<?php $pages = 'add_products'; ?>
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
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/icons/flags/flags.min.css" media="all">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/main.min.css" media="all">
    <script src="<?php echo base_url() ?>assets/js/pages/forms_file_upload.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <?php include('analytics.php'); ?>
    <script>
        $(document).ready(function () {
            getcountry(0);
            $("#load_more").click(function (e) {
                e.preventDefault();
                var page = $(this).data('val');
                getcountry(page);
            });
        });

        var getcountry = function (page) {
            $("#loader").show();
            $.ajax({
                url: "<?php echo site_url() ?>/seller/load_product",
                type: 'GET',
                data: {page: page}
            }).done(function (response) {
                $("#ajax_table").append(response);
                $("#loader").hide();
                $('#load_more').data('val', ($('#load_more').data('val') + 1));
                scroll();
            });
        };
        var scroll = function () {
            $('html, body').animate({
                scrollTop: $('#load_more').offset().top
            }, 1000);
        };
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
        <h3 class="heading_b uk-margin-bottom">Add Product</h3>
        <div class="md-card">
            <div class="md-card-content large-padding">
                <?php echo form_open(site_url('seller/Products'), array('id' => 'contactform', 'name' => 'contactform', 'onsubmit' => 'return validateentry();', 'class' => 'uk-form-stacked', 'enctype' => 'multipart/form-data')); ?>
                <div class="uk-grid" data-uk-grid-margin style="float:left;">
                    <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }" style="padding-right:10px;">
                        <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail">
                                <img src="<?php echo base_url() ?>assets/img/dummy123.png" alt="user avatar"
                                     style="background-image:none;height:100px;width:100px;border-radius: 0px;"/>
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="radius:0px;"></div>
                            <p>Upload Image</p>
                            <div class="user_avatar_controls">
                                        <span class="btn-file">
                                            <span class="fileinput-new"><i class="material-icons">&#xE2C6;</i></span>
                                            <span class="fileinput-exists"><i class="material-icons">&#xE86A;</i></span>
                                            <input type="file" name="image" id="user_edit_avatar_control"
                                                   onchange="check_upload(this)" style="">
                                        </span>
                                <a href="#" class="btn-file fileinput-exists" data-dismiss="fileinput"><i
                                            class="material-icons">&#xE5CD;</i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-grid " data-uk-grid-margin>
                    <div class="uk-width-medium-1-3">
                        <div class="parsley-row">
                            <label for="fullname">Enter Product Name<span class="req">*</span></label>
                            <input type="text" name="product_name" class="md-input"/>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-6">
                        <div class="parsley-row">
                            <label for="fullname">Enter Price<span class="req">*</span></label>
                            <input type="Number" name="price" class="md-input"/>
                        </div>
                    </div>

                    <div class="uk-width-large-1-6 uk-width-medium-1-2">
                        <div class="uk-input-group">
                            <span class="uk-input-group-addon" style="padding: 0 5px;">Per</span>
                            <div>
                                <select id="val_select" required data-md-selectize name="quanty">
                                    <option value="0">Select</option>
                                    <option value="Aunnum">Annum</option>
                                    <option value="Bag">Bag</option>
                                    <option value="Barrel">Barrel</option>
                                    <option value="Bottle">Bottle</option>
                                    <option value="Box">Box</option>
                                    <option value="Bushel">Bushel</option>
                                    <option value="Cubic feet">Cubic Feet</option>
                                    <option value="Foot">Foot</option>
                                    <option value="Square Feet">Square Feet</option>
                                    <option value="Gallon">Gallon</option>
                                    <option value="Gram">Gram</option>
                                    <option value="Hectare">Hectare</option>
                                    <option value="Hour">Hour</option>
                                    <option value="Inch">Inch</option>
                                    <option value="kilogram">Kilogram</option>
                                    <option value="kilometer">Kilometer</option>
                                    <option value="kilowatt">Kilowatt</option>
                                    <option value="Litre">Litre</option>
                                    <option value="Long Tone">Long Tone</option>
                                    <option value="Cubic Meter">Cubic Meter</option>
                                    <option value="Megawatts">Megawatts</option>
                                    <option value="Meter">Meter</option>
                                    <option value="Millimeter">Millimeter</option>
                                    <option value="Ounce">Ounce</option>
                                    <option value="Pack">Pack</option>
                                    <option value="Packet">packet</option>
                                    <option value="pair">Pair</option>
                                    <option value="Piece">Piece</option>
                                    <option value="Plate">plate</option>
                                    <option value="Ream">Ream</option>
                                    <option value="Roll">Roll</option>
                                    <option value="Unit">Unit</option>
                                    <option value="Watt">Watt</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-3" id="abc" style="display:none">
                        <div class="uk-input-group">
                            <div class="parsley-row" style="">
                                <label for="fullname">Add Category<span class="req">*</span></label>
                                <input type="text" name="other_category" class="md-input" style=""/>
                            </div>
                            <span class="uk-input-group-addon" style="padding:0px;">
			<p id="back" onClick="showDiv2()" style="display:none;"><i class="material-icons"
                                                                       style="font-size: 30px;color: rgb(25, 118, 210);padding-bottom: 5px;">&#xE14A;</i></p>
            </span>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-3" id="fldNum">
                        <div class="uk-input-group">
                            <div class="parsley-row">
                                <select id="val_select" data-md-selectize name="product_group"
                                        placeholder="Select Category">
                                    <option value="-1">Select Product Category</option>
                                    <?php foreach ($records1 as $row1) {
                                        if ($records2['cat_id'] == $row1->ci_id) {
                                            echo "<option value='" . $row1->ci_id . "' selected >" . $row1->product_category . "</option>";
                                        } else {
                                            echo "<option value='" . $row1->ci_id . "'>" . $row1->product_category . "</option>";
                                        }
                                    } ?>
                                </select>
                            </div>
                            <span class="uk-input-group-addon" style="padding:0px;">
        <b id="head1" onClick="showDiv1()">&nbsp;<i class="material-icons"
                                                    style="font-size: 30px;color: rgb(25, 118, 210);padding-bottom: 5px;">&#xE89C;</i></b>
                                </span>
                        </div>
                    </div>
                </div>

                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-1-1">
                        <div class="parsley-row">
                            <div class="md-input-wrapper "><label for="message">Description</label><textarea
                                        style="overflow-x: hidden;  height: 21px;"
                                        class="md-input autosize_init md-input-success" name="description" cols="10"
                                        rows="8" style="height:auto;"></textarea><span class="md-input-bar"></span>
                            </div>
                            <div id="parsley-id-32" class="parsley-errors-list"></div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="uk-grid">
                    <div class="uk-width-1-1">
                        <button type="submit" class="md-btn md-btn-primary" onclick="return verify_upload() ">Submit
                        </button>
                    </div>
                </div>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <div class="md-fab-wrapper">
        <a class="md-fab md-fab-accent" href="<?php echo site_url('manageProducts'); ?>" id="recordAdd"
           title="View Products" data-uk-tooltip="{pos:'bottom'}">
            <i class="material-icons">&#xE8F4;</i>
        </a>
    </div>
    <div id="preloader">
        <div id="status"></div>
    </div>
    <!-- google web fonts -->
    <script>
        WebFontConfig = {
            google: {
                families: [
                    'Source+Code+Pro:400,700:latin',
                    'Roboto:400,300,500,700,400italic:latin'
                ]
            }
        };
        (function () {
            var wf = document.createElement('script');
            wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
                '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        })();
    </script>

    <!-- common functions -->
    <script src="<?php echo base_url() ?>assets/js/common.min.js"></script>
    <!-- uikit functions -->
    <!-- altair common functions/helpers -->
    <script src="<?php echo base_url() ?>assets/js/altair_admin_common.min.js"></script>
    <script>
        // load parsley config (altair_admin_common.js)
        altair_forms.parsley_validation_config();
    </script>
    <script src="<?php echo base_url() ?>assets/bower_components/parsleyjs/dist/parsley.min.js"></script>

    <!--  forms validation functions -->
    <script src="<?php echo base_url() ?>assets/js/pages/forms_validation.min.js"></script>

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
    <script src="<?php echo base_url() ?>assets/js/pages/forms_file_upload.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/common.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/uikit_custom.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/custom/uikit_fileinput.min.js"></script>
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

        function showDiv1() {
            document.getElementById('fldNum').style.display = "none";
            document.getElementById('abc').style.display = "";
            document.getElementById('back').style.display = "";
            document.getElementById('head1').style.display = "none";
        }

        function showDiv2() {
            document.getElementById('fldNum').style.display = "";
            document.getElementById('abc').style.display = "none";
            document.getElementById('back').style.display = "none";
            document.getElementById('head1').style.display = "";
        }
    </script>

    <script>

        function validateentry() {
            if (document.forms.contactform.product_name.value == "") {
                alert("Please provide your Product name.");
                document.forms.contactform.product_name.focus();
                return false;
            }
            if (document.forms.contactform.price.value == "") {
                alert("Please provide your Product Price.");
                document.forms.contactform.price.focus();
                return false;
            }
            if (document.forms.contactform.description.value == "") {
                alert("Please provide your Product Description.");
                document.forms.contactform.description.focus();
                return false;
            }
//if(document.forms.contactform.product_group.value == "-1" ){
            //alert( "Please provide your product category!" );
            //return false;
//}return( true );

        }

    </script>

    <script type="text/javascript">
        function check_upload(upload_field) {
            var re_text = /\.jpg|\.png|\.gif/i;
            var filename = upload_field.value;
            if (filename.search(re_text) == -1) {
                alert("File does not have (jpg / gif / png) extension");
                upload_field.value = '';
                return false;
            }
            return true;
        }

        function verify_upload() {
            if (document.contactform.image.value == "") {
                alert("Please select a file");
                return false;
            }
            return true;
        }
    </script>


</body>
</html>

