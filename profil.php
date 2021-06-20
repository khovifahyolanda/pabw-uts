<?php
require_once "koneksi_uts.php";

$koneksi = koneksiUts();
if(isset($_POST["create"])){
    if(!createFaq($_POST) > 0){
         echo mysqli_error($koneksi);
    }
}

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
    <title>Profil | Corlate</title>

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
                            <p><i class="fa fa-phone-square"></i> +6281371243847</p>
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
                        <li class="active"><a href="profil.php">Profile</a></li>
                        <li><a href="galeri.php">Galeri</a></li>
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
        <h1>About us</h1>
    </div>

    <div id="about-me" class="container">
        <!-- About Me -->
        <h2>About Me</h2>
        <div class="row workingspace">
            <div class="col-lg-6" data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
                <?php
                $koneksi = koneksiUts();
                $about_me = mysqli_query($koneksi, "SELECT * FROM about_me ORDER BY id ASC");
                $row = mysqli_fetch_array($about_me)
                ?>

                <?= $row['deskripsi'];?>
                <a href='<?= $row['link_button'];?>' class='btn btn-primary button'><?= $row['name_button'];?></a>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-offset="300" data-aos-easing="ease-in-sine">
                <img src="admin/images/<?= $row['gambar'];?>" class="img-fluid" alt="...">
            </div>
        </div>
        <!-- Akhir About Me -->
    </div>
    <!--/#middle-->
    <section class="contact" style="margin-top: 120px;">
        <div class="heading white">
            <h2>Contact Me</h2>
        </div>
        <div class="content">
            <div class="col-lg-6 contactInfo">
                <h3>Contact Info</h3>
                <div class="contactInfoBox">
                    <?php
                    $i = 0;
                    $koneksi = koneksiUts();
                    $contact = mysqli_query($koneksi, "SELECT * FROM contact ORDER BY id ASC");
                    while ($row = mysqli_fetch_array($contact)) {
                    ?>
                    <div class="box">
                        <div class="icon">
                            <i class="<?= $row['gambar'];?>"></i>
                        </div>
                        <div class="text">
                            <h3><?= $row['label'];?></h3>
                            <p><?= $row['isi'];?></p>
                        </div>
                    </div>
                    <?php
                    $i++;
                    } ?>

                </div>
            </div>
            <div class="col-lg-5 formBx">
                <form role="form" method="POST" action="" enctype="multipart/form-data">
                    <h3>Messege Me</h3>
                    <input type="text" name="full_name" id="full_name" placeholder="Full Name">
                    <input type="email" name="email" id="email" placeholder="Email">
                    <textarea placeholder="Your Message" name="message" id="message" cols="30" rows="10"></textarea>
                    <input style="color: white;" type="submit" name="create" id="create" value="send"
                        onclick="return confirm('Pastikan pesan tidak mengandung unsur sara!');">
                </form>
            </div>
        </div>
    </section>
    <br><br><br><br><br>
   
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


    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>

