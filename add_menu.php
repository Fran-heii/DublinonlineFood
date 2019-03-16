<?php  
include("connect.php");
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Manage Menu</title>

  <!-- CSS to format the page -->
  <style>
    .container 
    {
      width: 500px;
      clear: both;
    }
    .container input
    {
      width: 500px;
      clear: both;
    }
  </style>

  <!-- javascript code for field validations -->
  <script>
    function validateForm() 
    {
      var a = document.forms["pkg"]["pkg_name"].value;
      if (a == "") 
      {
        alert("Menu Package Name can't be empty");
        return false;
      }
      var b = document.forms["pkg"]["pkg_desc"].value;
      if (b == "") 
      {
        alert("Menu Description can't be empty");
        return false;
      }

      var c = document.forms["pkg"]["pkg_price"].value;
      if (c == "") 
      {
        alert("Price can't be empty");
        return false;
      }
    }
  </script>


</head>

<body bgcolor="C9EC3C">

<h3>Add Menu Packages to Your Restaurant</h3>
<h2>
<?php
  // Echo session variables that were set on previous page
  echo "Welcome " . $_SESSION["name"] . "<br>";
  ?>
</h2>

<div class="container">
  <form name="pkg", action="package_router.php", onsubmit="return validateForm()", method="post">
    Menu Package Name: <input type="text" name="pkg_name"><br> <br>
    Description: <input type="text" name="pkg_desc"><br> <br>
    Price: <input type="number" step="0.1" name="pkg_price"><br><br>
</div>
    <input type="submit" value = "Add Menu Package">
  </form>

  <br><br>
  <form action="admin-page.php">
        <input type="submit" value="Back to Admin Page" />
  </form>
 
  
</body>

</html>