<!-- mengambil id untuk menampilkan data EDIT -->
<?php
@$id = $_GET['id_edit']; //dari link
$query_edit = $koneksi->query("SELECT * from tbl_gis_dosen where id_gis='" . $id . "'"); //query untuk menampilkan data per ID
$tampil_edit = $query_edit->fetch_assoc(); // memasukkand data kedalam sebuah array untuk ditampilkan
?>
<?php
if (isset($_POST['submit'])) {
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
    //mengambil nama gambar
    $namagambar = $_FILES['gambar'] ['name'];
    //mengambil lokasi path server
    $lokasi = $_FILES['gambar'] ['tmp_name'];
    //menentukan lokasi penyimpnan gambar
    $lokasitujuan = "././img";
    //memindahkan gambar dari web ke path server
    $upload = move_uploaded_file($lokasi, $lokasitujuan . "/" . $namagambar);
    //jika nama gambar kosong
    if (empty($namagambar)) {
        //jika nama gambar kosong
        $query_tambah = $koneksi->query("UPDATE tbl_gis_dosen SET nama='" . $nama . "',npp='" . $npp . "',ttl='" . $ttl . "',jk='" . $jk . "',jabatan='" . $jabatan . "',status_staff='" . $status_staff . "',prodi='" . $prodi . "',alamat='" . $alamat . "',email='" . $email . "',telpon='" . $telpon . "',lat='" . $lat . "',lon='" . $lon . "' where id_gis='" . $id . "' ");

    } else {
        //jika nama gambar tidak kosong 
         $query_tambah = $koneksi->query("UPDATE tbl_gis_dosen SET nama='" . $nama . "',npp='" . $npp . "',ttl='" . $ttl . "',jk='" . $jk . "',jabatan='" . $jabatan . "',status_staff='" . $status_staff . "',prodi='" . $prodi . "',alamat='" . $alamat . "',email='" . $email . "',telpon='" . $telpon . "',lat='" . $lat . "',lon='" . $lon . "',gambar='" . $namagambar . "' where id_gis='" . $id . "' ");
    }

//jika query berhasil    
    if ($query_tambah) {

        echo '<div class="alert alert-success">Data Berhasil di Edit</div>';
        echo "<meta http-equiv=refresh content=1;url='?m1=gis&m2=gis'>";
    }
}
?>
<!-- menampilkan form edit data -->
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
                        <input type="text" class="form-control" value="<?=$tampil_edit['nama']?>" name="nama"
                               placeholder="Masukkan Nama" required>
                    </div>
                    <div class="form-group">
                        <label>NPP</label>
                        <input type="text" class="form-control" value="<?=$tampil_edit['npp']?>" name="npp" placeholder="Masukkan NPP" required>
                    </div>
                    <div class="form-group">
                        <label>TTL</label>
                        <div class='input-group date' id='datepicker1'>
                            <input type='text' class="form-control" value="<?=$tampil_edit['ttl']?>" name="ttl"/>
                            <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <input type="text" class="form-control" value="<?=$tampil_edit['jk']?>" name="jk" placeholder="Masukkan Jenis Kelamin" required>
                    </div>
                    <div class="form-group">
                        <label>Jabatan</label>
                        <input type="text" class="form-control" value="<?=$tampil_edit['jabatan']?>" name="jabatan" placeholder="Masukkan Jabatan" required>
                       
                    </div>
                    <div class="form-group">
                        <label>Status Staff</label>
                        <input type="text" class="form-control" value="<?=$tampil_edit['status_staff']?>" name="status_staff" placeholder="Masukkan Status Staff" required>
                    </div>
                     <div class="form-group">
                        <label>Prodi</label>
                        <input type="text" class="form-control" value="<?=$tampil_edit['prodi']?>" name="prodi" placeholder="Masukkan Prodi" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" placeholder="Alamat" name="alamat" required><?=$tampil_edit['alamat']?></textarea>
                    </div>
                     <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" value="<?=$tampil_edit['email']?>" name="email" placeholder="Masukkan Email" required>
                    </div>
                     <div class="form-group">
                        <label>Telpon</label>
                        <input type="text" class="form-control" value="<?=$tampil_edit['telpon']?>" name="telpon" placeholder="Masukkan Telpon" required>
                    </div>
                    <div class="form-group">
                        <label>Latitude</label>
                        <input type="text" class="form-control" name="lat" value="<?=$tampil_edit['lat']?>" placeholder="Masukkan Latitude" required>
                    </div>
                    <div class="form-group">
                        <label>Longtitude</label>
                        <input type="text" class="form-control" name="lon" value="<?=$tampil_edit['lon']?>" placeholder="Masukkan Lontitude" required>
                    </div>
                    <label>Foto</label>
                    <div class="form-group">
                        <img src="img/<?=$tampil_edit['gambar']?>" class="img-thumbnail img-responsive"
                             style="width:300px; height:300px; margin-bottom:10px;" id="picturebox">
                        <input type="file" accept="image/*" name="gambar" class="form-control" id="btnimage">

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