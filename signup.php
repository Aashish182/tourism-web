<?php
session_start();
include("dbconnect.php");
if($_SERVER['REQUEST_METHOD'] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    $city = $_POST['city'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($email) && !empty($password) && !is_numeric($email)) {
        $query="INSERT INTO `form` (`id`, `firstname`, `lastname`, `gender`, `contact`, `city`, `email`, `password`) VALUES
        (NULL, '$firstname', '$lastname', '$gender', '$contact', '$city', '$email', '$password')";
        mysqli_query($con,$query);
        echo "<script type='text/javascript'> alert('Successfully Register') </script>";
    }
    else {
        echo "<script type='text/javascript'> alert('Please entered correct value') </script>";
    }
}

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign-up </title>
</head>
<body>
    <div class="signup">
        <h1>sign up</h1>
        <form method="POST">
            <label> First name </label>
            <input type="text" name="firstname" Required>
            <label> Last name </label>
            <input type="text" name="lastname" Required>
            <label> Gender </label>
            <input type="text" name="gender" Required>
            <label> Contact </label>
            <input type="number" name="contact" Required>
            <label> city  </label>
            <input type="text" name="city" Required>
            <label> email </label>
            <input type="email" name="email" Required>
            <label> Password </label>
            <input type="password" name="password" Required>
            <input type="submit" name="" value="submit">
        </form>
        <p> Already have an account? <a href="login.php"> login</a></p>
</body>
</html>