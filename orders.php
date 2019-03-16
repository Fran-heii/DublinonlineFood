<?php
include('connect.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> 	

    <!-- Page Title -->
    <title>Orders</title>
    <!-- Favicon - Title page icon -->
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/x-icon">

    <script>
        function showUser(str) 
        {
            if (str == "") 
            {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } 
            else 
            {
                if (window.XMLHttpRequest) 
                {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
                } 
                else 
                {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() 
                {
                    if (this.readyState == 4 && this.status == 200) 
                    {
                        document.getElementById("txtHint").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","changeorderstatus.php?q="+str,true);
                xmlhttp.send();
            }
        }
    </script>

    <style>
        table 
        {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        table, td, th 
        {
            border: 1px solid black;
            padding: 5px;
        }
        th {text-align: left;}
    </style>

</head>

<body bgcolor="C9EC3C">

    <form action="admin-page.php">
        <input type="submit" value="Back to Admin Page" />
    </form>

    <h2>

    <?php
        // Echo session variables that were set on previous page
        echo "Restaurant Name: " . $_SESSION["name"] . "<br>";

    ?>
    </h2>

    <h3>Manage Your Orders Here: </h3>

    <form action="changeorderstatus.php" method="post">
    <?php

        $id = $_SESSION['user_id']; //this is restaurant id
        // echo $id;

        $sql="SELECT * FROM orders WHERE res_id = '".$id."'";
        $result = mysqli_query($con,$sql);

        echo "<table>
        <tr>
        <th>Select</th>
        <th>Order ID</th>
        <th>Menu Package</th>
        <th>Description</th>
        <th>Price</th>
        <th>Cust Name</th>
        <th>Cust Mobile</th>
        <th>Cust Address</th>
        <th>Order Status</th>
        </tr>";

        while($row = mysqli_fetch_array($result)) 
        {
            echo "<tr>";
//          echo "<td> <input type='radio' name='order[]' value=" . $row['ord_id'] ."> </td>";
            echo "<td> <input type='radio' name='order' value=" . $row['ord_id'] ."> </td>";
            echo "<td>" . $row['ord_id'] . "</td>";
            echo "<td>" . $row['menu_name'] . "</td>";     
            echo "<td>" . $row['menu_description'] . "</td>";     
            echo "<td>" . $row['menu_price'] . "</td>";     
            echo "<td>" . $row['cust_name'] . "</td>";
            echo "<td>" . $row['cust_mobile'] . "</td>";
            echo "<td>" . $row['cust_address'] . "</td>";
            echo "<td>" . $row['ord_status'] . "</td>";    
            echo "</tr>";
        }
        echo "</table>";
    ?>

        <br>
        <label for="">Change Order Status : </label>
        
        <select name="orderstatus">
            <option value="New">New</option>
            <option value="Accepted">Accepted</option>
            <option value="In Process">In Process</option>
            <option value="Dispatched">Dispatched</option>
            <option value="Delivered">Delivered</option>
        </select>

        <input type="submit" name="formSubmit" value="Select Order and Click to Change its Status" />

    </form>
    <br>
</body>

</html>
