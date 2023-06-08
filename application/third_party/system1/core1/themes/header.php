
<script type="text/javascript">
var auto_refresh = setInterval(
function ()
{
$('#load_tweets').load('<?php echo base_url();?>profile/notification');
}, 1000);
</script>
<header id="header_main" style="margin-left:0px;">
        <div class="header_main_content" >
		<p style="color:white;float:left;font-family:open sans regular;padding:5px;font-size: 26px;">FinacBooks</p>
            <nav class="uk-navbar">
                <div class="uk-navbar-flip">
                    <ul class="uk-navbar-nav user_actions">
                        <li><a href="#" data-uk-tooltip="{pos:'bottom'}" title="Full Screen" id="full_screen_toggle" class="user_action_icon uk-visible-large"><i class="material-icons md-24 md-light">&#xE5D0;</i></a></li>
                        <li><a href="#" id="main_search_btn" class="user_action_icon" data-uk-tooltip="{pos:'bottom'}" title="Search "><i class="material-icons md-24 md-light">&#xE8B6;</i></a></li>
                      <li> 
					    <div id="menu_top_dropdown" class="uk-float-left uk-hidden-small">
                        <div><a href="#" class="top_menu_toggle" data-uk-tooltip="{pos:'bottom'}" title="Mail Box"><i class="material-icons md-24">&#xE0BE;</i></a>
                         </div>
                       </div>
					</li>
					 
					 <li> 
					    <div id="menu_top_dropdown" class="uk-float-left uk-hidden-small"><div>
                         <a href="<?php echo site_url('seller/view_order')?>" class="top_menu_toggle" data-uk-tooltip="{pos:'bottom'}" title="Orders"><i class="material-icons md-24" >&#xE53E;</i></a>
                        </div>
                       </div>
					</li>
					
					 <li> 
					 <div id="menu_top_dropdown" class="uk-float-left uk-hidden-small"><div>
                         <a href="<?php echo site_url('seller/manageProducts')?>" class="top_menu_toggle" data-uk-tooltip="{pos:'bottom'}" title="Products"><i class="material-icons md-24">&#xE0B9;</i></a>
                        </div>
                       </div>
					</li>
					
					 <li> 
					   <div id="menu_top_dropdown" class="uk-float-left uk-hidden-small"><div>
                       <a href="<?php echo site_url('seller/sales')?>" class="top_menu_toggle" data-uk-tooltip="{pos:'bottom'}" title="Sales"><i class="material-icons md-24">&#xE85C;</i></a>
                        </div>
                      </div>
					</li>
					
					 <li>
					   <div id="menu_top_dropdown" class="uk-float-left uk-hidden-small"><div>
                         <a href="<?php echo site_url('seller/list_customers')?>" class="top_menu_toggle" data-uk-tooltip="{pos:'bottom'}" title="Customers"><i class="material-icons md-24">group</i></a>
                        </div>
                    </div>
					</li>
                        <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                        <a href="#" class="user_action_image"><span class="md-user-letters md-bg-cyan" style="    background-color: #ffffff !important;color:#1976D2;"><b><?php  $name = $records4[0]['company_name']; echo substr($name,0,1);?></b></span></a>
                        <div class="uk-dropdown uk-dropdown-small" style="width:100%;">
                            <ul class="uk-nav js-uk-prevent">
                                    <li><a href="<?php echo base_url();?>profile/dashboard"><i class="uk-icon-home" style="font-size:20px;padding-right:5px;"></i><?php echo $user_email;?></a></li>
                                    <li><a href="<?php echo site_url('profile/dashboard')?>"><i class="uk-icon-user" style="font-size:20px;padding-right:5px;"></i>My profile</a></li>
                                    <li><a href="<?php echo site_url('seller/password');?>"><i class="uk-icon-cog" style="font-size:20px;padding-right:5px;"></i>Settings</a></li>
                              <li><a href="<?php echo base_url()?>logout"><i class="material-icons" style="font-size:20px;padding-right:5px;"></i>&nbsp;Logout</a></li>
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
                <input type="text" class="header_main_search_input"  id="search_data" onkeyup="ajaxSearch();" name="search_data" autocomplete="off"/>
				  <div id="suggestions" style="background-color:#FFFFFF;">
            <div id="autoSuggestionsList" style="overflow-y:scroll;">  
            </div>
        </div>
                <button class="header_main_search_btn uk-button-link"><i class="md-icon material-icons">&#xE8B6;</i></button>
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
                    url: "<?php echo base_url(); ?>profile/autocomplete/",
                    data: post_data,
                    success: function(data) {
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
	