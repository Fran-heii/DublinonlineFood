<?php
include('connect.php');
$success=false;

// user name and password entered on previous page fetched as session parameters
$username = $_POST['username'];
$password = $_POST['password'];

// Query to check if user is present in database, if yes, it logs in
$result = mysqli_query($con, "SELECT * FROM restaurants WHERE username='$username' AND password='$password';");

// when user is present go to administration panel for restaurant
while($row = mysqli_fetch_array($result))
{
	$success = true;
	$user_id = $row['res_id'];
	$name = $row['res_name'];
}

if($success == true)
{	
	session_start();
	$_SESSION['user_id'] = $user_id;
	$_SESSION['name'] = $name;
	header("location: admin-page.php");
}
else
{

	echo "<script type='text/javascript'>
    alert('Incorrect Details Entered, Please Try Again!');
    window.location='login.php';
	</script>";
 
}

?>
