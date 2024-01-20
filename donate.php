<?php

    include "session.php";
    include "header.php";

    require_once './config/db_function.php';

    $db = new DB_Functions();

    $donations = $db->getDonations();

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
                        <h2>Donate</h2>
                        <ul class="breadcrumbs">
                            <li><a href="index" title="">Home</a></li>
                            <li>Donate</li>
                        </ul>
                    </div><!-- Page Title Wrap -->
                </div>
            </div>
        </section>
        <section>
            <div class="gap">
                <div class="container">
                    <div class="hstry-wrap">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-lg-6">
                                <div class="hstry-img text-center">
                                    <img src="assets/img/charity1.jpg" alt="hstry-img.png">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-lg-6">
                                <div class="hstry-desc">
                                    <p><h4 class="quran">"The likeness of those who spend their wealth in the path of Allah is as the likeness of a Grain that sprouts seven spikes. In every spike, there is a Hundred Grains. Thus does Allah multiply reward for whomever He so wills. And Allah is All-Encompasing, All-Knowing."</h4> <br> (Surah Al-Baqarah, 2:261)</p>
                                    <!-- <strong>NCMEA <span>#1</span> Nigerian Islamic Center in the <span>Edmonton!</span></strong> -->
                                    <!-- <ul>
                                        <li>Astonisihing Facilities</li>
                                        <li>Helping All Communities</li>
                                        <li>Leads Charity Events</li>
                                        <li>Schooling Children</li>
										<li>Feeding Hungry People</li>
                                        <li>Providing Accomodations</li>
										<li>Funding Poor People</li>
                                        <li>Providing Food & Clothes</li>
                                    </ul> -->
                                </div>
                            </div>
                        </div>
                    </div><!-- History Wrap -->
                </div>
            </div>
        </section>
        <section>
            <div class="gap no-gap">
                <div class="container">
                    <div class="contr-wrap text-center">
                        <div class="contr-inner">
                            <div class="contr-desc contr-inr">
                                <h2>HOW TO CONTRIBUTE</h2>
                                <p class="donate">MAKE MONTHLY CONTRIBUTION TO <br> NIGERIAN CANADIAN MUSLIMS EDMONTON. <br> <strong>ACCT # 8333-5271257 <br> TD CANADA TRUST </strong> <br> AUTOMATIC INTERAC TRANSFER-EMAIL <strong>ncmedmonton@gmail.com</strong></p>
                            </div>
                            <!-- <div class="contr-butn contr-inr">
                                <a class="secndry-btn brd-rd40" href="#" title="">DONATE</a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="gap remove-gap">
                <div class="container">
                    <div class="expns-wrp remove-ext3">
                        <div class="row">
                            <?php if ($donations != null) {
                                foreach ($donations as $donation){?>
                                    <div class="col-md-4 col-sm-6 col-lg-4">
                                        <div class="expns-box">
                                            <img src="assets/img/charity.jpg" alt="expns-img1.jpg">
                                            <div class="expns-info">
                                                <h4><a title=""><?php echo $donation["Donation_Title"]?></a></h4>
                                                <p><?php echo $donation["Donation_Content"]?></p>
                                                <div class="expns-info-innr">
                                                    <span>Funds Neded<i>CA$<?php echo number_format($donation["Funds_Needed"], 2, '.', ','); ?></i></span>
                                                    <div class="expns-prg" id="expns-prg1"></div>
                                                    <?php $req = $donation["Funds_Needed"] - $donation["Funds_Received"]?>
                                                    <span>Still Required<i>CA$<?php echo number_format($req, 2, '.', ','); ?></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }
                            }?>
                            <!-- <div class="col-md-4 col-sm-6 col-lg-4">
                                <div class="expns-box">
                                <img src="assets/img/charity.jpg" alt="expns-img1.jpg">
                                    <div class="expns-info">
                                        <h4><a href="#" title="">New Classes For Students</a></h4>
                                        <p>Classes renovations required your money to complete rooms accomodation.</p>
                                        <div class="expns-info-innr">
                                            <span>Funds Neded<i>7500.00 USD</i></span>
                                            <div class="expns-prg" id="expns-prg2"></div>
                                            <span>Still Required<i>3599.00 USD</i></span>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="col-md-4 col-sm-6 col-lg-4">
                                <div class="expns-box">
                                <img src="assets/img/charity.jpg" alt="expns-img1.jpg">
                                    <div class="expns-info">
                                        <h4><a href="#" title="">Helping Syrian Refugees</a></h4>
                                        <p>Helping Refugees required your money to complete rooms accomodation.</p>
                                        <div class="expns-info-innr">
                                            <span>Funds Neded<i>7500.00 USD</i></span>
                                            <div class="expns-prg" id="expns-prg3"></div>
                                            <span>Still Required<i>3599.00 USD</i></span>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include "footer.php"?> 
    </body>
</html>