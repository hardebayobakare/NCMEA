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
                        <h1>Members</h1>
                        <p class="breadcrumbs"><span><a href="index.php">Home</a></span><span><i class="mdi mdi-chevron-right"></i></span> Webpage Content</p>
                    </div>

                    <div>
							<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
								data-bs-target="#addEvent"> Create New Event
							</button> -->
						</div>
                </div>
                <div class="row">
                    <div>
                        <h4>Newly Registered Members</h4><br>
                    </div>
                    <div class="col-12">
                        <div class="ec-vendor-list card card-default">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="new-member-list" class="table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone Number</th>
                                                <th>Adress</th>
                                                <th>Reg Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
                <br><br>
                <div class="row">
                    <div>
                        <h4>Existing Members</h4><br>
                    </div>
                    <div class="col-12">
                        <div class="ec-vendor-list card card-default">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="old-member-list" class="table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone Number</th>
                                                <th>Adress</th>
                                                <th>Reg Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
                <!-- Edit Member Modal  -->
                <div class="modal fade modal-add-contact" id="viewMember" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <form id="view-member-form" enctype="multipart/form-data">
                                <div class="modal-header px-4">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Member</h5>
                                </div>
                                <div class="modal-body px-4">
                                    <div class="row mb-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="name">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="email" name="email" placeholder="email">
                                        </div>
                                        <div class="form-group">
                                            <input type="phone" class="form-control" id="phone" name="phone" placeholder="phone">
                                        </div>
                                        <div class="form-group">
                  								<textarea type="text" class="form-control" id="address" name="address" placeholder="Address"></textarea>
                							</div>
                                        <div class="form-group">
                                            <input type="date" class="form-control" id="date" name="date" placeholder="Date">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="confirm_member" value="1">
                                <input type="hidden" name="id">
                                <div class="modal-footer px-4">
                                    <button type="button" class="btn btn-secondary btn-pill cancel-btn"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary btn-pill confirm-member-form">Confirm Member</button>
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
<script src='https://cdn.datatables.net/buttons/2.3.5/js/dataTables.buttons.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js'></script>
<script src='https://cdn.datatables.net/buttons/2.3.5/js/buttons.html5.min.js'></script>
<script src='https://cdn.datatables.net/buttons/2.3.5/js/buttons.print.min.js'></script>
<script src='assets/plugins/data-tables/datatables.bootstrap5.min.js'></script>
<script src='assets/plugins/data-tables/datatables.responsive.min.js'></script>

<!-- Option Switcher -->
<!-- <script src="assets/plugins/options-sidebar/optionswitcher.js"></script> -->

<!-- Bank Ass Custom -->
<script src="assets/js/ncmea.js"></script>
<script src="assets/js/members.js"></script>
</body>


</html>