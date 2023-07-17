<?php 
    include '../../config.php';

    $Kode_Jurusan = $_GET['Kode_Jurusan'];

    mysqli_query($link,"delete from tb_jurusan where Kode_Jurusan='$Kode_Jurusan'");

    header("location:dataJurusan.php");

?>