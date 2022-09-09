<?php
error_reporting(0);
//deleting post from the table
$error = "";
if (isset($_POST['delete'])) {
    $post_id = intval($_POST['pid']);
    $query = "DELETE FROM posts WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $post_id);
    if ($stmt->execute()) {
        echo "<script> alert('Post deleted successfully!') </script>";
    } else {
        echo "<script>alert('Error deleting post! Try again later.')</script>";
    }
}
