<main>
	<div id="navbar" class="sticky">
		<div class="page-name">
			<?php
			echo "<img src='../assets/images/$pageIcon' class='icon'> ";
			echo (isset($subName)) ? $subName : $pageName;
			?>
		</div>
		<div id="user">
			<a class="nav-link dropdown-toggle" id="myprofile" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<img src="../assets/images/man.svg">
			</a>
			<div class="dropdown-menu" aria-labelledby="myprofile">
				<h4 class="employeeName"><?= $_SESSION['empName'] ?></h4>
				<div class="dropdown-divider"></div>
				<a data-backdrop="static" data-keyboard="false" href="#change_password" data-toggle="modal" data-target="#change_password" class="dropdown-item">
					<i class="fas fa-key"></i> تغير كلمة المرور
				</a>
				<a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> تسجيل الخروج</a>
			</div>

		</div>
		<!-- <ul class="d-inline">
			<li class="nav-item dropdown" style="direction: ltr;">
				<a class="nav-link dropdown-toggle" href="#" id="myprofile" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Admin
				</a>
				<div class="dropdown-menu" aria-labelledby="myprofile">
					<a data-backdrop="static" data-keyboard="false" href="#change_password" data-toggle="modal" data-target="#change_password" class="dropdown-item">
						تغير كلمة المرور <i class="fas fa-key"></i>
					</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="logout.php">تسجيل الخروج <i class="fas fa-sign-out-alt"></i></a>
				</div>
			</li>
		</ul> -->
	</div>
	<div class="content">