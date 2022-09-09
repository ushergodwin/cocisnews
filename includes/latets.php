 <?php
    $query = "SELECT * FROM posts   ORDER BY post_date DESC LIMIT 3";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $latest = $stmt->get_result();
    $stmt->close();
    ?>
 <h2>Latest</h2>
 <?php
    while ($result = $latest->fetch_assoc()) {
        $explode = explode("../", $result['image_dir']);
    ?>

     <div class="card shadow my-3">
         <div>
             <img src="<?= $explode[1]; ?>" class="img-fluid card-img-top" alt="blog post image">
         </div>
         <div class="card body p-2">
             <h3 class="card-title"><?php echo strip_tags($result['post_desc']); ?></h3>

             <small class="text-left"><span class="fas fa-clock text-primary "></span> <?php echo $result['post_date']; ?></small>
             <small class="text-right"><i>Posted by </i><?php echo $result['post_author']; ?></small>
             <a href="viewpost?vid=<?php echo $result['id']; ?>" class="btn btn-primary btn-sm">Read More</a>
         </div>
     </div>
 <?php } ?>