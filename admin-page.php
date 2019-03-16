<?php
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
    <title>Restaurant Administration</title>
    <!-- Favicon - Title page icon -->
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/x-icon">
</head>

<body bgcolor = 'C9EC3C'>    
    
    <h2>    
    <?php
    // to fetch session variables that were set on the previous page
    echo "Welcome " . $_SESSION["name"] . "<br>";
    ?>
    </h2>
    
    <!-- css to display menu buttons horizontally in one line -->
    <style type="text/css">
    form    
    {
        display: inline-block;
    }
    </style>

    <form action="menu.php">
        <input type="submit" value="Manage Menu" />
    </form>

    <form action="orders.php">
        <input type="submit" value="Manage Incoming Orders" />
    </form>

    <form action="logout.php">
        <input type="submit" value="Logout from Admin" />
    </form>
    
</body>
    
</html>
