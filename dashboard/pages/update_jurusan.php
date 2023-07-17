<?php
    include '../../config.php';

    $Kode_Jurusan = $_POST['Kode_Jurusan'];
    $Nama_jurusan = $_POST['Nama_jurusan'];
    $SK_Jurusan = $_POST['SK_Jurusan'];
    $Ketua_Jurusan = $_POST['Ketua_Jurusan'];
    $Keterangan = $_POST['Keterangan'];

    mysqli_query($link,"UPDATE tb_jurusan SET Kode_Jurusan='$Kode_Jurusan', Nama_jurusan='$Nama_jurusan', SK_Jurusan='$SK_Jurusan', Ketua_Jurusan='$Ketua_Jurusan', Keterangan='$Keterangan' WHERE Kode_Jurusan='$Kode_Jurusan'");

    header("location:dataJurusan.php");
?>