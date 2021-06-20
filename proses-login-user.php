<?php
session_start();
include('crud-user.php');

$email = $_POST['email'];
$password = $_POST['password'];

if (otentik($email, $password)) {
    // Set variabel sesi
    $_SESSION['email'] = $email;
    // deklarasi var array
    $dataUser = array();
    // mencari user (nama)
    $dataUser = cariUserDariUserName($email);
    $_SESSION['emailuser'] = $dataUser['email'];
    header("Location: home.php");
} else {
    header("Location: index.php?error");
}
?>