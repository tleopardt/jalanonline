<?php 
session_start();
include'../connect.php';

$db = new DB;

if(isset($_SESSION['user'])){
  header("location:../layout/master.php");
  exit;
}

 ?>
<!DOCTYPE html>
  <html>
  <head>
  	<meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
  <div class="container">
    <div class="card card-login mx-auto mt-5">
<div class="login-box"></div>
      <h1>Sign In</h1>
      <p>Didn't Have Account?<a href="#">Sign Up Here!</a></p>
	<div class="card-body">
        <?php 
            if(isset($_POST['submit'])){
            $email = $_POST['email'];
            $Password = md5($_POST['password']);

              $jwb = $db->Login($email,$Password);

              if($jwb){
              $getuser = $jwb->fetch();
              $_SESSION['user']=$getuser['admin'];
              }
            }
        ?>
          <form class="form-group" method="post">
            <div class="form-group">
              <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email" required="required">
            </div>
            <div class="form-group">
              <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" required="required">
            </div>
            <button type="submit" id="submit" name="submit" class="btn btn-success btn-block">Sign in</button> 
          </form>
        </div>
  </body>
  </html>