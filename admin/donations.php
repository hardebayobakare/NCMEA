<?php
    include "session.php";
    include "header.php";

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<body class="ec-header-fixed ec-sidebar-fixed ec-sidebar-dark ec-header-light" id="body">

<!-- WRAPPER -->
<div class="wrapper">
    
    <!-- LEFT MAIN SIDEBAR -->
    <?php include "sidebar.php"?>

    <!-- PAGE WRAPPER -->
    <div class="ec-page-wrapper">

        <!-- Header -->
        <?php include "dashboard-header.php"?>

        <!-- CONTENT WRAPPER -->
        <div class="ec-content-wrapper ec-vendor-wrapper">
            <div class="content">
                <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                    <div>
                        <h1>Donation</h1>
                        <p class="breadcrumbs"><span><a href="index.php">Home</a></span><span><i class="mdi mdi-chevron-right"></i></span> Webpage Content</p>
                    </div>

                    <div>
							<button type="button" class="btn btn-primary add-modal" data-bs-toggle="modal"
								data-bs-target="#addDonation"> Create New Donation
							</button>
						</div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="ec-vendor-list card card-default">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="donation-list" class="table">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Content</th>
                                                <th>Funds Needed</th>
                                                <th>Funds Received</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
                <!-- View Image MOdal  -->
                <div class="modal fade modal-add-contact" id="viewImage1" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                        <div class="image mb-3">  
                            <img id="modalImage" src="" class="img-fluid rounded-circle"
                                alt="Event Image">
                            </div>   
                        </div>
                    </div>
                </div>
                <!-- View Image MOdal  -->
                <div class="modal fade modal-add-contact" id="viewImage2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                        <div class="image mb-3">  
                            <img id="modalImage" src="" class="img-fluid rounded-circle"
                                alt="Event Image">
                            </div>   
                        </div>
                    </div>
                </div>
                <!-- Add Donation Modal  -->
                <div class="modal fade modal-add-contact" id="addDonation" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <form id="add-donation-form" enctype="multipart/form-data">
                                <div class="modal-header px-4">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Add New Event</h5>
                                </div>
                                <div class="modal-body px-4">
                                    <div class="row mb-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                                        </div>
                                        <div class="form-group">
                  								<textarea type="text" class="form-control" id="content" name="content" placeholder="Content"></textarea>
                						</div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" id="f_required" name="f_required" placeholder="Funds Required">
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" id="f_received" name="f_received" placeholder="Funds Received">
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Select an Image<small>(format: (jpg, jpeg, png) max size: 2MB)</small>:</label>
                                            <input type="file" class="form-control" id="image" name="donation_image">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="add_donation" value="1">
                                <div class="modal-footer px-4">
                                    <button type="button" class="btn btn-secondary btn-pill cancel-btn"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary btn-pill add-donation">Save New Donation</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Edit Donation Modal  -->
                <div class="modal fade modal-add-contact" id="editDonation" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <form id="edit-donation-form" enctype="multipart/form-data">
                                <div class="modal-header px-4">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Edit Event</h5>
                                </div>
                                <div class="modal-body px-4">
                                    <div class="row mb-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                                        </div>
                                        <div class="form-group">
                  								<textarea type="text" class="form-control" id="content" name="content" placeholder="Content"></textarea>
                						</div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" id="f_required" name="f_required" placeholder="Funds Required">
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" id="f_received" name="f_received" placeholder="Funds Received">
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Select an Image<small>(format: (jpg, jpeg, png) max size: 2MB)</small>:</label>
                                            <input type="file" class="form-control" id="image" name="donation_image">
                                            <img src="" class="img-fluid" width="200" height="200">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="edit_donation" value="1">
                                <input type="hidden" name="id">
                                <div class="modal-footer px-4">
                                    <button type="button" class="btn btn-secondary btn-pill cancel-btn"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary btn-pill submitedit-donation">Save Donation</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div> <!-- End Content -->
        </div> <!-- End Content Wrapper -->

    </div> <!-- End Page Wrapper -->
</div> <!-- End Wrapper -->
<!-- Common Javascript -->
<script src="assets/plugins/jquery/jquery-3.5.1.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/plugins/simplebar/simplebar.min.js"></script>
<script src="assets/plugins/jquery-zoom/jquery.zoom.min.js"></script>
<script src="assets/plugins/slick/slick.min.js"></script>

<!-- Data Tables -->
<script src='assets/plugins/data-tables/jquery.datatables.min.js'></script>
<script src='assets/plugins/data-tables/datatables.bootstrap5.min.js'></script>
<script src='assets/plugins/data-tables/datatables.responsive.min.js'></script>

<!-- Option Switcher -->
<!-- <script src="assets/plugins/options-sidebar/optionswitcher.js"></script> -->

<!-- Bank Ass Custom -->
<script src="assets/js/ncmea.js"></script>
<script src="assets/js/donations.js"></script>
</body>


</html>