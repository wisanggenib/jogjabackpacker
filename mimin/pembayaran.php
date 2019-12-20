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
                            <h2>Travel Aktif</h2>
                            <p>List pesanan sudah bayar,dikonfirmasi,dan juga sedang berjalan</p>
                        </div>
                        <div class="table-responsive">
                            <table class="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Tanggal Berangkat</th>
                                        <th>Tanggal Pulang</th>
                                        <th>Paket</th>
                                        <th>Total Bayar</th>
                                        <th>Hubungi</th>
                                        <th>No</th>
                                        <th>Selesai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql = "SELECT * FROM pemesanan JOIN paket ON pemesanan.id_paket = paket.id_paket JOIN member ON pemesanan.id_member = member.id_member WHERE pemesanan.status = 'sudah'";
                                        $result = mysqli_query($koneksi, $sql);

                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";

                                    ?>
                                    <tr>
                                        <td><?=$row['nama_member']?></td>
                                        <td><?=$row['tgl_berangkat']?></td>
                                        <td><?=$row['tgl_pulang']?></td>
                                        <td><?=$row['nama']?></td>
                                        <td><?=$row['harga']?></td>
                                        <td><a href="https://wa.me/62<?=$row['no']?>?text=Dear%20traveller%20terima%20kasih%20telah%20menggunakan%20jasa%20Jogjabackpacker.id.%0APesanan%20anda%20telah%20kami%20konfimasi." target="_blank"> <button class="btn btn-default btn-icon-notika"><i class="notika-icon notika-phone"></i> Pesan</button></a></td>
                                        <td><?=$row['no']?></td>
                                        <td><a href="selesai.php?id_pemesanan=<?=$row['id_pemesanan']?>"> <button class="btn btn-danger btn-icon-notika"><i class="notika-icon notika-close"></i> Selesai</button></a></td>
                                    </tr>
                                    <?php
                                    }
                                } else {
                                    echo "0 results";
                                }


                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- List Paket End -->
    <!-- List Pesanan Tidak Aktif -->
    <div class="data-table-area" style="margin-top:50px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>Travel Tidak Aktif</h2>
                            <p>List pesanan Selesai</p>
                        </div>
                        <div class="table-responsive">
                            <table class="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Tanggal Berangkat</th>
                                        <th>Tanggal Pulang</th>
                                        <th>Paket</th>
                                        <th>Total Bayar</th>
                                        <th>No</th>
                                        <th>Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql = "SELECT * FROM pemesanan JOIN paket ON pemesanan.id_paket = paket.id_paket JOIN member ON pemesanan.id_member = member.id_member WHERE pemesanan.status = 'tidak_aktif'";
                                        $result = mysqli_query($koneksi, $sql);

                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";

                                    ?>
                                    <tr>
                                        <td><?=$row['nama_member']?></td>
                                        <td><?=$row['tgl_berangkat']?></td>
                                        <td><?=$row['tgl_pulang']?></td>
                                        <td><?=$row['nama']?></td>
                                        <td><?=$row['harga']?></td>
                                        <td><?=$row['no']?></td>
                                        <td><a href="hapus_pembayaran.php?id_pemesanan=<?=$row['id_pemesanan']?>"> <button class="btn btn-danger btn-icon-notika"><i class="notika-icon notika-close"></i> Hapus</button></a></td>
                                    </tr>
                                    <?php
                                    }
                                } else {
                                    echo "0 results";
                                }


                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- List Pesanan Tidak aktif end -->
    </div>
    </div>


    <?php
    include 'template/footer.php';
    ?>