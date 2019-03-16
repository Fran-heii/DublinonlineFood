<?php
   include("connect.php");
   session_start();
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Clinic Login</title>

  <!-- CSS to format Login Page -->
  <style>
    .container 
    {
      width: 300px;
      clear: both;
    }
    .container input
    {
      width: 300px;
      clear: both;
    }
  </style>

  <!-- javascript code for field validations -->
  <script>
    function validateForm() 
    {
      var a = document.forms["login"]["username"].value;
      if (a == "") 
      {
        alert("Username can't be empty");
        return false;
      }
      var b = document.forms["login"]["password"].value;
      if (b == "") 
      {
        alert("Password can't be empty");
        return false;
      }
    }
  </script>

</head>

<body bgcolor = 'C9EC3C'>

<h3>Login to Your Restaurant's Control Panel: </h3>

<div class="container">

  <form name="login", action="router.php", onsubmit = "return validateForm()", method="post">
    UserName: <input type="text" name="username"><br> <br>
    Password: <input type="password" name="password"><br><br>
</div>    
    <input type="submit" value = "Login Here">
  </form>

<br><br>

<label for="">If you don't have login:</label> <br> <br>

<style type="text/css">
    form    
    {
        display: inline-block;
    }
</style>

<form action="register.php">
  <input type="submit" value="Register Now" />
</form>
OR
<form action="index.php">
  <input type="submit" value="Go To Home" />
</form>

</body>
</html>


