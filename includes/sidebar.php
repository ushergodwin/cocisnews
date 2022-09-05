<?php 
        require_once '../connection/db.php';
        // counting the totalpost from the database
				$count = "SELECT COUNT(*) as posted FROM posts";
				$number = $conn->query($count);
				$fetch = mysqli_fetch_array($number);
				
				//counting the total registered users except the admin
				$count_user = "SELECT COUNT(*) AS reg_users FROM subusers";
				$users_num = $conn->query($count_user);
				$fetch_users = mysqli_fetch_array($users_num);
				

?>


                            <div class="container"  style="background-color:#E9ECEF;">
										<div class="row">
											<div class="col-md-3 my-3">
												<div class="list-group shadow">
													<a href="#" class="list-group-item active">Dashboard</a>
													<a href="#" class="list-group-item">Pages <span class="badge badge-pill badge-warning">10</span></a>
													<a href="#" class="list-group-item">Posts <span class="badge badge-pill badge-warning"><?php echo $fetch['posted'];?></span></a>
													<a href="#" class="list-group-item">Admin <span class="badge badge-pill badge-warning"><?php echo $fetch_users['reg_users'];?></span></a>
												</div><br>
												<!-- well---->
											<div class="card shadow p-2">
												<h5 class="card-title">Disk space used</h5>
												<div class="progress">
												<div class="progress-bar-striped bg-danger" role="progressbar" arial-valuenow="5" arial-valuemin="0" arial-valuemax="100" style="width: 1%;">
												<span class="sr-only">0.5%</span>	
												</div>

											</div>
											<h5 class="card-title">Bandwidth used</h5>
													<div class="progress">
												<div class="progress-bar-striped bg-primary" role="progressbar" arial-valuenow="05" arial-valuemin="0" arial-valuemax="100" style="width:1%;">
												<span class="sr-only">0.6%</span>	
													</div>
												</div>
											</div>
										</div>
									