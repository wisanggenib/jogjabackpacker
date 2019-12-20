<?php
include 'template/header.php';
if(empty($_SESSION['id_member'])){
  echo "<script> alert('Anda harus login terlebih dahulu'); window.location = 'login/';</script>";
}else{
  
}
?>

<section class="site-hero overlay page-inside" style="background-image: url(img/hero_2.jpg)">
  <div class="container">
    <div class="row site-hero-inner justify-content-center align-items-center">
      <div class="col-md-10 text-center">
        <h1 class="heading" data-aos="fade-up">Selamat Datang <br> di Jogjabackpacker</h1>
        <p class="sub-heading mb-5" data-aos="fade-up" data-aos-delay="100">Nikmati liburan anda.</p>
      </div>
    </div>
    <!-- <a href="#" class="scroll-down">Scroll Down</a> -->
  </div>
</section>
<!-- END section -->


<!-- END section -->

<section class="section slider-section bg-pattern">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-8">
        <h2 class="" data-aos="fade-up" align="left">5 Day Trip Backpacker</h2>
      </div>
    </div>
    <div class="row mb-5">
      <div class="col-md-6" align="center">
       <img src="img/hero_2.jpg" class="img-responsive" width="500px">
     </div>
     <div class="col-md-6">
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#destinas">Destinasi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#detail">Detail</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#pesan">Pesan</a>
        </li>
      </ul>
      <?php
      $id_paket = $_GET['id_paket'];
      $sql = "SELECT * FROM paket WHERE id_paket = $id_paket";
      $result = mysqli_query($koneksi, $sql);

      if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
                                            // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";

          ?>
          <!-- Tab panes -->
          <div class="tab-content" style="">
            <div id="destinas" class="container tab-pane active"><br>
              <p><?php echo $row['etc'] ?></p>
            </div>
            <div id="detail" class="container tab-pane fade"><br>
              <h3>Harga</h3>
              <p>Rp. <?php echo $row['harga'] ?></p>
              <h3>Detail</h3>
              <p><?php echo $row['detail'] ?></p>
            </div>
            <div id="pesan" class="container tab-pane fade"><br>
              <h3>List Peserta</h3>
              <p>
                <form action="#" method="post" id="formTambah">
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <label for="name">Nama Pemesan</label>
                      <input type="text" id="name" name="id_member" class="form-control ">
                    </div>
                    <div class="col-md-6 form-group">
                      <label for="name">No Whatsapp</label>
                      <input type="number" id="name" class="form-control" name="no">
                    </div>
                    <div class="col-md-6 form-group">
                      <label for="name">Tanggal Berangkat</label>
                      <input type="date" id="name" class="form-control" name="tgl_berangkat">
                    </div>
                    <div class="col-md-6 form-group">
                      <label for="phone">Tanggal Pulang</label>
                      <input type="date" id="phone" class="form-control" name="tgl_pulang">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 form-group" align="center">
                      <input type="submit" value="Pesan Sekarang" class="btn btn-primary"
                      id="tambahkan" name="tambahkan" onclick="javascript:checkYesorNo();">
                    </div>
                  </div>
                </form>
              </p>
              <script>
                function checkYesorNo() {
                  var r = confirm("Apakah Anda Yakin Sudah Memasukkan Data Dengan Benar ?");
                  if (r == true) {
                            // document.getElementById("formTambah").action = "testing2.php";
                            document.getElementById("formTambah").submit();
                          }
                        }
                      </script>

                      <?php
                      if (isset($_POST['tambahkan'])) {
                        $sql = "INSERT INTO pemesanan (id_member,id_paket, tgl_berangkat,tgl_pulang,no,status)
                        VALUES ('$_SESSION[id_member]','$_GET[id_paket]', '$_POST[tgl_berangkat]', '$_POST[tgl_pulang]','$_POST[no]','belum')";

                        if (mysqli_query($koneksi, $sql)) {
                          echo "<script>window.alert('Paket Sukses Ditambahkan');
                          window.location.href='member.php';
                          </script>";
                        } else {
                          echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
                        }
                      }
                      ?>
                    </div>
                  </div>
                  <?php
                }
              } else {
                echo "0 results";
              }


              ?>
            </div>
          </div>
        </div>
      </section>

      <?php
      include 'template/footer.php';
      ?>