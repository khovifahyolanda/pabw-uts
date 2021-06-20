<?php
require 'crud-user.php';

if(isset($_POST["create"])){
    if(createUser($_POST) > 0){
        echo"<script>
        alert('Akun berhasil dibuat!');
        document.location.href='index.php';
        </script>";
    }
    else{
        echo "<script>
        alert('akun gagal dibuat!');
        document.location.href='index.php';
        </script>";
        echo mysqli_error($koneksi);
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Login&Register</title>
    <link rel="shortcut icon" href="images/ico/microchip.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./style.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'  rel="stylesheet">
</head>

<body>
    <div class="cont">

        <?php
        if(array_key_exists('error', $_GET)){
          echo"<script>
          alert('Username atau password salah!');
          document.location.href='index.php';
          </script>";
        }
        ?>
        <div class="form sign-in">
            <h2>Sign In</h2>

            <form method="post" action="proses-login-user.php">
                <label>
                    <span>Email Address</span>
                    <input type="email" name="email">
                </label>
                <label>
                    <span>Password</span>
                    <input type="password" name="password">
                </label>
                <button class="submit" type="submit">Sign In</button>
            </form>
            
        </div>
            <form role="form" method="POST" enctype="multipart/form-data">
                <div class="form sign-up">
                    <h2>Sign Up</h2>
                    <label>
                        <span>Userame</span>
                        <input type="text" name="username">
                    </label>
                    <label>
                        <span>Email</span>
                        <input type="email" name="email">
                    </label>
                    <label>
                        <span>Password</span>
                        <input type="password" name="password">
                    </label>
                    <label>
                        <span>Confirm Password</span>
                        <input type="password">
                    </label>
                    <button type="submit" name="create" class="submit">Sign Up Now</button>
                </div>
            </form>
        </div>

    </div>
    <script type="text/javascript" src="./script.js"></script>
</body>

</html>