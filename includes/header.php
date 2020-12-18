<?php $username = $_SESSION['username']; ?>
<section id="navbar">
		<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light shadow">
		<div class="container">
			<a class="navbar-brand" href="dashboard.php">Admin Dashboard</a>
				<button type="button" class="navbar-toggler" arial-expanded="false" arial-label="Toggle navigation" data-toggle="collapse" data-target="#navbarNav" arial-controls="navbarNav">
					<span class="navbar-toggler-icon"></span>
				</button>
				
			<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item"><a class="nav-link" href="post.php"><i class="fab fa-blogger-b mr-1 text-primary"></i>Posts</a></li>
				<?php 
				if (isset($_SESSION['role'])) {
					echo '<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" arial-haspopup="true" arial-expanded="false" href="#" id="navbarDropdown"><i class="fa fa-user mr-1 text-primary"></i>Users</a>
					<div class="dropdown-menu" arial-labelledby="navbarDropdown" >
						<a href="adduser.php" class="dropdown-item"><i class="fas fa-user-plus mr-1 text-primary"></i>Add users</a>
						<a href="users.php" class="dropdown-item"><i class="fas fa-users mr-1 text-primary"></i>Manage users</a>
					</div>
				</li>
				<li class="nav-item"><a class="nav-link" href="profile.php?aid='.$_SESSION['id'].'"><i class="fas fa-user-circle mr-1 text-primary"></i>Profile</a></li>';
				}
				else {
					echo '<li class="nav-item"><a class="nav-link" href="profile.php?uid='.$_SESSION['id'].'"><i class="fas fa-user-circle mr-1 text-primary"></i>Profile</a></li>';
				}
				?>
				<li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-file-word text-primary mr-1"></i>Pages</a></li>
				
         	</ul>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item"><a class="nav-link text-danger" href="../index.php">Visit Blog</a></li>
				<li class="nav-item"><a class="nav-link text-secondary" href="#"><?= 'welcome, '.$username; ?></a></li>
				<li class="nav-item"><a class="nav-link text-danger" href="logout.php"><i class="fas fa-sign-out-alt mr-1"></i>Logout</a></li>
         	</ul>
		</div>
	</div>
</nav>
</section>
    							    <!-- breadcrum section---->
								
									<div class="container">
										<ol class="breadcrumb">
											<li class="active">Dashboard</li>
										</ol>
									</div>
					
							<!-- header section--->
							<header id="header">
								<div class="container">
									<div class="row bg-light py-2">
										<div class="col-md-10">
											<h4 class="card-title my-2">Dashboard <small class="card-text">Manage Your Blog</small></h4>
										</div>
										<div class="col-md-2">
											<div class="dropdown">
											    	<button type="button" class="dropdown-toggle btn-primary" href="#" data-toggle="dropdown" arial-haspopup="true" arial-expanded="false" id="dropdownMenuButton">
													Add Content
												</button>
												<ul class="dropdown-menu" arial-labelledby="dropdownMenuButton">
													<li><a class="dropdown-item" style="cursor: pointer;" type="button" data-toggle="modal" data-target="#addpage">Add post</a></li>
													<li><a class="dropdown-item" href="#">Add Pages</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</header>
							
								
							<!-- header section ends-->
			