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

<div id="top_bar" style="margin-left:0px;">
    <div class="md-top-bar">
        <?php $session_data = $this->session->userdata('logged_in');

        $roleid = $session_data['roleid'];

        ?>
        <ul id="menu_top" class="uk-clearfix">


            <?php if ($roleid == '1') { ?>
                <li class="uk-hidden-small"><a href="<?php echo site_url('dashboard') ?>"><i
                                class="material-icons"></i><span style="margin-left:5px;">Dashboard</span></a></li>
                <li data-uk-dropdown="" class="uk-hidden-small" aria-haspopup="true" aria-expanded="false">
                    <a href="javascript:void(0);"><i class="material-icons">&#xE7EF;</i><span style="margin-left:5px;">Principal</span></a>
                    <div class="uk-dropdown uk-dropdown-bottom" style="min-width: 200px; top: 40px; left: 0px;">
                        <ul class="uk-nav uk-nav-dropdown">
                            <li><a href="<?php echo site_url('addPrincipal'); ?>">Add Principal</a></li>
                            <li><a href="<?php echo site_url('managePrincipal'); ?>">Manage Principal</a></li>
                        </ul>
                    </div>
                </li>


                <li data-uk-dropdown="" class="uk-hidden-small" aria-haspopup="true" aria-expanded="false">
                    <a href="javascript:void(0);"><i class="material-icons">&#xE7EF;</i><span style="margin-left:5px;">Customers</span></a>
                    <div class="uk-dropdown uk-dropdown-bottom" style="min-width: 200px; top: 40px; left: 0px;">
                        <ul class="uk-nav uk-nav-dropdown">
                            <li><a href="<?php echo site_url('addCustomer'); ?>">Add Customer</a></li>
                            <li><a href="<?php echo site_url('manageCustomers'); ?>">Manage Customers</a></li>
                        </ul>
                    </div>
                </li>
                <li data-uk-dropdown="" class="uk-hidden-small" aria-haspopup="true" aria-expanded="false">
                    <a href="javascript:void(0);"><i class="material-icons">&#xE8CC;</i><span style="margin-left:5px;">Order</span></a>
                    <div class="uk-dropdown uk-dropdown-bottom" style="min-width: 200px; top: 40px; left: 0px;">
                        <ul class="uk-nav uk-nav-dropdown">
                            <li><a href="<?php echo site_url('placeOrder'); ?>">Add Order</a></li>
                            <li><a href="<?php echo site_url('manageplaceOrder') ?>">Manage Orders</a></li>
                        </ul>
                    </div>
                </li>
                <li data-uk-dropdown="" class="uk-hidden-small" aria-haspopup="true" aria-expanded="false">
                    <a href="javascript:void(0);"><i class="material-icons">report</i><span style="margin-left:5px;">Reports</span></a>
                    <div class="uk-dropdown uk-dropdown-bottom" style="min-width: 200px; top: 40px; left: 0px;">
                        <ul class="uk-nav uk-nav-dropdown">
                            <li><a href="<?php echo site_url('seller/reportnew') ?>">Orders Report</a></li>
                            <li><a href="<?php echo site_url('seller/yearreport') ?>">Sales Report</a></li>
                        </ul>
                    </div>
                </li>
                <li data-uk-dropdown="" class="uk-hidden-small" aria-haspopup="true" aria-expanded="false">
                    <a href="javascript:void(0);"><i class="material-icons">email</i><span style="margin-left:5px;">Business Emails</span></a>
                    <div class="uk-dropdown uk-dropdown-bottom" style="min-width: 200px; top: 40px; left: 0px;">
                        <ul class="uk-nav uk-nav-dropdown">
                            <li><a href="<?php echo site_url('addEmails'); ?>">Add Emails</a></li>
                            <li><a href="<?php echo site_url('seller/listemails'); ?>">List Order Emails</a></li>

                        </ul>
                    </div>
                </li>
                <li data-uk-dropdown="" class="uk-hidden-small" aria-haspopup="true" aria-expanded="false">
                    <a href="javascript:void(0);"><i class="material-icons">email</i><span style="margin-left:5px;">Sub Users</span></a>
                    <div class="uk-dropdown uk-dropdown-bottom" style="min-width: 200px; top: 40px; left: 0px;">
                        <ul class="uk-nav uk-nav-dropdown">
                            <li><a href="<?php echo site_url('seller/addsubuser'); ?>">Add Sub user</a></li>
                            <li><a href="<?php echo site_url('seller/listuser'); ?>">List Sub user</a></li>

                        </ul>
                    </div>
                </li>


                <li data-uk-dropdown="" class="uk-hidden-small" aria-haspopup="true" aria-expanded="false"
                    style="display: none;">
                    <a href="javascript:void(0);"><i class="material-icons">&#xE8CC;</i><span style="margin-left:5px;">Order</span></a>
                    <div class="uk-dropdown uk-dropdown-bottom" style="min-width: 200px; top: 40px; left: 0px;">
                        <ul class="uk-nav uk-nav-dropdown">
                            <li><a href="<?php echo site_url('addOrder'); ?>">Add Order</a></li>
                            <li><a href="<?php echo site_url('manageOrder') ?>">Manage Orders</a></li>
                        </ul>
                    </div>
                </li>


            <?php }else{ ?>
            <ul id="menu_top" class="uk-clearfix">

                <?php $array = explode(',', $session_data['menu']); ?>

                <?php if (in_array("dashboard", $array)) { ?>
                    <li class="uk-hidden-small"><a href="<?php echo site_url('dashboard') ?>"><i class="material-icons"></i><span
                                    style="margin-left:5px;">Dashboard</span></a></li>
                <?php } ?>

                <?php if (in_array("add_Pri", $array) || in_array("manage_Pri", $array)) { ?>
                    <li data-uk-dropdown="" class="uk-hidden-small" aria-haspopup="true" aria-expanded="false">
                        <a href="javascript:void(0);"><i class="material-icons">&#xE7EF;</i><span
                                    style="margin-left:5px;">Principal</span></a>
                        <div class="uk-dropdown uk-dropdown-bottom" style="min-width: 200px; top: 40px; left: 0px;">
                            <ul class="uk-nav uk-nav-dropdown">
                                <?php if (in_array("add_Pri", $array)) { ?>
                                    <li><a href="<?php echo site_url('addPrincipal'); ?>">Add Principal</a></li>
                                <?php }
                                if (in_array("manage_Pri", $array)) { ?>
                                    <li><a href="<?php echo site_url('managePrincipal'); ?>">Manage Principal</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </li>
                <?php } ?>

                <?php if (in_array("add_cust", $array) || in_array("manage_customers", $array)) { ?>
                    <li data-uk-dropdown="" class="uk-hidden-small" aria-haspopup="true" aria-expanded="false">
                        <a href="javascript:void(0);"><i class="material-icons">&#xE7EF;</i><span
                                    style="margin-left:5px;">Customers</span></a>
                        <div class="uk-dropdown uk-dropdown-bottom" style="min-width: 200px; top: 40px; left: 0px;">
                            <ul class="uk-nav uk-nav-dropdown">
                                <?php if (in_array("add_cust", $array)) { ?>
                                    <li><a href="<?php echo site_url('addCustomer'); ?>">Add Customer</a></li>
                                <?php }
                                if (in_array("manage_customers", $array)) { ?>

                                    <li><a href="<?php echo site_url('manageCustomers'); ?>">Manage Customers</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </li>
                <?php } ?>

                <?php if (in_array("add_order", $array) || in_array("manage_orders", $array)) { ?>
                    <li data-uk-dropdown="" class="uk-hidden-small" aria-haspopup="true" aria-expanded="false">
                        <a href="javascript:void(0);"><i class="material-icons">&#xE8CC;</i><span
                                    style="margin-left:5px;">Order</span></a>
                        <div class="uk-dropdown uk-dropdown-bottom" style="min-width: 200px; top: 40px; left: 0px;">
                            <ul class="uk-nav uk-nav-dropdown">
                                <?php if (in_array("add_order", $array)) { ?>
                                    <li><a href="<?php echo site_url('placeOrder'); ?>">Add Order</a></li>
                                <?php }
                                if (in_array("manage_orders", $array)) { ?>
                                    <li><a href="<?php echo site_url('manageplaceOrder') ?>">Manage Orders</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </li>
                <?php } ?>
                <?php if (in_array("orders_report", $array) || in_array("sales_report", $array)) { ?>
                    <li data-uk-dropdown="" class="uk-hidden-small" aria-haspopup="true" aria-expanded="false">
                        <a href="javascript:void(0);"><i class="material-icons">report</i><span
                                    style="margin-left:5px;">Reports</span></a>
                        <div class="uk-dropdown uk-dropdown-bottom" style="min-width: 200px; top: 40px; left: 0px;">
                            <ul class="uk-nav uk-nav-dropdown">
                                <?php if (in_array("orders_report", $array)) { ?>
                                    <li><a href="<?php echo site_url('seller/reportnew') ?>">Orders Report</a></li>
                                <?php }
                                if (in_array("sales_report", $array)) { ?>
                                    <li><a href="<?php echo site_url('seller/yearreport') ?>">Sales Report</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </li>
                <?php } ?>

                <?php if (in_array("add_emails", $array) || in_array("list_order_emails", $array)) { ?>
                    <li data-uk-dropdown="" class="uk-hidden-small" aria-haspopup="true" aria-expanded="false">
                        <a href="javascript:void(0);"><i class="material-icons">email</i><span style="margin-left:5px;">Business Emails</span></a>
                        <div class="uk-dropdown uk-dropdown-bottom" style="min-width: 200px; top: 40px; left: 0px;">
                            <ul class="uk-nav uk-nav-dropdown">
                                <?php if (in_array("add_emails", $array)) { ?>
                                    <li><a href="<?php echo site_url('addEmails'); ?>">Add Emails</a></li>
                                <?php }
                                if (in_array("list_order_emails", $array)) { ?>
                                    <li><a href="<?php echo site_url('seller/listemails'); ?>">List Order Emails</a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </li>
                <?php } ?>
                <?php if (in_array("add_sub", $array) || in_array("list_user", $array)) { ?>
                    <li data-uk-dropdown="" class="uk-hidden-small" aria-haspopup="true" aria-expanded="false">
                        <a href="javascript:void(0);"><i class="material-icons">email</i><span style="margin-left:5px;">Sub Users</span></a>
                        <div class="uk-dropdown uk-dropdown-bottom" style="min-width: 200px; top: 40px; left: 0px;">
                            <ul class="uk-nav uk-nav-dropdown">
                                <?php if (in_array("add_sub", $array)) { ?>
                                    <li><a href="<?php echo site_url('seller/addsubuser'); ?>">Add Sub user</a></li>
                                <?php }
                                if (in_array("list_user", $array)) { ?>
                                    <li><a href="<?php echo site_url('seller/listuser'); ?>">List Sub user</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </li>
                <?php } ?>
                <?php if (in_array("add_Pri", $array) || in_array("manage_Pri", $array)) { ?>
                    <li data-uk-dropdown="" class="uk-hidden-small" aria-haspopup="true" aria-expanded="false"
                        style="display: none;">
                        <a href="#"><i class="material-icons">&#xE8CC;</i><span
                                    style="margin-left:5px;">Order</span></a>
                        <div class="uk-dropdown uk-dropdown-bottom" style="min-width: 200px; top: 40px; left: 0px;">
                            <ul class="uk-nav uk-nav-dropdown">
                                <li><a href="<?php echo site_url('addOrder'); ?>">Add Order</a></li>
                                <li><a href="<?php echo site_url('manageOrder') ?>">Manage Orders</a></li>
                            </ul>
                        </div>
                    </li>

                <?php }
                } ?>

                <li data-uk-dropdown="justify:'#top_bar'" class="uk-visible-small" aria-haspopup="true"
                    aria-expanded="false">
                    <a href="javascript:void(0);"><i class="material-icons"></i><span>Menu</span></a>
                    <div class="uk-dropdown uk-dropdown-width-2 uk-dropdown-bottom"
                         style="left: 0px; min-width: 329px; margin-left: -129.625px; top: 40px;">
                        <div class="uk-grid uk-dropdown-grid" data-uk-grid-margin="">
                            <div class="uk-width-1-2 uk-row-first">
                                <ul class="uk-nav uk-nav-dropdown">

                                    <?php if ($roleid == '1') { ?>
                                        <li><a href="<?php echo site_url('dashboard') ?>">Dashboard</a></li>
                                        <li class="uk-nav-header">Principal</li>
                                        <li><a href="<?php echo site_url('addPrincipal'); ?>">Add Principal</a></li>
                                        <li><a href="<?php echo site_url('managePrincipal'); ?>">Manage Principal</a>
                                        </li>
                                        <li class="uk-nav-header">Customers</li>
                                        <li><a href="<?php echo site_url('addCustomer'); ?>">Add Customer</a></li>
                                        <li><a href="<?php echo site_url('manageCustomers'); ?>">Manage Customers</a>
                                        </li>
                                        <li class="uk-nav-header">Order</li>
                                        <li><a href="<?php echo site_url('placeOrder'); ?>">Add Order</a></li>
                                        <li><a href="<?php echo site_url('manageplaceOrder') ?>">Manage Orders</a></li>
                                        <li class="uk-nav-header">Reports</li>
                                        <li><a href="<?php echo site_url('seller/reportnew') ?>">Orders Report</a></li>
                                        <li><a href="<?php echo site_url('seller/yearreport') ?>">Sales Report</a></li>
                                        <li class="uk-nav-header">Business Emails</li>
                                        <li><a href="<?php echo site_url('addEmails'); ?>">Add Emails</a></li>
                                        <li><a href="<?php echo site_url('seller/listemails'); ?>">List Order Emails</a>
                                        </li>
                                        <li class="uk-nav-header">Sub Users</li>
                                        <li><a href="<?php echo site_url('seller/addsubuser'); ?>">Add Sub user</a></li>
                                        <li><a href="<?php echo site_url('seller/listuser'); ?>">List Sub user</a></li>

                                    <?php } else { ?>
                                        <?php $array = explode(',', $session_data['menu']); ?>
                                        <?php if (in_array("dashboard", $array)) { ?>
                                            <li><a href="<?php echo site_url('dashboard') ?>">Dashboard</a></li>
                                        <?php } ?>

                                        <?php if (in_array("add_Pri", $array) || in_array("manage_Pri", $array)) { ?>
                                            <li class="uk-nav-header">Principal</li>
                                            <?php if (in_array("add_Pri", $array)) { ?>
                                                <li><a href="<?php echo site_url('addPrincipal'); ?>">Add Principal</a>
                                                </li>
                                            <?php }
                                            if (in_array("manage_Pri", $array)) { ?>
                                                <li><a href="<?php echo site_url('managePrincipal'); ?>">Manage
                                                        Principal</a></li>
                                            <?php }
                                        } ?>
                                        <?php if (in_array("add_cust", $array) || in_array("manage_customers", $array)) { ?>

                                            <li class="uk-nav-header">Customers</li>
                                            <?php if (in_array("add_cust", $array)) { ?>
                                                <li><a href="<?php echo site_url('addCustomer'); ?>">Add Customer</a>
                                                </li>
                                            <?php }
                                            if (in_array("manage_customers", $array)) { ?>
                                                <li><a href="<?php echo site_url('manageCustomers'); ?>">Manage
                                                        Customers</a></li>
                                            <?php }
                                        } ?>

                                        <?php if (in_array("add_order", $array) || in_array("manage_orders", $array)) { ?>

                                            <li class="uk-nav-header">Order</li>
                                            <?php if (in_array("add_order", $array)) { ?>
                                                <li><a href="<?php echo site_url('placeOrder'); ?>">Add Order</a></li>
                                            <?php }
                                            if (in_array("manage_orders", $array)) { ?>
                                                <li><a href="<?php echo site_url('manageplaceOrder') ?>">Manage
                                                        Orders</a></li>
                                            <?php }
                                        } ?>
                                        <?php if (in_array("orders_report", $array) || in_array("sales_report", $array)) { ?>
                                            <li class="uk-nav-header">Reports</li>
                                            <?php if (in_array("orders_report", $array)) { ?>
                                                <li><a href="<?php echo site_url('seller/reportnew') ?>">Orders
                                                        Report</a></li>
                                            <?php }
                                            if (in_array("sales_report", $array)) { ?>
                                                <li><a href="<?php echo site_url('seller/yearreport') ?>">Sales
                                                        Report</a></li>
                                            <?php }
                                        } ?>
                                        <?php if (in_array("add_emails", $array) || in_array("list_order_emails", $array)) { ?>
                                            <li class="uk-nav-header">Business Emails</li>
                                            <?php if (in_array("add_emails", $array)) { ?>
                                                <li><a href="<?php echo site_url('addEmails'); ?>">Add Emails</a></li>
                                            <?php }
                                            if (in_array("list_order_emails", $array)) { ?>
                                                <li><a href="<?php echo site_url('seller/listemails'); ?>">List Order
                                                        Emails</a></li>
                                            <?php }
                                        } ?>

                                        <?php if (in_array("add_sub", $array) || in_array("list_user", $array)) { ?>
                                            <li class="uk-nav-header">Sub Users</li>
                                            <?php if (in_array("add_sub", $array)) { ?>
                                                <li><a href="<?php echo site_url('seller/addsubuser'); ?>">Add Sub
                                                        user</a></li>
                                            <?php }
                                            if (in_array("list_user", $array)) { ?>
                                                <li><a href="<?php echo site_url('seller/listuser'); ?>">List Sub
                                                        user</a></li>
                                            <?php }
                                        }
                                    } ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>

    </div>
</div>