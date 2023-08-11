<?php 
include '../connect.php';
?>

<h1 class="h3 mb-2 text-gray-800">Data Penjualan</h1> 


        
    <?php 
        $huni = new tampil;
        $toko = new Toko;
        if(isset($_GET['aksi'])){
        if($_GET['aksi']=='tambah'){
    ?>


    <div class="card o-hidden border-0 shadow-lg my-5" >
      <div class="card-body p-0">
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Tambah Produk</h1>


                 <?php 
                  if (isset($_POST['submit'])){

                    $tujuan =$_POST['tujuan'];
                    $transportasi =$_POST['transportasi'];
                    $waktu =$_POST['waktu'];
                    $harga =$_POST['harga'];
                    $desc = $_POST['desc'];
                    $foto = $_POST['foto'];

                    $sim = $toko->simpanjualan($tujuan, $transportasi, $waktu, $harga, $desc, $foto);
                    if ($sim) {
                      ?>
                       <script>
                            Swal.fire({
                              title: 'TAMBAH',
                              text: "Apakah anda yakin TAMBAH?",
                              icon: 'success',
                              showCancelButton: true,
                              confirmButtonColor: '#2CE866',
                              cancelButtonColor: '#d33',
                              confirmButtonText: '<a href="http://localhost/jalanonline/layout/toko.php">OK, TAMBAH!</a>'
                            }).then((result) => {
                              if (result.value) {
                                Swal.fire(
                                  'TAMBAH!',
                                  'Data telah di TAMBAH',
                                  'success'
                                )
                              }
                            })
                          </script>
                      <?php
                    }else{
                      echo "<script>alert('gagal')</script>";
                    }
                  }
                 ?>


              </div>
              <form class="penghuni" method="post">
                
                  <div class="form-group">
                  <input type="text" class="form-control form-control-toko" id="tujuan" name="tujuan" placeholder="Destinasi" required>
                </div>


                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-penghuni" id="transportasi" name="transportasi" placeholder="Transportasi"required>
                </div>

                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-penghuni" id="waktu" name="waktu" placeholder="Lama Wisata" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-penghuni" id="desc" name="desc" placeholder="Deskripsi Jualan"required>
                </div>

                  <div class="col-sm-6">
                    <input type="number" class="form-control form-control-penghuni" id="harga" name="harga" placeholder="Harga" required>
                  </div>
                </div>
                  <div class="form-group">
                  <label>Foto</label>
                  <input type = "file" name = "foto" id="foto" class = "form-control" />
                </div>
                <hr>
                <button type="submit" name="submit" id="submit" class="btn btn-dark btn-user btn-outline-success">simpan</button>
                <a href="?menu=penghuni" class="btn btn-dark btn-user btn-outline-danger">
                  Kembali
                </a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


        <?php

      }elseif($_GET['aksi']=='rubah'){
          $nokode = $_GET['id'];
          
          $getRubah = $toko->GetData("where id='$nokode'");
          $dataRubah = $getRubah->fetch();

          ?>



  <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <div class="row">
            <div class="col-lg-12">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Rubah Penghuni</h1>


                  <?php 
                    if (isset($_POST['submit'])){

                    $tujuan =$_POST['tujuan'];
                    $transportasi =$_POST['transportasi'];
                    $waktu =$_POST['waktu'];
                    $harga =$_POST['harga'];
                    $desc = $_POST['desc'];
                    $foto = $_POST['foto'];

                      $sim = $toko->rubahpeng($tujuan, $transportasi, $waktu, $harga, $desc, $foto);
                      if ($sim) {
                        ?>
                          <script>
                            Swal.fire({
                              title: 'Apakah Anda Yakin?',
                              text: "Anda tidak akan bisa mengubahnya!",
                              icon: 'warning',
                              showCancelButton: true,
                              confirmButtonColor: '#2CE866',
                              cancelButtonColor: '#d33',
                              confirmButtonText: '<a href="http://localhost/jalanonline/layout/toko.php">OK, Rubah!</a>'
                            }).then((result) => {
                              if (result.value) {
                                Swal.fire(
                                  'RUBAH!',
                                  'Your file has been RUBAH.',
                                  'success'
                                )
                              }
                            })
                          </script>
                        <?php
                      }else{
                        echo "<script>alert('gagal')</script>";
                      }
                    }
                    ?>
                </div>
                <form class="penghuni" method="post">

                  <div class="form-group">
                    <input type="text" class="form-control form-control-penghuni" id="tujuan" name="tujuan" placeholder="Destinasi" required <?php echo "value='$dataRubah[tujuan]'"; ?>>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-penghuni" id="transportasi" name="transportasi" placeholder="Transportasi" required <?php echo "value='$dataRubah[transportasi]'"; ?>>
                  </div>
                    <div class="col-sm-6">
                      <input type="text" class="form-control form-control-penghuni" id="waktu" name="waktu" placeholder="Lama Wisata"required <?php echo "value='$dataRubah[waktu]'"; ?>>
                  </div>
                </div>
                  <div class="form-group">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="number" class="form-control form-control-penghuni" id="harga" name="harga" placeholder="Harga"required <?php echo "value='$dataRubah[harga]'"; ?>>
                    </div>
                    <div class="col-sm-6">
                      <input type="text" class="form-control form-control-penghuni" id="desc" name="desc" placeholder="Deskripsi"required <?php echo "value='$dataRubah[desc]'"; ?>>
                  </div>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-penghuni" id="foto" name="foto" placeholder="foto" required <?php echo "value='$dataRubah[foto]'"; ?>>
                  </div>
                  <hr>
                  <button type="submit" name="submit" id="submit" class="btn btn-dark btn-user btn-outline-success">Rubah</button>
                  <a href="?menu=penghuni" class="btn btn-dark btn-user btn-outline-danger">
                    Kembali
                  </a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
          <?php
      }elseif ($_GET['aksi']=='hapusi'){

        $kodeno = $_GET['id'];
        $hapusku = $toko->hapuspeng($kodeno);
        if ($hapusku){
          ?>
          <script>
              Swal.fire({
                title: 'Information',
                text: "Data Berhasil dihapus",
                icon: 'success',
                showCancelButton: true,
                confirmButtonColor: '#272E33',
                cancelButtonColor: '#d33',
                confirmButtonText: 'OK'
              }).then((result) => {
                if (result.value) {
                  document.location.href = '?menu=penghuni';
                }
              })
            </script>
            <?php
        }else{
          echo "<script>alert('gagal')</script>";
        }
      }

    }else{
      ?>
<!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text">DATA KOS</h6>
      <a href="?menu=penghuni&aksi=tambah" class="btn btn-dark btn-user btn-outline-success"><i class="far fa-plus-square"></i>  TAMBAH</a>
      <a href="#"onclick='cetak()' class="btn btn-outline-primary "><i class="fas fa-print"></i></a>
    </div>
     <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
         <thead>
            <tr>
              <th>No</th>
              <th>Destinasi</th>
              <th>Transportasi</th>
              <th>Lama Wisata</th>
              <th>Harga</th>
              <th>Update</th>
            </tr>
          </thead>
          <tbody>
              <?php
                $getdata = $huni->GetData("");
                while ($data = $getdata->fetch()){ 
                  echo
                  "<tr>
                    <td>$data[id]</td>
                    <td>$data[tujuan]</td>
                    <td>$data[transportasi]</td>
                    <td>$data[waktu]</td>
                    <td>$data[harga]</td>
                    <td>$data[update]</td>
                    <td width='15%' align='center'>
                      <a href='?menu=penghuni&aksi=rubah&kode=$data[id]' class='btn btn-dark btn-user btn-outline-warning'><i class='fas far fa-pencil-alt'></i></a>      
                      <a href='?menu=penghuni&aksi=hapusi&kode=$data[id]' class='btn btn-dark btn-user btn-outline-danger'><i class='fas far fa-trash-alt'></i></a></td>
                  </tr>";
                }
              ?>
          </tbody>
          <tfoot>
             <tr>
              <th>Destinasi</th>
              <th>Transportasi</th>
              <th>Lama Wisata</th>
              <th>Harga</th>
              <th>Update</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
  <?php
    }   
 ?>