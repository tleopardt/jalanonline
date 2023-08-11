<?php 
 // session_start();
 // include "konek.php";

 // $log = new DB;

 // if (isset($_SESSION['user'])) {
 //   header("location:index.php");
 //   exit;
 // }
 ?>
<!-- <!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>yoyoyoy</title>

  
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
  <div class="container">


    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9"> -->
      <?php 
        // if (isset($_POST['sumbit'])) {
          
        //   $nama_user = $_POST['nama_user'];
        //   $password =  $_POST['password'];

        //   $jw = $log->Login($nama_user,$password);
        //   if ($jw) {
        //     $getuser = $jw->fetch();
        //     $_SESSION['user']=$getuser['nama'];
      ?>
    
      <?php
        //   }
        // }

       ?>
 
       <!--  <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="row">
              
                <div class="p-4">

                  <div class="text-center">
                  <img src="image/jj.png" width="20%" class="img-thumbnail rounded-circle">
                    <h1 class="h4 text-gray-900 mb-4">JulianKingS KOSAN!</h1>
                  </div>







                  <form class="from-group" action="" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="nama_user" name="nama_user" placeholder="Masukan Username Anda..." required="required" autofocus="autofocus">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" required="required">
                    </div>
                    <button type="submit" id="submit" name="submit" class="btn btn-primary btn-user btn-block">Login</button> 
                  </form>





                </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
 -->




 









<?php session_start();
include"konek.php";

$db = new DB;

if(isset($_SESSION['user'])){
  header("location:index.php");
  exit;
}

 ?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="image/jj.png">

  <title>JULIAN PHP</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <script src="js/sweetalert2.all.js"></script>

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <?php 
if(isset($_POST['submit'])){
$nama_user =$_POST['nama_user'];
$Password =$_POST['password'];

$jwb = $db->Login($nama_user,$Password);
if($jwb){
  $getuser = $jwb->fetch();
  $_SESSION['user']=$getuser['nama'];
  ?>
  <script>
  Swal.fire({
  title: 'Apakah Anda Yakin?',
  icon: 'success',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Login'
}).then((result) => {
  if (result.value) {
  document.location.href='index.php';
  }
})
  </script>
  <?php
}

} 

?>




       <div class="text-center">
          <img src="image/jj.png" width="20%" class="img-thumbnail rounded-circle">
            <h1 class="h4 text-gray-900 mb-4">JULIAN PHP</h1>
       </div>

        <div class="card-body">
          <form class="from-group" action="" method="post">
            <div class="form-group">
              <input type="text" class="form-control form-control-user" id="nama_user" name="nama_user" placeholder="Masukan Username Anda..." required="required" autofocus="autofocus">
            </div>
            <div class="form-group">
              <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" required="required">
            </div>
            <button type="submit" id="submit" name="submit" class="btn btn-primary btn-user btn-block">Login</button> 
          </form>
        </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>


