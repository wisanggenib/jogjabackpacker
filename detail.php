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
<section class="section bg-pattern">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <?php
        $sql = "SELECT * FROM pemesanan JOIN paket ON pemesanan.id_paket = paket.id_paket JOIN member ON pemesanan.id_member= member.id_member WHERE pemesanan.id_member = '1'";
        $result = mysqli_query($koneksi, $sql);

        if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
          while ($row = mysqli_fetch_assoc($result)) {
                                            // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";

            ?>
            <h3>Detail Pesanan</h3>
            <form style="color: black" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="exampleFormControlInput1">Kode Pemesanan</label>
                <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="<?php echo $row['id_pemesanan'] ?>" disabled>
              </div>

              <div class="form-group">
                <label for="exampleFormControlInput1">Nama Paket</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="<?php echo $row['nama'] ?>" disabled>
              </div>

              <div class="form-group">
                <label for="exampleFormControlInput1">Tanggal Berangkat</label>
                <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="<?php echo $row['tgl_berangkat'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Tanggal Pulang</label>
                <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="<?php echo $row['tgl_pulang'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Total</label>
                <input type="file" name="gambar" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
              </div>
              <div class="form-group" align="center">
                <button type="submit" name="upload" class="btn2 btn-danger">Upload</button>
              </div>
            </form>

          </div>
          <div class="col-md-5">
            <h3>Data Pemesan</h3>
            <table class="table table-bordered" style="background-color: white;">
              <thead>
                <a href="">
                  <tr>
                    <th scope="col">Nama</th>
                    <td scope="col"><?php echo $row['nama_member']; ?></td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">No Wa</th>
                    <td><?php echo $row['no']; ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Total Bayar</th>
                    <td><?php echo $row['harga']*4; ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </section>
      <?php
    }
  } else {
    echo "0 results";
  }
  ?>

  <?php

  if(isset($_POST['upload'])){

    $name = $_FILES['gambar']['name'];
    $target_dir = "img/bukti/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);

  // Select file type
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif");

  //get date now
    $date = date("Y-m-d H:i:s");

  // Check extension
    if( in_array($imageFileType,$extensions_arr) ){

     // Insert record
     $upload = "INSERT INTO pembayaran (id_pemesanan,gambar,tanggal) VALUES ('1', '$name', '$date')";
     mysqli_query($koneksi,$upload);
     $update = "UPDATE pemesanan SET status = 'pending' WHERE id_pemesanan = '1'";
     mysqli_query($koneksi,$update);
     // Upload file
     move_uploaded_file($_FILES['gambar']['tmp_name'],$target_dir.$name);

   }

 }
 ?>
 <?php
 include 'template/footer.php';
 ?>