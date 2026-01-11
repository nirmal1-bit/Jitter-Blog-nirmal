<?php
require 'connection.php';
$postId = $_GET['id'];

$selectQuery = "SELECT * FROM posts WHERE id = '$postId'";
$results = mysqli_query($conn, $selectQuery);

if (mysqli_num_rows($results) > 0) {
    $deleteQuery = "DELETE FROM posts WHERE id = '$postId'";
    if (mysqli_query($conn, $deleteQuery) === TRUE) {
        header("Location: post-list.php");
    }
} else {
    header("Location: post-list.php");
}
