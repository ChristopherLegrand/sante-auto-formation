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

        table{
            border-collapse: collapse;
            width:100%;
        }

        th{
            color:#1075aa;
            background-color: white;
        }

        th,td{
            border: #b7b7b7 1px solid;
            text-align: center;
            padding:10px;
        }

        td{
            background-color: white;
        }

        td:nth-child(1){
            background-color: #505050;
            color:white;
            font-size:14px;
        }

        textarea{
            font-size:15px;
            font-family: 'Noto Sans KR', sans-serif;
            background: transparent;
            border:none;
            width:100%;
            padding:5px;
        }

        input[type="submit"]{
            padding:8px;
            background-color: #1075aa;
            color:white;
            border:none;
            border-radius:3px;
            cursor: pointer;
        }

        input[type="submit"]:hover{
            background-color: #17516f;
        }

        input[type="file"]{
          width:120px;
        }

        input[type="date"]{
          width:120px;
        }

        select{
            padding:2px;
        }

        h1{
            margin:20px 0;
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

        form{
            margin-bottom:20px;
            display: inline-block;
        }

        #messagevalidate{
            font-size:20px;
            color:#01d101;
            background-color: black;
            padding:8px;
            position: fixed;
            bottom:0;
            left:0;
            width:100%;
            text-align: center;
        }

        img{
            object-fit: cover;
            width:120px;
            height:60px;
        }

        .errorimg{
            color:#d10131;
            font-size:22px;
        }

       

        
    </style>
</head>
<body>

    <?php require_once('../db.php'); ?>

    <nav>
        <a href="../index.php">Retour au site</a>
        <a href="../admin/admin.php">Gerer les formations</a>
        <a href="../admin/admin-presentation-congres.php">Presentation congrès</a>
        <a href="../admin/admin-articles-publications.php">Articles et publications</a>
        <a href="../admin/admin-participations-scientifiques.php">Participations Scientifiques</a>
        <a href="../admin/admin-bandeau-notes.php">Bandeau et avis</a>
    </nav>

    <h1>Articles et publications</h1>

    <form action="" method="post">
        <input type="submit" value="Ajouter article" name="creer"/>
    </form>

    <?php
    if(isset($_POST["modifier"])){


        $modifier = $bdd->prepare("UPDATE publications SET titre=?, texte=?, dates=? WHERE id = ?");
        $modifier->execute(array($_POST['titre'], $_POST['texte'], $_POST['dates'], $_POST['id']));

        echo "<div id='messagevalidate'>la ligne ".$_POST['id']." a été modifiée</div>";
        if(isset($errorImg)){echo $errorImg;}


    }

    if(isset($_POST["creer"])){
        $bdd->exec("INSERT INTO `publications` (`id`,`titre`,`texte`,`dates` ) VALUES (NULL, '', '', '')");
    }

    if(isset($_POST["supprimer"])){
        $delete = $bdd->prepare("DELETE FROM publications WHERE id = ?");
        $delete->execute(array($_POST['id']));
    }
    ?>

    <table>
        <tr>
            <th>ID</th> 
            <th>titre</th>
            <th>texte</th>
            <th>date</th>
        </tr>
    <?php
    $req = $bdd->query("SELECT * FROM publications ORDER BY id DESC");
    while($donnee = $req->fetch()){
    ?>
        <form action="" method="post" enctype="multipart/form-data" id="myForm">
            <tr>
                <td><?php echo $donnee['id']; ?></td>
                <td><textarea name="titre"><?php echo $donnee['titre'];?></textarea></td>
                <td><textarea name="texte"><?php echo $donnee['texte'];?></textarea></td>
                <td><textarea name="dates"><?php echo $donnee['dates'];?></textarea></td>
                

                <input type="hidden" name="id" value="<?php echo $donnee['id']; ?>"/>
                <td><input type="submit" name="modifier" value="Modifier"/></td>
                <td><input type="submit" name="supprimer" value="Supprimer"/></td>
            </tr>
        </form>
    <?php
    }
    ?>
    </table>

    <script>
        //SELECTION AUTO DE LOPTION DANS LES SELECT QUI A LA MEME VALEUR QUE LA CATEGORIE
        let labelCat = document.querySelectorAll('.labelCat');
        for (let labelCatOne of labelCat) {
            let labelText = labelCatOne.textContent;

            for(let optionOne of labelCatOne.nextElementSibling.options){
                if(optionOne.textContent == labelText){
                    optionOne.setAttribute('selected', 'selected');
                }
            }
            
        }

        //SELECTION AUTO DE LOPTION DANS LES SELECT QUI A LA MEME VALEUR QUE LA CERTIFICATION
        let labelCertif = document.querySelectorAll('.labelcertif');
        for (let labelCertifone of labelCertif) {
            let labelTextCertif = labelCertifone.textContent;

            for(let optionOneCertif of labelCertifone.nextElementSibling.options){
                if(optionOneCertif.textContent == labelTextCertif){
                    optionOneCertif.setAttribute('selected', 'selected');
                }
            }
            
        }

        //SELECTION AUTO DE LOPTION DANS LES SELECT QUI A LA MEME VALEUR QUE LA MOncompte formeation
        let moncompteformation = document.querySelectorAll('.moncompteformation');
        for (let moncompteformationOne of moncompteformation) {
            let moncompteformationText = moncompteformationOne.textContent;

            for(let moncompteformationOneOption of moncompteformationOne.nextElementSibling.options){
                if(moncompteformationOneOption.textContent == moncompteformationText){
                    moncompteformationOneOption.setAttribute('selected', 'selected');
                }
            }
            
        }
    </script>
</body>
</html>