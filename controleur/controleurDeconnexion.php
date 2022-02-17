<?php
if(!isset($_SESSION['identification'])){
    $_SESSION['m2lMP']="accueil";
    header('location: index.php');
}
else{
    unset($_SESSION['identification']);
    $_SESSION['m2lMP']="accueil";
    header('location: index.php');
}