<?php
require_once 'connection.php';


//return data from db to update
$query = "SELECT * FROM `users` where Email=? ";
$query = $connect->prepare($query);
$query->execute([$_GET['id']]);
$user = $query->fetch(PDO::FETCH_OBJ);
// print_r($patient);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="../assets/css/shared/style.css">
 <title>curd</title>
</head>

<body>

  <div class="container">
    <div class="col-md-12">
      <h3>Insert user Informations</h3>
      <hr />
    </div>
    <form action="update.php" method="post">
      <div class="form-group">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="FullName" name="FullName" id="fullName" value="<?php echo $user->FullName ?>">
          <div class="input-group-append">
            <span class="input-group-text">
              <i class="mdi mdi-check-circle-outline"></i>
            </span>
          </div>
        </div>
      </div>


      <div class="form-group">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Mobile" name="Mobile" id="mobile" value="<?php echo $user->Mobile ?>">
          <div class="input-group-append">
            <span class="input-group-text">
              <i class="mdi mdi-check-circle-outline"></i>
            </span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="input-group">
          <input type="date" class="form-control" style="height:50px;" placeholder="Birth" name="Birth" id="birthday" value="<?php echo $user->Birth ?>">
          <div class="input-group-append">
            <span class="input-group-text">
              <i class="mdi mdi-check-circle-outline"></i>
            </span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="input-group">
          <input type="email" class="form-control" placeholder="Email" name="Email" id="email" value="<?php echo $user->Email ?>">
          <div class="input-group-append">
            <span class="input-group-text">
              <i class="mdi mdi-check-circle-outline"></i>
            </span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="input-group">
          <input type="password" class="form-control" name='Password' placeholder="Password" id="password" value="<?php echo $user->Password ?>">
          <div class="input-group-append">
            <span class="input-group-text">
              <i class="mdi mdi-check-circle-outline"></i>
            </span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <button class="btn btn-primary submit-btn btn-block" name="update" value="Submit">update</button>
      </div>

    </form>

  </div>

</body>

</html>


<?php
if (isset($_POST['update'])) {
  // print_r($_POST);

  $query = $connect->prepare("UPDATE `users` SET `FullName` =?,Email=?,Mobile=?,`Password`=?,Birth=? WHERE `Email` = ?");

  $query->execute([$_POST['FullName'], $_POST['Email'],$_POST['Mobile'],$_POST['Password'], $_POST['Birth'], $_POST['Email']]);


  // echo "<script>alert('patient info Updated successfully');</script>";

  /* Code for redirection 2 method */
  // echo "<script>window.location.href='index.php'</script>";
  header('location:admin.php');
}
