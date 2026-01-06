<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $age = $_POST['age'];
    $details = $_POST['details'];
    echo "Your Name: $firstName $lastName and your age is $age and your details is $details";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="form.php" method="post">
        <label for="fname">First Name</label>
        <input type="text" name="fname" placeholder="First Name">
        <br><br>
        <label for="lname">Last Name</label>
        <input type="text" name="lname" placeholder="Last Name">
        <br><br>

        <label for="age">Age</label>
        <input type="number" name="age" placeholder="Age">
        <br><br>

        <label for="details">Details</label>
        <textarea name="details" id=""></textarea>
        <br><br>

        <input type="submit" name="save" value="Save">
    </form>
</body>
</html>