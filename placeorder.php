<?php  
include("connect.php");
?>

<!DOCTYPE html>
<html>
<head>

<script>
    function showpkg(str) 
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
                // calling orderpkg.php with clinic id (q) as a parameter
                xmlhttp.open("GET","orderpkg.php?q="+str,true);
                xmlhttp.send();
            }
        }       
</script>

</head>


<body bgcolor="C9EC3C">

<h2>Select Restaurant & Menu Package: </h2>

<?php
     $result = mysqli_query($con, "SELECT res_id, res_name FROM restaurants;");

    // showpkg function written in script above gets called when we select restaurant from dropdown
    echo "<select name='reslist' id='resdropdown' onchange = 'showpkg(this.value)'>";
    echo "<option value= ''> Choose Restaurant to Order From </option>";

    while ($row = mysqli_fetch_array($result))
    {
        echo "<option value='" . $row['res_id'] ."'>" . $row['res_name'] . "</option>";
    }
    echo "</select>";

?>
 
<br> <br>
<div id="txtHint"><b>Menu Packages for Selected Restaurant will be listed below. </b></div>

<br>
<form action="index.php">
    <input type="submit" value="Back to Home Page" />
</form>

</body>

</html>