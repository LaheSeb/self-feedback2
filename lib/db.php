<?php
    try {
        $db = new PDO('mysql:host=localhost;dbname=sl_elec_plomb', 'root', 'root');
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }catch (Exception $e) {
        echo 'Impossible de se connecter à la base de donnée';
        die();
    }
?>

