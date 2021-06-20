<?php
require 'crud.php';

$koneksi = koneksiUts();
$id = $_GET["id"];

if (deleteContact($id) > 0){
    echo "<script>
    alert('data berhasil di hapus!!!');
    window.location.href='contact.php';
    </script>";
}

else{
    echo "<script>
    alert('data gagal di hapus!!!');
    window.location.href='contact.php';
    </script>";
    echo mysqli_error($koneksi);
}

?>