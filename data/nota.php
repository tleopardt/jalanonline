<?php 
include 'connect.php';
?>
<h1 class="h3 mb-2 text-gray-800" >Riwayat Pembelian</h1>
<?php 
        $huni = new tampils;
    ?>
<!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text">AYOO Mulai Wujudkan Keliling Indonesia Versi Kamu!</h6>
      <p></p>
      
      
    </div>
     <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
         <thead>
            <tr>
              <th>No</th>
              <th>Nomor Nota</th>
              <th>Tanggal</th>
              <th>Destinasi</th>
              <th>Harga</th>
              <th>Nomor Pelanggan</th>
              <th>Print Nota</th>
            </tr>
          </thead>
          <tbody>
              <?php
              $nomor = 1;
              
                $getdata = $huni->GetData("");
                while ($data = $getdata->fetch()){ 
                 
                  
                  echo
                  "<tr>
                    <td>$nomor</td>
                    <td>$data[no_nota]</td>
                    <td>$data[tanggal]</td>
                    <td>$data[tujuan]</td>
                    <td>$data[harga]</td>
                    <td>$data[ktp]</td>
                    <td width='15%' align='center'>
                    <a href='#'onclick='cetak()' class='btn btn-outline-primary ''><i class='fas fa-print'></i></a>    
                       </tr>";
                $nomor++;
                
                }
              ?>
            
          </tbody>
          <tfoot>
             <tr>
              <th>No</th>
              <th>Nomor Nota</th>
              <th>Tanggal</th>
              <th>Destinasi</th>
              <th>Harga</th>
              <th>Nomor Pelanggan</th>
              <th>Print Nota</th>
            </tr>
          </tfoot>
        </table>
        <script>
            function cetak(){
              Swal.fire({
                title: 'CETAK',
                text: "Data Berhasil dicetak",
                icon: 'success',
                showCancelButton: true,
                confirmButtonColor: '#272E33',
                cancelButtonColor: '#d33',
                confirmButtonText: 'OK'
              }).then((result) => {
                if (result.value) {
                  document.location.href = 'tujuan/cetakpeng.php';
                }
              })
            }
        </script>
      </div>
    </div>
  </div>
  
