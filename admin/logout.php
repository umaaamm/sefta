<?php
session_start(); // memulai session
session_destroy(); //untuk menghancurkan session agar logout
echo "<script>alert('data telah logout')</script>";
echo '<meta http-equiv="refresh" content=1;url="./">';

?>