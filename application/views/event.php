<section id="main-banner-page" class="position-relative page-header blog2-header parallax section-nav-smooth">
    <div class="overlay overlay-dark opacity-7 z-index-1"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="page-titles whitecolor text-center padding_top padding_bottom">
                    <h2 class="font-xlight">Build Your</h2>
                    <h2 class="font-bold">Next Event Page</h2>
                </div>
            </div>
        </div>
        <div class="gradient-bg title-wrap">
            <div class="row">
                <div class="col-lg-12 col-md-12 whitecolor">
                    <h3 class="float-left">Event</h3>
                    <ul class="breadcrumb top10 bottom10 float-right">
                        <li class="breadcrumb-item hover-light"><a href="<?= site_url('/')?>">Home</a></li>
                        <li class="breadcrumb-item hover-light">Event</li>
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
                            $vUrlImage = "assets/upload/event/".$row->Attachment;
                        }
                        ?>
                        <div class="image" style="height: 325px;"><img src="<?php echo base_url().$vUrlImage ?>" alt="blog" class="border_radius"></div>
                        <h3 class="darkcolor font-light bottom10 top30"> <a href="<?php echo site_url('event/detail_event/'.$row->RunNo) ?>"><?php echo $row->Title; ?></a></h3>
                        <ul class="commment">
                            <li><i class="fas fa-calendar"></i> <?php echo date('d/m/Y', strtotime($row->D_ate)); ?></li>
                        </ul>
                        <p class="top15"><?= strlen($row->Description) > 130 ? substr($row->Description,0,130)."..." : $row->Description;?></p>
                        <a class=" button btn-primary" href="<?php echo site_url('event/detail_event/'.$row->RunNo) ?>">Read More</a>

                        <?php if($this->session->userdata('LoginYN')=="1" AND $this->session->userdata('LoginLevel')=="Admin"): ?>
                        <a class=" button btn-warning" href="<?php echo site_url('event/update_event/'.$row->RunNo) ?>">Update</a>
                        <button type="button" class=" button btn-danger" onclick="fnDeleteEvent('<?= $row->RunNo?>')">Delete</button>
                        <?php endif; ?>
                    </article>

                <?php endforeach; ?>
                
                <ul class="pagination padding-bottom bottom40 justify-content-center justify-content-md-start top40">
                    <?php echo $pagination; ?>
                </ul>
            </div>

            <div class="col-lg-4">
                <aside class="sidebar padding-bottom">
                    <div class="widget heading_space wow fadeIn text-center text-md-left" data-wow-delay="400ms">
                        <h4 class="text-capitalize darkcolor bottom20">Top Tags</h4>
                        <ul class="webtags">
                            <li><a href="#.">Books</a></li>
                            <li><a href="#.">Midterm test </a></li>
                            <li><a href="#.">Presentation</a></li>
                            <li><a href="#.">Courses</a></li>
                            <li><a href="#.">Certifications</a></li>
                            <li><a href="#.">Teachers</a></li>
                            <li><a href="#.">Student Life</a></li>
                            <li><a href="#.">Study</a></li>
                            <li><a href="#.">Midterm test </a></li>
                            <li><a href="#.">Presentation</a></li>
                            <li><a href="#.">Courses</a></li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
<!--BLOG SECTION END