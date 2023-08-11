<?php 
    include '../connect.php';
 ?>

<?php 
  $desti = new Nama;
 ?>
<?php
  $getdata = $desti->GetData("");
  while ($data = $getdata->fetch()){ 

 ?>
<li class="menu-has-children"><a href=""><?php echo "$data[admin]"; ?></a>
      <ul>
        <li><a href="#">Akun</a></li>
        <li><a href="#">Sinkronisasi</a></li>
        <li><a href="../auth/logout.php">Logout</a></li>
      </ul>
    </li>
<?php
  }
?>


    <?php

      }elseif($_GET['aksi']=='rubah'){
          $nokode = $_GET['kode'];
          
          $getRubah = $huni->GetData("where nik='$nokode'");
          $dataRubah = $getRubah->fetch();

          ?>

          <?php
                $getdata = $huni->GetData("");
                while ($data = $getdata->fetch()){ 
                  echo
                  "<tr>
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

              <?php echo "$data[section]"; ?><a data-toggle="modal" data-target="#add_student"type="button" class="btn btn-outline-success" style="float: right; margin-top: -10px;"><i class="fa fa-shopping-cart"> Pesan</i></a>
              <button type="button" class="btn btn-outline-danger" style="float: right; margin-top: -10px; margin-right: 10px;"><i class="fa fa-heart"> Wishlist</i></button><?php?>