<?php
    //disabling error reporting 
    // ini_set('display_errors', '1');
    // ini_set('display_startup_errors', '1');
    // error_reporting(E_ALL);
    // connecting to the database
    require_once 'connection/db.php';
    $comment_response = $reply_response =  $name = "";
    $comment_count = $views = 0;

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


        // number of views 
        $stmt = $conn->prepare("SELECT num FROM views WHERE post_id = ?");
        $stmt->bind_param('s', $vid);
        $stmt->execute();
        $num_views = $stmt->get_result();
        $views = (int) $num_views->num_rows ? $num_views->fetch_assoc()['num'] + 1 : 0;
        $stmt->close();

        if($views)
        {
            $stmt = $conn->prepare("UPDATE views SET num = ? WHERE post_id = ?");
            $stmt->bind_param('ss', $views, $vid);
            $stmt->execute();
            $stmt->close();
        }else {
            $views += 1;
            $stmt = $conn->prepare("INSERT INTO views (num, post_id) VALUES (?, ?)");
            $stmt->bind_param('ss', $views, $vid);
            $stmt->execute();  
            $stmt->close();
        }


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

        // query for comments
        $query = "SELECT * FROM comments WHERE post_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $vid);
        $stmt->execute();
        $comments = $stmt->get_result();
        $query = "SELECT count(id) as num FROM comments WHERE post_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $vid);
        $stmt->execute();
        $comment_count = $stmt->get_result();
        $comment_count = $comment_count->fetch_assoc()['num'];

        $stmt->prepare("SELECT name FROM comments WHERE user_agent = ? LIMIT 1");
        $stmt->bind_param('s', $_SERVER['HTTP_USER_AGENT']);
        $stmt->execute();
        $name = $stmt->get_result();
        $name = $name ? $name->fetch_assoc()['name'] : "";

        if(empty($name))
        {
            $stmt->prepare("SELECT name FROM reply WHERE user_agent = ? LIMIT 1");
            $stmt->bind_param('s', $_SERVER['HTTP_USER_AGENT']);
            $stmt->execute();
            $name = $stmt->get_result();
            $name = $name->num_rows ? $name->fetch_assoc()['name'] : "";
        }

        $stmt->close();

        if(isset($_POST['comment'])) {
            $name = strip_tags($_POST['name']);
            $comment = strip_tags($_POST['body']);
            $user_agent = $_POST['remember'];
            
            $query = "INSERT INTO comments(name, body, user_agent, post_id) VALUES (?, ?, ?, ?)";
            
            $stmt = $conn->prepare($query);
            $stmt->bind_param('ssss', $name, $comment, $user_agent, $vid);
            if ($stmt->execute()) {
                $comment_response = "<div class='alert alert-success'> <span>Comment posted successfully</span></div>";
            }else {

                $reply_response = "<div class='alert alert-danger'> <span>Failed to post reply!</span></div>";
            }
            $stmt->close();
        }

        if(isset($_POST['reply'])) {
            $name = strip_tags($_POST['name']);
            $comment = strip_tags($_POST['body']);
            $user_agent = $_POST['remember'];
            $comment_id = $_POST['comment_id'];
            
            $query = "INSERT INTO reply(name, body, user_agent, comment_id) VALUES (?, ?, ?, ?)";
            
            $stmt = $conn->prepare($query);
            $stmt->bind_param('ssss', $name, $comment, $user_agent, $comment_id);
            if ($stmt->execute()) {
                $reply_response = "<div class='alert alert-success'> <span>Reply posted successfully</span></div>";
            }else {
                $reply_response = "<div class='alert alert-danger'> <span>Failed to post reply!</span></div>";
            }
        }
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
    <link rel="apple-touch-icon" sizes="180x180" href="images/cocis/muk.jpeg">
    <link rel="icon" type="image/jpg" sizes="16x16" href="images/cocis/muk.jpeg">
    <link rel="canonical" href="https://unitechdev.com">
    <link rel="stylesheet" type="text/css" href="css/swiper.css">
    <link rel="stylesheet" type="text/css" href="css/swiper.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/swiper.min.css">
    <title>Cocis News | <?= $fetch['post_title'];?></title>
</head>
<body>
        <div id="home"></div>
        <!--including topbar-->
        <?php include 'includes/topbar.php';?>

        <!--view-post section-->
        <section id="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
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
                                <a class="btn-floating btn-lg btn-tw" type="button" role="button"><i style="color:#00acee;"  class="fa fa-eye"></i> <?= $views ?> views </a>
                                <a class="btn-floating btn-lg btn-tw" type="button" role="button"><i style="color:#00acee;"  class="fa fa-envelope"></i> <?= $comment_count ?> comments</a>
                                <a class="btn-floating btn-lg btn-tw" type="button" role="button"><i style="color:#00acee;"  class="fab fa-twitter"></i></a>
                                <a class="btn-floating btn-lg btn-tw" type="button" role="button"><i class="fab fa-facebook text-primary"></i></a>
                                <a style="color:#128C7E;" class="btn-floating btn-lg btn-tw" type="button" role="button"><i style="color:#128C7E;" class="fab fa-whatsapp"></i></a>
                            </div>
                        </div><br>
                        
                        <!--list group-->
                       <hr/>
                       <h2>Comments (<?= $comment_count; ?>)</h2>

                        <?php while($comment = $comments->fetch_object()): ?>
                            <div class="d-flex mt-3">
                                <div class="flex-shrink-0">
                                    <img src="images/cocis/avatar.svg" class="rounded-circle" alt="Sample Image" width="80px" height="80px">
                                </div>
                                <div class="flex-grow-1 ms-3 ml-3">
                                    <h5><?= $comment->name ?> <small class="text-muted"><i>Posted on <?= date("l d M, Y", strtotime($comment->commented_at)) ?></i></small></h5>
                                    <p>
                                        <?= $comment->body; ?>
                                        <a href="javascript:void(0)" onclick="$('#reply-f-<?= $comment->id; ?>').toggleClass('d-none');"> :Reply</a>
                                    </p>
                                    
                                    <!-- Nested media object -->
                                    <?php 
                                        $query = "SELECT * FROM reply WHERE comment_id = ?"; 
                                        $stmt = $conn->prepare($query);
                                        $stmt->bind_param('s', $comment->id);
                                        $stmt->execute();
                                        $replies = $stmt->get_result();
                                    ?>
                                    <?php while($reply = $replies->fetch_object()): ?>
                                        <div class="d-flex mt-4">
                                        <div class="flex-shrink-0">
                                            <img src="images/cocis/avatar.svg" class="img-fluid" alt="Sample Image" width="80px" height="80px">
                                        </div>
                                        <div class="flex-grow-1 ms-3 ml-3">
                                            <h5><?= $reply->name ?> <small class="text-muted"><i>Posted on <?= date("l d M, Y", strtotime($reply->replied_at)) ?></i></small></h5>
                                            <p><?= $reply->body; ?></p>
                                        </div>
                                    </div>
                                    <?php endwhile; ?>
                                    <form action="" method="POST" class="d-none" id="reply-f-<?= $comment->id; ?>">
                                        <hr/>
                                        <h5 class="d-flex justify-content-end">
                                            Reply to <?= $comment->name; ?>
                                        </h5>
                                        <dv class="form-group">
                                            <label for="name" class="w-100">
                                                Your Name 
                                                <input type="text" name="name" class="form-control" autocomplete="off" value="<?= $name ?>" required/>
                                            </label>
                                        </dv>
                                        <dv class="form-group">
                                            <label for="name" class="w-100">
                                                Reply
                                                <textarea name="body" class="form-control" autocomplete="off" rows="5" required></textarea>
                                            </label>
                                        </dv>
                                        <input type="hidden" name="comment_id" value="<?= $comment->id ?>"/>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="remember" id="remember" value="<?= $_SERVER['HTTP_USER_AGENT'] ?>">
                                            <label class="form-check-label" for="remember">&nbsp;&nbsp;Remember my name for next time I reply</label>
                                        </div>
                                        <dv class="form-group d-flex justify-content-end">
                                            <button type="submit" class="btn btn-success btn-sm" name="reply">
                                                Post Reply
                                            </button>
                                        </dv>
                                    </form>
                                    <?= $reply_response ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                       
                        <h5 class="d-flex justify-content-end mt-3">
                            Post a comment
                        </h5>
                        <form action="" method="POST">
                            <dv class="form-group">
                                <label for="name" class="w-100">
                                    Your Name 
                                    <input type="text" name="name" class="form-control" autocomplete="off" value="<?= $name ?>" required/>
                                </label>
                            </dv>
                            <dv class="form-group">
                                <label for="name" class="w-100">
                                    Comment
                                    <textarea name="body" class="form-control" autocomplete="off" rows="5" required></textarea>
                                </label>
                            </dv>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="remember" id="remember" value="<?= $_SERVER['HTTP_USER_AGENT'] ?>">
                                <label class="form-check-label" for="remember">&nbsp;&nbsp;Remember my name for next time I comment</label>
                            </div>
                            <dv class="form-group d-flex justify-content-end">
                                <button type="submit" class="btn btn-success btn-sm" name="comment">
                                    Post Comment
                                </button>
                            </dv>
                        </form>
                        <?= $comment_response; ?>
                    </div>

                        <!--related post-->
                       
                        <div class="col-md-4">
                            <h2>Categories</h2>
                             <div class="list-group" style="margin:40px 0 10px 0;">
                                    <a href="#" class="list-group-item active">Categories</a>
                                    <a href="latest" class="list-group-item">Latest </a>
                                    <a href="popular" class="list-group-item primary">Popular</a>
                                    <a href="politics" class="list-group-item">politics </a>
                                    <a href="sports" class="list-group-item">Sports </a>
                            </div>
                            <hr/>
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
            <?php include 'includes/footer.php'; ?>
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
        if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
    }
                                </script>
        </body>
        </html>