<?php
include ("connect.php");




?>




<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CRUD</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <a class="btn btn-primary my-5" href="user.php" role="button">Add User</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Password</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
$sql = "SELECT * from  `user`";
$result = mysqli_query($con, $sql);

if($result){
    
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $contact = $row['mobile'];
        $password = $row['password'];

        echo '      
                    <tr>
                    <th>'.$id.'</th>
                    <td>'.$name.'</td>
                    <td>'.$email.'</td>
                    <td>'.$contact.'</td>
                    <td>'.$password.'</td>
                    <td>
                        <a class="btn btn-success" href="update.php?updateid='.$id.'" role="button">Update</a>
                        <a class="btn btn-warning" href="#" role="button">Archive</a>
                        <a class="btn btn-danger" href="delete.php?deleteid='.$id.'" role="button" >Delete</a>
                    </td>
                    </tr>
        
        ';
    }
}

    

                ?>
                

            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" async defer></script>
</body>

</html>