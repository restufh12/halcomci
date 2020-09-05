<?php  
$vRunNoEvent  = @$RunNoEvent;
$vUrlPost     = ($vRunNoEvent==""?'event/validation_save':'event/validation_update');
$vActionType  = ($vRunNoEvent==""?'Create':'Update');
$vSaveCaption = ($vRunNoEvent==""?'Create Event':'Update Event');
$vRequireImg  = ($vRunNoEvent==""?'required':'');
?>
<!--Page Header-->
<section id="main-banner-page" class="position-relative page-header blog2-header section-nav-smooth parallax">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="page-titles whitecolor text-center padding">
                    <h2 class="font-xlight">Build Your</h2>
                    <h2 class="font-bold">Next Event Page</h2>
                </div>
            </div>
        </div>
        <div class="gradient-bg title-wrap mt-n5">
            <div class="row">
                <div class="col-lg-12 col-md-12 whitecolor">
                    <h3 class="float-left"><?= $vSaveCaption?></h3>
                    <ul class="breadcrumb top10 bottom10 float-right">
                        <li class="breadcrumb-item hover-light"><a href="<?= site_url('/')?>">Home</a></li>
                        <li class="breadcrumb-item hover-light">My Account</li>
						<li class="breadcrumb-item hover-light"><?= $vSaveCaption?></li>
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
            <div class="col-lg-7 col-md-12 col-sm-12 pr-lg-0 whitebox">
                <div class="widget logincontainer">
                    <h3 class="darkcolor bottom35 text-center text-md-left"><?= $vActionType?> Your Event </h3>
                        <?php echo form_open_multipart($vUrlPost);?>

                        <input type="hidden" name="RunNo" value="<?= $vRunNoEvent?>">
                        <div class="row">

                            <?php if($vRunNoEvent!=""): ?>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group bottom35">
                                    <label>Previous Image:</label>
                                    <input id="AttachmentOld" type="hidden" name="AttachmentOld" value="<?= @$dataEvent->Attachment?>">
                                    <?php  
                                      if(@$dataEvent->Attachment=="" OR @$dataEvent->Attachment=="default.png"){
                                        $imagesrc = base_url()."assets/upload/event/default.png";
                                      } else {
                                        $imagesrc = base_url()."assets/upload/event/".$dataEvent->Attachment;
                                      }
                                    ?>
                                    <img src="<?= $imagesrc?>" class="img-thumbnail form-control" style="height:200px;width: 200px;margin: 20px 0px;">
                                </div>
                            </div>
                            <?php endif;?>

                            <div class="col-md-12 col-sm-12">
                                <div class="form-group bottom35">
                                    <label>Upload Image:</label>
                                    <input class="form-control" <?= $vRequireImg?> type="file" name="Attachment" id="Attachment">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group bottom35">
                                    <label for="registerEmail">Date:</label>
                                    <input class="form-control" type="date" required name="D_ate" id="D_ate" value="<?= @$dataEvent->D_ate?>">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group bottom35">
                                    <label for="registerPass">Event Title:</label>
                                    <input class="form-control" type="text" required name="EventTitle" id="EventTitle" value="<?= @$dataEvent->Title?>">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group bottom35">
                                    <label for="registerPassConfirm">Description:</label>
                                    <textarea class="form-control" required name="EventDescription" id="EventDescription"><?= @$dataEvent->Description?></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <button type="submit" class="button gradient-btn w-100"><?= $vSaveCaption?></button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                </div>
            </div>
            <div class="col-lg-5 d-none d-lg-block pl-lg-0">
                <div class=" image login-image h-100">
                    <img src="<?php echo base_url() ?>assets/images/register-section.jpg" alt="" class="h-100">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Main sign-up section ends 