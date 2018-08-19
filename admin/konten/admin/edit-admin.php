<?php
include "koneksi/koneksi.php" //memanggil koneksi
?>

<!-- untuk get data parameter edit -->
<?php
@$id_edit = $_GET['id_edit']; //mengambil dari link
$query_edit = $koneksi->query("SELECT * FROM tbl_admin where id_admin='" . $id_edit . "' "); //query untuk menampilkan data per ID
$tampil_edit = $query_edit->fetch_assoc(); //memasukan data ke sebuah array untuk ditampilkan
?>
<!-- ----------------------------- -->


<!-- untuk edit data admin -->
<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = "admin";
    //query edit admin
    $query_tambah = $koneksi->query("UPDATE tbl_admin SET
	username='" . $username . "',password='" . $password . "', level='" . $level . "' where id_admin = '" . $id_edit . "' ");

    // jika berhasil edit maka akan menampilkan dibawah
    if ($query_tambah) {
        echo '<div class="alert alert-success">Data Berhasil di Edit</div>';
        echo "<meta http-equiv=refresh content=1;url='?m1=admin&m2=admin'>";
    }
}
?>

<!-- menampilkan form data edit -->
<div class="row">
    <!-- left column -->
    <div class="col-md-4">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">KELOLA ADMIN</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="" method="post">
                <div class="box-body">

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" value="<?= $tampil_edit['username']; ?>"
                               placeholder="Masukkan Nama" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password" value="<?= $tampil_edit['password']; ?>"
                               placeholder="Masukkan Password" required>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Edit</button>
                    <!-- <button type="reset" name="reset" class="btn btn-danger">Reset</button> -->
                </div>
            </form>
        </div>
    </div>
</div>