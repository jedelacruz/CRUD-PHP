<?php

include ("connect.php");
$id = $_GET['updateid'];

$sql = "SELECT * from `user` WHERE id=$id";
$result = mysqli_query($con, $sql);

$row = mysqli_fetch_array($result);

$name = $row["name"];
$email = $row["email"];
$contact = $row["mobile"];
$password = $row["password"];

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $contact = $_POST["contact"];
    $password = $_POST["password"];

    // Update query without changing the id
    $sql = "UPDATE `user` SET name='$name', email='$email', mobile='$contact', password='$password' WHERE id=$id";

    // Executing the query
    $result = mysqli_query($con, $sql);
    if ($result) {
        // Redirect to the display page to avoid resubmission
        header("Location: display.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
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

    <div class="container my-5">
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input name="name" type="text" class="form-control" value=<?php echo $name;?>>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input name="email" type="email" class="form-control" value=<?php echo $email;?>>
            </div>
            <div class="mb-3">
                <label class="form-label">Contact Number</label>
                <input name="contact" type="text" class="form-control" value=<?php echo $contact;?>>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input name="password" type="text" class="form-control" value=<?php echo $password;?>>
            </div>
            <button name="submit" type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" async defer></script>
</body>

</html>