<?php 
    include "session.php";
    include "header.php";

    require_once './config/db_function.php';

    $db = new DB_Functions();

    $sliders = $db->getSliders();
    $sholars = $db->getScholars();
    $upcomingevents = $db->getUpcomingEvents();
?>
<?php ?>
<!DOCTYPE html>
<html lang="en">
    <body>
        <main>
            <div class="pageloader-wrap">
                <div class="loader">
                    <div class="loader__bar"></div>
                    <div class="loader__bar"></div>
                    <div class="loader__bar"></div>
                    <div class="loader__bar"></div>
                    <div class="loader__bar"></div>
                    <div class="loader__ball"></div>
                </div>
            </div><!-- Pageloader Wrap -->
            <!-- Side Panel -->
            <!-- <div class="sidepanel">
                <span><i class="fa fa-cog fa-spin"></i></span>
                <div class="color-picker">
                    <h3>Choose Your Color</h3>
                    <a class="color applied" onclick="setActiveStyleSheet('color'); return false;"></a>
                    <a class="color2" onclick="setActiveStyleSheet('color2'); return false;"></a>
                    <a class="color3" onclick="setActiveStyleSheet('color3'); return false;"></a>
                    <a class="color4" onclick="setActiveStyleSheet('color4'); return false;"></a>
                </div>
            </div> -->
            <!-- Header -->
            <?php include "dashboard_header.php"?>           
            <section>
                <div class="gap no-gap owl-yellow">
                    <div class="featured-area-wrap text-center">
                        <div class="featured-area owl-carousel">
                            <?php if($sliders != null){
                                foreach ($sliders as $slider){?>
                                    <div class="featured-item" style="background-image: url(<?php echo "assets/img/resources/".$slider['Image']?>);">
                                        <div class="featured-cap">
                                            <img src="assets/img/resources/bsml-txt.png" alt="bsml-txt.png">
                                            <h1><img src="assets/img/resources/ayat-txt.png" alt="ayat-txt-color.png"></h1>
                                            <h3>He raised the sky and set up the balance</h3>
                                            <span>"Surah Al-Rahmaan Vesre 7"</span>
                                        </div>
                                    </div>
                                <?php }
                            }else{?>
                                <div class="featured-item" style="background-image: url(assets/img/resources/slide1.jpg);">
                                    <div class="featured-cap">
                                        <img src="assets/img/resources/bsml-txt.png" alt="bsml-txt.png">
                                        <h1><img src="assets/img/resources/ayat-txt.png" alt="ayat-txt-color.png"></h1>
                                        <h3>He raised the sky and set up the balance</h3>
                                        <span>"Surah Al-Rahmaan Vesre 7"</span>
                                        
                                    </div>
                                </div>
                            <?php }?> 
                            
                        </div>
                    </div><!-- Featured Area Wrap -->
                </div>
            </section>
            <section>
                <div class="gap white-grad-layer">
                    <div class="fixed-bg" style="background-image: url(assets/images/parallax1.jpg);"></div>
                    <div class="container">
                        <div class="abot-wrap">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-lg-6">
                                    <div class="abot-sec">
                                        <div class="sec-title">
                                            <div class="sec-title-inner">
                                                <span>About</span>
                                                <h3>Our Center</h3>
                                            </div>
                                        </div>
                                        <p>Established in 1987 to serve people who are in need of funds or education. We are developing dolor sit amet. Click edit button to change this text. I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus,Consectetur adipiscing elit. </p>
                                        <a class="secndry-btn brd-rd40" href="#" title="">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- About Wrap -->
                    </div>
                </div>
            </section>
            <section>
                <div class="gap">
                    <div class="fixed-bg" style="background-image: url(assets/images/parallax2.jpg);"></div>
                    <div class="container">
                        <div class="sec-title text-center">
                            <div class="sec-title-inner">
                                <span>Serving Humanity</span>
                                <h3>Our Services</h3>
                            </div>
                        </div>
                        <div class="serv-wrap">
                            <div class="row">
                                <div class="col-md-4 col-sm-12 col-lg-4">
                                    <div class="srv-tl">
                                        <h2>We're on a <span>Mission</span> to</h2>
                                        <h5>solve the problems and gain resources for a new generation.</h5>
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-12 col-lg-8">
                                    <div class="remove-ext9">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="serv-box">
                                                    <i class="flaticon-quran-rehal"></i>
                                                    <div class="serv-info">
                                                        <h4>Quran Learning</h4>
                                                        <p>Quran Teaching</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="serv-box">
                                                    <i class="flaticon-heart-1"></i>
                                                    <div class="serv-info">
                                                        <h4>Chartiy Service</h4>
                                                        <p>Charity Events </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="serv-box">
                                                    <i class="flaticon-mosque"></i>
                                                    <div class="serv-info">
                                                        <h4>Mosque Development</h4>
                                                        <p>Mosque Renovation </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="serv-box">
                                                    <i class="flaticon-social-care"></i>
                                                    <div class="serv-info">
                                                        <h4>Help Poor's</h4>
                                                        <p>Help Your fellows</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- Serv Wrap -->
                    </div>
                </div>
            </section>            
            <section>
                <div class="gap black-layer2 opc8 style-4-donate">
                    <div class="fixed-bg" style="background-image: url(assets/images/parallax3.jpg);"></div>
                    <div class="container">
                        <div class="sec-title2 text-center">
                            <div class="sec-title-inner">
                                <span>Support us,</span>
                                <h3>We need your help.</h3>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore. Duis aute irure dolor in reprehenit in voluptate.</p>
                        </div>
                        <div class="suprt-prgrs style2 text-center">
                            <div class="suprt-prg" id="suprt-prg1"></div>
                            <div class="suprt-prg" id="suprt-prg2"></div>
                            <div class="suprt-prg" id="suprt-prg3"></div>
                        </div>
                        <div class="view-all text-center">
                            <a class="thm-btn brd-rd40" href="#" title="">Donate Now</a>
                        </div><!-- View All -->
                    </div>
                </div>
            </section>       
            <section>
                <div class="gap white-layer opc9">
                    <div class="fixed-bg ptrn-bg" style="background-image: url(assets/images/pattern-bg.jpg);"></div>
                    <div class="container">
                        <div class="sec-title text-center">
                            <div class="sec-title-inner">
                                <span>Our Expert</span>
                                <h3>Islamic Scholars</h3>
                            </div>
                            <p>Experts in the field amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                        <div class="team-wrap text-center remove-ext5">
                            <div class="row">
                                <?php if($sholars != null){
                                    foreach($sholars as $scholar){?>
                                        <div class="col-md-4 col-sm-6 col-lg-4">
                                            <div class="team-box">
                                                <img src="<?php echo "admin/assets/img/scholars/".$scholar["Scholar_Image"]?>" alt="team-img1-1.jpg">
                                                <div class="team-info">
                                                    <h4><?php echo $scholar["Scholar_Name"]?></h4>
                                                    <p><?php echo $scholar["Scholar_Description"]?></p>
                                                    <div class="team-scl">
                                                        <a href="<?php echo $scholar["Twitter"]?>" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                                                        <a href="<?php echo $scholar["Scholar_Email"]?>" title="Google Plus" target="_blank"><i class="fa fa-google-plus"></i></a>
                                                        <a href="<?php echo $scholar["Facebook"]?>" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                                                        <a href="<?php echo $scholar["Youtube"]?>" title="Youtube" target="_blank"><i class="fa fa-youtube"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                } else {?>
                                        <div class="col-md-6 col-sm-6 col-lg-6">
                                            <div class="evnt-box">
                                                <div class="evnt-info">
                                                    <h4><a href="#" title="">No Scholars Available</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- <div class="col-md-4 col-sm-6 col-lg-4">
                                        <div class="team-box">
                                            <img src="assets/img/resources/team-img1-1.jpg" alt="team-img1-2.jpg">
                                            <div class="team-info">
                                                <h4>Umair</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
                                                <div class="team-scl">
                                                    <a href="#" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                                                    <a href="#" title="Pinterest" target="_blank"><i class="fa fa-youtube"></i></a>
                                                    <a href="#" title="Google Plus" target="_blank"><i class="fa fa-google-plus"></i></a>
                                                    <a href="#" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-lg-4">
                                        <div class="team-box">
                                            <img src="assets/img/resources/team-img1-1.jpg" alt="team-img1-3.jpg">
                                            <div class="team-info">
                                                <h4>Fatima</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
                                                <div class="team-scl">
                                                    <a href="#" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                                                    <a href="#" title="YouTube" target="_blank"><i class="fa fa-youtube"></i></a>
                                                    <a href="#" title="Google Plus" target="_blank"><i class="fa fa-google-plus"></i></a>
                                                    <a href="#" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                <?php } ?>
                            </div>
                        </div><!-- Team Wrap -->
                    </div>
                </div>
            </section>
            <section>
                <div class="gap gray-layer opc95">
                    <div class="fixed-bg" style="background-image: url(assets/images/parallax4.jpg);"></div>
                    <div class="container">
                        <div class="evnt-pry-wrap">
                            <div class="row">
                                <div class="col-md-8 col-sm-12 col-lg-8">
                                    <div class="sec-title">
                                        <div class="sec-title-inner">
                                            <h3><span>Upcoming</span> Events</h3>
                                        </div>
                                        <p>There are many variations of events coming up.</p>
                                    </div>
                                    <div class="evnt-wrap remove-ext5">
                                        <div class="row mrg20">
                                            <?php if ($upcomingevents != null){
                                                foreach ($upcomingevents as $event){?>
                                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                                        <div class="evnt-box">
                                                            <div class="evnt-thmb">
                                                                <a href="#" title=""><img src="<?php echo "admin/assets/img/events/".$event['Event_Image']?>" alt="evnt-img1.jpg"></a>
                                                            </div>
                                                            <div class="evnt-info">
                                                                <h4><a href="#" title=""><?php echo $event['Event_Title']?></a></h4>
                                                                <ul class="pst-mta">
                                                                    <li class="thm-clr"><?php echo $event['Event_Date']?></li>
                                                                    <li>12:00 AM to 02:00 PM</li>
                                                                </ul>
                                                                <p><?php echo $event['Event_Location']?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php }
                                            } else { ?>
                                                <div class="col-md-6 col-sm-6 col-lg-6">
                                                    <div class="evnt-box">
                                                        <div class="evnt-info">
                                                            <h4><a href="#" title="">No Upcoming Events</a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php }?>
                                        </div>
                                    </div><!-- Events Wrap -->
                                </div>
                                <div class="col-md-4 col-sm-12 col-lg-4">
                                    <div class="sec-title">
                                        <div class="sec-title-inner">
                                            <h3>Prayer <span>Times</span></h3>
                                        </div>
                                    </div>
                                    <ul class="prayer-times">
                                        <li class="pry-tim-hed"><span>Salat</span><span>Start</span><span>Iqamah</span></li>
                                        <li><span class="thm-clr">Fajar</span><span>03:58 am</span><span>04:45 am</span></li>
                                        <li><span class="thm-clr">Sunrise</span><span>05:31 am</span><span>05:31 am</span></li>
                                        <li><span class="thm-clr">Zuhr</span><span>12:47 pm</span><span>12:47 pm</span></li>
                                        <li><span class="thm-clr">Asr</span><span>05:53 pm</span><span>05:50 pm</span></li>
                                        <li><span class="thm-clr">Maghrib</span><span>08:04 pm</span><span>08:04 pm</span></li>
                                        <li><span class="thm-clr">Isha</span><span>09:37 pm</span><span>09:30 pm</span></li>
                                        <li><span class="thm-clr">Jumu'ah 1</span><span>01:15 pm</span><span>01:15 pm</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- Events & Prayer Wrap -->
                    </div>
                </div>
            </section>
            <section>
                <div class="gap white-layer opc9">
                    <div class="fixed-bg ptrn-bg" style="background-image: url(assets/images/pattern-bg.jpg);"></div>
                    <div class="container">
                        <div class="sec-title text-center">
                            <div class="sec-title-inner">
                                <span>What Our</span>
                                <h3>Donator Say</h3>
                            </div>
                        </div>
                        <div class="testi-wrap text-center">
                            <div class="testi-car owl-carousel">
                                <div class="testi-itm">
                                    <i><img src="assets/images/resources/testi-img1.jpg" alt="testi-img1.jpg"></i>
                                    <div class="testi-info">
                                        <h4>Abu Hassam Adam</h4>
                                        <p><i>"</i>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<i>"</i></p>
                                    </div>
                                </div>
                                <div class="testi-itm">
                                    <i><img src="assets/images/resources/testi-img2.jpg" alt="testi-img2.jpg"></i>
                                    <div class="testi-info">
                                        <h4>Abu Adam Hassam</h4>
                                        <p><i>"</i>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<i>"</i></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="gap thm-layer opc9">
                    <div class="fixed-bg" style="background-image: url(assets/images/parallax7.jpg);"></div>
                    <div class="container">
                        <div class="nwsltr-wrp text-center">
                            <div class="nwsltr-innr">
                                <div class="nwsltr-title">
                                    <h3>Newsletter</h3>
                                    <span>Subscribe to our mailing list</span>
                                </div>
                                <form>
                                    <input type="email" placeholder="Enter your email">
                                    <button type="submit">Sign up</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <footer>
                <div class="gap top-spac70 drk-bg2 remove-bottom">
                    <div class="container">
                        <div class="footer-data">
                            <div class="row">
                                <div class="col-md-4 col-sm-12 col-lg-4">
                                    <div class="wdgt-box">
                                        <div class="logo"><a href="index.html" title="Logo"><img src="assets/img/logo3.png" alt="logo2.png"></a></div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-12 col-lg-8">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 col-lg-4">
                                            <div class="wdgt-box">
                                                <h4>Quick Links</h4>
                                                <ul>
                                                    <li><a href="#" title="">About Us</a></li>
                                                    <li><a href="#" title="">Product Category</a></li>
                                                    <li><a href="#" title="">Our Products</a></li>
                                                    <li><a href="#" title="">How we do it</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-lg-4">
                                            <div class="wdgt-box">
                                                <h4>Useful Links</h4>
                                                <ul>
                                                    <li><a href="#" title="">Contact Us</a></li>
                                                    <li><a href="#" title="">Terms & Conditions</a></li>
                                                    <li><a href="#" title="">Privacy Policy</a></li>
                                                    <li><a href="#" title="">Cookies Policy</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-lg-4">
                                            <div class="wdgt-box">
                                                <h4>Contact Us</h4>
                                                <ul class="cont-lst">
                                                    <li><i class="flaticon-location-pin"></i>Lorem Ipsum labore et dolore magnam. SWIP 3HZ</li>
                                                    <li><i class="flaticon-call"></i>+22 33 4455 6677</li>
                                                    <li><i class="flaticon-email"></i><a href="#" title="">ilamic@dummy.com</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- Footer Data -->
                        <div class="bottom-bar">
                            <p>&copy; Copyright 2020. All Rights Reserved.</p>
                            <div class="scl">
                                <a href="#" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                                <a href="#" title="Pinterest" target="_blank"><i class="fa fa-pinterest-p"></i></a>
                                <a href="#" title="Google Plus" target="_blank"><i class="fa fa-google-plus"></i></a>
                                <a href="#" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                            </div>
                        </div><!-- Bottom Bar -->
                    </div>
                </div>
            </footer>
        </main><!-- Main Wrapper -->

        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/downCount.js"></script>
        <script src="assets/js/fancybox.min.js"></script>
        <script src="assets/js/isotope.pkgd.min.js"></script>
        <script src="assets/js/perfectscrollbar.min.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/jquery.circliful.min.js"></script>
        <script src="assets/js/custom-scripts.js"></script>
        <script src="assets/js/ncmea.js"></script>
    </body>
</html>