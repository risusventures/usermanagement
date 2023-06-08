<div style="" class="uk-width-large-1-1">
    <div class="md-card">
        <div class="user_heading">

            <div class="user_heading_content" style="float:left">
                <h2 class="heading_b uk-margin-bottom"><span class="uk-text-truncate"
                                                             style="  text-transform: capitalize;"><?php echo $records4[0]['company_name']; ?><span
                                class="sub-heading1"
                                style="font-size:17px;text-transform: capitalize;">       <?php echo $records4[0]['city']; ?></span></span>
                </h2>
                <ul class="user_stats">
                    <li>
                        <h4 class="heading_a"><?php echo $records[0]['cat']; ?><span
                                    class="sub-heading">Total Category</span></h4>
                    </li>
                    <li>
                        <h4 class="heading_a"><?php echo $records1[0]['pro']; ?><span
                                    class="sub-heading">Total Product</span></h4>
                    </li>
                    <li>
                        <h4 class="heading_a">284 <span class="sub-heading">Following</span></h4>
                    </li>
                </ul>
            </div>
            <div class="user_heading_avatar" style="background-image:none;float:right;">
                <img class="" src="<?php echo base_url() ?>upload/<?php echo $records2[0]['image']; ?>"
                     alt="user avatar"
                     style="border-radius:0px; width:100%; max-width:300px; height:100%; max-height:200px;background-image:none;">
            </div>
            <a class="md-fab md-fab-small md-fab-accent"
               href="<?php echo site_url() ?>profile/contactprofile/<?php echo $records4[0]['cp_id']; ?>">
                <i class="material-icons"></i>
            </a>
        </div>
        <div class="user_content">
            <div style="height: 46px;" class="uk-sticky-placeholder">
                <ul style="margin: 0px;" id="user_profile_tabs" class="uk-tab"
                    data-uk-tab="{connect:'#user_profile_tabs_content', animation:'slide-horizontal'}"
                    data-uk-sticky="{ top: 48, media: 960 }">
                    <li aria-expanded="true" class="uk-active"><a href="#">About</a></li>
                    <li aria-expanded="false"><a href="#">Company Profile</a></li>
                    <li aria-expanded="false"><a href="#">Business</a></li>
                    <li aria-expanded="false" aria-haspopup="true" class="uk-tab-responsive uk-active uk-hidden"><a>About</a>
                        <div class="uk-dropdown uk-dropdown-small">
                            <ul class="uk-nav uk-nav-dropdown"></ul>
                            <div></div>
                        </div>
                    </li>
                </ul>
            </div>
            <ul id="user_profile_tabs_content" class="uk-switcher uk-margin">
                <li class="uk-active" aria-hidden="false">
                    <p><?php echo $records3[0]['description']; ?></p>
                    <div class="uk-grid uk-margin-medium-top uk-margin-large-bottom" data-uk-grid-margin="">
                        <div class="uk-width-large-1-2">
                            <h4 class="heading_c uk-margin-small-bottom">Contact Info</h4>
                            <ul class="md-list md-list-addon">
                                <li>
                                    <div class="md-list-addon-element">
                                        <i class="md-list-addon-icon material-icons"></i>
                                    </div>
                                    <div class="md-list-content">
                                        <span class="md-list-heading"><?php echo $records4[0]['email']; ?></span>
                                        <span class="uk-text-small uk-text-muted">Email</span>
                                        <span style="float:right;position:relative;bottom:30px;">Verified<i
                                                    class="material-icons" style="color:green">&#xE8E8;</i></span>
                                    </div>

                                </li>
                                <li>
                                    <div class="md-list-addon-element">
                                        <i class="md-list-addon-icon material-icons"></i>
                                    </div>
                                    <div class="md-list-content">
                                        <span class="md-list-heading"><?php echo $records4[0]['mobile_number']; ?></span>
                                        <span class="uk-text-small uk-text-muted">Phone</span>
                                        <span style="float:right;position:relative;bottom:30px;">Verified<i
                                                    class="material-icons" style="color:green">&#xE8E8;</i></span>
                                    </div>

                                </li>
                            </ul>
                        </div>
                        <div class="uk-width-large-1-2">
                            <h4 class="heading_c uk-margin-small-bottom">Enquiries</h4>
                            <ul class="md-list">
                                <li>
                                    <div class="md-list-content">
                                        <span class="uk-text-small uk-text-muted">  Aut ipsum quibusdam consequatur iusto nesciunt eaque omnis et minus et tenetur et iusto sunt aut voluptatem qui qui deleniti</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                </li>
                <li class="uk-active" aria-hidden="false">
                    <div class="uk-grid uk-margin-medium-top uk-margin-large-bottom" data-uk-grid-margin="">
                        <div class="uk-width-large-1-2">
                            <h4 class="heading_c uk-margin-small-bottom">Contact Info</h4>
                            <ul class="md-list md-list-addon">
                                <li>
                                    <div class="md-list-addon-element">
                                        <i class="material-icons" style="font-size:28px;">&#xE853;</i>
                                    </div>
                                    <div class="md-list-content">
                                        <span class="md-list-heading"><?php echo $records4[0]['contact_name']; ?></span>
                                        <span class="uk-text-small uk-text-muted">Contact Person</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="md-list-addon-element">
                                        <i class="material-icons" style="font-size:28px;">&#xE7FD;</i>
                                    </div>
                                    <div class="md-list-content">
                                        <span class="md-list-heading"
                                              style=" text-transform: capitalize;"><?php echo $records4[0]['ceo_name']; ?></span>
                                        <span class="uk-text-small uk-text-muted">CEO Name</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="md-list-addon-element">
                                        <i class="md-list-addon-icon material-icons"></i>
                                    </div>
                                    <div class="md-list-content">
                                        <span class="md-list-heading">+91-<?php echo $records4[0]['mobile_number']; ?></span>
                                        <span class="uk-text-small uk-text-muted">Phone</span>
                                    </div>
                                </li>

                                <li>
                                    <div class="md-list-addon-element">
                                        <i class="material-icons" style="font-size:28px;">&#xE158;</i>
                                    </div>
                                    <div class="md-list-content">
                                        <span class="md-list-heading"><?php echo $records4[0]['email']; ?></span>
                                        <span class="uk-text-small uk-text-muted">Email</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="md-list-addon-element">
                                        <i class="material-icons" style="font-size:28px;">&#xE157;</i>
                                    </div>
                                    <div class="md-list-content">
                                        <span class="md-list-heading"><?php echo $records4[0]['website']; ?></span>
                                        <span class="uk-text-small uk-text-muted">Website</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="uk-width-large-1-2">
                            <h4 class="heading_c uk-margin-small-bottom">Company Name</h4>
                            <ul class="md-list">
                                <li>
                                    <div class="md-list-content">
                                        <span class="uk-text-small uk-text-muted"><span
                                                    style="font-size:18px;  text-transform: capitalize;"><?php echo $records4[0]['company_name']; ?></span></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted"><span><i
                                                                class="material-icons"
                                                                style="font-size:28px;float:left;">&#xE55F;</i></span>
                                                <div class="md-list-content">
                                                <span class="md-list-heading" style="font-size:12px;">
                                                 <?php echo $records4[0]['address']; ?>
                                                </span>
                                    
                                                </div>

                                                    </span>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>

                </li>
                <li aria-hidden="true">
                    <div style="height: 46px;" class="uk-sticky-placeholder">
                        <ul style="margin: 0px;" id="user_profile_tabs" class="uk-tab"
                            data-uk-tab="{connect:'#user_profile_tabs_content', animation:'slide-horizontal'}"
                            data-uk-sticky="{ top: 48, media: 960 }">


                    </div>

                </li>
                <li aria-hidden="true">
                    <ul class="md-list">
                        <li>
                            <div class="md-list-content">
                                <span class="md-list-heading"><a href="#">Quia qui omnis deserunt quibusdam.</a></span>
                                <div class="uk-margin-small-top">
                                                <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                            class="uk-text-muted uk-text-small">17 Nov 2015</span>
                                                </span>
                                    <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                class="uk-text-muted uk-text-small">17</span>
                                                </span>
                                    <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                class="uk-text-muted uk-text-small">771</span>
                                                </span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <span class="md-list-heading"><a
                                            href="#">Fugit officia laudantium expedita aut.</a></span>
                                <div class="uk-margin-small-top">
                                                <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                            class="uk-text-muted uk-text-small">21 Nov 2015</span>
                                                </span>
                                    <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                class="uk-text-muted uk-text-small">25</span>
                                                </span>
                                    <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                class="uk-text-muted uk-text-small">309</span>
                                                </span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <span class="md-list-heading"><a href="#">Ullam est ut repellendus omnis voluptas eveniet tempora.</a></span>
                                <div class="uk-margin-small-top">
                                                <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                            class="uk-text-muted uk-text-small">27 Nov 2015</span>
                                                </span>
                                    <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                class="uk-text-muted uk-text-small">18</span>
                                                </span>
                                    <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                class="uk-text-muted uk-text-small">495</span>
                                                </span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <span class="md-list-heading"><a href="#">Quasi alias assumenda assumenda quam quia.</a></span>
                                <div class="uk-margin-small-top">
                                                <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                            class="uk-text-muted uk-text-small">18 Nov 2015</span>
                                                </span>
                                    <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                class="uk-text-muted uk-text-small">8</span>
                                                </span>
                                    <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                class="uk-text-muted uk-text-small">764</span>
                                                </span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <span class="md-list-heading"><a href="#">Quasi neque recusandae sit sit enim magni ducimus.</a></span>
                                <div class="uk-margin-small-top">
                                                <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                            class="uk-text-muted uk-text-small">06 Nov 2015</span>
                                                </span>
                                    <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                class="uk-text-muted uk-text-small">17</span>
                                                </span>
                                    <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                class="uk-text-muted uk-text-small">494</span>
                                                </span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <span class="md-list-heading"><a href="#">Unde assumenda est dolor maxime nesciunt.</a></span>
                                <div class="uk-margin-small-top">
                                                <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                            class="uk-text-muted uk-text-small">23 Nov 2015</span>
                                                </span>
                                    <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                class="uk-text-muted uk-text-small">15</span>
                                                </span>
                                    <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                class="uk-text-muted uk-text-small">759</span>
                                                </span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <span class="md-list-heading"><a href="#">Sed numquam veniam similique.</a></span>
                                <div class="uk-margin-small-top">
                                                <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                            class="uk-text-muted uk-text-small">28 Nov 2015</span>
                                                </span>
                                    <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                class="uk-text-muted uk-text-small">19</span>
                                                </span>
                                    <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                class="uk-text-muted uk-text-small">940</span>
                                                </span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <span class="md-list-heading"><a
                                            href="#">Illo dolorem accusantium eveniet quidem iusto.</a></span>
                                <div class="uk-margin-small-top">
                                                <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                            class="uk-text-muted uk-text-small">23 Nov 2015</span>
                                                </span>
                                    <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                class="uk-text-muted uk-text-small">24</span>
                                                </span>
                                    <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                class="uk-text-muted uk-text-small">297</span>
                                                </span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <span class="md-list-heading"><a href="#">Error sapiente enim veniam repellat blanditiis.</a></span>
                                <div class="uk-margin-small-top">
                                                <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                            class="uk-text-muted uk-text-small">08 Nov 2015</span>
                                                </span>
                                    <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                class="uk-text-muted uk-text-small">20</span>
                                                </span>
                                    <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                class="uk-text-muted uk-text-small">417</span>
                                                </span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <span class="md-list-heading"><a href="#">Et et similique odio amet fugit sequi laboriosam.</a></span>
                                <div class="uk-margin-small-top">
                                                <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                            class="uk-text-muted uk-text-small">24 Nov 2015</span>
                                                </span>
                                    <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                class="uk-text-muted uk-text-small">14</span>
                                                </span>
                                    <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                class="uk-text-muted uk-text-small">870</span>
                                                </span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <span class="md-list-heading"><a href="#">Tenetur sed et numquam voluptates ad delectus iusto.</a></span>
                                <div class="uk-margin-small-top">
                                                <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                            class="uk-text-muted uk-text-small">05 Nov 2015</span>
                                                </span>
                                    <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                class="uk-text-muted uk-text-small">2</span>
                                                </span>
                                    <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                class="uk-text-muted uk-text-small">496</span>
                                                </span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <span class="md-list-heading"><a
                                            href="#">Beatae non minima aut velit ipsum et.</a></span>
                                <div class="uk-margin-small-top">
                                                <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                            class="uk-text-muted uk-text-small">26 Nov 2015</span>
                                                </span>
                                    <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                class="uk-text-muted uk-text-small">21</span>
                                                </span>
                                    <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                class="uk-text-muted uk-text-small">394</span>
                                                </span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <span class="md-list-heading"><a
                                            href="#">Eos sit quod rerum officia iure voluptatem.</a></span>
                                <div class="uk-margin-small-top">
                                                <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                            class="uk-text-muted uk-text-small">04 Nov 2015</span>
                                                </span>
                                    <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                class="uk-text-muted uk-text-small">19</span>
                                                </span>
                                    <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                class="uk-text-muted uk-text-small">950</span>
                                                </span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <span class="md-list-heading"><a href="#">Ab quo voluptatem doloremque.</a></span>
                                <div class="uk-margin-small-top">
                                                <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                            class="uk-text-muted uk-text-small">17 Nov 2015</span>
                                                </span>
                                    <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                class="uk-text-muted uk-text-small">8</span>
                                                </span>
                                    <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                class="uk-text-muted uk-text-small">289</span>
                                                </span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <span class="md-list-heading"><a href="#">Distinctio adipisci eius dolore.</a></span>
                                <div class="uk-margin-small-top">
                                                <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                            class="uk-text-muted uk-text-small">09 Nov 2015</span>
                                                </span>
                                    <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                class="uk-text-muted uk-text-small">12</span>
                                                </span>
                                    <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                class="uk-text-muted uk-text-small">832</span>
                                                </span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <span class="md-list-heading"><a href="#">Voluptatem nihil harum soluta autem sit accusamus odit.</a></span>
                                <div class="uk-margin-small-top">
                                                <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                            class="uk-text-muted uk-text-small">21 Nov 2015</span>
                                                </span>
                                    <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                class="uk-text-muted uk-text-small">6</span>
                                                </span>
                                    <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                class="uk-text-muted uk-text-small">408</span>
                                                </span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <span class="md-list-heading"><a href="#">Praesentium ut deserunt expedita unde totam repellendus.</a></span>
                                <div class="uk-margin-small-top">
                                                <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                            class="uk-text-muted uk-text-small">14 Nov 2015</span>
                                                </span>
                                    <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                class="uk-text-muted uk-text-small">4</span>
                                                </span>
                                    <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                class="uk-text-muted uk-text-small">997</span>
                                                </span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <span class="md-list-heading"><a href="#">Et ipsa eius aut voluptates expedita officiis libero optio.</a></span>
                                <div class="uk-margin-small-top">
                                                <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                            class="uk-text-muted uk-text-small">12 Nov 2015</span>
                                                </span>
                                    <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                class="uk-text-muted uk-text-small">26</span>
                                                </span>
                                    <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                class="uk-text-muted uk-text-small">861</span>
                                                </span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <span class="md-list-heading"><a href="#">Ipsa temporibus et consequatur.</a></span>
                                <div class="uk-margin-small-top">
                                                <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                            class="uk-text-muted uk-text-small">18 Nov 2015</span>
                                                </span>
                                    <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                class="uk-text-muted uk-text-small">5</span>
                                                </span>
                                    <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                class="uk-text-muted uk-text-small">572</span>
                                                </span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <span class="md-list-heading"><a href="#">Et non et hic maiores omnis sint.</a></span>
                                <div class="uk-margin-small-top">
                                                <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                            class="uk-text-muted uk-text-small">28 Nov 2015</span>
                                                </span>
                                    <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                class="uk-text-muted uk-text-small">27</span>
                                                </span>
                                    <span class="uk-margin-right">
                                                    <i class="material-icons"></i> <span
                                                class="uk-text-muted uk-text-small">119</span>
                                                </span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>

                