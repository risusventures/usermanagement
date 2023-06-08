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
          href="<?php echo base_url(); ?>assets/bower_components/kendo-ui/styles/kendo.common-material.min.css"/>
    <link rel="stylesheet"
          href="<?php echo base_url(); ?>assets/bower_components/kendo-ui/styles/kendo.material.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/uikit/css/uikit.almost-flat.min.css"
          media="all">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/icons/flags/flags.min.css" media="all">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.min.css" media="all">
    <script src="<?php echo base_url(); ?>assets/js/common.min.js"></script>
    <!-- uikit functions -->
    <script src="<?php echo base_url(); ?>assets/js/uikit_custom.min.js"></script>
    <script type="text/javascript">
        function validate() {
            if (document.ClassSearch.cno.value == "") {
                alert("Please enter a valid consignment number!");
                document.ClassSearch.cno.focus();
                return false;
            }
            if (document.forms.ClassSearch.option.value == "-1") {
                alert("Please Select Courier!");
                return false;
            }
            return (true);

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
    <?php include('analytics.php'); ?>
</head>
<body class=" sidebar_main_open sidebar_main_swipe">
<?php include('header.php'); ?>
<?php include('header_top.php'); ?>
<div id="page_content" style="margin-left:0px;">
    <div id="page_content_inner">
        <div class="uk-grid">
            <div class="uk-width-1-1">
                <h4 class="heading_a uk-margin-bottom">Track Courier Status </h4>
                <div class="md-card">
                    <div class="md-card-content">
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-large-1-1">
                                <form id="ClassSearch" name="ClassSearch" method="get" onsubmit="return(validate());"
                                      target="browser">
                                    <div class="md-card-content">
                                        <h3 class="heading_a"></h3>
                                        <div class="uk-grid" data-uk-grid-margin="">
                                            <div class="uk-width-large-1-3 uk-width-medium-1-1">
                                                <div class="uk-input-group" style="width:100%">
                                                    <div class="md-input-wrapper">
                                                        <div class="parsley-row" style="width:100%;">
                                                            <fieldset>
                                                                <select id="val_select" name="option"
                                                                        style="width:100%;height:44px;"
                                                                        onChange="this.form.action=this.options[this.selectedIndex].value;">
                                                                    <option value="-1" selected="selected">Select
                                                                        Courier
                                                                    </option>
                                                                    <option value="http://www.trackcourier.in/track-airstate.php"
                                                                            title="Airstate Courier Tracking" style="">
                                                                        Airstate
                                                                    </option>

                                                                    <option value="http://www.trackcourier.in/track-akashganga.php"
                                                                            title="Akash Ganga Tracking">Akash Ganga
                                                                    </option>

                                                                    <option value="http://www.trackcourier.in/track-aramex.php"
                                                                            title="Aramex Tracking">Aramex
                                                                    </option>

                                                                    <option value="http://www.trackcourier.in/track-blazeflash.php"
                                                                            title="Blazeflash Tracking India">Blazeflash
                                                                    </option>

                                                                    <option value="http://www.trackcourier.in/track-bluedart.php"
                                                                            title="Bluedart Tracking India">Blue Dart
                                                                    </option>

                                                                    <option value="http://www.trackcourier.in/track-bombino.php"
                                                                            title="Bombino Tracking">Bombino
                                                                    </option>

                                                                    <option value="http://www.trackcourier.in/track-bonds.php"
                                                                            title="Bonds Tracking">Bonds Logistics
                                                                    </option>

                                                                    <option value="http://www.trackcourier.in/track-corporate.php"
                                                                            title="Corporate Courier Tracking">Corporate
                                                                        Courier
                                                                    </option>

                                                                    <option value="http://www.trackcourier.in/track-delhivery.php"
                                                                            title="Delhivery Tracking">Delhivery
                                                                    </option>

                                                                    <option value="http://www.trackcourier.in/track-dhl.php"
                                                                            title="DHL Tracking">DHL
                                                                    </option>

                                                                    <option value="http://www.trackcourier.in/track-dtdc.php"
                                                                            title="DTDC Tracking">DTDC
                                                                    </option>

                                                                    <option value="http://www.trackcourier.in/track-ecomexpress.php"
                                                                            title="Ecom Express Courier Tracking">Ecom
                                                                        Express
                                                                    </option>

                                                                    <option value="http://www.trackcourier.in/track-fedex.php"
                                                                            title="Fedex Tracking">FedEx India
                                                                    </option>

                                                                    <option value="http://www.trackcourier.in/track-firstflight.php"
                                                                            title="First Flight Tracking">First Flight
                                                                    </option>

                                                                    <option value="http://www.trackcourier.in/track-flyking.php"
                                                                            title="Flyking Tracking">Flyking
                                                                    </option>

                                                                    <option value="http://www.trackcourier.in/track-gati.php"
                                                                            title="Track GATI">GATI
                                                                    </option>

                                                                    <option value="http://www.trackcourier.in/track-gms.php"
                                                                            title="Track GSM Express India">GMS Express
                                                                    </option>

                                                                    <option value="http://www.trackcourier.in/track-gojavas.php"
                                                                            title="GoJavas Tracking">GoJavas
                                                                    </option>

                                                                    <option value="http://www.trackcourier.in/track-indiaontime.php"
                                                                            title="Track Indiaontime">Indiaontime
                                                                    </option>

                                                                    <option value="http://www.trackcourier.in/track-madhur.php"
                                                                            title="Track Madhur Courier">Madhur
                                                                    </option>

                                                                    <option value="http://www.trackcourier.in/track-metromaruti.php"
                                                                            title="Track Metro Maruti Courier">Metro
                                                                        Maruti
                                                                    </option>

                                                                    <option value="http://www.trackcourier.in/track-mirakle.php"
                                                                            title="Track Mirakle Courier">Mirakle
                                                                        Courier
                                                                    </option>

                                                                    <option value="http://www.trackcourier.in/track-om-logistics.php"
                                                                            title="Track Om Logistics">Om Courier
                                                                    </option>

                                                                    <option value="http://www.trackcourier.in/track-overnite.php"
                                                                            title="Overnite Express Tracking">Overnite
                                                                        Express
                                                                    </option>

                                                                    <option value="http://www.trackcourier.in/track-oxford.php"
                                                                            title="Oxford Express Tracking">Oxford
                                                                        Express
                                                                    </option>

                                                                    <option value="http://www.trackcourier.in/track-palande.php"
                                                                            title="Palande Courier Tracking">Palande
                                                                    </option>

                                                                    <option value="http://www.trackcourier.in/track-pegasus.php"
                                                                            title="Pegasus Courier Tracking">Pegasus
                                                                    </option>

                                                                    <option value="http://www.trackcourier.in/track-pigeon.php"
                                                                            title="Pigeon Courier Tracking">PIGEON
                                                                    </option>

                                                                    <option value="http://www.trackcourier.in/track-professional.php"
                                                                            title="Track Professional Couriers">
                                                                        Professional
                                                                    </option>

                                                                    <option value="http://www.trackcourier.in/track-pushpak.php"
                                                                            title="Track Pushpak Couriers">Pushpak
                                                                    </option>

                                                                    <option value="http://www.trackcourier.in/track-quantium.php"
                                                                            title="Quantium Couriers">Quantium
                                                                    </option>

                                                                    <option value="http://www.trackcourier.in/track-rapidconnect.php"
                                                                            title="Rapidconnect Couriers">Rapidconnect
                                                                        Courier
                                                                    </option>

                                                                    <option value="http://www.trackcourier.in/track-speedpost.php"
                                                                            title="Speedpost Tracking">Speed Post
                                                                    </option>

                                                                    <option value="http://www.trackcourier.in/track-trackon.php"
                                                                            title="Track Trackon">Trackon
                                                                    </option>
                                                                </select>
                                                        </div>
                                                        <span class="md-input-bar"></span></div>
                                                </div>
                                            </div>
                                            <div class="uk-width-large-1-3 uk-width-medium-1-1">
                                                <div class="uk-input-group" style="width:100%">
                                                    <div class="md-input-wrapper md-input-filled"><label>consignment
                                                            number</label><input class="md-input label-fixed"
                                                                                 type="text" name="cno" id="cno"
                                                                                 value="<?php echo $track_id; ?>"><span
                                                                class="md-input-bar"></span></div>
                                                </div>
                                            </div>
                                            <div class="uk-width-large-1-3 uk-width-medium-1-1">
                                                <div class="uk-input-group">
                                                    <div class="md-input-wrapper">
                                                        <div class="uk-width-medium-1-4"><input type="submit"
                                                                                                class="md-btn md-btn-primary"
                                                                                                value="Track"
                                                                                                name="submit"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            </fieldset>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr style="border: 1px solid #EEE;"></hr>
                    <style type="text/css">#head {
                            display: none !important;
                        }</style>
                    <iframe name="browser" style="height:500px;width:100%;"></iframe>

                </div>
            </div>

        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
<div id="preloader">
    <div id="status"></div>
</div>
<!-- altair common functions/helpers -->
<script src="<?php echo base_url(); ?>assets/js/altair_admin_common.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/ion.rangeslider/js/ion.rangeSlider.min.js"></script>
<!-- htmleditor (codeMirror) -->
<script src="<?php echo base_url(); ?>assets/js/uikit_htmleditor_custom.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/jquery.inputmask/dist/jquery.inputmask.bundle.js"></script>
<script src="<?php echo base_url(); ?>assets/js/pages/forms_advanced.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
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