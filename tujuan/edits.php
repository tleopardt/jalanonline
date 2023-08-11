<?php
  // memanggil file koneksi.php untuk membuat koneksi
include 'koneksi.php';

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['kode'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $kode = ($_GET['kode']);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM destinasi WHERE id='$kode'";
    $result = mysqli_query($koneksi, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
      // apabila data tidak ada pada database maka akan dijalankan perintah ini
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='?menu=penghuni';</script>";
  }         
  ?>
    <style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }
      h1 {
        text-transform: uppercase;
        color: salmon;
      }
    button {
          background-color: salmon;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
          border: 0px;
          margin-top: 20px;
    }
    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
    }
    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: salmon;
    }
    div {
      width: 100%;
      height: auto;
    }
    .base {
      width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: #ededed;
    }
    </style>
    <center>
        <h1>Edit Produk <?php echo $data['tujuan']; ?></h1>
      </center>
      <form method="POST" action="tujuan/edit.php" enctype="multipart/form-data" >
      <section class="base">
        <!-- menampung nilai id produk yang akan di edit -->
        <input name="id" value="<?php echo $data['id']; ?>"  hidden />
        <div>
          <label>Destinasi</label>
          <input type="text" id="tujuan" name="tujuan" value="<?php echo $data['tujuan']; ?>" autofocus="" required="" />
        </div>
        <div>
          <label>Transportasi</label>
         <input type="text" id="tujuan" name="transportasi" value="<?php echo $data['transportasi']; ?>" />
        </div>
        <div>
          <label>Lama Wisata</label>
         <input type="text" id="waktu" name="waktu" required=""value="<?php echo $data['waktu']; ?>" />
        </div>
        <div>
          <label>Estimasi Biaya</label>
         <input type="number" id="harga" name="harga" required="" value="<?php echo $data['harga']; ?>"/>
        </div>
        <div>
          <label>Deskripsi</label>
         <input type="text" id="desk" name="desk" required="" value="<?php echo $data['desk']; ?>"/>
        </div>
        <div>
          <label>Foto</label>
          <img src="data/img/<?php echo $data['file']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
          <input type="file" id="file" name="file" />
          <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah gambar produk</i>
        </div>
        <div>
         <button type="submit">Simpan Perubahan</button>
        </div>
        </section>
      </form>