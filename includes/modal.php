<!-- modals section for adding page--->
<div class="modal fade" id="addpage" tabindex="-1" role="dialog" arial-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title" id="myModalLabel">Add post</h4>
									<button type="submit" class="close" data-dismiss="modal" arial-label="Close" ><span arial-hidden="true">&times;</span></button>
									
								</div>
								<div class="modal-body">
									<form class="form-group" enctype="multipart/form-data" method="POST" action="">
										<label for="page">Post Title</label>
											<input type="text" name="post-title" placeholder="post title" required class="form-control"><br>
										<label for="post-body">Post Body</label>
										<textarea name="editor1" required class="ckeditor form-control"></textarea><br>
										<label for="post-image">post image</label>
										<input type="file"name="post-img" required placeholder="insert image" class="form-control" multiple><br>
																
										<label for="post-category">post category</label>
										<select class="form-control" name="post-ctg" id="" required>
											<option value="" disabled selected>Choose Category</option>
											<option value="Popular">Popular</option>
											<option value="latest">Latest</option>
											<option value="education">Education</option>
											<option value="politics">Politics</option>
											<option value="sponsored">Sponsored</option>
											<option value="sports">Sports</option>
											<option value="other news">Other News</option>
											
										</select><br>
									
										<label for="meta-tag">Meta Tags</label>
										<input type="text" name="meta-tag" required placeholder="meta tag" class="form-control"><br>
									
										<label for="meta-description">Meta Description</label>
										<input type="text"name="meta-dsc" required placeholder="meta description" class="form-control"><br>
										<label for="author">Post Author</label>
										<input type="text" value="<?php echo $username; ?>" name="author" readonly class="form-control"><br>
										<button type="submit" class="btn btn-primary" name="save">Save Changes</button>
									</form>
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn-btn-default" data-dismiss="modal">Close
									</button>
									
								</div>
							</div>
						</div>
					</div>	
					