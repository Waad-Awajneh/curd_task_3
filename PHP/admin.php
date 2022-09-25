<?php
require_once 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">  
    <title>curd</title>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Users Informations</h3>
                <hr /> 
                <a href="create.php"><button class="btn btn-primary"> Add user</button></a>
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Birth</th>
                            <th>Password</th>
                            <th>View</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * from `users`";
                            $query = $connect->prepare($query);
                            $query->execute();

                            //Assign the data which you pulled from the database (in the preceding step) AS Object to a $patients
                        
                            $users = $query->fetchAll(PDO::FETCH_OBJ);
// print_r($patients);  
$c=0;
                            if ($query->rowCount() > 0) 
                                //In case that the query returned at least one record, we can echo the records within a foreach loop:
                                foreach ($users as $user) {
                            ?>
                                    <!-- Display Records -->
                                    <tr>
                                        <td><?php echo $c++ ?></td>
                                        <td><?php echo $user->FullName ?></td>
                                        <td><?php echo $user->Mobile ?></td>
                                        <td><?php echo $user->Email ?></td>
                                        <td><?php echo $user->Birth ?></td>
                                        <td><?php echo $user->Password ?></td>
                                        <td><a href="view.php?id=<?php echo htmlentities($user->Email); ?>"><button class="btn btn-Info btn-xs"><span class="glyphicon glyphicon-user"></span></button></a></td>
                                        <td><a href="update.php?id=<?php echo htmlentities($user->Email); ?>"><button class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></a></td>
                                        <td><a href="delete.php?del=<?php echo htmlentities($user->Email); ?>"><button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><span class="glyphicon glyphicon-trash"></span></button></a></td>
                                    </tr>
                            <?php

                                }
                             ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php


// $query=$connect->prepare("SELECT * from `patients_info` where id=?");

// $query->execute([$_GET['id']]);

// $patient=$query->fetch(PDO::FETCH_OBJ);


                            ?>
                                     

</body>

