<?php 
    session_start();
    if(!isset($auth) != 0){
        if(!isset($_SESSION['Auth']['id']))
        {
            header('Location:'. WEBROOT .'login.php');
            die();
        }
    }
?>