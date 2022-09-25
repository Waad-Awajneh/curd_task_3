<?php 
require_once 'connection.php';


$email=$_POST['email'];
$password=$_POST['password'];
$fullName=$_POST['fullName'];
$mobile=$_POST['mobile'];
$birthday=$_POST['birthday'];


$query = "SELECT * from `users` where Email=?";
$query = $connect->prepare($query);
$query->execute([$email]);


$isFound = $query->fetch(PDO::FETCH_OBJ);

if (empty($isFound)) {
    $insert = $connect->prepare("INSERT INTO users (Email,Mobile,FullName,`Password`,Birth) VALUES (?,?,?,?,?)");
    $insert->execute([$email,$mobile,$fullName,$password,$birthday]);

    // Check that the insertion really worked. If the last inserted id is greater than zero, the insertion worked.
    // $lastInsertId = $connect->lastInsertId(); 
 echo "true";
}else{
    // echo "<script>alert('It looks like you’re connected try login. Please ');</script>";
    // echo "<script>window.location.href='login.html'</script>";
    echo "false";
}
  