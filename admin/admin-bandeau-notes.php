<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@400;500;700&display=swap" rel="stylesheet">
    <title>ADMIN</title>
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing: border-box;
            text-decoration: none;
        }

        body{
            font-family: 'Noto Sans KR', sans-serif;
            padding: 50px;
            background-color: #eaeaea;
        }

        h1{
            margin:20px 0;
        }


        h2{
            margin:12px 0;
        }

        nav a{
            color:#1075aa;
            display: block;
            width:300px;
            font-size:17px;
        }

        nav a:hover{
            color:#03a9ff;
        }

        input[type="submit"] {
            padding: 8px;
            background-color: #1075aa;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            display:block;
        }

        input[type="text"] {
            padding: 5px;
            margin-bottom: 4px;
            width: 100px;
        }

        textarea{
            height: 130px;
            width:380px;
            padding:5px;
        }

        #messagevalidate {
            font-size: 20px;
            color: #01d101;
            background-color: black;
            padding: 8px;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            text-align: center;
        }

        
    </style>
</head>
<body>

        <?php 
        require_once('../db.php'); 
        
        if(isset($_POST["modifierbandeau"])){
            
            $modifierbandeau = $bdd->prepare("UPDATE bandeau SET texte=? ");
            $modifierbandeau->execute(array($_POST['texte']));
    
            echo "<div id='messagevalidate'>le bandeau a été modifié</div>";
    
        }

        if(isset($_POST["modifiernote"])){
            
            $modifierbandeau = $bdd->prepare("UPDATE note SET nombre=? ");
            $modifierbandeau->execute(array($_POST['nombre']));
    
            echo "<div id='messagevalidate'>la note été modifiée</div>";
    
        }

        if(isset($_POST["modifiernbravis"])){
            
            $modifierbandeau = $bdd->prepare("UPDATE nbravis SET nombre=? ");
            $modifierbandeau->execute(array($_POST['nombre']));
    
            echo "<div id='messagevalidate'>le nombre d'avis a été modifié</div>";
    
        }
        
        ?>


    <nav>
        <a href="../index.php">Retour au site</a>
        <a href="../admin/admin.php">Gerer les formations</a>
        <a href="../admin/admin-presentation-congres.php">Présentation congrès</a>
        <a href="../admin/admin-articles-publications.php">Articles et publications</a>
        <a href="../admin/admin-participations-scientifiques.php">Participations Scientifiques</a>
        <a href="../admin/admin-bandeau-notes.php">Bandeau et avis</a>
    </nav>

    <h1>Bandeau et avis</h1>
    <h2>Bandeau</h1>
        <?php

//Consultez la mise à jour des recommandations INRS en matière de SST sur Quick place – Prochaine formation à venir MAC FORMATEUR SST

          $req = $bdd->query("SELECT * FROM bandeau ");
          while($donnee = $req->fetch())
          {
        ?>
            <form action="" method="post">
                <textarea name="texte" placeholder ="<?php echo $donnee['texte']; ?>"></textarea>
                <input type="submit"  name="modifierbandeau" value="Modifier">
            </form>
        <?php
            }              
        ?>

    <h2>Note</h1>

    <?php 
    $req = $bdd->query("SELECT * FROM note ");
    while($donnee2 = $req->fetch()){
    ?>
            
            <form action="" method="post">
                <input type="text" name="nombre"  placeholder ="<?php echo $donnee2["nombre"];?>">
                <input type="submit"  name="modifiernote" value="Modifier">
            </form>
    <?php } ?>

    <h2>Nombre d'avis</h1>

    <?php 
    $req = $bdd->query("SELECT * FROM nbravis ");
    while($donnee3 = $req->fetch()){
    ?>
            
            <form action="" method="post">
                <input type="text" name="nombre"  placeholder ="<?php echo $donnee3["nombre"];?>">
                <input type="submit"  name="modifiernbravis" value="Modifier">
            </form>
    <?php } ?>

    <script>
    </script>
</body>
</html>