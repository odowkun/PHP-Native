<?php

    include '../../config.php';

    $Nama_jurusan = $_POST['Nama_jurusan'];
    $SK_Jurusan = $_POST['SK_Jurusan'];
    $Ketua_Jurusan = $_POST['Ketua_Jurusan'];
    $Keterangan = $_POST['Keterangan'];

    $result = mysqli_query($link,"INSERT INTO tb_jurusan
    VALUES ('','$Nama_jurusan','$SK_Jurusan','$Ketua_Jurusan','$Keterangan')");
    echo $result;

    if ($result) {
        header("location:dataJurusan.php");
        echo "success";
    } else {
        echo "error";
    }


?>