<?php
	session_start();
    if(isset($_SESSION['user_id'])){
        header('location:index.php');
    }

?>
<!DOCTYPE html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="description" content="NCMEA">

		<title>NCMEA</title>
		
		<!-- GOOGLE FONTS -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800;900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
		<link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css'>    
      


		<!-- PLUGINS CSS STYLE -->
		<link href="assets/plugins/simplebar/simplebar.css" rel="stylesheet" />

		<!-- Bank Assessment CSS -->
		<link id="bankass-css" rel="stylesheet" href="assets/css/ncmea.css" />
		
		<!-- Data Tables -->
		<link href='assets/plugins/data-tables/datatables.bootstrap5.min.css' rel='stylesheet'>
		<link href='assets/plugins/data-tables/responsive.datatables.min.css' rel='stylesheet'>
		
		<!-- FAVICON -->
		<!-- <link href="assets/img/favicon.png" rel="shortcut icon" /> -->
		
	</head>
	<body class="sign-inup" id="body">
		<div class="container d-flex align-items-center justify-content-center form-height-login pt-24px pb-24px">
			<div class="row justify-content-center">
				<div class="col-lg-8 col-md-10">
					<div class="card">
						<div class="card-header bg-primary">
							<div class="ec-brand">
								<a title="NCMEA">
									<!-- <img class="ec-brand-icon" src="assets/img/logo/logo-login.png" alt="" /> -->
								</a>
							</div>
						</div>
						<div class="card-body p-5">
						<p class="message"></p>
							<h4 class="text-dark mb-5">Sign In</h4>
							<form id="sign-in-form">
								<div class="row">
									<div class="form-group col-md-12 mb-4">
										<input type="email" class="form-control" name="email" id="email" placeholder="Email">
									</div>
									
									<div class="form-group col-md-12 ">
										<input type="password" class="form-control" name="password" id="password" placeholder="Password">
									</div>
									<input type="hidden" name="user_login" value="1">
									<div class="col-md-12">
										<div class="d-flex my-2 justify-content-between">
											<div class="d-inline-block mr-3">
											</div>
											<p><a class="text-blue" href="forget-password.php">Forgot Password?</a></p>
										</div>

										<button type="button" class="btn btn-primary btn-block mb-4 signin-btn">Sign In</button>
										
										<!-- <p class="sign-upp">Don't have an account yet ?
											<a class="text-blue" href="sign-up.php">Sign Up</a>
										</p> -->
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	
		<!-- Javascript -->
		<script src="assets/plugins/jquery/jquery-3.5.1.min.js"></script>
		<script src="assets/js/bootstrap.bundle.min.js"></script>
		<script src="assets/plugins/jquery-zoom/jquery.zoom.min.js"></script>
		<script src="assets/plugins/slick/slick.min.js"></script>
	
		<!-- NCMEA Custom -->	
		<script src="assets/js/credentials.js"></script>
	</body>
</html>