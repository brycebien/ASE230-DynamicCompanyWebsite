<?php
require_once('./theme/functions.php');
require_once('./lib/readJSON.php');
require_once('./lib/readCSV.php');

require_once('./admin/awards/awards.php');


?>
<!DOCTYPE html>
<html lang="en">
    <?php
    require_once('data/header.html');
    ?>
        <!-- Hero Start -->
        <section class="hero-3 bg-center position-relative" style="background-image: url(images/hero-3-bg.png);" id="home">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="text-center">
                            <span class="badge badge-soft-primary mb-4">Professional Landing</span>
                            <?=loadPage('overview','About Us');
                            loadPage('missionstatement','Mission Statement');?>
                            <!-- Modal -->
                            <div class="modal fade bd-example-modal-lg" id="watchvideomodal" data-keyboard="false" tabindex="-1"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg">
                                    <div class="modal-content hero-modal-0 bg-transparent">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        <video id="VisaChipCardVideo" class="w-100" controls="">
                                            <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                                            <!--Browser does not support <video> tag -->
                                        </video>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div>
        </section>
        <!-- Hero End -->

        <!-- Services start -->
        <section class="section" id="services">
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-7 text-center">
                        <h2 class="fw-bold">Products & Services</h2>
                    </div>
                </div>
                <!-- end row -->
                <div class="row">

                    <?php
                    foreach(readJSON('./data/products.json') as $product){?>
                        <div class="col-lg-4">
                        <div class="service-box text-center px-4 py-5 position-relative mb-4">
                            <div class="service-box-content p-4">
                                <div class="icon-mono service-icon avatar-md mx-auto mb-4">
                                    <i class="" data-feather="box"></i>
                                </div>
                                <h4 class="mb-3 font-size-22"><?=$product['name']?></h4>
                                <p class="text-muted mb-0"><?=$product['description']?></p>
                                <h4 class="mb-3 font-size-22">Applications:</h4>
                                <?php for($i=0;$i<count($product['applications']);$i++){?>
                                    <p class="text-muted mb-0"><?=
                                        $product['applications'][$i];
                                    ?>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    }?>
                    
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->

        </section>
        <!-- Services end -->

        <!-- Features start -->
        <section class="section bg-light" id="features">
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-7 text-center">
                        <h2 class="fw-bold">Awards</h2>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
                <?php
                $awardData=readCSV('data/awards.csv');
                $awardsManager = new AwardsManager();
                for($i=0; $i<count($awardData);$i++){
                    $year = $awardData[$i]['year'];
                    $title = $awardData[$i]['award'];
                    $awardsManager->addAward(new Award($year, $title));
                }
                $newAward = new Award('testyear', 'testtitle');
                $awardsManager->addAward($newAward);
                $awards = $awardsManager->getAwards();

                foreach ($awards as $award) {
                    $award->display();
                }
                ?>
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
        <!-- Features end -->
        <!-- Team start -->
        <section class="section bg-light" id="team">
            <div class="container">
                <div class="row justify-content-center mb-4">
                    <div class="col-lg-7 text-center">
                        <h2 class="fw-bold">Our Team Members</h2>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
                <div class="row">
                    <?php
                    $employee=readCSV('data/team.csv');
                    for($i=0;$i<count($employee);$i++){
                    ?>
                    <div class="col-lg-3 col-sm-6">
                        <div class="team-box mt-4 position-relative overflow-hidden rounded text-center shadow">
                            <div class="position-relative overflow-hidden">
                                <img src="images/team/<?=$i+1?>.jpg" alt="" class="img-fluid d-block mx-auto" />
                                <ul class="list-inline p-3 mb-0 team-social-item">
                                    <li class="list-inline-item mx-3">
                                        <a href="javascript: void(0);" class="team-social-icon h-primary"><i class="icon-sm" data-feather="facebook"></i></a>
                                    </li>
                                    <li class="list-inline-item mx-3">
                                        <a href="javascript: void(0);" class="team-social-icon h-info"><i class="icon-sm" data-feather="twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item mx-3">
                                        <a href="javascript: void(0);" class="team-social-icon h-danger"><i class="icon-sm" data-feather="instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="p-4">
                                <h5 class="font-size-19 mb-1"><?=$employee[$i]['name']?></h5>
                                <p class="text-muted text-uppercase font-size-14 mb-0"><?=$employee[$i]['title']?></p>
                                <p class="text-muted text-uppercase font-size-14 mb-0"><?=$employee[$i]['description']?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                    <!-- end col -->

                    
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
        <!-- Team end -->
        <!-- Contact us start -->
        <section class="section" id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h2 class="fw-bold mb-4">Get in Touch</h2>
                        <p class="text-muted mb-5">Et harum quidem rerum facilis est expedita distinctio temporecum soluta nobis est eligendi optio cumque nihil impedit quo minus maxime.</p>
                       
                        <div>
                            <form method="post" name="myForm" onsubmit="return validateForm()">
                                <p id="error-msg"></p>
                                <div id="simple-msg"></div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-4">
                                            <label for="name" class="text-muted form-label">Name</label>
                                            <input name="name" id="name" type="text" class="form-control" placeholder="Enter name*" >
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-lg-6">
                                        <div class="mb-4">
                                            <label for="email" class="text-muted form-label">Email</label>
                                            <input name="email" id="email" type="email" class="form-control" placeholder="Enter email*">
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label for="subject" class="text-muted form-label">Subject</label>
                                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject.." />
                                        </div>
    
                                        <div class="mb-4 pb-2">
                                            <label for="comments" class="text-muted form-label">Message</label>
                                            <textarea name="comments" id="comments" rows="4" class="form-control" placeholder="Enter message..."></textarea>
                                        </div>
    
                                        <button type="submit" id="submit" name="send" class="btn btn-primary">Send Message</button>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- end row -->
                            </form>
                            <!-- end form -->
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col-lg-5 ms-lg-auto">
                        <div class="mt-5 mt-lg-0">
                            <img src="images/contact.png" alt="" class="img-fluid d-block" />
                            <p class="text-muted mt-5 mb-3"><i class="me-2 text-muted icon icon-xs" data-feather="mail"></i> Support@info.com</p>
                            <p class="text-muted mb-3"><i class="me-2 text-muted icon icon-xs" data-feather="phone"></i> +91 123 4556 789</p>
                            <p class="text-muted mb-3"><i class="me-2 text-muted icon icon-xs" data-feather="map-pin"></i> 2976 Edwards Street Rocky Mount, NC 27804</p>
                            <ul class="list-inline pt-4">
                                <li class="list-inline-item me-3">
                                    <a href="javascript: void(0);" class="social-icon icon-mono avatar-xs rounded-circle"><i class="icon-xs" data-feather="facebook"></i></a>
                                </li>
                                <li class="list-inline-item me-3">
                                    <a href="javascript: void(0);" class="social-icon icon-mono avatar-xs rounded-circle"><i class="icon-xs" data-feather="twitter"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-icon icon-mono avatar-xs rounded-circle"><i class="icon-xs" data-feather="instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
        <!-- Contact us end -->
        <?php
        require_once('data/footer.html');
        ?>
        <!-- javascript -->
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/smooth-scroll.polyfills.min.js"></script>

        <script src="https://unpkg.com/feather-icons"></script>

        <!-- App Js -->
        <script src="js/app.js"></script>
    </body>
</html>
