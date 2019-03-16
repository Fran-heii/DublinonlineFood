<?php  
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <!-- javascript code for field validations -->
  <script>
    function validateForm() 
    {
      var a = document.forms["order"]["custname"].value;
      if (a == "") 
      {
        alert("Customer Name can't be empty");
        return false;
      }
      var b = document.forms["order"]["custaddress"].value;
      if (b == "") 
      {
        alert("Customer Address can't be empty");
        return false;
      }
      var c = document.forms["order"]["custnumber"].value;
      if (c == "") 
      {
        alert("Mobile Number is Mandatory");
        return false;
      }

    }
  </script>

  <style>
    table 
    {
        width: 50%;
        border-collapse: collapse;
        table-layout: fixed;
    }
    table, td, th 
    {
        border: 1px solid black;
        padding: 5px;
    }
    th {text-align: left;}
  
    .container 
    {
      width: 400px;
      clear: both;
    }
    .container input
    {
      width: 400px;
      clear: both;
    }
  
  </style>

</head>

<body bgcolor = 'C9EC3C'>
    
<h2>Confirm Your Order</h2>

<form name ="order", action="orderplaced.php", onsubmit = "return validateForm()", method="post">

    <?php

    $total = 0;
    $res_id = $_POST['q'];

    $ordereditem = $_POST['orderedpkg'];

    if(empty($ordereditem)) 
    {
      echo("You have not selected any Menu Item.");
    } 
    else 
    {
      echo "<table>
      <tr>
      <th>Menu Package Name</th>
      <th>Menu Details</th>
      <th>Price (€)</th>
      </tr>
      </table>";

      if ($con->connect_error) 
      {
          die("Connection failed: " . $con->connect_error);
      } 
      
      $sql="SELECT menu_name, menu_description, menu_price FROM menu WHERE menu_id  = '$ordereditem[0]';";
      $result = mysqli_query($con,$sql);
  
      while($row = mysqli_fetch_array($result)) 
      {
          echo "<table>";
          echo "<tr>";
          echo "<td>" . $row['menu_name'] . "</td>";
          echo "<td>" . $row['menu_description'] . "</td>";
          echo "<td>" . $row['menu_price'] . "</td>";          
          echo "</tr>";        

          $total = $total + $row['menu_price'];            

          $name = $row['menu_name'];    
          $desc = $row['menu_description'];    
          $price = $row['menu_price'];   
      }
      echo "</table>";
          
      echo "<div class='container'>";

      echo "<br>";
      echo "<label>Enter your Name : </label>";
      echo "<input type='text' name = 'custname'>";

      echo "<br>";
      echo "<br>";
      echo "<label>Enter your Address : </label>";
      echo "<input type='text' name = 'custaddress'>";

      echo "<br>";
      echo "<br>";
      echo "<label>Your Mobile Number : </label>";
      echo "<input type='number' name = 'custnumber'>";

      echo "</div>";
   
      echo "<h2 name ='total'> Total Cost (in €): " . $total . "</h2> ";

    }
    ?>

    <br>

    <!-- Variables being passed to next page-->
    
    <input type="hidden" name="total" value="<?php echo $total;?>">
    
    <input type="hidden" name="res_id" value="<?php echo $_POST['q'];?>"> 
    
    <input type="hidden" name="pkg_name" value="<?php echo $name;?>">
    <input type="hidden" name="pkg_desc" value="<?php echo $desc;?>">
    <input type="hidden" name="pkg_price" value="<?php echo $price;?>">

    <?php
    
    $sql="SELECT res_id, res_name, res_iban FROM restaurants WHERE res_id  = $res_id;";
    $result = mysqli_query($con,$sql);
  
      while($row = mysqli_fetch_array($result)) 
      {
          $iban = $row['res_iban'];    
      }
    ?>

    <h3> Please make a payment to IBAN: <?php echo $iban; ?> 
    before confirming order using <a href="https://stripe.com/ie" target="_blank"> preferred </a> payment gateway.</h3> 
  
    <br><br>
    <input type="submit" value="Confirm Order"> 
  
  </form>

  

</body>
</html>
