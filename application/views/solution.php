<section id="main-banner-page" class="position-relative page-header blog2-header parallax section-nav-smooth">
    <div class="overlay overlay-dark opacity-7 z-index-1"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="page-titles whitecolor text-center padding_top padding_bottom">
                    <h2 class="font-xlight">Build Your</h2>
                    <h2 class="font-bold">Next Solution Page</h2>
                </div>
            </div>
        </div>
        <div class="gradient-bg title-wrap">
            <div class="row">
                <div class="col-lg-12 col-md-12 whitecolor">
                    <h3 class="float-left">Solution</h3>
                    <ul class="breadcrumb top10 bottom10 float-right">
                        <li class="breadcrumb-item hover-light"><a href="<?= site_url('/')?>">Home</a></li>
                        <li class="breadcrumb-item hover-light">Solution</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Page Header ends -->
<!-- Our Blogs -->
<!--BLOG SECTION-->
<section id="ourblog" class="bglight padding">
    <div class="container">
        <h2 class="d-none">Blog</h2>
        <div class="row">
            <div class="col-lg-8" id="blog">
                
                

                <?php foreach ($data->result() as $row) :?>
                    <article class="blog-item heading_space wow fadeIn text-center text-md-left" data-wow-delay="300ms">
                        <?php  
                        if($row->Attachment == "" OR $row->Attachment== "default.png"){
                            $vUrlImage = "assets/images/blogfull1.jpg";
                        } else {
                            $vUrlImage = "assets/upload/solution/".$row->Attachment;
                        }
                        ?>
                        <div class="image" style="height: 325px;"><img src="<?php echo base_url().$vUrlImage ?>" alt="blog" class="border_radius"></div>
                        <h3 class="darkcolor font-light bottom10 top30"> <a href="<?php echo site_url('solution/detail_solution/'.$row->RunNo) ?>"><?php echo $row->Title; ?></a></h3>
                        <ul class="commment">
                            <li><i class="fa fa-user"></i> Admin</li>
                        </ul>
                        <p class="top15"><?= strlen(strip_tags($row->Description)) > 130 ? substr(strip_tags($row->Description),0,130)."..." : strip_tags($row->Description);?></p>
                        <a class=" button btn-primary" href="<?php echo site_url('solution/detail_solution/'.$row->RunNo) ?>">Read More</a>

                        <?php if($this->session->userdata('LoginYN')=="1" AND $this->session->userdata('LoginLevel')=="Admin"): ?>
                        <a class=" button btn-warning" href="<?php echo site_url('solution/update_solution/'.$row->RunNo) ?>">Update</a>
                        <button type="button" class=" button btn-danger" onclick="fnDeleteSolution('<?= $row->RunNo?>')">Delete</button>
                        <?php endif; ?>
                    </article>

                <?php endforeach; ?>
                
                <ul class="pagination padding-bottom bottom40 justify-content-center justify-content-md-start top40">
                    <?php echo $pagination; ?>
                </ul>
            </div>

            <div class="col-lg-4">
                <aside class="sidebar padding-bottom">
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
                    
                    <div class="widget heading_space wow fadeIn" data-wow-delay="350ms">
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
                    
                    <div class="widget heading_space wow fadeIn" data-wow-delay="350ms">
                        <h4 class="text-capitalize darkcolor bottom20">Map</h4>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.0828513388533!2d104.03161631427511!3d1.1001449991975258!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d98ecb036804c3%3A0x3ce8c64d1c18113c!2sPT.%20Halcom%20Integrated%20Solution%20-%20IT%20Infrastructure%20Specialist!5e0!3m2!1sid!2sid!4v1599449550895!5m2!1sid!2sid" width="100%" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
<!--BLOG SECTION END