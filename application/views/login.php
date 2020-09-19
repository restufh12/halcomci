<section id="main-banner-page" class="position-relative page-header sign-in-header parallax section-nav-smooth">
    <div class="overlay overlay-dark opacity-7 z-index-1"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="page-titles whitecolor text-center padding_top padding_bottom">
                    <h2 class="font-xlight">Sign Into</h2>
                    <h2 class="font-bold">Your Account To</h2>
                    <h2 class="font-xlight">Use Best</h2>
                    <h3 class="font-light pt-2">Offers And Facilities Provided By Us</h3>
                </div>
            </div>
        </div>
        <div class="gradient-bg title-wrap">
            <div class="row">
                <div class="col-lg-12 col-md-12 whitecolor">
                    <h3 class="float-left">Sign In</h3>
                    <ul class="breadcrumb top10 bottom10 float-right">
                        <li class="breadcrumb-item hover-light"><a href="<?php echo site_url() ?>">Home</a></li>
                        <li class="breadcrumb-item hover-light">Sign-in</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Page Header ends -->
<!-- sign-in -->
<section id="sign-in" class="bglight position-relative padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center wow fadeIn" data-wow-delay="300ms">
                <h2 class="heading bottom30 darkcolor font-light2"><span class="font-normal">Sign</span> In
                    <span class="divider-center"></span>
                </h2>
                <div class="col-md-8 offset-md-2 heading_space">
                    <p>Enter your username and password to proceed to the administrator page</p>
                </div>
            </div>
            <div class="col-lg-6 pr-lg-0 col-md-12 d-none d-lg-flex">
                <div class=" image login-image h-100">
                    <img src="<?php echo base_url() ?>assets/images/login-section.jpg" alt="" class="w-100 h-100">
                </div>
            </div>
            <div class="col-lg-6 pl-lg-0 col-md-12 whitebox">
                <div class="widget logincontainer">
                    <h3 class="darkcolor bottom30 text-center text-lg-left">Sign In </h3>
                    <form  method="POST" class="getin_form border-form" id="login" action="<?php echo site_url('auth/process_login') ?>">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group bottom35">
                                    <label for="loginEmail" class="d-none"></label>
                                    <input class="form-control" type="email" placeholder="Email:" required id="loginEmail" name="Email">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group bottom35">
                                    <label for="loginPass" class="d-none"></label>
                                    <input class="form-control" type="password" placeholder="Password:" required id="loginPass" name="Password">
                                </div>
                            </div>

                            <?php if($this->session->userdata('loginerrors')): ?>
                            <div class="col-md-12 col-sm-12 bottom35">
                                <div class="alert alert-danger">
                                  <strong>Sorry!</strong> Invalid Email or Password.
                                </div>
                            </div>
                            <?php endif; ?>

                            <div class="col-md-12 col-sm-12">
                                <div class="form-group bottom30 ml-1">
                                    <div class="form-check text-left">
                                        <input class="form-check-input" checked type="checkbox" value="" id="rememberMe">
                                        <label class="form-check-label" for="rememberMe">
                                            Keep Me Signed In
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <button type="submit" class="button gradient-btn">Login</button>
                                <a href="<?php echo site_url('auth/forget_password') ?>" class="ml-2 defaultcolor">Forget password?</a>
                                <!-- <p class="top30 mb-0"> Don't have an account? &nbsp;<a href="javascript:void(0)" class="defaultcolor">Sign Up Now</a> </p> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- sign-in ends 