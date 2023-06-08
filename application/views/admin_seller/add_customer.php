<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css" media="all">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no"/>
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/img/risus-03.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/img/risus-03.png" sizes="32x32">
    <title>Risus Ventures</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- Uk-md-boostrap4 kit  -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.11/css/mdb.min.css" rel="stylesheet">
    <!-- End-uk-md-boostrap4 kit  -->

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/uikit/css/uikit.almost-flat.min.css"
          media="all">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/icons/flags/flags.min.css" media="all">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/main.min.css" media="all">
    <script src="<?php echo base_url() ?>assets/js/common.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/custom/uikit_fileinput.min.js"></script>


    <style>
        .uk-width-medium-1-3, .uk-width-medium-2-6 {
            margin-top: 10px
        }

        .ptable {
            width: 100%;
            margin-top: 10px;
        }

        .ptable th {
            text-align: left;
            width: 33%
        }

        /*
#preloader  {
     position: absolute;
     top: 0;
     left: 0;
     right: 0;
     bottom: 0;
     background-color: #fefefe;
     z-index: 99;
    height: 100%;
 }*/
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
    </style>
    <script>// makes sure the whole site is loaded
        jQuery(window).load(function () {
            // will first fade out the loading animation
            //  jQuery("#status").fadeOut();
            // will fade out the whole DIV that covers the website.
            //  jQuery("#preloader").delay(1000).fadeOut("slow");
        })
    </script>
    <?php include('analytics.php'); ?>
</head>
<body class="sidebar_main_open sidebar_main_swipe">
<?php include('header.php'); ?>
<?php include('header_top.php'); ?>
<div id="page_content" style="margin-left:0px;">
    <div id="page_content_inner">
        <h3 class="heading_b uk-margin-bottom"><u>Add New Customer</u></h3>
        <div class="md-card">
            <div class="md-card-content">
                <?php
				if(!empty($_GET['message'])){
				if ($_GET['message'] == 'already') {
                    echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">
                    <a href="#" class="uk-alert-close uk-close"></a>You are already registered</div>';
                } ?>
                <?php if ($_GET['message'] == 1) {
                    echo '<div class="uk-alert uk-alert-success" data-uk-alert="">
                    <a href="#" class="uk-alert-close uk-close"></a>Added Customer Successfully......</div>';
                } 
				}
				?>
                <?php echo form_open(site_url('seller/customer'), array('id' => 'contactform', 'name' => 'contactform', 'onsubmit' => 'return validateentry();', 'class' => 'uk-form-stacked', 'enctype' => 'multipart/form-data')); ?>
                <div class="uk-grid " data-uk-grid-margin>

                    <div class="uk-width-medium-1-3">
                        <div class="parsley-row">
                            <label for="fullname">Company Name<span class="req">*</span></label>
                            <input type="text" name="customer_person" class="md-input" value="" required/>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-3">
                        <div class="parsley-row">
                            <label for="short">Short Name<span class="req">*</span></label>
                            <input type="text" name="short_name" class="md-input" value=""/>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-3">
                        <div class="parsley-row">
                            <label for="fullname">Phone<span class="req">*</span></label>
                            <input type="text" name="customer_phone" class="md-input" value="" required/>
                        </div>
                    </div>
                </div>

                <div class="uk-grid">

                    <div class="uk-width-medium-1-3">
                        <div class="parsley-row">
                            <label for="fullname">Address<span class="req">*</span></label>
                            <input type="text" name="customer_address" class="md-input" value="" required/>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-3">
                        <div class="parsley-row">
                            <label for="email">State<span class="req">*</span></label>
                            <input type="text" name="customer_state" class="md-input" value="" required/>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-3">
                        <div class="parsley-row">
                            <label for="email">City<span class="req">*</span></label>
                            <input type="text" name="customer_city" class="md-input" value="" required/>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-3">
                        <div class="parsley-row">
                            <label for="email">Postal Code<span class="req">*</span></label>
                            <input type="text" name="customer_postal_code" class="md-input" value="" required/>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-3">
                        <div class="parsley-row">
                            <!--<label for="fullname">Country<span class="req">*</span></label>
                            <input type="text" name="customer_country"  class="md-input" value="" />-->
                            <select name="customer_country" class="md-input req" required>
                                <option value="">Country...</option>
                                <option value="Afganistan">Afghanistan</option>
                                <option value="Albania">Albania</option>
                                <option value="Algeria">Algeria</option>
                                <option value="American Samoa">American Samoa</option>
                                <option value="Andorra">Andorra</option>
                                <option value="Angola">Angola</option>
                                <option value="Anguilla">Anguilla</option>
                                <option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
                                <option value="Argentina">Argentina</option>
                                <option value="Armenia">Armenia</option>
                                <option value="Aruba">Aruba</option>
                                <option value="Australia">Australia</option>
                                <option value="Austria">Austria</option>
                                <option value="Azerbaijan">Azerbaijan</option>
                                <option value="Bahamas">Bahamas</option>
                                <option value="Bahrain">Bahrain</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Barbados">Barbados</option>
                                <option value="Belarus">Belarus</option>
                                <option value="Belgium">Belgium</option>
                                <option value="Belize">Belize</option>
                                <option value="Benin">Benin</option>
                                <option value="Bermuda">Bermuda</option>
                                <option value="Bhutan">Bhutan</option>
                                <option value="Bolivia">Bolivia</option>
                                <option value="Bonaire">Bonaire</option>
                                <option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
                                <option value="Botswana">Botswana</option>
                                <option value="Brazil">Brazil</option>
                                <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                <option value="Brunei">Brunei</option>
                                <option value="Bulgaria">Bulgaria</option>
                                <option value="Burkina Faso">Burkina Faso</option>
                                <option value="Burundi">Burundi</option>
                                <option value="Cambodia">Cambodia</option>
                                <option value="Cameroon">Cameroon</option>
                                <option value="Canada">Canada</option>
                                <option value="Canary Islands">Canary Islands</option>
                                <option value="Cape Verde">Cape Verde</option>
                                <option value="Cayman Islands">Cayman Islands</option>
                                <option value="Central African Republic">Central African Republic</option>
                                <option value="Chad">Chad</option>
                                <option value="Channel Islands">Channel Islands</option>
                                <option value="Chile">Chile</option>
                                <option value="China">China</option>
                                <option value="Christmas Island">Christmas Island</option>
                                <option value="Cocos Island">Cocos Island</option>
                                <option value="Colombia">Colombia</option>
                                <option value="Comoros">Comoros</option>
                                <option value="Congo">Congo</option>
                                <option value="Cook Islands">Cook Islands</option>
                                <option value="Costa Rica">Costa Rica</option>
                                <option value="Cote DIvoire">Cote D'Ivoire</option>
                                <option value="Croatia">Croatia</option>
                                <option value="Cuba">Cuba</option>
                                <option value="Curaco">Curacao</option>
                                <option value="Cyprus">Cyprus</option>
                                <option value="Czech Republic">Czech Republic</option>
                                <option value="Denmark">Denmark</option>
                                <option value="Djibouti">Djibouti</option>
                                <option value="Dominica">Dominica</option>
                                <option value="Dominican Republic">Dominican Republic</option>
                                <option value="East Timor">East Timor</option>
                                <option value="Ecuador">Ecuador</option>
                                <option value="Egypt">Egypt</option>
                                <option value="El Salvador">El Salvador</option>
                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                <option value="Eritrea">Eritrea</option>
                                <option value="Estonia">Estonia</option>
                                <option value="Ethiopia">Ethiopia</option>
                                <option value="Falkland Islands">Falkland Islands</option>
                                <option value="Faroe Islands">Faroe Islands</option>
                                <option value="Fiji">Fiji</option>
                                <option value="Finland">Finland</option>
                                <option value="France">France</option>
                                <option value="French Guiana">French Guiana</option>
                                <option value="French Polynesia">French Polynesia</option>
                                <option value="French Southern Ter">French Southern Ter</option>
                                <option value="Gabon">Gabon</option>
                                <option value="Gambia">Gambia</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Germany">Germany</option>
                                <option value="Ghana">Ghana</option>
                                <option value="Gibraltar">Gibraltar</option>
                                <option value="Great Britain">Great Britain</option>
                                <option value="Greece">Greece</option>
                                <option value="Greenland">Greenland</option>
                                <option value="Grenada">Grenada</option>
                                <option value="Guadeloupe">Guadeloupe</option>
                                <option value="Guam">Guam</option>
                                <option value="Guatemala">Guatemala</option>
                                <option value="Guinea">Guinea</option>
                                <option value="Guyana">Guyana</option>
                                <option value="Haiti">Haiti</option>
                                <option value="Hawaii">Hawaii</option>
                                <option value="Honduras">Honduras</option>
                                <option value="Hong Kong">Hong Kong</option>
                                <option value="Hungary">Hungary</option>
                                <option value="Iceland">Iceland</option>
                                <option value="India">India</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Iran">Iran</option>
                                <option value="Iraq">Iraq</option>
                                <option value="Ireland">Ireland</option>
                                <option value="Isle of Man">Isle of Man</option>
                                <option value="Israel">Israel</option>
                                <option value="Italy">Italy</option>
                                <option value="Jamaica">Jamaica</option>
                                <option value="Japan">Japan</option>
                                <option value="Jordan">Jordan</option>
                                <option value="Kazakhstan">Kazakhstan</option>
                                <option value="Kenya">Kenya</option>
                                <option value="Kiribati">Kiribati</option>
                                <option value="Korea North">Korea North</option>
                                <option value="Korea Sout">Korea South</option>
                                <option value="Kuwait">Kuwait</option>
                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                <option value="Laos">Laos</option>
                                <option value="Latvia">Latvia</option>
                                <option value="Lebanon">Lebanon</option>
                                <option value="Lesotho">Lesotho</option>
                                <option value="Liberia">Liberia</option>
                                <option value="Libya">Libya</option>
                                <option value="Liechtenstein">Liechtenstein</option>
                                <option value="Lithuania">Lithuania</option>
                                <option value="Luxembourg">Luxembourg</option>
                                <option value="Macau">Macau</option>
                                <option value="Macedonia">Macedonia</option>
                                <option value="Madagascar">Madagascar</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Malawi">Malawi</option>
                                <option value="Maldives">Maldives</option>
                                <option value="Mali">Mali</option>
                                <option value="Malta">Malta</option>
                                <option value="Marshall Islands">Marshall Islands</option>
                                <option value="Martinique">Martinique</option>
                                <option value="Mauritania">Mauritania</option>
                                <option value="Mauritius">Mauritius</option>
                                <option value="Mayotte">Mayotte</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Midway Islands">Midway Islands</option>
                                <option value="Moldova">Moldova</option>
                                <option value="Monaco">Monaco</option>
                                <option value="Mongolia">Mongolia</option>
                                <option value="Montserrat">Montserrat</option>
                                <option value="Morocco">Morocco</option>
                                <option value="Mozambique">Mozambique</option>
                                <option value="Myanmar">Myanmar</option>
                                <option value="Nambia">Nambia</option>
                                <option value="Nauru">Nauru</option>
                                <option value="Nepal">Nepal</option>
                                <option value="Netherland Antilles">Netherland Antilles</option>
                                <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                <option value="Nevis">Nevis</option>
                                <option value="New Caledonia">New Caledonia</option>
                                <option value="New Zealand">New Zealand</option>
                                <option value="Nicaragua">Nicaragua</option>
                                <option value="Niger">Niger</option>
                                <option value="Nigeria">Nigeria</option>
                                <option value="Niue">Niue</option>
                                <option value="Norfolk Island">Norfolk Island</option>
                                <option value="Norway">Norway</option>
                                <option value="Oman">Oman</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="Palau Island">Palau Island</option>
                                <option value="Palestine">Palestine</option>
                                <option value="Panama">Panama</option>
                                <option value="Papua New Guinea">Papua New Guinea</option>
                                <option value="Paraguay">Paraguay</option>
                                <option value="Peru">Peru</option>
                                <option value="Phillipines">Philippines</option>
                                <option value="Pitcairn Island">Pitcairn Island</option>
                                <option value="Poland">Poland</option>
                                <option value="Portugal">Portugal</option>
                                <option value="Puerto Rico">Puerto Rico</option>
                                <option value="Qatar">Qatar</option>
                                <option value="Republic of Montenegro">Republic of Montenegro</option>
                                <option value="Republic of Serbia">Republic of Serbia</option>
                                <option value="Reunion">Reunion</option>
                                <option value="Romania">Romania</option>
                                <option value="Russia">Russia</option>
                                <option value="Rwanda">Rwanda</option>
                                <option value="St Barthelemy">St Barthelemy</option>
                                <option value="St Eustatius">St Eustatius</option>
                                <option value="St Helena">St Helena</option>
                                <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                <option value="St Lucia">St Lucia</option>
                                <option value="St Maarten">St Maarten</option>
                                <option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
                                <option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
                                <option value="Saipan">Saipan</option>
                                <option value="Samoa">Samoa</option>
                                <option value="Samoa American">Samoa American</option>
                                <option value="San Marino">San Marino</option>
                                <option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
                                <option value="Saudi Arabia">Saudi Arabia</option>
                                <option value="Senegal">Senegal</option>
                                <option value="Serbia">Serbia</option>
                                <option value="Seychelles">Seychelles</option>
                                <option value="Sierra Leone">Sierra Leone</option>
                                <option value="Singapore">Singapore</option>
                                <option value="Slovakia">Slovakia</option>
                                <option value="Slovenia">Slovenia</option>
                                <option value="Solomon Islands">Solomon Islands</option>
                                <option value="Somalia">Somalia</option>
                                <option value="South Africa">South Africa</option>
                                <option value="Spain">Spain</option>
                                <option value="Sri Lanka">Sri Lanka</option>
                                <option value="Sudan">Sudan</option>
                                <option value="Suriname">Suriname</option>
                                <option value="Swaziland">Swaziland</option>
                                <option value="Sweden">Sweden</option>
                                <option value="Switzerland">Switzerland</option>
                                <option value="Syria">Syria</option>
                                <option value="Tahiti">Tahiti</option>
                                <option value="Taiwan">Taiwan</option>
                                <option value="Tajikistan">Tajikistan</option>
                                <option value="Tanzania">Tanzania</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Togo">Togo</option>
                                <option value="Tokelau">Tokelau</option>
                                <option value="Tonga">Tonga</option>
                                <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
                                <option value="Tunisia">Tunisia</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Turkmenistan">Turkmenistan</option>
                                <option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
                                <option value="Tuvalu">Tuvalu</option>
                                <option value="Uganda">Uganda</option>
                                <option value="Ukraine">Ukraine</option>
                                <option value="United Arab Erimates">United Arab Emirates</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="United States of America">United States of America</option>
                                <option value="Uraguay">Uruguay</option>
                                <option value="Uzbekistan">Uzbekistan</option>
                                <option value="Vanuatu">Vanuatu</option>
                                <option value="Vatican City State">Vatican City State</option>
                                <option value="Venezuela">Venezuela</option>
                                <option value="Vietnam">Vietnam</option>
                                <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                <option value="Wake Island">Wake Island</option>
                                <option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
                                <option value="Yemen">Yemen</option>
                                <option value="Zaire">Zaire</option>
                                <option value="Zambia">Zambia</option>
                                <option value="Zimbabwe">Zimbabwe</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="uk-grid " data-uk-grid-margin>


                    <div class="uk-width-medium-1-3">
                        <div class="parsley-row">
                            <label for="email">GST<span class="req">*</span></label>
                            <input type="text" name="gst" class="md-input" value="" required/>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-3">
                        <div class="parsley-row">
                            <label for="email">IEC<span class="req">*</span></label>
                            <input type="text" name="iec" class="md-input" value="" required/>
                        </div>
                    </div>
                   

                </div>

                <div id="reapeat1" style="margin-top: 20px">

                    <div class="uk-grid " data-uk-grid-margin>

                         <div class="uk-width-medium-1-3">
                        <div class="parsley-row">

                            <label for="email">Contact Person<span class="req">*</span></label>
                            <input type="text" name="contactper[contactper][]" class="md-input" value="" required/>
                        </div>
                    </div>
                        <div class="uk-width-medium-1-3">
                            <div class="parsley-row">
                                <label for="email">Email<span class="req">*</span></label>
                                <input type="email" name="contactper[email][]" class="md-input" value="" required/>
                            </div>
                        </div>
                        
                        <div class="uk-width-medium-1-3">
                            <button type="button" class="btn btn-outline-primary waves-effect" onclick="add_more()"
                                    name="add">Add More
                            </button>
                        </div>
                    </div>
                </div>


                <br>
                <div class="card-body">
                    <div class="uk-width-medium-1-1">
                        <div class="parsley-row">
                            <div class="form-header blue-gradient">
                                <h3 style="text-align:center;color:#fff;padding:20px;">Please Select Principal <h3>
                            </div>
                            <?php
                            foreach ($list_principal as $principal) {
                                ?>
                                <div class="checkbox">
                                    <label><input type="checkbox" name="pcheck[]" class="pcheck"
                                                  onclick="showprincple()"
                                                  id="mytable<?php echo $principal['Principal_id']; ?>"
                                                  value="<?php echo $principal['Principal_id'] ?>"><?php echo $principal['Principal_person']; ?>
                                    </label>
                                </div>
                                <?php
                            }

                            ?>
                            <?php foreach ($list_principal as $principal) {
                                $principalid = $principal['Principal_id'];
                                $query = $this->db->query("select * from principal_products where pid = '$principalid' ");
                                $data = $query->result_array();
//                                       echo '<pre>';print_r($data);echo '</pre>'; 

                                ?>


                                <table class="ptable table btn-outline-primary" style="display:none;"
                                       id="table<?php echo $principalid; ?>">
                                    <caption
                                            style="text-align:center;caption-side: top !important; Color:#fff; font-size:20px;"
                                            class="card-up blue-gradient">
                                        <p><?php echo $principal['Principal_person']; ?></p></caption>
                                    <thead>
                                    <tr>
                                        <th style="width:25%;">Products</th>
                                        <th style="width:25%;" style="width:25%;">Price</th>
                                        <th style="width:25%;">Commission %</th>
                                        <th style="width:25%;">Currency</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    if (!empty($data)) {
                                        foreach ($data as $singalproducts) {
                                            ?>

                                            <tr>
                                                <td><?php echo $singalproducts ['product_name']; ?></td>

                                                <td><input type="text" class="form-control"
                                                           name="price[<?php echo $principalid ?>][<?php echo $singalproducts['id'] ?>]"
                                                           value=""></td>
                                                <td><input type="text" class="form-control"
                                                           name="commission[<?php echo $principalid ?>][<?php echo $singalproducts['id'] ?>]"
                                                           value="">

                                                </td>

                                                <td>
                                                    <select class="form-control" name="currency[<?php echo $principalid ?>][<?php echo $singalproducts['id'] ?>]">
                                                    <option value="usd">USD</option>
                                                    <option value="eur">EURO</option>
                                                    </select>

                                                </td>
                                            </tr>


                                            <?php

                                        }
                                    } else { ?>
                                        <tr>
                                            <td colspan="3">No Product Added</td>
                                        </tr>
                                    <?php }


                                    ?>
                                    </tbody>
                                </table>


                            <?php } ?>


                        </div>
                    </div>


                </div>


                <div class="uk-grid">

                </div>
                <div class="uk-grid">
                    <div class="uk-width-1-1" style="text-align: center;">
                        <button type="submit" class="btn blue-gradient btn-rounded waves-effect waves-light"
                                name="submit" onclick="return verify_upload()">Submit
                        </button>
                    </div>
                </div>


                <?php echo form_close(); ?>
            </div>
        </div>
    </div>


    <!--         <div id="preloader">
     <div id="status"></div>
    </div>-->
    <!-- google web fonts -->

    <script>
        function add_more() {
            var hml = '<div class="uk-grid " data-uk-grid-margin > <div class="uk-width-medium-1-3"> <div class="parsley-row"><label for="email">Contact Person<span class="req">*</span></label><input type="text"  name="contactper[contactper][]" class="md-input"  value=""/></div></div><div class="uk-width-medium-1-3"> <div class="parsley-row"><label for="email">Email<span class="req">*</span></label><input type="text"  name="contactper[email][]" class="md-input"  value=""/></div></div></div>'

            jQuery("#reapeat1").append(hml);
        }
    </script>
    <script>
        function showprincple() {
            $(".ptable").hide();
            var amenatie = $('input:checkbox:checked.pcheck').map(function () {
                return this.value;
            }).get();
            console.log(amenatie)
            for (i = 0; i < amenatie.length; i++) {
                var dd = amenatie[i];
                $("#table" + dd).show();
            }


        }


    </script>


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

    <!-- common functions 
    <script src="<?php echo base_url() ?>assets/js/common.min.js"></script>-->
    <!-- uikit functions -->
    <script src="<?php echo base_url() ?>assets/js/uikit_custom.min.js"></script>
    <!-- altair common functions/helpers -->
    <script src="<?php echo base_url() ?>assets/js/altair_admin_common.min.js"></script>

    <!-- page specific plugins -->
    <!-- parsley (validation) -->
    <script src="<?php echo base_url() ?>assets/bower_components/parsleyjs/dist/parsley.min.js"></script>

    <!--  forms validation functions
    <script src="<?php echo base_url() ?>assets/js/pages/forms_validation.min.js"></script> -->


    <script type="text/javascript">
        function validateentry() {

            if (document.forms.contactform.customer_person.value == "") {
                alert("Please provide your Contact Person Name.");
                document.forms.contactform.customer_person.focus();
                return false;
            }
//if(document.forms.contactform.customer_email.value=="")
//{
// alert("Please provide your Customer Email.");
// document.forms.contactform.customer_email.focus();
// return false;
//}
            if (document.forms.contactform.customer_phone.value == "") {
                alert("Please  Select Your Customer Mobile Number.");
                document.forms.contactform.customer_phone.focus();
                return false;
            }

            if (document.forms.contactform.customer_address.value == "") {
                alert("Please  Select Your Customer Address.");
                document.forms.contactform.customer_address.focus();
                return false;
            }
            if (document.forms.contactform.customer_city.value == "") {
                alert("Please  Select Your Customer City.");
                document.forms.contactform.customer_city.focus();
                return false;
            }
            if (document.forms.contactform.customer_state.value == "") {
                alert("Please  Select Your Customer State.");
                document.forms.contactform.customer_state.focus();
                return false;
            }
            if (document.forms.contactform.customer_country.value == "") {
                alert("Please  Select Your Customer Country.");
                document.forms.contactform.customer_country.focus();
                return false;
            }
            if (document.forms.contactform.customer_postal_code.value == "") {
                alert("Please  Select Your Customer Postal Code.");
                document.forms.contactform.customer_postal_code.focus();
                return false;
            }
        }
    </script>


</body>
</html>


