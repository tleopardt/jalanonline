  <?php 
    $desti = new tampil;
      isset($_GET['aksi'])
  ?>
  <section id="intro">

    <div class="intro-content">
      <h2>Mulai <span>Tourmu</span><br>Sekarang!</h2>
      <div>
        <a href="#about" class="btn-get-started scrollto">Get Started</a>
        <a href="#portfolio" class="btn-projects scrollto">Our Projects</a>
      </div>
    </div>

    <div id="intro-carousel" class="owl-carousel" >
      <div class="item" style="background-image: url('../layout/img/intro-carousel/1.jpg');"></div>
      <div class="item" style="background-image: url('../layout/img/intro-carousel/2.jpg');"></div>
      <div class="item" style="background-image: url('../layout/img/intro-carousel/3.jpg');"></div>
      <div class="item" style="background-image: url('../layout/img/intro-carousel/4.jpg');"></div>
      <div class="item" style="background-image: url('../layout/img/intro-carousel/5.jpg');"></div>
    </div>

  </section><!-- #intro -->
  <!--==========================
      Services Section
    ============================-->
    <section id="services">
      <div class="container">
        <div class="section-header">
          <h2>Destinasi Wisata</h2>
          <p>Sed tamen tempor magna labore dolore dolor sint tempor duis magna elit veniam aliqua esse amet veniam enim export quid quid veniam aliqua eram noster malis nulla duis fugiat culpa esse aute nulla ipsum velit export irure minim illum fore</p>
        </div>
                  <?php
                $getdata = $desti->GetData("");
                while ($data = $getdata->fetch()){ 

                  ?>
        <div class="row">
            <div class="box wow fadeInLeft" style="width: 1500px;">

              
                    <div class="icon"><img src="<?php echo "../data/img/".$data['file']; ?>" width= "50%" style="margin-left: 20%; "></div>
                    <h4 class="title"><a href="#"><?php echo "$data[tujuan]"; ?></a></h4>
                    <p class="description"><?php echo "$data[transportasi]"; ?></p>
                    <p class="description"><?php echo "$data[waktu]"; ?></p>
                    <p class="description">Rp.<?php echo "$data[harga]"; ?>,-</p>
                    <p class="description">
                      <?php echo"
                    <p width='15%' align='center'>
                       <a href='?menu=penghuni&aksi=wishlist&kode=$data[id]' class='btn btn-dark btn-user btn-outline-danger'><i class='fa fa-heart'> Wishlist</i></a>
                      <a href='..?menu=kasir&aksi=beli&kode=$data[id]' class='btn btn-dark btn-user btn-outline-warning'><i class='fa fa-shopping-cart'> Pesan</i></p></a>      
                     "?>
                     </p>
                                
              
              <br></br>
              <br></br>
              <br></br>
                
                
              
            </div>
          </div>
          <?php

    }
    ?>

        </div>
      </div>
    </section><!-- #services -->
    
     