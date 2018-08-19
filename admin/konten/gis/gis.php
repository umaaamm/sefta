<!-- ini digunakan untuk fungsi hapus data gis  -->
<?php
@$id_delete = $_GET['id_delete'];
if (!empty($id_delete)) {
    $query_hapus = $koneksi->query("DELETE FROM tbl_gis_dosen where id_gis='" . $id_delete . "' ");
    echo '<div class="alert alert-success">Data Berhasil di Hapus</div>';
    echo "<meta http-equiv=refresh content=1;url='?m1=gis&m2=gis'>";
}
?>

<!-- --------- -->

<!-- ini digunakan untuk simpan data gis -->
<?php
if (isset($_POST['submit'])) {
    //input parameter untuk tambah data dari form
    $nama = $_POST['nama'];
    $npp = $_POST['npp'];
    $ttl = $_POST['ttl'];
    $jk = $_POST['jk'];
    $jabatan = $_POST['jabatan'];
    $status_staff = $_POST['status_staff'];
    $prodi = $_POST['prodi'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $telpon = $_POST['telpon'];
    $lat = $_POST['lat'];
    $lon = $_POST['lon'];
    $namagambar = $_FILES['gambar'] ['name'];
    $lokasi = $_FILES['gambar'] ['tmp_name'];

    $lokasitujuan = "././img";
    //jika gambar kosong maka di isi dengan nama noimage.png
    if (empty($namagambar)) {
        $namagambar = "noimage.png";
    }
    $upload = move_uploaded_file($lokasi, $lokasitujuan . "/" . $namagambar); //untuk memindahkan gambar dari storage kita ke path xampp

    //query untuk tambah data
    $query_tambah = $koneksi->query("INSERT INTO tbl_gis_dosen (nama,npp,ttl,jk,jabatan,status_staff,prodi,alamat,email,telpon,lat,lon,gambar)values ('" . $nama . "','" . $npp . "','" . $ttl . "','" . $jk . "','" . $jabatan . "','" . $status_staff . "','" . $prodi . "','" . $alamat . "','" . $email . "','" . $telpon . "','" . $lat . "','" . $lon . "','" . $namagambar . "')");
    echo '<div class="alert alert-success">Data Berhasil di Tambah</div>';
    echo "<meta http-equiv=refresh content=1;url='?m1=gis&m2=gis'>";
}
?>
<!-- -------- -->
<!-- digunakan untuk tampilan form halaman input data GIS -->
<div class="row">
    <!-- left column -->
    <div class="col-md-4">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Kelola Gis Staff</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="" method="post" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama"
                               placeholder="Masukkan Nama" required>
                    </div>
                    <div class="form-group">
                        <label>NPP</label>
                        <input type="text" class="form-control" name="npp" placeholder="Masukkan NPP" required>
                    </div>
                    <div class="form-group">
                        <label>TTL</label>
                        <div class='input-group date' id='datepicker1'>
                            <input type='text' class="form-control" name="ttl"/>
                            <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <input type="text" class="form-control" name="jk" placeholder="Masukkan Jenis Kelamin" required>
                    </div>
                    <div class="form-group">
                        <label>Jabatan</label>
                        <input type="text" class="form-control" name="jabatan" placeholder="Masukkan Jabatan" required>
                    </div>
                    <div class="form-group">
                        <label>Status Staff</label>
                        <input type="text" class="form-control" name="status_staff" placeholder="Masukkan Status Staff" required>
                    </div>
                     <div class="form-group">
                        <label>Prodi</label>
                        <input type="text" class="form-control" name="prodi" placeholder="Masukkan Prodi" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" placeholder="Alamat" name="alamat" required></textarea>
                    </div>
                     <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Masukkan Email" required>
                    </div>
                     <div class="form-group">
                        <label>Telpon</label>
                        <input type="text" class="form-control" name="telpon" placeholder="Masukkan Telpon" required>
                    </div>
                    <div class="form-group">
                        <label>Latitude</label>
                        <input type="text" class="form-control" name="lat" placeholder="Masukkan Latitude" required>
                    </div>
                    <div class="form-group">
                        <label>Longtitude</label>
                        <input type="text" class="form-control" name="lon" placeholder="Masukkan Lontitude" required>
                    </div>
                    <label>Foto</label>
                    <div class="form-group">
                        <img src="img/noimage.png" class="img-thumbnail img-responsive"
                             style="width:300px; height:300px; margin-bottom:10px;" id="picturebox">
                        <input type="file" accept="image/*" name="gambar" class="form-control" id="btnimage" required>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger">Reset</button>
                    </div>
            </form>
        </div>
    </div>
</div>
<!-- ------------ -->
<!-- digunakan untuk menampilkan data gis yang telah di inputkan -->
<div class="col-md-8">
    <?php
    $query = $koneksi->query("SELECT * FROM tbl_gis_dosen");
    ?>

    <div class="box box-primary">
        <div class="box-header with border">
            <h3 class="box-title">Data Gis Staff</h3>
        </div>

        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NPP</th>
                    <th>TTL</th>
                    <th>Jenis Kelamin</th>
                    <th>Jabatan</th>
                    <th>Status Staff</th>
                    <th>Prodi</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Telpon</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Gambar</th>
                    <th>Action</th>
                </tr>
                </thead>

                <?php
                while ($tampil = $query->fetch_assoc()) {
                    @$a++;
                    ?>

                    <tr>
                        <td><?= $a ?></td>
                        <td><?= $tampil['nama'] ?></td>
                        <td><?= $tampil['npp'] ?></td>
                        <td><?= $tampil['ttl'] ?></td>
                        <td><?= $tampil['jk'] ?></td>
                        <td><?= $tampil['jabatan'] ?></td>
                        <td><?= $tampil['status_staff'] ?></td>
                        <td><?= $tampil['prodi'] ?></td>
                        <td><?= $tampil['alamat'] ?></td>
                        <td><?= $tampil['email'] ?></td>
                        <td><?= $tampil['telpon'] ?></td>
                        <td><?= $tampil['lat'] ?></td>
                        <td><?= $tampil['lon'] ?></td>
                        <td><?= $tampil['gambar'] ?></td>
                        <td><a href="javascript:;" data-id="<?php echo $tampil['id_gis'] ?>" data-toggle="modal"
                               data-target="#modal-konfirmasi" class="btn btn-success btn-danger fa fa-trash"></a>&nbsp;<a
                                    href="
						?m1=gis&m2=editgis&id_edit=<?= $tampil['id_gis'] ?>" class="
						btn btn-success btn-warning fa fa-edit"></a></td>
                    </tr>

                <?php } ?>
                </tbody>

            </table>
        </div>
    </div>
    <!-- -------------------- -->

    <!-- untuk modal Hapus Data GIS -->
    <div id="modal-konfirmasi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Konfirmasi</h4>
                </div>
                <div class="modal-body btn-info">
                    Apakah Anda yakin ingin menghapus data ini ?
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-danger" id="hapus-true-data">Hapus</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- --------- -->