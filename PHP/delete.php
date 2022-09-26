<?php
require_once 'connection.php';
$userId = $_GET['del'];

$query = $connect->prepare("DELETE  FROM `users` Where Email=?");
$query->execute([$userId]);
echo "<script>window.location.href='admin.php'</script>";
