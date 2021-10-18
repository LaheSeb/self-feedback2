<?php

include_once("header.php");

function filterData(&$str){
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if(strstr($str, '"')) $str = '"'. str_replace('"','""',$str).'"';
}

$fileName = "feedback_data_" . date('Y-m-d') . ".xls";

$fields = array('ID', 'Gout des plats', 'Diversité des plats', 'Chaleur des plats', 'Commentaires');

$excelData = implode("\t", array_values($fields)) . "\n";

try {
    $db = new PDO($dsn, $dbname, $dbpass);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); //Si toutes les colonnes sont fausse

    
    $Manager = new AvisManager($db);
    $avis = $Manager->getList();

    foreach ($avis as $avis2) {
        $lineData = array( $avis2->getId(), $avis2->getGout(), $avis2->getDiversite(), $avis2->getChaleur(), $avis2->getCommentaire());
        array_walk($lineData, 'filterData');
        $excelData .= implode("\t", array_values($lineData)) . "\n";
    }
}
catch (PDOException $e) {
    print('<br/>Erreur de connexion ' . $e->getMessage());
}

header("Content-Type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=\"$fileName\""); 

echo $excelData;

exit;