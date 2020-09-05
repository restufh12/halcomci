<!--Page Header-->
<section id="main-banner-page" class="position-relative page-header blog2-header section-nav-smooth parallax">
    <div class="overlay overlay-dark opacity-7 z-index-1"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="page-titles whitecolor text-center padding_top padding_bottom">
                    <h2 class="font-xlight">We Love </h2>
                    <h2 class="font-bold">Walking line In Usable</h2>
                    <h2 class="font-xlight">Products</h2>
                    <h3 class="font-light pt-2">The Best Multipurpose Template in Market</h3>
                </div>
            </div>
        </div>
        <div class="gradient-bg title-wrap">
            <div class="row">
                <div class="col-lg-12 col-md-12 whitecolor">
                    <h3 class="float-left">Event Detail</h3>
                    <ul class="breadcrumb top10 bottom10 float-right">
                        <li class="breadcrumb-item hover-light"><a href="<?= site_url('/')?>">Home</a></li>
                        <li class="breadcrumb-item hover-light">Event</li>
						<li class="breadcrumb-item hover-light">Event Detail</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Page Header ends -->
<!-- Services us -->
<section id="our-services" class="padding bglight">
    <div class="container">
        <div class="row whitebox top15">
            <div class="col-lg-4 col-md-5">
                <div class="widget heading_space text-center text-md-left">
                    <h4 class="text-capitalize darkcolor bottom20">Need Help?</h4>
                    <div class="contact-table colorone d-table bottom15">
                        <div class="d-table-cell cells">
                            <span class="icon-cell"><i class="fas fa-mobile-alt"></i></span>
                        </div>
                        <div class="d-table-cell cells">
                            <p class="bottom0">+62 778-461503</p>
                        </div>
                    </div>
                    <div class="contact-table colorone d-table bottom15 text-left">
                        <div class="d-table-cell cells">
                            <span class="icon-cell"><i class="fas fa-map-marker-alt"></i></span>
                        </div>
                        <div class="d-table-cell cells">
                            <p class="bottom0">The Central Business Sukajadi Blok B2 No 3A Batam Kepulauan Riau 29444, 
                                <span class="d-block">Indonesia</span>
                            </p>
                        </div>
                    </div>
                    <div class="contact-table colorone d-table text-left">
                        <div class="d-table-cell cells">
                            <span class="icon-cell"><i class="far fa-clock"></i></span>
                        </div>
                        <div class="d-table-cell cells">
                            <p class="bottom0">Mon-Fri: 9am-5pm</p>
                        </div>
                    </div>
				</div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="widget heading_space text-center text-md-left">
                    <div class="image" style="height: 325px;">
                        <?php  
                        if($eventdetail->Attachment == "" OR $eventdetail->Attachment== "default.png"){
                            $vUrlImage = "assets/images/blogfull1.jpg";
                        } else {
                            $vUrlImage = "assets/upload/event/".$eventdetail->Attachment;
                        }
                        ?>
						<img src="<?php echo base_url().$vUrlImage ?>" width="100%" />
						<br>
					</div>
					<h3 class="darkcolor font-light bottom10 top30"><?php echo $eventdetail->Title; ?></h3>
                    <ul class="commment">
                        <li><i class="fas fa-calendar"></i> <?php echo date('d/m/Y', strtotime($eventdetail->D_ate)); ?></li>
                    </ul>
					<br>
					<p class="bottom30"><?php echo $eventdetail->Description; ?></p>
                </div>
				<div class="" align="center">
					<a href="<?= site_url('event')?>" class="button btnsecondary gradient-btn"> Back to Event</a>
				</div>	
            </div>
        </div>
    </div>
</section>
<!-- Services us ends -->