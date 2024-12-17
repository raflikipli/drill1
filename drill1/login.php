<?php
session_start();
include 'include/koneksi.php';
if (isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];

    global $conn;
    $stmt =$conn->prepare("SELECT * FROM admin WHERE username = ? AND password = ?");
    $stmt->bind_param('ss',$username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $admin = $result->fetch_assoc();
    if($result->num_rows ==1){
        $_SESSION['admin'] = $admin;
        header('location: dashboard.php');
        exit();
    }
}
?>;

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap/bootstrap1/css/bootstrap.rtl.css">
</head>
<body>
<div class="container d-flex justify-content-center  mt-5    ">
        <div class="col-6 border my-5 ">
            <h1 class="mt-3 text-center">SILAHKAN LOGIN</h1>
            <form action="login.php" method="post" class="mx-3 my-3">
                <div class="mt-3">
                    <label for="username"><b>Username </b></label>
                    <input type="email" name="username" class="form-control" placeholder="masukan username">
                </div>
                <div class="mt-3">
                    <label for="password"><b>Password</b></label>
                    <input type="password" name="password" class="form-control" placeholder="masukan password">
                </div>
                <div class="mt-3">
                    <button class="btn btn-danger w-100" type="submit" name="login"> LOGIN </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>