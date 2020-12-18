<?php
    //disabling error reporting 
    #error_reporting(0);
    // connecting to the database
    require_once 'connection/db.php';
    if (isset($_GET['vid'])) {
        //getting every content related of the particular id
        $vid = $_GET['vid'];
        $query = "SELECT * FROM posts WHERE id=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i',$vid);
        $stmt->execute();
        $result = $stmt->get_result();
        $fetch = $result->fetch_assoc();
        $stmt->close();

        //getting posts related to the particular category of the viewed post
        $category = $fetch['post_category'];
        $query = "SELECT * FROM posts WHERE post_category=? ORDER BY post_date DESC LIMIT 4";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s',$category);
        $stmt->execute();
        $newfetch = $stmt->get_result();
        $stmt->close();

        //getting few flashback post
        $query = "SELECT * FROM posts WHERE post_category = ? LIMIT 5";
        $flash_cat = 'flashback';
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s',$flash_cat);
        $stmt->execute();
        $flashBack = $stmt->get_result();
        $stmt->close();

        // querying for the latest category for sliding posts
        $query = "SELECT * FROM posts WHERE post_category = ? LIMIT 5";
        $sli_cat = 'latest';
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s',$sli_cat);
        $stmt->execute();
        $sliding = $stmt->get_result();
        $stmt->close();
        
    }
    else{
        header('location:index.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $fetch['post_desc']; ?>">
    <meta name="keywords" content="<?php echo $fetch['post_tag'];?>">
    <meta property="og:title" content="<?php echo $fetch['post_title'];?>">
    <meta property="og:description" content="<?php echo $fetch['post_desc']; ?>">
    <meta property="og:image" content="https://unitechdev.com/images/<?php echo $fetch['post_image'];?>">
    <meta property="og:url" content="https://unitechdev.com">
    <meta property="og:type" content="blog">
    <meta property="twitter:title" content="<?php echo $fetch['post_title'];?>">
    <meta property="twitter:description" content="<?php echo $fetch['post_desc']; ?> .">
    <meta property="twitter:image" content="https://unitechdev.com/images/<?php echo $fetch['post_image'];?>">
    <meta property="twitter:url" content="https://unitechdev.com">
    <meta property="twitter:card" content="summary_large_image">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="apple-touch-icon" sizes="180x180" href="image/unitechpix2.jpg">
    <link rel="icon" type="image/jpg" sizes="16x16" href="image/unitechpix2.jpg">
    <link rel="canonical" href="https://unitechdev.com">
    <link rel="stylesheet" type="text/css" href="css/swiper.css">
    <link rel="stylesheet" type="text/css" href="css/swiper.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/swiper.min.css">
    <title>Niger latest </title>
</head>
<body>
        <div id="home"></div>
        <!--including topbar-->
        <?php include 'includes/topbar.php';?>

                        <!-- swiper sliding posts page-->
                        <div class="swiper-container swipe1">
                            <div class="swiper-wrapper">
                                <?php while ($result = $sliding->fetch_assoc()) {
                                    $explode = explode('../',$result['image_dir']);
                                    ?>
                            <div class="swiper-slide">
                              <a href="viewpost?vid=<?= $result['id'];?>"><img src="<?= $explode[1];?>" class="img-fluid card-img-top" alt="sliding image"></a>
                              <div class="card-title bg-secondary ml-4 text-center" id="caption">
                                <p class="text-white"><?= $result['post_desc'];?></p>
                            </div>
                            </div>
                           
                                <?php }?>
                            
                            </div>
                            <!-- Add Pagination -->
                            <div class="swiper-pagination"></div>
                           
                        </div>

        <!--view-post section-->
        <section id="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="card-title"><?= $fetch['post_title'];?></h1>
                        <div class="card shadow">
                            <div>
                                <?php $explode = explode('../',$fetch['image_dir']);?>
                                <img src="<?= $explode[1];?>" class="img-fluid card-img-top" alt="post image">
                            </div>
                            <div class="card-body">
                                <h3 class="card-title"><?= strip_tags($fetch['post_desc']);?></h3>
                                <small class="text-left;"><span class="fas fa-clock text-primary "></span> <?= $fetch['post_date'];?></small><br>
                                <small class="text-right"><i>Posted by</i> <?= $fetch['post_author'];?></small>
                            </div>
                            <div class="p-2">
                                <p class="card-text"><?= $fetch['post_content']; ?></p>
                            </div>
                            <!--social icons-->
                            <div class="social-media-icons text-center">
                                <a class="btn-floating btn-lg btn-tw" type="button" role="button"><i style="color:#00acee;"  class="fab fa-twitter"></i></a>
                                <a class="btn-floating btn-lg btn-tw" type="button" role="button"><i class="fab fa-facebook text-primary"></i></a>
                                <a style="color:#128C7E;" class="btn-floating btn-lg btn-tw" type="button" role="button"><i style="color:#128C7E;" class="fab fa-whatsapp"></i></a>
                            </div>
                        </div><br>
                        
                        <!--list group-->
                        <div class="list-group" style="margin:40px 0 10px 0;">
                            <a href="#" class="list-group-item active">Categories</a>
                            <a href="latest" class="list-group-item">Latest </a>
                            <a href="popular" class="list-group-item primary">Popular</a>
							<a href="politics" class="list-group-item">politics </a>
                            <a href="sports" class="list-group-item">Sports </a>
							<a href="education" class="list-group-item">Education </a>
                            <a href="#" class="list-group-item">Other News </a>
                    </div>

                    </div>

                        <!--related post-->
                       
                        <div class="col-md-4">
                            <h2>Related Posts</h2>
                            <?php while ($result = $newfetch->fetch_assoc()){
                                $explode = explode('../',$result['image_dir']);
                                ?>
                            <div class="card shadow my-4">
                                <div>
                                    <img src="<?= $explode[1];?>" class="img-fluid card-img-top" alt="post image">
                                </div>
                                <div class="card body p-2">
                                    <h3 class="card-title"><?= strip_tags($result['post_desc']); ?></h3>
                                        
                                        <small class="text-left"><span class="fas fa-clock text-primary "></span> <?php echo $result['post_date'];?></small>
                                        <small class="text-right"><i>Posted by </i><?php echo $result['post_author'];?></small>
                                    <a href="viewpost?vid=<?php echo $result['id'];?>" class="btn btn-primary btn-sm">Read More</a>
                                </div>
                            </div>
                            <?php }; ?>
                        </div>
                        
                </div>
            </div>
        </section>
        <!--back to top-->
        <a href="#home" rel="nofollow" class="back-to-top"><i class="fas fa-arrow-up"></i></a>
                                <!-- bootstrap modal -->
                                    <?php include 'includes/blog_modal.php'; ?>
                                <!-- bootstrap modal ends -->
            <!-- footer section--->
            <footer class="footer footer-default" style="height: auto; width: 100%; background-color:black;padding-top:15px;color:gray; ">
                <p class="text-center">Copyright &copy; 2020 All rights reserved | Developed by <span><a style="text-decoration:none;color:red;" href="www.unitechdev.com">Unitech</a><span></p>
            </footer>
                      <script src="js/swiper.min.js"></script>
                      <script src="js/script.js"></script>
                      <script src="js/jquery.min.js"></script>
					<script src="js/bootstrap.min.js"></script>
                    <script>
                                       /* latest pos slide*/
                                var swiper = new Swiper('.swipe1', {
                                spaceBetween: 30,
                                effect: 'fade',
                                autoplay: {
                                        display:1500,
                                        diableOnInteraction: false,
                                    },
                                pagination: {
                                    el: '.swiper-pagination',
                                    type: 'progressbar',
                                    clickable: true,
                                },
                                navigation: {
                                    nextEl: '.swiper-button-next',
                                    prevEl: '.swiper-button-prev',
                                },
                                });
       
                                </script>
        </body>
        </html>