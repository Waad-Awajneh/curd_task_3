<?php
require_once 'connection.php';


$email=$_POST['email'];
$password=$_POST['password'];

// print_r($_POST);

$query=$connect->prepare("SELECT * from `users` where Email=?");

$query->execute([$email]);

$user=$query->fetch(PDO::FETCH_OBJ);

if(!empty($user)){
  
    if($password == $user->Password){
        if ($user->UA!="A"){
        echo "true/$user->FullName";}
        else echo "true/$user->Email/admin";
   }
else{
    echo "false";
}
}else echo "false";