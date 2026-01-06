<?php
require 'connection.php';
$catId = $_GET['id'];

$selectQuery = "SELECT * FROM categories WHERE id = '$catId'";
$results = mysqli_query($conn,$selectQuery);

if (mysqli_num_rows($results)>0) {
    $deleteQuery = "DELETE FROM categories WHERE id = '$catId'";
    if (mysqli_query($conn,$deleteQuery)===TRUE) {
        header("Location: list-category.php");
    }
}else{
    header("Location: list-category.php");
}

?>