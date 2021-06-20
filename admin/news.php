<?php
require 'crud.php';
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
                    <a href="create-news.php" class="btn btn-primary" style="margin-bottom:5px;">Tambah Data</a>
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Berita</h1>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Gambar</th>
                                                <th>Judul</th>
                                                <th>Kategori</th>
                                                <th>Tanggal</th>
                                                <th>Deskripsi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                        $i=1;
                                        $koneksi = koneksiUts();
                                        $data = mysqli_query($koneksi, "SELECT * FROM news ORDER BY id DESC");
                                        while ($row = mysqli_fetch_array($data)){
                                        ?>

                                            <tr>
                                                <td><img src="images/<?= $row['gambar'];?>" alt="" height="100px">
                                                </td>
                                                <td><?= $row['judul'];?></td>
                                                <td><?= $row['kategori'];?></td>
                                                <td><?= $row['tanggal'];?></td>
                                                <td><?= $row['deskripsi'];?></td>
                                                <td>
                                                    <a href="update-news.php?&id=<?= $row["id"]; ?>"
                                                        class="btn btn-info">Edit</a>
                                                    <a href="hapus-news.php?&id=<?= $row["id"];?>"
                                                        class="btn btn-danger"
                                                        onclick="return confirm('yakin data dihapus');">Hapus</a>
                                                </td>
                                            </tr>
                                            <?php $i++;
                                            }
                                            ?>

                                        </tbody>
                                    </table>
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