    <?php
    include 'koneksi.php';
    include 'template/header.php';
    ?>

    <!-- List Paket Start  -->

    <div class="normal-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="normal-table-list mg-t-30">
                        <div class="basic-tb-hd">
                            <h2>List paket</h2>
                            <p>Berikut list paket yang sedang Aktif.</p>
                        </div>
                        <div class="bsc-tbl-cds">
                            <table class="table table-condensed table-hover">
                                <thead>
                                    <tr>
                                        <th>Id Paket</th>
                                        <th>Nama Paket</th>
                                        <th>Harga</th>
                                        <th>Detail</th>
                                        <th>Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $sql = "SELECT * FROM paket";
                                    $result = mysqli_query($koneksi, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";

                                            ?>

                                            <tr>
                                                <td style="vertical-align: middle;"><?php echo $row['id_paket']; ?></td>
                                                <td style="vertical-align: middle;"><?php echo $row['nama']; ?></td>
                                                <td style="vertical-align: middle;">Rp. <?php echo $row['harga']; ?></td>
                                                <td style="vertical-align: middle;"><button class="btn btn-info notika-btn-info btn-sm" data-toggle="modal" data-target="#<?php echo $row['id_paket'] ?>">Detail</button></td>
                                                <td style="vertical-align: middle;"><button class="btn btn-danger notika-btn-danger btn-sm" id="hapuss" onclick="hapusPaket<?php echo $row['id_paket']; ?>();">Hapus</button></td>
                                                <script>
                                                    function hapusPaket<?php echo $row['id_paket']; ?>() {
                                                        var r = confirm("Apakah Anda Yakin Ingin Menghapus Paket");
                                                        if (r == true) {
                                                            window.location.href='hapusPaket.php?id_paket=<?php echo $row['id_paket']; ?>';
                                                        }
                                                    }
                                                </script>
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

                        <?php
                        $sql = "SELECT * FROM paket";
                        $hasil = mysqli_query($koneksi, $sql);

                        if (mysqli_num_rows($hasil) > 0) {
                            // output data of each row
                            while ($row1 = mysqli_fetch_assoc($hasil)) {
                                // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";

                                ?>

                                <div class="modal fade" id="<?php echo $row1['id_paket'] ?>" role="dialog">
                                    <div class="modal-dialog modal-large">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <form action="updateDataPaket.php" method="POST" name="F<?php echo $row1['id_paket'] ?>" id="F<?php echo $row1['id_paket'] ?>">
                                                <div class="modal-body">
                                                    <h2>ID PAKET : <?php echo $row1['id_paket'] ?></h2>
                                                    <input type="hidden" name="id_paket" value="<?php echo $row1['id_paket'] ?>">
                                                    <div class="form-example-wrap mg-t-30">
                                                        <div class="form-example-int form-horizental">
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                                        <label class="hrzn-fm">Nama Paket</label>
                                                                    </div>
                                                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                                        <div class="nk-int-st">
                                                                            <input type="text" name="nama" class="form-control input-sm" placeholder="Masukan Nama Paket" value="<?php echo $row1['nama'] ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-example-int form-horizental">
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                                        <label class="hrzn-fm">Detail Paket</label>
                                                                    </div>
                                                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                                        <div class="nk-int-st">
                                                                            <input type="text" name="detail" class="form-control input-sm" placeholder="Masukan Detail Paket" value="<?php echo $row1['detail'] ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-example-int form-horizental">
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                                        <label class="hrzn-fm">Rating Paket</label>
                                                                    </div>
                                                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                                        <div class="nk-int-st">
                                                                            <input type="number" name="rating" class="form-control input-sm" placeholder="Masukan Rating Paket" value="<?php echo $row1['rating'] ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-example-int form-horizental mg-t-15">
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                                        <label class="hrzn-fm">Harga Paket</label>
                                                                    </div>
                                                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                                        <div class="nk-int-st">
                                                                            <input type="number" name="harga" class="form-control input-sm" placeholder="Masukan Harga Paket" value="<?php echo $row1['harga'] ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-example-int form-horizental mg-t-15">
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                                        <label class="hrzn-fm">Destinasi dan Fasilitas</label>
                                                                    </div>
                                                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                                        <div class="nk-int-st">
                                                                            <textarea name="etc" class="html-editor"><?php echo $row1['etc'] ?></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" onclick="completeAndRedirect<?php echo $row1['id_paket'] ?>();">Ubah Paket</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    <script>
                                                        function completeAndRedirect<?php echo $row1['id_paket'] ?>() {
                                                            var r = confirm("Apakah Anda Yakin Ingin Merubah Data");
                                                            if (r == true) {
                                                                //document.getElementById("myForm").action = "testing2.php";
                                                                document.getElementById("F<?php echo $row1['id_paket'] ?>").submit();
                                                            }
                                                        }
                                                    </script>
                                                </div>
                                            </form>
                                        </div>
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
        </div>
    </div>

    <!-- List Paket End -->
    <!-- List Add Paket Start -->
    <div class="normal-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <form action="#" action="javascript:void(0);" method="POST" id="formTambah">
                        <div class="normal-table-list mg-t-30">
                            <div class="basic-tb-hd">
                                <h2>Tambah Paket</h2>
                            </div>
                            <div class="form-example-int form-horizental">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">Nama Paket</label>
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                            <div class="nk-int-st">
                                                <input type="text" name="nama" class="form-control input-sm" placeholder="Masukan Nama Paket">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int form-horizental">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">Detail Paket</label>
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                            <div class="nk-int-st">
                                                <input type="text" name="detail" class="form-control input-sm" placeholder="Masukan Detail Paket">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int form-horizental">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">Rating Paket</label>
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                            <div class="nk-int-st">
                                                <input type="number" name="rating" class="form-control input-sm" placeholder="Masukan Rating Paket">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int form-horizental mg-t-15">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">Harga Paket</label>
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                            <div class="nk-int-st">
                                                <input type="number" name="harga" class="form-control input-sm" placeholder="Masukan Harga Paket">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int form-horizental mg-t-15">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">Destinasi dan Fasilitas</label>
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                            <div class="nk-int-st">
                                                <textarea name="etc" class="html-editor"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-example-int mg-t-15">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <button type="submit" class="btn btn-success notika-btn-success" id="tambahkan" name="tambahkan" onclick="javascript:checkYesorNo();">Tambahkan</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>


                <script>
                    function checkYesorNo() {
                        var r = confirm("Apakah Anda Yakin Ingin Menyimpan Paket");
                        if (r == true) {
                            // document.getElementById("formTambah").action = "testing2.php";
                            document.getElementById("formTambah").submit();
                        }
                    }
                </script>

                <?php
                if (isset($_POST['tambahkan'])) {
                    $sql = "INSERT INTO paket (nama, detail, harga,rating,etc)
                            VALUES ('$_POST[nama]', '$_POST[detail]', '$_POST[harga]','$_POST[rating]','$_POST[etc]')";

                    if (mysqli_query($koneksi, $sql)) {
                        echo "<script>window.alert('Paket Sukses Ditambahkan');
                                    window.location.href='paket.php';
                              </script>";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
                    }
                }
                ?>

            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- List Add Paket End -->


    <?php
    include 'template/footer.php';
    ?>