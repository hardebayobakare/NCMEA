<?php

    include "session.php";
    include "header.php";

    require_once './config/db_function.php';

    $db = new DB_Functions();

    $upcomingEvents = $db->getUpcomingEvents();
    $pastEvents = $db->getPastEvents();

?>


<!DOCTYPE html>
<html lang="en">
    <body>
        <main>
            <?php include "dashboard_header.php"?>           

            <section>
                <div class="gap remove-bottom black-layer2 opc85">
                    <div class="fixed-bg" style="background-image: url(assets/img/resources/slider1.jpg);"></div>
                    <div class="container">
                        <div class="page-title-wrap">
                            <h1><img src="assets/img/resources/ayat-txt.png" alt="page-title-ayat.png"></h1>
                            <h2>Event</h2>
                            <ul class="breadcrumbs">
                                <li><a href="index" title="">Home</a></li>
                                <li>Event</li>
                            </ul>
                        </div><!-- Page Title Wrap -->
                    </div>
                </div>
            </section>
            <section>
                <div class="gap">
                <div class="container">
                    <h2>Upcoming Events</h2><br>
                    <div class="event-wrap">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="remove-ext3">
                                    <div class="row">
                                        <?php if ($upcomingEvents != null) {
                                            foreach ($upcomingEvents as $upcomingEvent) { ?>
                                                <div class="col-md-4 col-sm-6 col-lg-4">
                                                    <div class="event-box2">
                                                        <div class="event-thumb">
                                                            <a><img src="<?php echo "admin/assets/img/events/".$upcomingEvent['Event_Image']?>" alt="event-img2-1.jpg"></a>
                                                        </div>
                                                        <div class="event-info">
                                                            <h4><?php echo $upcomingEvent['Event_Title']?></h4>
                                                            <p><?php echo $upcomingEvent['Event_Content']?></p>
                                                            <ul class="event-mta">
                                                                <li><i class="fa fa-map-marker"></i><?php echo $upcomingEvent['Event_Location']?></li>
                                                                <?php $datetime = new DateTime($upcomingEvent['Event_Time']);?>
                                                                <li><i class="flaticon-clock"></i><?php echo $upcomingEvent['Event_Date'] ." ". $datetime->format('l') . ', '. $datetime->format('h:i A')?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } }else { ?>
                                                <div class="col-md-6 col-sm-6 col-lg-6">
                                                    <div class="evnt-box">
                                                        <div class="evnt-info">
                                                            <h4><a href="#" title="">No Upcoming events</a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- Event Wrap -->
                    </div>
                </div>
            </section>
            <section>
                <div class="gap">
                <div class="container">
                    <h2>Past Events</h2><br>
                    <div class="event-wrap">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="remove-ext3">
                                    <div class="row">
                                        <?php if ($pastEvents != null) {
                                            foreach ($pastEvents as $pastEvent) { ?>
                                                <div class="col-md-4 col-sm-6 col-lg-4">
                                                    <div class="event-box2">
                                                        <?php if($pastEvent["Event_Video"] != null) {?>
                                                            <div class="event-thumb">
                                                                <a><video width="370" height="220" controls>
                                                                    <source src="<?php echo "admin/assets/video/events/".$pastEvent['Event_Video']?>" type = "video/mp4"></video>
                                                                </a>
                                                            </div>
                                                        <?php } else {?>
                                                            <div class="event-thumb">
                                                                <a><img src="<?php echo "admin/assets/img/events/".$pastEvent['Event_Image']?>" alt="event-img2-1.jpg"></a>
                                                            </div>
                                                        <?php }?>
                                                        <div class="event-info">
                                                            <h4><?php echo $pastEvent['Event_Title']?></h4>
                                                            <p><?php echo $pastEvent['Event_Content']?></p>
                                                            <ul class="event-mta">
                                                                <li><i class="fa fa-map-marker"></i><?php echo $pastEvent['Event_Location']?></li>
                                                                <?php $datetime = new DateTime($pastEvent['Event_Time']);?>
                                                                <li><i class="flaticon-clock"></i><?php echo $pastEvent['Event_Date'] ." ". $datetime->format('l') . ', '. $datetime->format('h:i A')?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } }else { ?>
                                                <div class="col-md-6 col-sm-6 col-lg-6">
                                                    <div class="evnt-box">
                                                        <div class="evnt-info">
                                                            <h4><a href="#" title="">No Past events</a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- Event Wrap -->
                    </div>
                </div>
            </section>



            <?php include "footer.php"?>                                        
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