<script type="text/javascript">
    function PopupCenterDual(url, title, w, h) {
// Fixes dual-screen position Most browsers Firefox
        var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
        var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;
        width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
        height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

        var left = ((width / 2) - (w / 2)) + dualScreenLeft;
        var top = ((height / 2) - (h / 2)) + dualScreenTop;
        var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

// Puts focus on the newWindow
        if (window.focus) {
            newWindow.focus();
        }
    }
</script>
<script type="text/javascript">
    var auto_refresh = setInterval(
        function () {
            $('#load_tweets').load('<?php echo site_url();?>/profile/notification');
        }, 1000);
</script>
<header id="header_main" style="margin-left:0px;">
    <meta http-equiv="Content-Type" content="text/html; charset=ibm866">
    <div class="header_main_content">
        <p style="color:white;float:left;font-family:open sans regular;padding:5px;font-size: 26px;">Admin Panel</p>
        <nav class="uk-navbar" style="height:50px">

            <div class="uk-navbar-flip">
                <ul class="uk-navbar-nav user_actions">
                    <li><a href="<?php echo site_url() ?>/logout" data-uk-tooltip="{pos:'bottom'}" title="Logout" id=""
                           class="user_action_icon uk-visible-large"><i class="material-icons md-24 md-light">exit_to_app</i></i>
                        </a></li>


                    <li><a href="javascript:void(0);" data-uk-tooltip="{pos:'bottom'}" title="Full Screen"
                           id="full_screen_toggle" class="user_action_icon uk-visible-large"><i
                                    class="material-icons md-24 md-light">&#xE5D0;</i></a></li>


                    <!--					 <li>
					   <div id="menu_top_dropdown" class="uk-float-left uk-hidden-small"><div>
                         <a href="<?php echo site_url('manageCustomers') ?>" class="top_menu_toggle" data-uk-tooltip="{pos:'bottom'}" title="Customers"><i class="material-icons md-24">group</i></a>
                        </div>
                    </div>
					</li>-->
                    <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                        <a href="javascript:void(0);" class="user_action_image"><span class="md-user-letters md-bg-cyan"
                                                                                      style="    background-color: #ffffff !important;color:#1976D2;"><b><img
                                            src="<?php echo base_url(); ?>assets/file_icon/profile_image/risus-03.png"
                                            style="border-radius: 50%;"></b></span></a>
                        <div class="uk-dropdown uk-dropdown-small" style="width:100%;">
                            <ul class="uk-nav js-uk-prevent">
                                <li><a href="<?php echo site_url('dashboard'); ?>"><i class="uk-icon-home"
                                                                                      style="font-size:20px;padding-right:5px;"></i><?php echo $user_email; ?>
                                    </a></li>
                                <li>
                                    <a href="<?php echo site_url() ?>/profile/edit_contact/<?php if(!empty($records4)){echo $records4[0]['cp_id']; } ?>"><i
                                                class="uk-icon-user" style="font-size:20px;padding-right:5px;"></i>My
                                        profile</a></li>
                                <li><a href="<?php echo site_url('changePassword'); ?>"><i class="uk-icon-cog"
                                                                                           style="font-size:20px;padding-right:5px;"></i>Settings</a>
                                </li>
                                <li><a href="<?php echo site_url() ?>/logout">&nbsp;Logout</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="header_main_search_form">
        <i class="md-icon header_main_search_close material-icons">&#xE5CD;</i>
        <form class="uk-form">
            <input type="text" class="header_main_search_input" id="search_data" onkeyup="ajaxSearch();"
                   name="search_data" autocomplete="off"/>
            <div id="suggestions" style="background-color:#FFFFFF;">
                <div id="autoSuggestionsList" style="overflow-y:scroll;">
                </div>
            </div>
            <button class="header_main_search_btn uk-button-link"><i class="md-icon material-icons">&#xE8B6;</i>
            </button>
        </form>
    </div>
</header>

<script type="text/javascript">
    function ajaxSearch() {
        var input_data = $('#search_data').val();
        if (input_data.length === 0) {
            $('#suggestions').hide();
        } else {

            var post_data = {
                'search_data': input_data,
                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
            };

            $.ajax({
                type: "POST",
                url: "<?php echo site_url(); ?>/profile/autocomplete/",
                data: post_data,
                success: function (data) {
                    // return success
                    if (data.length > 0) {
                        $('#suggestions').show();
                        $('#autoSuggestionsList').addClass('auto_list');
                        $('#autoSuggestionsList').html(data);
                    }
                }
            });

        }
    }
</script>
	