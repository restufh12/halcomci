<section id="main-banner-page" class="position-relative page-header sign-in-header parallax section-nav-smooth">
    <div class="overlay overlay-dark opacity-8 z-index-1"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="page-titles whitecolor text-center padding_top padding_bottom">
                    <h2 class="font-xlight">Update</h2>
                    <h2 class="font-bold">Your Profile</h2>
                </div>
            </div>
        </div>
        <div class="gradient-bg title-wrap">
            <div class="row">
                <div class="col-lg-12 col-md-12 whitecolor">
                    <h3 class="float-left">Update Profile</h3>
                    <ul class="breadcrumb top10 bottom10 float-right">
                        <li class="breadcrumb-item hover-light"><a href="<?php echo site_url() ?>">Home</a></li>
                        <li class="breadcrumb-item hover-light">Update Profile</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Page Header ends -->
<!-- Main sign-up section starts -->
<section id="ourfaq" class="bglight position-relative padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center wow fadeIn" data-wow-delay="300ms">
                <h2 class="heading bottom40 darkcolor font-light2"><span class="font-normal">Update</span> Profile
                    <span class="divider-center"></span>
                </h2>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 pr-lg-0 whitebox">
                <div class="widget logincontainer">
                    <h3 class="darkcolor bottom35 text-center text-md-left">Update Your Account </h3>
                    <form class="getin_form border-form" method="POST" action="<?php echo site_url('admin/update_profile_process') ?>">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group bottom35">
                                    <label for="registerEmail" class="d-none"></label>
                                    <input class="form-control" type="email" placeholder="Email" name="UpdateEmail" required value="<?= $UserEmail?>">
                                    <?php if(@$this->session->flashdata('errorupdateemail')['UpdateEmail']): ?>
                                    <div class="alert alert-danger" style="margin-top: 10px;">
                                      <?php echo $this->session->flashdata('errorupdateemail')['UpdateEmail']; ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group bottom35">
                                    <label for="registerPass" class="d-none"></label>
                                    <input class="form-control" type="password" placeholder="Current Password" required name="CurrentPassword">
                                    <?php if(@$this->session->flashdata('errorupdateemailwrongpass')): ?>
                                    <div class="alert alert-danger" style="margin-top: 5px;">
                                      <?php echo $this->session->flashdata('errorupdateemailwrongpass'); ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group bottom35">
                                    <label for="registerPass" class="d-none"></label>
                                    <input class="form-control" type="password" placeholder="New Password" required name="UpdateNewPassword">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group bottom35">
                                    <label for="registerPassConfirm" class="d-none"></label>
                                    <input class="form-control" type="password" placeholder="Confirm Password" required name="UpdateConfirmNewPassword">
                                </div>

                                <?php if(@$this->session->flashdata('errorupdateemailnotmatch')): ?>
                                    <div class="alert alert-danger" style="margin-top: 5px;">
                                      <?php echo $this->session->flashdata('errorupdateemailnotmatch'); ?>
                                    </div>
                                <?php endif; ?>
                                
                            </div>
                            <div class="col-sm-12">
                                <button type="submit" class="button gradient-btn w-100">Update</button>
                            </div>

                            <?php if(@$this->session->flashdata('successupdateprofile')): ?>
                                <br>
                                <div class="col-sm-12">
                                    <div class="alert alert-success" style="margin-top: 5px;">
                                      <?php echo $this->session->flashdata('successupdateprofile'); ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if(@$this->session->flashdata('errorupdateprofile')): ?>
                                <br>
                                <div class="col-sm-12">
                                    <div class="alert alert-danger" style="margin-top: 5px;">
                                      <?php echo $this->session->flashdata('errorupdateprofile'); ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block pl-lg-0">
                <div class=" image login-image h-100">
                    <img src="<?php echo base_url() ?>assets/images/register-section-2.jpg" alt="" class="h-100">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Main sign-up section ends 