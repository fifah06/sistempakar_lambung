<?php
session_start();
require "config.php";

if(isset($_POST["register"])){

    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    // Check if username already exists
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        // Insert new user into the database
        $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', 'user')";
        
        if ($conn->query($sql) === TRUE) {
            header("Location:login.php?msg=registered");
        } else {
            header("Location:register.php?msg=error");
        }
    } else {
        header("Location:register.php?msg=userexists");
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>REGISTER</title>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>

<!-- Validation messages -->
<?php 
if(isset($_GET['msg'])){
    if($_GET['msg'] == "userexists"){
    ?>
    <div class="alert alert-danger" align="center">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Username already exists</strong>
    </div>
    <?php
    } elseif ($_GET['msg'] == "error") {
    ?>
    <div class="alert alert-danger" align="center">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Registration failed. Please try again.</strong>
    </div>
    <?php
    }       
}
?>

<div class="container-fluid" style="margin-top:150px">
    <div class="row">
        <div class="col-lg-4 offset-lg-4">
            <form method="POST">
                <div class="card border-dark">
                    <div class="card-header text-light border-dark" style="background-color: #14b8b8">
                        <strong>REGISTER</strong>
                    </div>
                    <div class="card-body border">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" class="form-control" name="username" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password" autocomplete="off" required>
                        </div>
                        <input type="submit" class="btn btn-block "style="background-color: #14b8b8" name="register" value="Register">
                        <div class="links">
                    Sudah Punya Akun ? <a href="login.php">Masuk</a>
                </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- jquery -->
<script src="assets/js/jquery-3.7.0.min.js"></script>
<!-- bootstrap js -->
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>