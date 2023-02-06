
<header class="ec-main-header" id="header">
	<nav class="navbar navbar-static-top navbar-expand-lg">
		<!-- Sidebar toggle button -->
		<button id="sidebar-toggler" class="sidebar-toggle"></button>
		<!-- search form -->
		<div class="search-form d-lg-inline-block">
			<div class="input-group">

			</div>
			<div id="search-results-container">
				<ul id="search-results"></ul>
			</div>
		</div>

		<!-- navbar right -->
		<div class="navbar-right">
			<ul class="nav navbar-nav">
				<!-- User Account -->
				<li class="dropdown user-menu">
					<button class="dropdown-toggle nav-link ec-drop" data-bs-toggle="dropdown"
						aria-expanded="false">
						<img src="assets/img/user.png" class="user-image" alt="User Image" />
					</button>
					<ul class="dropdown-menu dropdown-menu-right ec-dropdown-menu">
						<!-- User image -->
						<li class="dropdown-header">
							<img src="assets/img/user.png" class="img-circle" alt="User Image" />
							<div class="d-inline-block">
							<?php if(isset($_SESSION['user_name'])){echo $_SESSION['user_name'];}?> <small class="pt-1"><?php if(isset($_SESSION['user_email'])){echo $_SESSION['user_email'];}?></small>
							</div>
						</li>
						<li>
							<a href="#">
								<i class="mdi mdi-account"></i> My Profile
							</a>
						</li>
						<li class="dropdown-footer">
							<a href="logout.php"> <i class="mdi mdi-logout"></i> Log Out </a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
</header>