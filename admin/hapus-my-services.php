<?php
require 'crud.php';

$koneksi = koneksiUts();
$id = $_GET["id"];

if (deleteMyServices($id) > 0){
    echo "<script>
    alert('data berhasil di hapus!!!');
    window.location.href='my-services.php';
    </script>";
}

else{
    echo "<script>
    alert('data gagal di hapus!!!');
    window.location.href='my-services.php';
    </script>";
    echo mysqli_error($koneksi);
}

?>