<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../koneksi.php';

	// membuat variabel untuk menampung data dari form
  
  $tujuan =$_POST['tujuan'];
  $transportasi =$_POST['transportasi'];
  $waktu =$_POST['waktu'];
  $harga =$_POST['harga'];
  $desk = $_POST['desk'];
  $tanggal = $_POST['tanggal'];
  $file = $_FILES['file']['name'];


//cek dulu jika ada gambar produk jalankan coding ini
if($file != "") {
  $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $file); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['file']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$file; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, 'c:/xampp/htdocs/jalanonline/data/img/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                  // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                  $query = "INSERT INTO destinasi (tujuan, transportasi, waktu, harga, desk, tanggal, file) VALUES ('$tujuan', '$transportasi', '$waktu', '$harga', '$desk', '$tanggal', '$nama_gambar_baru')";
                  $result = mysqli_query($koneksi, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>
                            Swal.fire({
                              title: 'TAMBAH',
                              text: 'Apakah anda yakin TAMBAH?',
                              icon: 'success',
                              showCancelButton: true,
                              confirmButtonColor: '#2CE866',
                              cancelButtonColor: '#d33',
                              confirmButtonText: '<a href='http://localhost/jalanonline/?menu=penghuni'>OK, TAMBAH!</a>'
                            }).then((result) => {
                              if (result.value) {
                                Swal.fire(
                                  'TAMBAH!',
                                  'Data telah di TAMBAH',
                                  'success'
                                )
                              }
                            })
                          </script>";
                    
                  }

            } else {     
             //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='?menu=home';</script>";
            }
} else {
   $query = "INSERT INTO destinasi (tujuan, transportasi, waktu, harga, desk, tanggal, file) VALUES ('$tujuan', '$transportasi', '$waktu', '$harga', '$desk', '$tanggal', null)";
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
}

 