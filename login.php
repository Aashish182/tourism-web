<?php
session_start();
include("dbconnect.php");
if($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($email) && !empty($password) && !is_numeric($email)) {
        $query = "select * from form where email = '$email' and password='$password'";
        $result = mysqli_query($con,$query);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if($count==1) {
            header("Location:index.html");
        }
        else {
            echo '<script>
                window.location.href = "index.html";
                alert("Login failed . Invalid username or password!!")
                </script>';
        }

        
        echo "<script type='text/javascript'> alert('wrong username or password ') </script>";
    }
    else {
        echo "<script type='text/javascript'> alert('wrong username or password ') </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="login">
        <h1> Login </h1>
        <form method="POST">
            <label> Email </label>
            <input type="email" name ="email" Required>
            <label> Password </label>
            <input type="password" name="password" Required>
            <input type="submit" name="" value="Submit">
        </form>
        <p> Don't have an account? <a href="signup.php"> Sign-up here </a></p>

</body>
</html>
