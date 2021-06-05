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
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
          <div class="flex-box mx-5">
           <h4 class="text-center mt-5">Edit Profile</h4>
             <?php
             $sql = "SELECT * FROM students where st_name = '$user' ";
             $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
             while($record = mysqli_fetch_assoc($result)){
             ?>
           <form class="mt-5" action="/Login_system/edit.php" method="post">
           <div class="row">
             <label class="col-2">Registration No.</label>
             <label class="col-sm-4 mb-2 mr-sm-2"><?php  echo $record['st_id']; ?></label>
           </div>
            <div class="row">
              <label class="col-2">Name</label>
              <input type="text" name="name" class="form-control col-sm-4 mb-2 mr-sm-2" value="<?php  echo $record['st_name']; ?>">
            </div>
            <div class="row">
             <label class="col-2 ">Department </label>
             <input type="text" name="dept" class="form-control col-sm-4 mb-2 mr-sm-2" value="<?php  echo $record['st_dept']; ?>"></div>
            <div class="row">
             <label class="col-2">Batch </label>
             <input type="text" name="batch" class="form-control col-sm-4 mb-2 mr-sm-2" value="<?php  echo $record['st_batch']; ?>">
             </div>
            <div class="row">
             <label class="col-2">Semester </label>
             <input type="text" name="sem" class="form-control col-sm-4 mb-2 mr-sm-2" value="<?php  echo $record['st_sem']; ?>">
            </div>
            <div class="row">
             <label class="col-2">Email </label>
             <input type="text" name="email" class="form-control col-sm-4 mb-2 mr-sm-2" value="<?php  echo $record['st_email']; }?>">
            </div>            
              <input type="submit" name="update" class="btn btn-success mt-5 mx-2" value=Update>
           </form>
     </div>
           <?php 
             $update = false;          
             if ($_SERVER['REQUEST_METHOD'] == 'POST'){
              if (isset( $_POST['update'])){
                  $name = $_POST["name"];
                  $dept = $_POST["dept"];
                  $batch = $_POST["batch"];
                  $sem = $_POST["sem"];
                  $email = $_POST["email"];
                $sql = "UPDATE `students` SET `st_name` = '$name' , `st_dept` = '$dept' , `st_batch` = '$batch' , `st_sem` = '$sem' , `st_email` = '$email' WHERE `students`.`st_name` = '$user' ";
                $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                if($result){
                  $update = true;
                  header("refresh: 0");
                 }
                 else{
                  echo "We could not update the record";
                 }
               }
              }
           ?>
          </div>
       </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
