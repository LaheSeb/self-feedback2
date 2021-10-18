<?php
include_once('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Php To Excel for feedback</title>
</head>
<body>
    <div class="container">
        <h2>Les avis sur les plats</h2>

        <div class="row">
            <div class="col-md-12 head">
                <div class="float-right">
                    <a href="export.php" class="btn btn-success">Exporter XLS</a>
                </div>
            </div>
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>gout des plats</th>
                        <th>diversité des plats</th>
                        <th>Chaleur des plats</th>
                        <th>Commentaires des plats</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        try {
                            $db = new PDO($dsn, $dbname, $dbpass);
                            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); //Si toutes les colonnes sont fausse
                        
                            
                            $Manager = new AvisManager($db);
                            $avis = $Manager->getList();
                        
                            foreach ($avis as $avis2) {?>
                            <tr>
                                <td><?= $avis2->getId() ?></td>
                                <td><?= $avis2->getGout() ?></td>
                                <td><?= $avis2->getDiversite() ?></td>
                                <td><?= $avis2->getChaleur() ?></td>
                                <td><?= $avis2->getCommentaire() ?></td>
                                
                            </tr>
                    <?php

                            }
                        }
                        catch (PDOException $e) {
                            print('<br/>Erreur de connexion ' . $e->getMessage());
                        }
                        ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>