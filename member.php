<?php
include 'template/header.php';
?>

<section class="site-hero overlay page-inside" style="background-image: url(img/hero_2.jpg)">
  <div class="container">
    <div class="row site-hero-inner justify-content-center align-items-center">
      <div class="col-md-10 text-center">
        <h1 class="heading" data-aos="fade-up">Selamat Datang <br> Saudara Satria</h1>
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
    <div class="row justify-content-center text-center mb-5">
      <div class="col-md-8">
        <h2 class="heading" data-aos="fade-up">Pesanan Aktif</h2>
        <br>
        <table class="table table-bordered " data-aos="fade-up">
          <thead class="thead-dark">
            <a href="">
              <tr>
                <th scope="col">Kode</th>
                <th scope="col">Nama Paket</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql = "SELECT * FROM pemesanan JOIN paket ON pemesanan.id_paket = paket.id_paket WHERE pemesanan.id_member = '1'";
              $result = mysqli_query($koneksi, $sql);

              if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                                            // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";

                  ?>
                  <tr>
                    <th scope="row"><?php echo $row['id_pemesanan'] ?></th>
                    <td><?php echo $row['nama'] ?></td>
                    <td><?php echo $row['tgl_berangkat'] ?></td>
                    <?php 
                    if ($row['status']=='belum') {
                      echo "<td class='table-warning'>Belum Bayar</td>";
                    }else if($row['status']=='pending'){
                      echo "<td class='table-warning'>Menunggu Verifikasi Pembayaran</td>";
                    }else if($row['status']=='sudah'){
                      echo "<td class='table-success'>Sudah di Bayar</td>";
                    }else{
                      echo "Unknown Status ERR 999";
                    }

                    ?>
                    
                    <td> <a href="detail.php?id_pemesanan=<?php echo $row['id_pemesanan'] ?>"> <button type="button" class="btn2 btn-info">Detail paket</button> </a></td>
                  </tr>
                  <?php
                }
              } else {
                echo "0 results";
              }


              ?>
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </section>

  <?php
  include 'template/footer.php';
  ?>