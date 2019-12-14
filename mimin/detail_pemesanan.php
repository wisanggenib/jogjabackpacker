    <?php
    include 'koneksi.php';
    include 'template/header.php';
    ?>

    <!-- List Pesanan Start  -->

    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>Detail Pemesanan</h2>
                        </div>
                        <?php
                            $sql = "SELECT * FROM pemesanan JOIN paket ON pemesanan.id_paket = paket.id_paket JOIN member ON pemesanan.id_member = member.id_member JOIN pembayaran ON pemesanan.id_pemesanan = pembayaran.id_pemesanan WHERE pemesanan.status = 'pending' AND pemesanan.id_pemesanan = '$_GET[id_pemesanan]'";
                            $result = mysqli_query($koneksi, $sql);
                            $row = mysqli_fetch_assoc($result);
                        ?>
                        
                        <div class="content">
                            <div class="row">
                                <div class="col-md-8">
                                    <img src="../img/bukti/<?=$row['gambar']?>" alt="">
                                </div>
                                <div class="col-md-4">
                                    <div class="form-example-wrap">
                                        <div class="cmp-tb-hd">
                                            <h2>Detail Pesanan</h2>
                                        </div>
                                        <div class="form-example-int">
                                            <div class="form-group">
                                                <label>Email Address</label>
                                                <div class="nk-int-st">
                                                    <input type="text" class="form-control input-sm"
                                                        placeholder="Enter Email" value="<?=$row['email']?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-example-int mg-t-15">
                                            <div class="form-group">
                                                <label>Nama Member</label>
                                                <div class="nk-int-st">
                                                    <input type="text" class="form-control input-sm"
                                                        placeholder="Nama Member" value="<?=$row['nama_member']?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-example-int mg-t-15">
                                            <div class="form-group">
                                                <label>Paket</label>
                                                <div class="nk-int-st">
                                                    <input type="text" class="form-control input-sm"
                                                        placeholder="Nama Member" value="<?=$row['nama']?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-example-int mg-t-15">
                                            <div class="form-group">
                                                <label>No HP</label>
                                                <div class="nk-int-st">
                                                    <input type="text" class="form-control input-sm"
                                                        placeholder="Nama Member" value="<?=$row['no']?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-example-int mg-t-15">
                                            <div class="form-group">
                                                <label>Tanggal</label>
                                                <div class="nk-int-st">
                                                    <input type="text" class="form-control input-sm"
                                                        placeholder="Nama Member" value="<?=$row['tgl_berangkat']?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-example-int mg-t-15">
                                            <div class="form-group">
                                                <label>Jumlah Bayar</label>
                                                <div class="nk-int-st">
                                                    <input type="text" class="form-control input-sm"
                                                        placeholder="Nama Member" value="<?=$row['harga']?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-example-int mg-t-15">
                                            <button class="btn btn-success notika-btn-success">Terima</button>
                                            <button class="btn btn-danger notika-btn-danger">Tolak</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- List Paket End -->
    </div>
    </div>
    <!-- List Add Paket End -->


    <?php
    include 'template/footer.php';
    ?>