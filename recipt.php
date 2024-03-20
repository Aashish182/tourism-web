<?php 
// include("dbconnect.php");
include("navbar.php");


// session_start();

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipt</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <h1>Recipt</h1><br><br>
    <h4>Trip code=<?php if (isset($_SESSION['code']))
            echo $_SESSION['code']; ?></h4>
    <h4>Prize=<?php if (isset($_SESSION['prize']))
            echo $_SESSION['prize']; ?></h4>
    <h4>Trip name=<?php if (isset($_SESSION['tripname']))
            echo $_SESSION['tripname']; ?></h4>
            <h4>Name =<?php if (isset($_SESSION['firstname']))
            echo $_SESSION['firstname']." ".$_SESSION['middlename']." ".$_SESSION['lastname'] ?></h4>
            <h4>Contact =<?php if (isset($_SESSION['contact']))
            echo $_SESSION['contact']; ?></h4>
            <h4>Email =<?php if (isset($_SESSION['email']))
            echo $_SESSION['email']; ?></h4>
            <h4> Our Email = Globexplore@gmail.com </h4>
</body>
</html>