<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../koneksi.php';

	// membuat variabel untuk menampung data dari form
  $tujuan =$_POST['tujuan'];
  $no_nota =$_POST['no_nota'];
  $ktp =$_POST['ktp'];
  $harga =$_POST['harga'];
  $tanggal=$_POST['tanggal'];
                  // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                  $query = "INSERT INTO nota (tujuan, no_nota, ktp, harga, tanggal) VALUES ('$tujuan', '$no_nota', '$ktp', '$harga', '$tanggal')";
                  $result = mysqli_query($koneksi, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='?menu=home';</script>";
                  }

 