<!--Page Header-->
<section id="main-banner-page" class="position-relative page-header blog2-header section-nav-smooth parallax">
    <div class="overlay overlay-dark opacity-7 z-index-1"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="page-titles whitecolor text-center padding_top padding_bottom">
                    <h2 class="font-xlight">Exclusive Solutions</h2>
                    <h2 class="font-bold">Priceless Experiences</h2>
                </div>
            </div>
        </div>
        <div class="gradient-bg title-wrap">
            <div class="row">
                <div class="col-lg-12 col-md-12 whitecolor">
                    <h3 class="float-left">Solution Detail</h3>
                    <ul class="breadcrumb top10 bottom10 float-right">
                        <li class="breadcrumb-item hover-light"><a href="<?= site_url('/')?>">Home</a></li>
                        <li class="breadcrumb-item hover-light">Solution</li>
						<li class="breadcrumb-item hover-light">Solution Detail</li>
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
                <div class="widget heading_space wow fadeIn" data-wow-delay="350ms">
					<h4 class="text-capitalize darkcolor bottom20 text-center text-md-left">Recent Post</h4>
					<?php foreach ($recentpost as $val) :?>
					<div class="single_post">
						<?php  
						if($val['Attachment'] == "" OR $val['Attachment']== "default.png"){
							$vUrlImage = "assets/images/blogfull1.jpg";
						} else {
							$vUrlImage = "assets/upload/solution/".$val['Attachment'];
						}
						?>
						<a href="<?php echo site_url('solution/detail_solution/'.$val['RunNo']) ?>" class="post"><img src="<?php echo base_url().$vUrlImage ?>" width="30px" height="50px" alt="post image"></a>
						<div class="text">
							<a href="<?php echo site_url('solution/detail_solution/'.$val['RunNo']) ?>"><?php echo $val['Title']; ?></a>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
				
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
                        if($solutiondetail->Attachment == "" OR $solutiondetail->Attachment== "default.png"){
                            $vUrlImage = "assets/images/blogfull1.jpg";
                        } else {
                            $vUrlImage = "assets/upload/solution/".$solutiondetail->Attachment;
                        }
                        ?>
						<img src="<?php echo base_url().$vUrlImage ?>" width="100%" />
						<br>
					</div>
					<h3 class="darkcolor font-light bottom10 top30"><?php echo $solutiondetail->Title; ?></h3>
                    <ul class="commment">
						<li><i class="fa fa-user"></i> Admin</li>
                    </ul>
					<br>
					<p class="bottom30"><?php echo $solutiondetail->Description; ?></p>
                </div>
				<div class="" align="center">
					<a href="<?= site_url('solution')?>" class="button btnsecondary gradient-btn"> Back to Solution</a>
				</div>	
            </div>
        </div>
    </div>
</section>
<!-- Services us ends -->