<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> 	

    <!-- Page Title -->
    <title>Order Tracking</title>

    <!-- javascript code for field validations -->
    <script>
        function validateForm() 
        {
            var a = document.forms["track"]["orderid"].value;
            if (a == "") 
            {
            alert("Tracking ID can't be empty");
            return false;
            }
        }
    </script>

</head>

<body bgcolor = 'C9EC3C'>
    <h3>Enter Order ID for Tracking:</h3>
    <form name="track", action="searchorder.php", onsubmit="return validateForm()" method="post">
        <input type="number" name="orderid" id="orderid">
        <input type="submit" value="Track">
    </form>
</body>

<br>
<form action="index.php">
    <input type="submit" value="Back to Home Page" />
</form>

</html>