<?php
require 'crud.php';

$id = $_GET["id"];
$koneksi = koneksiUts();
$sql = "SELECT * FROM jumbotron WHERE id=". $id;

$data = mysqli_query($koneksi,$sql);

if(isset($_POST["ubah"])){
    if(updateJumbotron($_POST) > ""){
        echo"<script>
        alert('Data berhasil di ubah !');
        document.location.href='jumbotron.php';
        </script>";
    }
    else{
        echo "<script>
        alert('Data gagal di ubah ! ');
        document.location.href='jumbotron.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin WEB</title>

    <?php require_once 'link.php'; ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <?php include 'header.php'; ?>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    
                    <div class="info">
                        <a href="#" class="d-block">Khovifah Yolanda</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item menu-open">
                            <a href="index.php" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Home
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="jumbotron-home.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Sambutan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="slider-home.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Image Slider</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-history"></i>
                                <p>
                                    Profile
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="about-me.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tentang Saya</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-file-image-o"></i>
                                <p>
                                    Gallery
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="galery.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Galeri</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="news.php" class="nav-link">
                                <i class="nav-icon fas fa-newspaper-o"></i>
                                <p>
                                    News
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="news.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Berita</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="contact.php" class="nav-link">
                                <i class="nav-icon fas fa-address-book"></i>
                                <p>
                                    Contact
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="information.php" class="nav-link">
                                <i class="nav-icon fas fa fa-info-circle"></i>
                                <p>
                                    Informasi
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="user.php" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    User
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="faq.php" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Faq
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Ubah Sambutan</h1>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <?php
                                        while($sql = mysqli_fetch_array($data)) {
                                        ?>
                                        <input type="hidden" name="id" value="<?=$sql["id"];?>" />
                                        <div class="form-group">
                                            <label>Welcome</label>
                                            <textarea class="ckeditor" name="welcome" id="welcome" cols="30" rows="10"
                                                value="<?=$sql["welcome"];?>" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input class="btn btn-primary" type="submit" name="ubah" Value="Ubah"
                                                onclick="return confirm('yakin data diubah');" class="btn btn-primary">
                                        </div>
                                        <?php
                                        }
                                        ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php include 'footer.php'; ?>

    </div>

    <?php require_once 'script.php'; ?>
</body>

</html>