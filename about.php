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
                        <h2>About NCMEA</h2>
                        <ul class="breadcrumbs">
                            <li><a href="index.php" title="">Home</a></li>
                            <li>About NCMEA</li>
                        </ul>
                    </div><!-- Page Title Wrap -->
                </div>
            </div>
        </section> 
        <section>
            <div class="gap gray-bg2">
                <div class="container">
                    <div class="msn-wrap">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-lg-6">
                                <div class="msn-thmb-wrap">
                                    <a href="" data-fancybox="gallery" title=""><img src="assets/img/quran_candle1.jpg" alt="msn-img1.jpg"></a> 
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-lg-6">
                                <div class="msn-desc">
                                    <h3>About Us</h3>
                                    <p>We strive to create a welcoming and inclusive environment that encourages spiritual growth, education, and empowerment, and to promote the values of compassion, justice, and peace. We aspire to build bridges of understanding and cooperation with our fellow citizens, and to be a source of inspiration and guidance for Muslims and non-Muslims alike. Ultimately, our vision is to create a community that embodies the best of Nigerian and Islamic culture, and that serves as a beacon of hope and goodness in our beloved Edmonton area.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="gap gray-bg2">
                <div class="container">
                    <div class="msn-wrap">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-lg-6">
                                <div class="msn-desc">
                                    <h3>Mission Statement</h3>
                                    <p>To develop and maintain a vibrant, inclusive, and charitable Islamic organization that provides a comprehensive range of religious and social programs to Nigerian Muslim residents of Edmonton and the surrounding regions.</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-lg-6">
                                <div class="msn-thmb-wrap">
                                    <a href="" data-fancybox="gallery" title=""><img src="assets/img/charity.jpg" alt="msn-img1.jpg"></a> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="gap gray-bg2">
                <div class="container">
                    <div class="msn-wrap">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-lg-6">
                                <div class="msn-thmb-wrap">
                                    <a href="" data-fancybox="gallery" title=""><img src="assets/img/family.jpg" alt="msn-img1.jpg"></a> 
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-lg-6">
                                <div class="msn-desc">
                                    <h3>Our Vision</h3>
                                    <p>Our vision as a Nigerian Muslim association in the Edmonton area is to foster a strong and vibrant community of Muslims who are united in faith, committed to the teachings of Islam, and dedicated to making positive contributions to our society.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> 
        <?php include "footer.php"?>    
    </body>
</html>