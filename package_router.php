<?php
session_start();
include('connect.php');

echo $_SESSION['user_id'];

$id = $_SESSION['user_id'];

$name = $_POST['pkg_name'];
$desc = $_POST['pkg_desc'];
$price = $_POST['pkg_price'];

// to handle special characters during insert
$name = mysqli_real_escape_string($con, $_POST['pkg_name']);
$desc = mysqli_real_escape_string($con, $_POST['pkg_desc']);

$sql = "INSERT INTO menu (res_id, menu_name, menu_price, menu_description) 
VALUES ($id,'$name',$price,'$desc')";

$con->query($sql);
header("location: menu.php");

?>
