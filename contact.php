<?php

    include "session.php";
    include "header.php";

    require_once './config/db_function.php';

    $db = new DB_Functions();
?>

<!DOCTYPE html>
<html lang="en">
    <body>
        <?php include "dashboard_header.php"?>
        <section>
            <div class="gap remove-bottom black-layer2 opc85">
            <div class="fixed-bg" style="background-image: url(assets/img/resources/slider1.jpg);"></div>
                <div class="container">
                    <div class="page-title-wrap">
                    <h1><img src="assets/img/resources/ayat-txt.png" alt="page-title-ayat.png"></h1>
                        <h2>Conatct</h2>
                        <ul class="breadcrumbs">
                            <li><a href="index.php" title="">Home</a></li>
                            <li>Conatct</li>
                        </ul>
                    </div><!-- Page Title Wrap -->
                </div>
            </div>
        </section>
        <section>
            <div class="gap">
                <div class="container">
                    <div class="sec-title text-center">
                        <div class="sec-title-inner">
                            <span>Get information</span>
                            <h3>Contact information</h3>
                        </div>
                    </div>
                    <div class="contact-info-wrap text-center remove-ext3">
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-lg-4">
                                <div class="contact-info-box">
                                    <i class="flaticon-location-pin"></i>
                                    <strong>Our Location</strong>
                                    <span>1949 Lakewood Rd. South NW, T6K3W9, Edmonton, AB</span>
                                    <!-- <a href="#" title="">info@example.com</a> -->
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-lg-4">
                                <div class="contact-info-box">
                                    <i class="flaticon-call"></i>
                                    <strong>Contact us Anytime</strong>
                                    <span>Mobile: +1 (780) 782-7295</span>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-lg-4">
                                <div class="contact-info-box">
                                    <i class="flaticon-email"></i>
                                    <strong>Write Some Words</strong>
                                    <a href="#" title="">ncmedmonton@gmail.com</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- Contact Info Wrap -->
                </div>
            </div>
        </section>
        <section>
            <div class="gap">
                <div class="container">
                    <div class="sec-title text-center">
                        <div class="sec-title-inner">
                            <span>Have Question</span>
                            <h3>Send Message</h3>
                        </div>
                    </div>
                    <div class="contact-form text-center">
                        <form>
                            <div class="row mrg20">
                                <div class="col-md-6 col-sm-6 col-lg-6">
                                    <input type="text" placeholder="Name">
                                </div>
                                <div class="col-md-6 col-sm-6 col-lg-6">
                                    <input type="text" placeholder="Phone">
                                </div>
                                <div class="col-md-6 col-sm-6 col-lg-6">
                                    <input type="email" placeholder="Email">
                                </div>
                                <div class="col-md-6 col-sm-6 col-lg-6">
                                    <input type="text" placeholder="Subject">
                                </div>
                                <div class="col-md-12 col-sm-12 col-lg-12">
                                    <textarea placeholder="Message"></textarea>
                                    <button class="thm-btn brd-rd40" type="submit">Contact Us</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <?php include "footer.php"?>
    </body>

</html>