<?php
session_start();

if (isset($_SESSION['login']) && $_SESSION['login'] === true){
    // ir al dashboard
    header('Location:pages/dashboard.php');
    exit;
}
else{
    header('Location:pages/login.php');
}
?>

<!--

localhost/clase_ejercicios/ejercicios_sesiones/_3_sistema-login/
-->