<?php
    include "session.php";
    include "header.php";

    require_once './config/db_function.php';

    $db = new DB_Functions();

    $upcomingEvents = $db->getUpcomingEventsVolunteer();
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
                        <h2>Volunteers</h2>
                        <ul class="breadcrumbs">
                            <li><a href="index" title="">Home</a></li>
                            <li>Volunteers</li>
                        </ul>
                    </div><!-- Page Title Wrap -->
                </div>
            </div>
        </section>
        <section>
            <div class="gap">
                <div class="container">
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
                                                        <div class="">
                                                            <!-- <a class="secndry-btn brd-rd40 volunteer-btn" data-bs-toggle="modal" data-bs-target="#addVolunteer" href="#" title="">Volunteer</a> -->
                                                            <button type="button" class="secndry-btn brd-rd40 volunteer-btn" id=<?php echo $upcomingEvent['Event_ID']?>>Volunteer</button>
                                                        </div>
                                                        <br>
                                                    </div>
                                                </div>
                                            <?php } }else { ?>
                                                <div class="col-md-6 col-sm-6 col-lg-6">
                                                    <div class="evnt-box">
                                                        <div class="evnt-info">
                                                            <h4><a title="">We are not accepting volunteers for any event at the moment...</a></h4>
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
        <!-- Add Volunteer Modal  -->
        <div class="modal fade modal-add-volunteer" id="addVolunteer" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                <div class="gap">
                    <div class="container">
                        <div class="cnt-frm cmt-frm">
                            <h3>Register as a Volunteer</h3>
                            <form id="reg-volunteer-form">
                                <div class="row mrg20">
                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                        <input type="text" placeholder="Name" name="name" required>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                        <input type="email" placeholder="Email" name="email" required>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                        <input type="text" placeholder="Phone Number" name="phone" required>
                                    </div>
                                    <input type="hidden" name="add_volunteer" value="1">
                                    <input type="hidden" name="id">
                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                        <button type="button" class="thm-btn brd-rd40 regiter-volunteer">REGISTER</button>
                                        <button type="button" class="thm-btn brd-rd40" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>

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
        <script src="assets/js/volunteer.js"></script>
    </body>
</html>