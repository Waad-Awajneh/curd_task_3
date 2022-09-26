<?php
require_once 'connection.php';
 

//return data from db to update
$query="SELECT * FROM `users` where Email=? ";
$query=$connect->prepare($query);
$query->execute([$_GET['id']]);
$patient=$query->fetch(PDO::FETCH_OBJ);
// print_r($patient);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>curd</title>
</head>
<body>
    
<div class="container">
<div class="col-md-12">
  <h3>Insert user Informations</h3>
 <hr />
</div>
<form action="update.php" method="post">
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" id="name" class="form-control" name="name" value=<?php echo $patient->FullName?>>
  </div>
  <div class="mb-3">
    <label for="Age" class="form-label">Age</label>
    <input type="number" id ="Age" class="form-control" name="Age" value=<?php echo $patient->Age?>>
  </div>
  <div class="mb-3">
    <label for="name" class="form-label">Address</label>
    <textarea id="name" class="form-control" name="Address" ><?php echo $patient->Address?></textarea>
  </div>

  <input type="hidden"  name="id" value=<?php echo $patient->Email?> >
  <input type="submit" name="update" class="btn btn-primary" value="Submit">

</form>

</div>

</body>
</html>


<?php
if(isset($_POST['update']))
{
// print_r($_POST);

$query= $connect->prepare("UPDATE `users` SET `FullName` = ? WHERE `Email` = ?");

$query->execute([$_POST['name'],$_POST['id']]);


echo "<script>alert('patient info Updated successfully');</script>";

/* Code for redirection 2 method */
// echo "<script>window.location.href='index.php'</script>";
header('location:admin.php');

}

