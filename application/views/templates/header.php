<!-- header -->
<header class="site-header" id="header">
    <nav class="navbar navbar-expand-lg transparent-bg static-nav">
        <div class="container">
            <a class="" href="<?php echo site_url() ?>">
                <img src="<?php echo base_url() ?>assets/images/logo-transparent.png" width="150px" alt="logo" class="logo-default">
                <img src="<?php echo base_url() ?>assets/images/logo.png" alt="logo" width="150px" class="logo-scrolled">
            </a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url() ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('about') ?>">About</a>
                    </li>
					<li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('solution') ?>">Solution</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('project') ?>">Projects</a>
                    </li>
					<li class="nav-item dropdown position-relative">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Partners </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo site_url('partner') ?>">Technology Partners</a>
                            <a class="dropdown-item" href="<?php echo site_url('client') ?>">Customers</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('team') ?>">Team</a>
                    </li>
					<li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('event') ?>">Event</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('contact') ?>">Contact</a>
                    </li>

                    <?php if($this->session->userdata('LoginYN')=="1" AND $this->session->userdata('LoginLevel')=="Admin"): ?>
					<li class="nav-item dropdown position-relative">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> My Account </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo site_url('event/create_event') ?>">Create Event</a>
                            <a class="dropdown-item" href="<?php echo site_url('solution/create_solution') ?>">Create Solution</a>
                            <a class="dropdown-item" href="<?php echo site_url('subscriber/subscriber_listing') ?>">Subscriber</a>
                            <a class="dropdown-item" href="<?php echo site_url('admin/update_profile') ?>">Update Profile</a>
                            <a class="dropdown-item" href="<?php echo site_url('auth/logout') ?>">Logout</a>
                        </div>
                    </li>
                    <?php elseif ($this->session->userdata('LoginYN')=="1" AND $this->session->userdata('LoginLevel')=="Member"): ?>
                    <li class="nav-item dropdown position-relative">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> My Account </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo site_url('ticket') ?>">Ticket</a>
                            <a class="dropdown-item" href="<?php echo site_url('auth/logout') ?>">Logout</a>
                        </div>
                    </li>
                    <?php else: ?>
                    <li class="nav-item dropdown position-relative" style="display: none;">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Account </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo site_url('auth/login') ?>">Login</a>
                            <a class="dropdown-item" href="javascript:void(0)">Register</a>
                        </div>
                    </li>
                    <?php endif; ?>

                </ul>
            </div>
        </div>
		<!--side menu open button-->
        <a href="javascript:void(0)" class="d-inline-block sidemenu_btn" id="sidemenu_toggle">
            <span class="gradient-bg"></span> <span class="gradient-bg"></span> <span class="gradient-bg"></span>
        </a>
    </nav>
	<!-- side menu -->
    <div class="side-menu opacity-0 gradient-bg">
        <div class="overlay"></div>
        <div class="inner-wrapper">
            <span class="btn-close" id="btn_sideNavClose"><i></i><i></i></span>
            <nav class="side-nav w-100">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url() ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('about') ?>">About</a>
                    </li>
					<li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('solution') ?>">Solution</a>
                    </li>
					<li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('project') ?>">Project</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsePagesSideMenu" data-toggle="collapse" href="#sideNavPages">
                            Partners <i class="fas fa-chevron-down"></i>
                        </a>
                        <div id="sideNavPages" class="collapse sideNavPages">
                            <ul class="navbar-nav mt-2">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('partner') ?>">Technology Partners</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('client') ?>">Customer</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('team') ?>">Team</a>
                    </li>
					<li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('event') ?>">Event</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('contact') ?>">Contact</a>
                    </li>

                    <?php if($this->session->userdata('LoginYN')=="1" AND $this->session->userdata('LoginLevel')=="Admin"): ?>
                    <li class="nav-item">
                        <a class="nav-link collapsePagesSideMenu" data-toggle="collapse" href="#sideNavPages2">
                            My Account <i class="fas fa-chevron-down"></i>
                        </a>
                        <div id="sideNavPages2" class="collapse sideNavPages">
                            <ul class="navbar-nav mt-2">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('event/create_event') ?>">Create Event</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('solution/create_solution') ?>">Create Solution</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('subscriber/subscriber_listing') ?>">Subscriber</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('admin/update_profile') ?>">Update Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('auth/logout') ?>">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <?php elseif ($this->session->userdata('LoginYN')=="1" AND $this->session->userdata('LoginLevel')=="Member"): ?>
                    <li class="nav-item">
                        <a class="nav-link collapsePagesSideMenu" data-toggle="collapse" href="#sideNavPages2">
                            My Account <i class="fas fa-chevron-down"></i>
                        </a>
                        <div id="sideNavPages2" class="collapse sideNavPages">
                            <ul class="navbar-nav mt-2">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('ticket') ?>">Ticket</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('auth/logout') ?>">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <?php else: ?>
                    <li class="nav-item" style="display: none;">
                        <a class="nav-link collapsePagesSideMenu" data-toggle="collapse" href="#sideNavPages2">
                            Account <i class="fas fa-chevron-down"></i>
                        </a>
                        <div id="sideNavPages2" class="collapse sideNavPages">
                            <ul class="navbar-nav mt-2">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('auth/login') ?>">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="javascript:void(0)">Register</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <?php endif; ?>
                </ul>
            </nav>
            <div class="side-footer w-100">
                <ul class="social-icons-simple white top40">
                    <li><a href="https://www.facebook.com/pages/category/Computer-Company/PTHalcom-Integrated-Solutions-216912491719380/" target="_blank"><i class="fab fa-facebook-f"></i> </a> </li>
                        <li><a href="https://id.linkedin.com/company/pt-halcom-integrated-solution" target="_blank"><i class="fab fa-linkedin-in"></i> </a> </li>
                        <li><a href="https://www.instagram.com/halcom.official/?hl=en" target="_blank"><i class="fab fa-instagram"></i> </a> </li>
                </ul>
                <p class="whitecolor">&copy;  Halcom Integrated Solution</p>
            </div>
        </div>
    </div>
    <div id="close_side_menu" class="tooltip"></div>
    <!-- End side menu -->
</header>
<!-- header -->