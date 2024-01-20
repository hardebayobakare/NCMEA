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
                        <h1>Scholars</h1>
                        <p class="breadcrumbs"><span><a href="index.php">Home</a></span><span><i class="mdi mdi-chevron-right"></i></span> Webpage Content</p>
                    </div>

                    <div>
							<button type="button" class="btn btn-primary add-scholar-modal" data-bs-toggle="modal"
								data-bs-target="#addScholar"> Add New Scholar
							</button>
						</div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="ec-vendor-list card card-default">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="scholar-list" class="table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Email</th>
                                                <th>Twitter</th>
                                                <th>Facebook</th>
                                                <th>Youtube</th>
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
                <div class="modal fade modal-add-contact" id="viewImage" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                        <div class="image mb-3">  
                            <img id="modalImage" src="" class="img-fluid rounded-circle"
                                alt="Scholar Image" >
                            </div>   
                        </div>
                    </div>
                </div>
                <!-- Add Scholar Modal  -->
                <div class="modal fade modal-add-contact" id="addScholar" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <form id="add-scholar-form" enctype="multipart/form-data">
                                <div class="modal-header px-4">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Add New Scholar</h5>
                                </div>
                                <div class="modal-body px-4">
                                    <div class="row mb-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                                        </div>
                                        <div class="form-group">
                  								<textarea type="text" class="form-control" id="description" name="description" placeholder="Description"></textarea>
                							</div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="twitter" name="twitter" placeholder="Twitter">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Facebook">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="youtube" name="youtube" placeholder="Youtube">
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Select an Image<small>(format: (jpg, jpeg, png) max size: 2MB)</small>:</label>
                                            <input type="file" class="form-control" id="image" name="scholar_image">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="add_scholar" value="1">
                                <div class="modal-footer px-4">
                                    <button type="button" class="btn btn-secondary btn-pill cancel-btn"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary btn-pill add-scholar">Save New Scholar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Edit Scholar Modal  -->
                <div class="modal fade modal-add-contact" id="editScholar" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <form id="edit-scholar-form" enctype="multipart/form-data">
                                <div class="modal-header px-4">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Edit Event</h5>
                                </div>
                                <div class="modal-body px-4">
                                    <div class="row mb-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                                        </div>
                                        <div class="form-group">
                  								<textarea type="text" class="form-control" id="description" name="description" placeholder="Description"></textarea>
                							</div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="twitter" name="twitter" placeholder="Twitter">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Facebook">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="youtube" name="youtube" placeholder="Youtube">
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Select an Image<small>(format: (jpg, jpeg, png) max size: 2MB)</small>:</label>
                                            <input type="file" class="form-control" id="image" name="scholar_image">
                                            <img src="../images/1.0x0.jpg" class="img-fluid" width="200" height="200">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="edit_scholar" value="1">
                                <input type="hidden" name="id">
                                <div class="modal-footer px-4">
                                    <button type="button" class="btn btn-secondary btn-pill cancel-btn"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary btn-pill submitedit-scholar">Save Scholar</button>
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
<script src="assets/js/scholars.js"></script>
</body>


</html>