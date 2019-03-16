<?php
include 'connect.php';

  // htmlspecialchars converts special characters entered in fields except phone to HTML characters
  $name = htmlspecialchars($_POST['resname']);
  $username = htmlspecialchars($_POST['username']);
  $password = htmlspecialchars($_POST['password']);
  $address = htmlspecialchars($_POST['address']);
  $phone = $_POST['phone'];
  $iban = htmlspecialchars($_POST['iban']);

  // to handle special characters during insert
  $name = mysqli_real_escape_string($con, $_POST['resname']);
  $username = mysqli_real_escape_string($con, $_POST['username']);
  $address = mysqli_real_escape_string($con, $_POST['address']);
  
  // query to insert restaurant into the table
  $sql = "INSERT INTO restaurants (res_name, username, password, res_address, res_mobile,res_iban) 
          VALUES ('$name', '$username', '$password', '$address', $phone,'$iban');";

  if ($con->query($sql) === TRUE) 
  {
    echo "<script type='text/javascript'>
    alert('Restaurant Registered Successfully');
    window.location='login.php';
    </script>";
  } 

  else 
  {
    echo "Error: " . $sql . "<br>" . $con->error;
  }

?>