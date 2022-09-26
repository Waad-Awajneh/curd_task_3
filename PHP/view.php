<?php
require_once "connection.php";

$query=$connect->prepare("SELECT * from `users` where Email=?");

$query->execute([$_GET['id']]);

$patient=$query->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>curd</title>
    <link rel="stylesheet" href="../assets/css/shared/style.css">

</head>
<body>
    

<div class="container" style="display:flex;">
<div class="card mb-3" style="max-width: 700px;">
  <div class="row g-0" style="display: flex; justify-content: space-between;">
    <div class="col-md-3">
      <img src="../image/R.jfif" style="width: 800px;; height:400px"  class="img-fluid rounded-start" alt="patient">
    </div>

    <div class="col-md-5"   style=" margin-top: 150px;margin-left: 50px;">
      <div class="card-body">
        <p class="card-text">Name : <?PHP echo $patient->FullName?></p>
        <p class="card-text">Mobile: <?PHP echo $patient->Mobile?></p>
        <p class="card-text">Birth : <?PHP echo $patient->Birth?></p>
        <p class="card-text">Password : <?PHP echo $patient->Password?></p>
        <p class="card-text">Email : <?PHP echo $patient->Birth?></p>

       <a href="admin.php"><button class="btn btn-primary submit-btn btn-block">back</button></a>
      </div>
    </div>
  </div>
</div>

</div>
</body>
</html>