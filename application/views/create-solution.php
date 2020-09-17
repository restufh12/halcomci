<?php  
$vRunNoSolution = @$RunNoSolution;
$vUrlPost       = ($vRunNoSolution==""?'solution/validation_save':'solution/validation_update');
$vActionType    = ($vRunNoSolution==""?'Create':'Update');
$vSaveCaption   = ($vRunNoSolution==""?'Create Solution':'Update Solution');
$vRequireImg    = ($vRunNoSolution==""?'required':'');
?>
<!--Page Header-->
<section id="main-banner-page" class="position-relative page-header blog2-header section-nav-smooth parallax">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="page-titles whitecolor text-center padding">
                    <h2 class="font-xlight">Build Your</h2>
                    <h2 class="font-bold">Next Solution Page</h2>
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
        <?php echo form_open_multipart($vUrlPost);?>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 pr-lg-0 whitebox">
                <div class="widget logincontainer">
                    <h3 class="darkcolor bottom35 text-center text-md-left"><?= $vActionType?> Your Solution </h3>

                        <input type="hidden" name="RunNo" value="<?= $vRunNoSolution?>">
                        <div class="row">

                            <?php if($vRunNoSolution!=""): ?>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group bottom35">
                                    <label>Previous Image:</label>
                                    <input id="AttachmentOld" type="hidden" name="AttachmentOld" value="<?= @$dataSolution->Attachment?>">
                                    <?php  
                                      if(@$dataSolution->Attachment=="" OR @$dataSolution->Attachment=="default.png"){
                                        $imagesrc = base_url()."assets/upload/solution/default.png";
                                      } else {
                                        $imagesrc = base_url()."assets/upload/solution/".$dataSolution->Attachment;
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
                                    <label for="registerPass">Solution Title:</label>
                                    <input class="form-control" type="text" required name="SolutionTitle" id="SolutionTitle" value="<?= @$dataSolution->Title?>">
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block pl-lg-0">
                <div class=" image login-image" style="height: 85% !important;">
                    <img src="<?php echo base_url() ?>assets/images/register-section.jpg" alt="" class="h-100">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 pr-lg-0 whitebox">
                <div class="widget logincontainer">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group bottom35">
                            <label for="registerPassConfirm">Description:</label>
                            <textarea class="form-control" name="SolutionDescription" id="SolutionDescription"><?= @$dataSolution->Description?></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <button type="submit" class="button gradient-btn w-100"><?= $vSaveCaption?></button>
                    </div>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</section>
<!-- Main sign-up section ends 