<?php
  $servername = "localhost:3307";
  $username   = "root";
  $password   =  "";
  $dbname     = "dataform";


$conn = mysqli_connect($servername, $username, $password, $dbname);

if($conn) 
{
    
    //echo "Connection successful";

}
 else

{
    echo "Connection failed: ";
}

?>

