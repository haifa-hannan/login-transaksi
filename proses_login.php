<?php
    if ($_POST) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        include "koneksi.php";
        $query_login=mysqli_query($koneksi,"SELECT * FROM siswa where
        username = '".$username."' and password = '".md5($password)."'");

        if (mysqli_num_rows($query_login)>0) {
            $data_login = mysqli_fetch_array($query_login);
            session_start(); // jika ada penambahan session, tambahkan session_start() agar session dapat terbaca
            $_SESSION['id_siswa']=$data_login['id_siswa'];
            $_SESSION['nama_siswa']=$data_login['nama_siswa'];
            $_SESSION['status_login']=true;
            echo "<script>alert('Login Berhasil');location.href='home.php';</script>";
        }
        else{
            echo "<script>alert('Login Gagal');location.href='index.php';</script>";
        }
    }
?>