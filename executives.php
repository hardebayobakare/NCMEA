<?php
    include "session.php";
    include "header.php";

    require_once './config/db_function.php';

    $db = new DB_Functions();

    $sholars = $db->getScholars();

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
                        <h2>Our Executives</h2>
                        <ul class="breadcrumbs">
                            <li><a href="index" title="">Home</a></li>
                            <li>Our Executives</li>
                        </ul>
                    </div><!-- Page Title Wrap -->
                </div>
            </div>
        </section>
        <section>
            <div class="gap white-layer opc9">
                <div class="fixed-bg ptrn-bg" style="background-image: url(assets/images/pattern-bg.jpg);"></div>
                    <div class="container">
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
                                                        <a href="https://www.twitter.com/<?php echo $scholar["Twitter"]?>" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                                                        <a href="https://www.facebook.com/<?php echo $scholar["Facebook"]?>" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                                                        <a href="https://www.youtube.com/<?php echo $scholar["Youtube"]?>" title="Youtube" target="_blank"><i class="fa fa-youtube"></i></a>
                                                        <a href="https://www.instagram.com/<?php echo $scholar["Instagram"]?>" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a>
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
            <?php include "footer.php"?>    
    </body>
</html>