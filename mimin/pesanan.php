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
                            <h2>Pesanan Pending</h2>
                            <p>Pesanan sudah bayar tapi belum di konfirmasi</p>
                        </div>
                        <div class="table-responsive">
                            <table class="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Tanggal Berangkat</th>
                                        <th>Paket</th>
                                        <th>No</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql = "SELECT * FROM pemesanan JOIN paket ON pemesanan.id_paket = paket.id_paket JOIN member ON pemesanan.id_member = member.id_member WHERE pemesanan.status = 'pending'";
                                        $result = mysqli_query($koneksi, $sql);

                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";

                                    ?>
                                    <tr>
                                        <td><?=$row['nama_member']?></td>
                                        <td><?=$row['tgl_berangkat']?></td>
                                        <td><?=$row['nama']?></td>
                                        <td><?=$row['no']?></td>
                                        <td><a href="detail_pemesanan.php?id_pemesanan=<?=$row['id_pemesanan']?>"> <button class="btn btn-default btn-icon-notika"><i class="notika-icon notika-search"></i> Detail</button></a></td>
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
    <!-- List Add Paket Start -->
    <div class="data-table-area" style="margin-top:30px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>Pesanan Belum Bayar</h2>
                            <p>List pesanan yang belum bayar.</p>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Tanggal Berangkat</th>
                                        <th>Paket</th>
                                        <th>No</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql = "SELECT * FROM pemesanan JOIN paket ON pemesanan.id_paket = paket.id_paket JOIN member ON pemesanan.id_member = member.id_member WHERE pemesanan.status = 'belum'";
                                        $result = mysqli_query($koneksi, $sql);

                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";

                                    ?>
                                    <tr>
                                        <td><?=$row['nama_member']?></td>
                                        <td><?=$row['tgl_berangkat']?></td>
                                        <td><?=$row['nama']?></td>
                                        <td><?=$row['no']?></td>
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
    </div>
    </div>
    <!-- List Add Paket End -->


    <?php
    include 'template/footer.php';
    ?>