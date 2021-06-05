<?php
session_start();
include 'conn.php';
$user = $_SESSION['username'];
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: index.php");
    exit;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Welcome <?php echo $_SESSION['username']?></title>
  </head>
  <body>
  <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">  
       <ul class="navbar-nav me-auto mb-2 mb-lg-0">
         <li class="nav-item">
           <a class="nav-link active" href="/Login_System/login_session_start.php">Display</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="/Login_System/edit.php">Edit</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="/Login_System/logout.php">Logout</a>
         </li>
        </ul>
       </nav>
       
          <div class="flex-box">
            <h4 class="text-center mt-5">Your Details</h4>
            <?php 
             $sql = "SELECT * FROM students where st_name = '$user' ";
             $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));    
            ?>
            <table class="table table-hover table-borderless table-responsive mx-4 mt-5">
             <tr><th>Registration No. :</th><td><?php while($record = mysqli_fetch_array($result)){ echo $record['st_id'];?> </td></tr>
             <tr><th>Name : </th><td><?php echo $record['st_name']; ?></td></tr>
             <tr><th>Department :</th><td><?php echo $record['st_dept'];?></td></tr>
             <tr><th>Batch :</th><td><?php echo $record['st_batch'];?></td></tr>
             <tr><th>Semester :</th><td><?php echo $record['st_sem'];?></td></tr>
             <tr><th>E-mail :</th><td><?php echo  $record['st_email']; }?></td></tr>        
            </table>
          </div>
       </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
