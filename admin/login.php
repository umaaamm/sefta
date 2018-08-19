<?php
include "koneksi/koneksi.php"; //memanggil koneksi
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Infomasi Geografis Penyebaran Tempat Tinggal Dosen dan Staf
Perguruan Tinggi Mitra Lampung</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="aset/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="aset/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="aset/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="aset/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="aset/plugins/iCheck/square/blue.css">


    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <!-- /.login-logo -->

    <?php
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $querylogin = $koneksi->query("select level,username,password from tbl_admin where username='" . $username . "' and password='" . $password . "'"); //query untuk login
        $jumlah = mysqli_num_rows($querylogin); //menghitung jumlah baris yang didapatkan
        $data = $querylogin->fetch_assoc(); //untuk memasukan data ke array

        if ($jumlah > 0) {
            if ($data['username']==$username && $data['password']==$password) {
            @$_SESSION['username'] = $data['username']; //menyimpan session
            @$_SESSION['password'] = $data['password']; //menyimpan session
            @$_SESSION['level'] = $data['level']; //menyimpan session untuk parameter di index

            echo '<div class="alert alert-success">Anda berhasil login</div>';
            echo "<meta http-equiv='refresh' content=2;url='./'/>";
            }else{
            echo '<div class="alert alert-danger">Username/Password salah</div>';
            echo "<meta http-equiv='refresh' content='2';url=''/>";
            }
            
        } else {
            echo '<div class="alert alert-danger">Username/Password salah</div>';
            echo "<meta http-equiv='refresh' content='2';url=''/>";
        }
    }
    ?>
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="" method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="username" placeholder="Nama/Username">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <!-- /.social-auth-links -->
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<!-- jQuery 3 -->
<script src="aset/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="aset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="aset/plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
