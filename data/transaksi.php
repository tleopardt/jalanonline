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
<html>
  <head>
    <title>Transaksi</title>
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
  </head>
  <body>
      <center>
        <h2>Konfirmasi pembelian produk</h2>
      <center>
      <form class="kasir" method="POST" action="tujuan/proses_nota.php" enctype="multipart/form-data" >
      <section class="base">
        <center>
        <h1>"<?php echo $data['tujuan']; ?>"</h1>
      <center>
        <!-- menampung nilai id produk yang akan di edit -->
        <input name="id" value="<?php echo $data['id']; ?>"  hidden />
        <div>
          <div class="icon"> <img src="data/img/<?php echo $data['file']; ?>" style="width: 300px;margin-bottom: 5px;"></div>
            <input type="text" name="tujuan" id="tujuan" value="<?php echo $data['tujuan']; ?>" hidden/>
            <input type="text" name="tanggal" id="tanggal" value="<?php $tgl=date('l, d-m-Y'); echo $tgl; ?>" hidden>
          <center>"<?php echo $data['desk']; ?>"</center>
          <center style="color: #E91525FF;">Nota Pembayaran</center>
          <input type="text" name="no_nota" id="no_nota" value="<?php echo 'N'.date('dmY').'000'.$data['id']; ?>" autofocus="" required="" style="text-align: center;"/>
          <center style="color: #E91525FF;">Nomor KTP Pelanggan</center>
          <input type="text" name="ktp" id="ktp" placeholder="Wajib Diisi" autofocus="" required="" style="text-align: center;"/>
          
          <em style="float: left;font-size: 11px;color: red; ">*Diperlukan untuk data konsumen</em>
          <p></p>
          <center style="color: #E91525FF;">Total yang harus dibayar</center>
          <input type="text" name="harga" id="harga" value="<?php echo "Rp.".number_format($data['harga'],2,',','.'); ?>" style="text-align: center;"/>
        </div>
        <div>
         <button type="submit" name="submit" id="submit">Pesan Sekarang!</button>

        
        </div>
        </section>
      </form>
  </body>
</html>