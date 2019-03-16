<!DOCTYPE html>
<html lang="en">
<head>
</head>

<body bgcolor="C9EC3C">
    
    <?php
    include('connect.php');
    session_start();

    $res_id = $_POST['res_id'];
    $amount = $_POST['total'];

    $custname = $_POST['custname'];
    $custaddress = $_POST['custaddress'];
    $phone = $_POST['custnumber'];

    $pkg_name = $_POST['pkg_name'];
    $pkg_desc = $_POST['pkg_desc'];
    $pkg_price = $_POST['pkg_price'];

    // to handle special characters during insert
    $custname = mysqli_real_escape_string($con, $_POST['custname']);
    $custaddress = mysqli_real_escape_string($con, $_POST['custaddress']);
    $pkg_name  = mysqli_real_escape_string($con, $_POST['pkg_name']);
    $pkg_desc  = mysqli_real_escape_string($con, $_POST['pkg_desc']);

    $sql = "INSERT INTO orders (res_id, menu_name, menu_description, menu_price, cust_name, cust_mobile, cust_address, ord_status) 
    VALUES ($res_id,'$pkg_name','$pkg_desc',$pkg_price,'$custname',$phone,'$custaddress','New')";

    if ($con->query($sql) === TRUE) 
    {
        $last_id = $con->insert_id;
        echo "Order Placed successfully. Order ID is: " . $last_id;
    } else 
    {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    echo "<br>";
    echo "<br>";
    echo "<a href='track.php'>Track your order</a>";
    echo "<br>";
    echo "<br>";
    echo "<a href='placeorder.php'>Place another Order</a>";
    echo "<br>";
    echo "<br>";
    echo "<a href='index.php'>Go to Home</a>";

    ?>

</body>
</html>
