
<?php

include 'navbar.php';
include "dbconnect.php";

$firstname = $middlename = $lastname =$gender =$contact= $address =$email =$code = $guest = $succ_msg = $email_err = $err_msg = ""; 
$error = false; 
if (isset($_POST['submit'])) {  
    $firstname=($_POST['firstname']);
    $middlename=($_POST['middlename']);
    $lastname=($_POST['lastname']);
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $contact=($_POST['contact']);
    $address=($_POST['address']);
	$email 	  = trim($_POST['email']);
    $code=trim($_POST['code']);
    $guest=trim($_POST['guest']);
	
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_err = "Invalid email format";
        $error = true;
	}
	
    $sql = "select * from book where email = '$email'";
	$result = mysqli_query($conn,$sql);
	if (mysqli_num_rows($result) > 0) {
		$email_err = "Email already exists";
		$error = true;
    }
    
	if (!$error) {
		
		
		$sql = "insert into book (firstname,middlename,lastname,gender,contact,address,email,code,guest) values ('$firstname','$middlename','$lastname','$gender','$contact','$address','$email','$code','$guest')";
		
		$result = mysqli_query($conn,$sql);
        
        // if ($result) {
        //     $sql = "select * from trip where code= ?";
	    //     $stmt = $conn->prepare($sql);
	    //     $stmt->bind_param("ss", $code);
	    //     if ($stmt->execute()){
		//         $result = $stmt->get_result();
		//         if ($result->num_rows >0) {
		// 	        $row = $result->fetch_assoc();
		// 	        $_SESSION['tripname'] = $row['tripname'];
		// 	        $_SESSION['prize'] = $row['prize'];
			
		//         }
		//         else 
		// 	        $err_msg = "Incorrect trip code";
	    //     }
	    //     else 
		//         $err_msg = "Some Error occurred";
        // }

        if ($result) {
        $sql = "select * from book INNER JOIN trip ON book.code = trip.code where book.email = ? and book.firstname = ? and trip.code=? ";
	    $stmt = $conn->prepare($sql);
	    $stmt->bind_param("sss", $email, $firstname,$code);
	    if ($stmt->execute()){
		    $result = $stmt->get_result();
		    if ($result->num_rows >0) {
			    $row = $result->fetch_assoc();
			    $_SESSION['firstname'] = $row['firstname'];
			    $_SESSION['code'] = $row['code'];
                $_SESSION['tripname'] = $row['tripname'];
			    $_SESSION['prize'] = $row['prize'];
                $_SESSION['middlename'] = $row['middlename'];
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['contact'] = $row['contact'];
                $_SESSION['email'] = $row['email'];
                header("location:recipt.php");
                exit();
		    }
		    else 
			    $err_msg = "Incorrect Email id/name";
	    }
	    else 
		    $err_msg = "Some Error occurred";
        
		}
        
    }
		else
        {
			$err_msg = "Error in Booking";
		}
    
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <body>
    
        <h1>Book Now ! </h1>
        <h2> And Get Extra Bonus </h2> 
        <form method="POST">
            <label> First name </label>
            <input type="text" name="firstname" placeholder="Enter First Name" Required><br>
            <label> Middle name </label>
            <input type="text" name="middlename" placeholder="Enter Middle Name" Required><br>
            <label> Last name </label>
            <input type="text" name="lastname" placeholder="Enter Last Name" Required><br>
            <span>
            <label>
            <input type="radio" name="gender" value="male">Male</label>
            <label>
            <input type="radio" name="gender" value="female">Female</label>
            <label>
            <input type="radio" name="gender" value="other">Other</label>
            </span><br>
            <label> Contact </label>
            <input type="tel" pattern="[0-9]{10}" maxlength="10" name="contact" Required><br>
            <label> Address </label>
            <input type="text" name="address" placeholder="Address" Required><br>
            <label> Email </label>
            <input type="email" name="email" placeholder="Email" Required><br>
            <label> Enter trip code </label>
            <input type="" name="code" placeholder="Enter trip code" Required><br>
            <label> Total number of guests </label>
            <input type="number" name="guest" placeholder="Number Of Guests" Required><br>
            <label for="date">Date:</label>
            <input type="date" id="date" name="date">

            <div class="button">
                <button type="submit" class="btn" name="submit">Submit</button>
            </div>
        </form>
        

</body>
</body>
</html>