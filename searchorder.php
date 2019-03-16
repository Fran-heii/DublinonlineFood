<?php  
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> 	

    <!-- Page Title -->
    <title>Dublin Restaurants </title>

    <!-- Favicon - Title page icon -->
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/x-icon">

    <style>
        table 
        {
            width: 70%;
            border-collapse: collapse;
        }

        table, td, th 
        {
            border: 1px solid black;
            padding: 5px;
        }
        th {text-align: left;}
    </style>

</head>

<body bgcolor = 'C9EC3C'>
    
<h3>Tracking Your Order</h3>

<?php
    $enteredid = $_POST['orderid'];

    //echo $enteredid;
    $sql="SELECT * FROM orders WHERE ord_id = '".$enteredid."'";
    $result = mysqli_query($con,$sql);

    echo "<table>
    <tr>
    <th>Order ID</th>
    <th>Customer Name</th>
    <th>Current Order Status</th>
    </tr>";

    while($row = mysqli_fetch_array($result)) 
    {
        echo "<tr>";
        echo "<td>" . $row['ord_id'] . "</td>";
        echo "<td>" . $row['cust_name'] . "</td>";
        echo "<td>" . $row['ord_status'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
?>

<br>

<form action="track.php">
    <input type="submit" value="Back to Order Tracking" />
</form>

<br> 

<form action="index.php">
    <input type="submit" value="Back to Home Page" />
</form>

</body>
</html>