<?php 
include 'connect.php';
include 'koneksi.php';
?>

<h1 class="h3 mb-2 text-gray-800">Daftar Dagangan</h1> 


        
    <?php 
        $huni = new tampil;
        $toko = new Toko;
        if(isset($_GET['aksi'])){
    ?>


    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Tambah Produk</h1>


              </div>
              <form class="penghuni" method="POST" action="tujuan/proses_tambah.php" enctype="multipart/form-data">
                
                  <div class="form-group">
                  <input type="text" class="form-control form-control-toko" id="tujuan" name="tujuan" placeholder="Destinasi" required>
                </div>


                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-penghuni" id="transportasi" name="transportasi" placeholder="Transportasi" required>
                </div>

                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-penghuni" id="waktu" name="waktu" placeholder="Lama Wisata" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-penghuni" id="desk" name="desk" placeholder="Deskripsi Jualan"required>
                </div>

                  <div class="col-sm-6">
                    <input type="number" class="form-control form-control-penghuni" id="harga" name="harga" placeholder="Harga" required>
                  </div>
                </div>
                <div class="form-group row">
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-penghuni" id="tanggal" name="tanggal" placeholder="update" required value="<?php
                      $tgl=date('l, d-m-Y');
                      echo $tgl;
                         ?>">
                 </div>
               </div>
                  <div class="form-group">
                  <label>Foto</label>
                  <input type = "file" name ="file" id="file" class = "form-control" />
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
      }if ($_GET['aksi']=='hapusi'){

        $kodeno = $_GET['kode'];
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

    else{
      ?>
<!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text">AYOO Mulai Wujudkan Keliling Indonesia Versi Kamu!</h6>
      <p></p>
      <a href="?menu=penghuni&aksi=tambah" class="btn btn-user btn-outline-success"><i class="far fa-plus-square"></i>  TAMBAH</a>
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
              <th>Section</th>
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
                    <td>$data[tanggal]</td>
                    <td width='15%' align='center'>
                      <a href='?menu=edit&aksi=rubah&kode=$data[id]' class='btn btn-dark btn-user btn-outline-warning'><i class='fas far fa-pencil-alt'></i></a>      
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