<?php
include('connect.php');
?>

<!DOCTYPE html>
<html>

<head>
    <style>
        table 
        {
            width: 80%;
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

<body>
    <form action="confirmorder.php" method="post">
    
        <?php
            // q is restaurant id received as session parameter from placeorder.php page
            $q = $_GET['q'];

            if (!$con) 
            {
                die('Could not connect: ' . mysqli_error($con));
            }

            // only available menu packages will be displayed to the ordering customer
            $sql="SELECT * FROM menu WHERE res_id = '".$q."' and menu_isavailable = 'YES'";
            $result = mysqli_query($con,$sql);

            echo "<table>
            <tr>
            <th>Select</th>
            <th>Menu Package Name</th>
            <th>Description</th>
            <th>Price (€)</th>
            </tr>";
            while($row = mysqli_fetch_array($result)) 
            {
                echo "<tr>";
                echo "<td> <input type='radio' name='orderedpkg[]' value=" . $row['menu_id'] ."> </td>";
                echo "<td>" . $row['menu_name'] . "</td>";
                echo "<td>" . $row['menu_description'] . "</td>";
                echo "<td>" . $row['menu_price'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        ?>

        <input type="hidden" name="q" value="<?php echo $q;?>">            
        <br>
        <input type="submit" name="formSubmit" value="Place Your Order" />

    </form>

</body>

</html>