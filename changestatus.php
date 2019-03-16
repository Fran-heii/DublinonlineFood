<?php  
include("connect.php");
session_start(); 

$pkg = $_POST['packages'];


if(empty($pkg)) 
{
  echo("You didn't select any package.");
  header ("location: ./menu.php");
} 
else 
{
  // how many items selected
  $N = count($pkg);

  for($i=0; $i < $N; $i++)
  {
    echo($pkg[$i] . " ");
        
    if ($con->connect_error) 
    {
        die("Connection failed: " . $con->connect_error);
    } 
  
    // echo $pkg[$i]; // correctly fetches menu package id
    // echo $_SESSION['user_id']; // correctly fetches corrsponding restaurant id

    $result = mysqli_query($con, "SELECT * FROM menu WHERE menu_id = $pkg[$i]");

    while($row = mysqli_fetch_array($result))    
    {

      if ($row['menu_isavailable'] == 'YES')
      {
        $sql = "UPDATE menu SET menu_isavailable = 'NO'  WHERE menu_id = '$pkg[$i]';";
      }
      else
      {
        $sql = "UPDATE menu SET menu_isavailable = 'YES'  WHERE menu_id = '$pkg[$i]';";
      }
    
      if ($con->query($sql) === TRUE) 
      {
          echo "Record Updated Successfully";
      } else 
      {
          echo "Error Updating Record: " . $con->error;
      }
      
    }

    header("location: menu.php");    
  }

}

?>