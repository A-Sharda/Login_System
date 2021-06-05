<?php 

  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "attmgsystem";

  $conn = mysqli_connect($servername, $username, $password, $database) ;

  if(!$conn){
      die("Sorry Connection failed" . mysqli_connect_error());
  }
  else{
      //echo "Connection Successful <br/>";
  }


?>