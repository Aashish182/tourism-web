<?php
session_start();
include("dbconnect.php");
if($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($email) && !empty($password) && !is_numeric($email)) {
        $query = "select * from form where email = '$email' limit 1";
        $result = mysqli_query($con,$query);

        if($result) {
            if($result && mysqli_num_rows($result) > 0 ) {
                $user_data = mysqli_fetch_assoc($result);
                if($user_data['password'] == $password) {
                    header("location : index.php");
                    die;

                }
            }
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

