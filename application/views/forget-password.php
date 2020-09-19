<!--Page Header-->
<section id="main-banner-page" class="position-relative page-header reset-header parallax section-nav-smooth">
    <div class="overlay overlay-dark opacity-8 z-index-1"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="page-titles whitecolor text-center padding_top padding_bottom">
                    <h2 class="font-xlight">Let's Reset</h2>
                    <h2 class="font-bold">Forgotten Password</h2>
                </div>
            </div>
        </div>
        <div class="gradient-bg title-wrap">
            <div class="row">
                <div class="col-lg-12 col-md-12 whitecolor">
                    <h3 class="float-left">Reset Password</h3>
                    <ul class="breadcrumb top10 bottom10 float-right">
                        <li class="breadcrumb-item hover-light"><a href="<?php echo site_url() ?>">Home</a></li>
                        <li class="breadcrumb-item hover-light">Reset Password</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Page Header ends -->
<!-- reset password -->
<section id="sign-in" class="bglight position-relative padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center wow fadeIn" data-wow-delay="300ms">
                <h2 class="heading bottom40 darkcolor font-light2">Reset<span class="font-normal"> Password</span>
                    <span class="divider-center"></span>
                </h2>
            </div>
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10 offset-sm-1 whitebox">
                <div class="widget logincontainer shadow text-center text-md-left">
                    <h3 class="darkcolor bottom35">Reset Password </h3>
                    <form class="getin_form border-form" id="ResetPassword" action="<?php echo site_url('auth/process_forgot_password') ?>" method="POST">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group bottom35">
                                    <label for="loginEmail" class="mb-3 pl-0">Please enter Email or Username you remember!</label>
                                    <input class="form-control" type="email" placeholder="Username or Email" required id="loginEmail" name="EmailForgotPassword">
                                    
                                    <?php if(@$this->session->flashdata('errorresetemail')['EmailForgotPassword']): ?>
                                    <div class="alert alert-danger" style="margin-top: 10px;">
                                      <?php echo $this->session->flashdata('errorresetemail')['EmailForgotPassword']; ?>
                                    </div>
                                    <?php endif; ?>
                                    <?php if(@$this->session->flashdata('errorresetemailnoemail')): ?>
                                    <div class="alert alert-danger" style="margin-top: 10px;">
                                      <?php echo $this->session->flashdata('errorresetemailnoemail'); ?>
                                    </div>
                                    <?php endif; ?>
                                    <?php if(@$this->session->flashdata('errorresetemailfailedsend')): ?>
                                    <div class="alert alert-danger" style="margin-top: 10px;">
                                      <?php echo $this->session->flashdata('errorresetemailfailedsend'); ?>
                                    </div>
                                    <?php endif; ?>
                                    <?php if(@$this->session->flashdata('errorresetemailsuccesssend')): ?>
                                    <div class="alert alert-success" style="margin-top: 10px;">
                                      <?php echo $this->session->flashdata('errorresetemailsuccesssend'); ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-sm-12 forget-buttons">
                                <button type="submit" class="button btn-primary">Reset</button>
                                <a href="<?php echo site_url('/admin') ?>" class="button btn-dark ml-2">Back To Login</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- sign-in ends -->