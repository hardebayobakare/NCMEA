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
                        <h1>Pages</h1>
                        <p class="breadcrumbs"><span><a href="index.php">Home</a></span><span><i class="mdi mdi-chevron-right"></i></span> Webpage Content</p>
                    </div>
                </div>
                <form id="page-info">
						<div class="row">
							<div class="form-group col-md-12 ">
                    			<label for="page">Choose Page: </label>
                    			<select class="form-control" id="page">
									<option>Select a page</option>
									<option value="home">Home Page</option>
									<option value="donate">Donate Page</option>
									<option value="about">About Us</option>
									<option value="contact">Contact</option>
                                    <option value="contact">Footer</option>
                    			</select>
                			</div>
							<input type="hidden" name="page-info" value="1">
							<div>
								<button type="button" class="btn btn-primary btn-block mb-4 gencol-btn">Get Page Content</button>
							</div>
						</div>
					</form>
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
<script src="assets/js/pages.js"></script>
</body>


</html>