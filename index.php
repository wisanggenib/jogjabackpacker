<?php
include 'template/header.php';
?>

<section class="site-hero overlay" style="background-image: url(img/hero_1.jpg)">
  <div class="container">
    <div class="row site-hero-inner justify-content-center align-items-center">
      <div class="col-md-10 text-center">
        <h1 class="heading" data-aos="fade-up">Selamat Datang <br><em>di Jogjabackpacker</em></h1>
        <p class="sub-heading mb-5" data-aos="fade-up" data-aos-delay="100">Mari mengenang Yogyakarta bersama.</p>
          <!-- <p data-aos="fade-up" data-aos-delay="100"><a href="#"
              class="btn uppercase btn-primary mr-md-2 mr-0 mb-3 d-sm-inline d-block">Explore The Beauty</a> <a href="#"
              class="btn uppercase btn-outline-light d-sm-inline d-block">Download</a></p> -->
            </div>
          </div>
          <!-- <a href="#" class="scroll-down">Scroll Down</a> -->
        </div>
      </section>
      <!-- END section -->

      <section class="section visit-section">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2 class="heading" data-aos="fade-right">Paket Wisata Kami</h2>
            </div>
          </div>
          <div class="row">
            <?php
            $sql = "SELECT * FROM paket";
            $hasil = mysqli_query($koneksi, $sql);

            if (mysqli_num_rows($hasil) > 0) {
                            // output data of each row
              while ($row1 = mysqli_fetch_assoc($hasil)) {
                                // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";

                ?>
                <div class="col-lg-3 col-md-6 visit mb-3" data-aos="fade-right">

                  <a href="restaurant.html"><img src="img/img_1.jpg" alt="Image placeholder" class="img-fluid"> </a>
                  <h3><a href="restaurant.html"><?php echo $row1['nama'] ?></a></h3>
                  <div>Rp<?php echo $row1['harga'] ?></div>
                  <div class="reviews-star float-left">
                    <?php
                    $bintang = $row1['rating'];
                    for ($i=0; $i < $bintang ; $i++) { 
                      echo "<span class='ion-android-star'></span>";
                    }
                    ?>
                  </div>
                  <span class="reviews-count float-right">
                    3,239 reviews
                  </span>
                  <center>
                    <a href="detail_paket.php?id_paket=<?php echo $row1['id_paket'] ?>" class="btn uppercase btn-primary" style="margin-top: 15px; color: white;">Pesan Sekarang</a>
                  </center>
                </div>
                <?php
              }
            } else {
              echo "0 results";
            }

            ?>
          </div>
        </div>
      </section>
      <!-- END section -->

      <section class="section slider-section bg-pattern">
        <div class="container">
          <div class="row justify-content-center text-center mb-5">
            <div class="col-md-8">
              <h2 class="heading" data-aos="fade-up">Tempat Wisata Terbaik Kami.</h2>
              <p class="lead" data-aos="fade-up" data-aos-delay="100">Dikala penat mulai terasa, mari berkunjung ke jogja
              untuk menjelajah setiap sudut kotanya atau mengenang kenangan lamanya...</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="home-slider major-caousel owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">
                <div class="slider-item">
                  <img src="img/slider-1.jpg" alt="Image placeholder" class="img-fluid">
                </div>
                <div class="slider-item">
                  <img src="img/slider-2.jpg" alt="Image placeholder" class="img-fluid">
                </div>
                <div class="slider-item">
                  <img src="img/slider-3.jpg" alt="Image placeholder" class="img-fluid">
                </div>
                <div class="slider-item">
                  <img src="img/slider-4.jpg" alt="Image placeholder" class="img-fluid">
                </div>
                <div class="slider-item">
                  <img src="img/slider-5.jpg" alt="Image placeholder" class="img-fluid">
                </div>
                <div class="slider-item">
                  <img src="img/slider-6.jpg" alt="Image placeholder" class="img-fluid">
                </div>
              </div>
              <!-- END slider -->
            </div>

          </div>
        </div>
      </section>
      <!-- END section -->

  <!-- <section class="section blog-post-entry bg-pattern">
    <div class="container">
      <div class="row justify-content-center text-center mb-5">
        <div class="col-md-8">
          <h2 class="heading" data-aos="fade-up">Recent Blog Post</h2>
          <p class="lead" data-aos="fade-up">Lorem ipsum dolor sit amet, consectetur adipisicing elit. In dolor, iusto
            doloremque quo odio repudiandae sunt eveniet? Enim facilis laborum voluptate id porro, culpa maiores quis,
            blanditiis laboriosam alias. Sed.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12 post" data-aos="fade-up" data-aos-delay="100">

          <div class="media media-custom d-block mb-4">
            <a href="#" class="mb-4 d-block"><img src="img/img_1.jpg" alt="Image placeholder" class="img-fluid"></a>
            <div class="media-body">
              <span class="meta-post">February 26, 2018</span>
              <h2 class="mt-0 mb-3"><a href="#">Five Reasons to Stay at Villa Resort</a></h2>
            </div>
          </div>

        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12 post" data-aos="fade-up" data-aos-delay="200">
          <div class="media media-custom d-block mb-4">
            <a href="#" class="mb-4 d-block"><img src="img/img_2.jpg" alt="Image placeholder" class="img-fluid"></a>
            <div class="media-body">
              <span class="meta-post">February 26, 2018</span>
              <h2 class="mt-0 mb-3"><a href="#">Five Reasons to Stay at Villa Resort</a></h2>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12 post" data-aos="fade-up" data-aos-delay="300">
          <div class="media media-custom d-block mb-4">
            <a href="#" class="mb-4 d-block"><img src="img/img_3.jpg" alt="Image placeholder" class="img-fluid"></a>
            <div class="media-body">
              <span class="meta-post">February 26, 2018</span>
              <h2 class="mt-0 mb-3"><a href="#">Five Reasons to Stay at Villa Resort</a></h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->
  <!-- END section -->
  <section class="section testimonial-section">
    <div class="container">
      <div class="row justify-content-center text-center mb-5">
        <div class="col-md-8">
          <h2 class="heading" data-aos="fade-up">Testimonial</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
          <div class="testimonial text-center">
            <div class="author-image mb-3">
              <img src="img/person_1.jpg" alt="Image placeholder" class="rounded-circle">
            </div>
            <blockquote>

              <p>&ldquo;Et quidem, impedit eum fugiat excepturi iste aliquid suscipit, tempore, delectus rem soluta
                voluptatem distinctio sed dolores, magni fugit nemo cum expedita. Totam a accusantium sunt aut autem
              placeat officia.&rdquo;</p>
            </blockquote>
            <p><em>&mdash; Jean Smith</em></p>

          </div>
        </div>
        <!-- END col -->
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
          <div class="testimonial text-center">
            <div class="author-image mb-3">
              <img src="img/person_2.jpg" alt="Image placeholder" class="rounded-circle">
            </div>
            <blockquote>
              <p>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. In dolor, iusto doloremque quo odio
                repudiandae sunt eveniet? Enim facilis laborum voluptate id porro, culpa maiores quis, blanditiis
              laboriosam alias&rdquo;</p>
            </blockquote>
            <p><em>&mdash; John Doe</em></p>
          </div>
        </div>
        <!-- END col -->

        <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
          <div class="testimonial text-center">
            <div class="author-image mb-3">
              <img src="img/person_3.jpg" alt="Image placeholder" class="rounded-circle">
            </div>
            <blockquote>

              <p>&ldquo;Nostrum, alias, provident magnam sit blanditiis laboriosam unde quaerat, at ipsam, ratione
                maiores saepe nisi modi corporis quas! Beatae quam, quod aspernatur debitis nesciunt quasi porro ea iste
              nobis aliquid perspiciatis nostrum culpa impedit aut, iure blanditiis itaque similique sunt!&rdquo;</p>
            </blockquote>
            <p><em>&mdash; John Doe</em></p>
          </div>
        </div>
        <!-- END col -->
      </div>
    </div>
  </section>
  <?php
  include 'template/footer.php';
  ?>