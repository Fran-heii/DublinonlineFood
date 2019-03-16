<?php  
include("connect.php");
session_start(); 

$newstatus = $_POST['orderstatus']; //changed order status
$orderID = $_POST['order']; //order_id

//echo $newstatus; //status coming from previous page
//echo $orderID; // array

if(empty($orderID)) 
{
  echo("You didn't select any order.");
	echo "<script type='text/javascript'>
    alert('You didn't select any orders, Please Try Again!');
    window.location='orders.php';
  </script>";
} 
else 
{
    
    if ($con->connect_error) 
    {
        die("Connection failed: " . $con->connect_error);
    } 

    $sql = "UPDATE orders SET ord_status = '$newstatus' WHERE ord_id = $orderID[0];";

    if ($con->query($sql) === TRUE) 
    {
        echo "Order Updated Successfully";
    } 

    else 
    {
        echo "Error Updating Order: " . $con->error;
    }
    
    header("location: orders.php");
   
}

?>