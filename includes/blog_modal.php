<!-- modals section for contact--->
<div class="modal fade" id="contact" tabindex="-1" role="dialog" arial-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title" id="myModalLabel">Contact</h4>
									<button type="submit" class="close" data-dismiss="modal" arial-label="Close" ><span arial-hidden="true">&times;</span></button>
									
								</div>
								<div class="modal-body">
									<form class="form-group" action="form/form.php" enctype="multipart/form-data" method="POST" action="">
										<label for="name">Name</label>
                                        <input type="text" name="name" placeholder="" required class="form-control"><br>
										<label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id=""><br>
                                        <label for="message">Message</label>
                                        <textarea name="message" class="form-control" id="" cols="10" rows="3"></textarea><br>
										<button type="submit" class="btn btn-primary" name="submit">Submit</button>
									</form>
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn-btn-default" data-dismiss="modal">Close
									</button>									
								</div>
							</div>
						</div>
					</div>	
					