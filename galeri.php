<?php
require 'koneksi_uts.php';

session_start();
if (!isset($_SESSION['email'])){
header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Galeri | Khovifah.Y</title>

    <!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/owl.carousel.min.css" rel="stylesheet">
    <link href="css/icomoon.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/microchip.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>
<!--/head-->
<?php
    require 'header.php';
    ?>
<body>

    <header id="header">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-12">
                        <div class="top-number">
                            <p><i class="fa fa-phone-square"></i> +0123 456 70 90</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="social">
                            <ul class="social-share">
                                <li><a href="https://web.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                               <li> <a href="https://www.youtube.com/user/YT"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="https://www.instagram.com"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                            <div class="search">
                                <form role="form">
                                    <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                                    <i class="fa fa-search"></i>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.top-bar-->

        <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                    <li><a href="home.php">Home</a></li>
                        <li><a href="profil.php">Profile</a></li>
                        <li class="active"><a href="galeri.php">Galeri</a></li>
                        <li><a href="artikel.php">Article</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
            <!--/.container-->
        </nav>
        <!--/nav-->

    </header>
    <!--/header-->

    <div class="page-title" style="background-image: url(images/page-title.png)">
        <h1>Galeri</h1>
    </div>
        <!-- Blog Entries Column -->
            <div class="title">
                <h3>GALERI</h3>
                <hr>
                <section id="news-main">
                <div class="row">
                    <?php
                    $i = 1;
                    $koneksi = koneksiUts();
                    $galery = mysqli_query($koneksi, "SELECT * FROM galery WHERE kategori = 1 ORDER BY id DESC ");
                    while ($row = mysqli_fetch_array($galery)) {
                    ?>
                    <div class="col-lg-4 col-md-3 col-xs-12 col-sm-12">
                        <div class="col-news">
                            <a href="#" class="pop">
                                <img src="admin/images/<?= $row['gambar'];?>" alt="">
                                <h2 style="text-align: center;"><?= $row['judul'];?></h2>
                            </a>
                        </div>
                    </div>
                    <?php
                    $i++;
                    } ?>
                </div>
            </section>
            

    <section id="portfolio">
        <div class="container">

            <!--/#portfolio-filter-->

            <div class="row">
                <div class="portfolio-items">
                    <div class="portfolio-item apps col-xs-12 col-sm-4 col-md-3 single-work">
                        <div class="recent-work-wrap">
                            <img class="img-responsive" src="images/portfolio/images (1).jpg" alt="">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <a class="preview" href="images/portfolio/images (1).jpg" rel="prettyPhoto"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.portfolio-item-->

                    <div class="portfolio-item joomla bootstrap col-xs-12 col-sm-4 col-md-3 single-work">
                        <div class="recent-work-wrap">
                            <img class="img-responsive" src="images/portfolio/images (2).jpg" alt="">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <a class="preview" href="images/portfolio/images (2).jpg" rel="prettyPhoto"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.portfolio-item-->

                    <div class="portfolio-item bootstrap wordpress col-xs-12 col-sm-4 col-md-3 single-work">
                        <div class="recent-work-wrap">
                            <img class="img-responsive" src="images/portfolio/images (3).jpg" alt="">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <a class="preview" href="images/portfolio/images (3).jpg" rel="prettyPhoto"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.portfolio-item-->

                    <div class="portfolio-item joomla wordpress apps col-xs-12 col-sm-4 col-md-3 single-work">
                        <div class="recent-work-wrap">
                            <img class="img-responsive" src="images/portfolio/images (4).jpg" alt="">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <a class="preview" href="images/portfolio/images (4).jpg" rel="prettyPhoto"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.portfolio-item-->

                    <div class="portfolio-item joomla html bootstrap col-xs-12 col-sm-4 col-md-3 single-work">
                        <div class="recent-work-wrap">
                            <img class="img-responsive" src="images/portfolio/images (4).jpg" alt="">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <a class="preview" href="images/portfolio/images (4).jpg" rel="prettyPhoto"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.portfolio-item-->

                    <div class="portfolio-item wordpress html apps col-xs-12 col-sm-4 col-md-3 single-work">
                        <div class="recent-work-wrap">
                            <img class="img-responsive" src="images/portfolio/images (5).jpg" alt="">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <a class="preview" href="images/portfolio/images (5).jpg" rel="prettyPhoto"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.portfolio-item-->

                    <div class="portfolio-item joomla html bootstrap col-xs-12 col-sm-4 col-md-3 single-work">
                        <div class="recent-work-wrap">
                            <img class="img-responsive" src="images/portfolio/images (6).jpg" alt="">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <a class="preview" href="images/portfolio/images (6).jpg" rel="prettyPhoto"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.portfolio-item-->

                    <div class="portfolio-item wordpress html apps col-xs-12 col-sm-4 col-md-3 single-work">
                        <div class="recent-work-wrap">
                            <img class="img-responsive" src="images/portfolio/images (2).jpg" alt="">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <a class="preview" href="images/portfolio/images (2).jpg" rel="prettyPhoto"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.portfolio-item-->
                </div>
            </div>
        </div>
    </section>
    <!--/#portfolio-item-->
   <!-- Agenda Widget -->
   <div class="card my-4">
                <h5 class="card-header"><img src="images/ic_agenda.png" width="24px" height="24px" alt=""> Berita
                    Populer</h5>
                <div class="card-body">
                    <ul>
                        <?php
                            $i = 1;
                            $koneksi = koneksiUts();
                            $news = mysqli_query($koneksi, "SELECT * FROM news ORDER BY id LIMIT 5 ");
                            while ($row = mysqli_fetch_array($news)) {
                            ?>
                        <li>
                            <a href="detail-news.php?id=<?=$row['id']?>">
                                <img src="admin/images/<?= $row['gambar'];?>">
                                <h2 class="content-news-first"><?= $row['judul'];?></h2>
                                <small><i class="fa fa-clock-o"></i> <?= $row['tanggal'];?></small>
                            </a>
                        </li>
                        <?php
                            $i++;
                            } ?>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Information Widget -->
    <div class="card my-4">
        <h5 class="card-header">INFORMASI</h5>
        <div class="card-body-information">
            <div class=" row">
                <?php
                $i = 1;
                $koneksi = koneksiUts();
                $news = mysqli_query($koneksi, "SELECT * FROM information ORDER BY id ASC ");
                while ($row = mysqli_fetch_array($news)) {
                ?>
                <div class="col-lg-4">
                    <ul class="list-unstyled mb-0">

                        <li>
                            <a href="<?= $row['LINK'];?>" target="<?= $row['target'];?>"><?= $row['judul'];?></a>
                        </li>

                    </ul>
                </div>
                <?php
                $i++;
                } ?>
            </div>
        </div>
    </div>
    <!-- Akhir Information Widget -->
    
    <!--/#bottom-->

    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2021 <a target="_blank" href="#" title="Free Twitter Bootstrap WordPress Themes and HTML templates">Khovifah Yolanda</a>. All Rights Reserved.
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="home.php">Home</a></li>
                        <li><a href="profil.php">Profile</a></li>
                        <li><a href="galeri.php">Galeri</a></li>
                        <li><a href="artikel.php">Article</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!--/#footer-->
 <!-- Page Content -->
 
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script>
    $(function() {
        $('.pop').on('click', function() {
            $('.imagepreview').attr('src', $(this).find('img').attr('src'));
            $('#imagemodal').modal('show');
        });
    });
    </script>
</body>

</html>
