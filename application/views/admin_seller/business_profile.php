<!doctype html>
<?php $pages = 'bussiness'; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css" media="all">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no"/>
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/finacbook_icon.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/finacbook_icon.png" sizes="32x32">
    <title>cater Manage</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/uikit/css/uikit.almost-flat.min.css"
          media="all">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/icons/flags/flags.min.css" media="all">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/main.min.css" media="all">
    <script src="<?php echo base_url() ?>assets/js/common.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/custom/uikit_fileinput.min.js"></script>
    <?php include('analytics.php'); ?>
</head>
<body class=" sidebar_main_open sidebar_main_swipe">
<?php include('header.php'); ?>
<?php include('aside.php'); ?>
<div id="page_content">
    <div id="page_content_inner">
        <h3 class="heading_b uk-margin-bottom">Business Profile</h3>
        <div class="md-card">
            <div class="md-card-content large-padding">
                <?php if (isset($message)) {
                    echo '<div class="uk-alert uk-alert-success" data-uk-alert="">
                    <a href="#" class="uk-alert-close uk-close"></a>Create Business Profile Successfully......</div>';
                } ?>
                <form id="form_validation" name="contactform" id="contactform" onsubmit="return validateentry();"
                      class="uk-form-stacked" action="<?php echo base_url() ?>profile/create_bussiness"
                      enctype="multipart/form-data" Method="post">
                    <div class="uk-grid" data-uk-grid-margin style="float:left;">

                        <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }" style="padding-right:10px;">
                            <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail">
                                    <img src="<?php echo base_url() ?>assets/img/blank1.png" alt="user avatar"/>
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                <p>Upload Logo</p>
                                <div class="user_avatar_controls">
                                    <span class="btn-file">
                                    <span class="fileinput-new"><i class="material-icons">&#xE2C6;</i></span>
                                    <span class="fileinput-exists"><i class="material-icons">&#xE86A;</i></span>
                                    <input type="file" name="image" id="user_edit_avatar_control"
                                           onchange="check_upload(this)" value="">
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
                                <label for="fullname">Company Name<span class="req">*</span></label>
                                <input type="text" name="company_name" class="md-input" value=""/>
                            </div>
                        </div>
                        <div class="uk-width-medium-1-3">
                            <div class="parsley-row">
                                <label for="fullname">Website<span class="req">*</span></label>
                                <input type="text" name="website" class="md-input" value=""/>
                            </div>
                        </div>
                        <div class="uk-width-medium-1-3">
                            <div class="parsley-row">
                                <label for="email">Year Of Establishment<span class="req">*</span></label>
                                <input type="text" name="yoe" class="md-input" value=""/>
                            </div>
                        </div>
                    </div>

                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-3">
                            <div class="parsley-row">
                                <label for="val_select" class="uk-form-label">Business Type*</label>
                                <select id="val_select" required data-md-selectize name="bussiness_type" value="">
                                    <option value="">Choose..</option>
                                    <option value="IT">IT</option>
                                    <option value="Export">Export</option>
                                    <option value="Transport">Transport</option>
                                    <option value="other">Other..</option>
                                </select>
                            </div>
                        </div>

                        <div class="uk-width-medium-1-3">
                            <div class="parsley-row">
                                <label for="val_select" class="uk-form-label">No. Of Employee*</label>
                                <select id="val_select" required data-md-selectize name="noe">
                                    <option value="">Choose..</option>
                                    <option value="Up to 10 People">Up to 10 People</option>
                                    <option value="other">Other..</option>
                                </select>
                            </div>
                        </div>

                        <div class="uk-width-medium-1-3">
                            <div class="parsley-row">
                                <label for="val_select" class="uk-form-label">Revenue Sales Turnover</label>
                                <select id="val_select" required data-md-selectize name="rst">
                                    <option value="">Choose..</option>
                                    <option value="Up To 10 Lakh">Up To 10 Lakh</option>
                                    <option value="other">Other..</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-1-1">
                            <button type="submit" class="md-btn md-btn-primary" name="submit"
                                    onclick="return verify_upload()">Submit
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
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
    <script src="<?php echo base_url() ?>assets/js/uikit_custom.min.js"></script>
    <!-- altair common functions/helpers -->
    <script src="<?php echo base_url() ?>assets/js/altair_admin_common.min.js"></script>

    <!-- page specific plugins -->
    <!-- parsley (validation) -->
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

    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '../www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-65191727-1', 'auto');
        ga('send', 'pageview');
    </script>

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
        function validateentry() {
            if (document.forms.contactform.company_name.value == "") {
                alert("Please provide your Company Name.");
                document.forms.contactform.company_name.focus();
                return false;
            }
            if (document.forms.contactform.website.value == "") {
                alert("Please provide your Company Website.");
                document.forms.contactform.website.focus();
                return false;
            }
            if (document.forms.contactform.yoe.value == "") {
                alert("Please provide your Company Year Of Establishment.");
                document.forms.contactform.yoe.focus();
                return false;
            }
            if (document.forms.contactform.bussiness_type.value == "") {
                alert("Please  Select Your Business Type.");
                document.forms.contactform.bussiness_type.focus();
                return false;
            }

            if (document.forms.contactform.noe.value == "") {
                alert("Please  Select Your Number Of Employee.");
                document.forms.contactform.noe.focus();
                return false;
            }
        }
    </script>
    <script type="text/javascript">
        function check_upload(upload_field) {
            var re_text = /\.jpg|\.png|\.gif/i;
            var filename = upload_field.value;
            // Checking file type
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


