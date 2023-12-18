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
        <a href="../admin/admin-presentation-congres.php">Présentation congrès</a>
        <a href="../admin/admin-articles-publications.php">Articles et publications</a>
        <a href="../admin/admin-participations-scientifiques.php">Participations Scientifiques</a>
        <a href="../admin/admin-bandeau-notes.php">Bandeau et avis</a>
    </nav>

    <h1>Gerez vos formations</h1>

    <form action="" method="post">
        <input type="submit" value="Creer une formation" name="creer"/>
    </form>

    <?php
    if(isset($_POST["modifier"])){

        if (isset($_FILES['photo']) AND $_FILES['photo']['error'] == 0)
        {
            // Testons si le fichier n'est pas trop gros
            if ($_FILES['photo']['size'] <= 150000)
            {
                    // Testons si l'extension est autorisée
                    $infosfichier = pathinfo($_FILES['photo']['name']);
                    $extension_upload = $infosfichier['extension'];
                    $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                    if (in_array($extension_upload, $extensions_autorisees))
                    {
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($_FILES['photo']['tmp_name'], '../images/nos-formations/' . basename($_FILES['photo']['name']));

                        $modifierImg = $bdd->prepare("UPDATE formations SET photo=? WHERE id = ?");
                        $modifierImg->execute(array($_FILES['photo']["name"], $_POST['id']));

                    }else{
                            $errorImg = "<div class='errorimg'>seuls les formats jpg, jpeg et png sont acceptés</div>";
                    }
            }else{
                $errorImg = "<div class='errorimg'>La taille maximale d'une image doit être de 150ko</div>";
            }
        }


        $modifier = $bdd->prepare("UPDATE formations SET nom=?, duree=?, public=?, objectifs=?, competences=?, pre_requis=?, methodes_mobilisees=?, modalites_evaluation=?, allegement=?, actualisation_competences=?, modalites_inscription=?, lien_galaxy=?, categorie=?, handicap=?, certification=?, moncompteformation=?, liencompteformation=?, versionform=?, taux_reussite=?, ordre=?, presentiel=?  WHERE id = ?");
        $modifier->execute(array($_POST['nom'], $_POST['duree'], $_POST['public'], $_POST['objectifs'], $_POST['competences'], $_POST['pre_requis'], $_POST['methodes_mobilisees'], $_POST['modalites_evaluation'], $_POST['allegement'], $_POST['actualisation_competences'], $_POST['modalites_inscription'], $_POST['lien_galaxy'], $_POST['categorie'], $_POST['handicap'], $_POST['certification'], $_POST['moncompteformation'], $_POST['liencompteformation'], $_POST['versionform'], $_POST['taux_reussite'], $_POST['ordre'], $_POST['presentiel'], $_POST['id']));

        echo "<div id='messagevalidate'>la ligne ".$_POST['id']." a été modifiée</div>";
        if(isset($errorImg)){echo $errorImg;}


    }

    if(isset($_POST["creer"])){
        $bdd->exec("INSERT INTO `formations`(`id`, `nom`, `pre_requis`, `duree`, `public`, `objectifs`, `competences`, `methodes_mobilisees`, `modalites_evaluation`, `allegement`, `actualisation_competences`, `modalites_inscription`, `photo`, `lien_galaxy`, `categorie`, `handicap`, `certification`, `moncompteformation`, `liencompteformation`, `versionform`, `taux_reussite`, `ordre`, `presentiel`) VALUES (NUll,'','','','','','','','','','','','','','','','','','','',0,0,'')");
    }

    if(isset($_POST["supprimer"])){
        $delete = $bdd->prepare("DELETE FROM formations WHERE id = ?");
        $delete->execute(array($_POST['id']));
    }
    ?>

    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Durée</th>
            <th>Public</th>
            <th>Objectifs</th>
            <th>Compétences à acquérir</th>
            <th>Pré-requis et conditions d'accès</th>
            <th>Méthodes mobilisées</th>
            <th>Modalité d’évaluation</th>
            <th>Allègement</th>
            <th>Maintien et actualisation des compétences</th>
            <th>Modalités d'inscription et délai d’accès</th>
            <th>Photo</th>
            <th>Lien galaxy</th>
            <th>Catégorie</th>
            <th>Accessibilité handicap</th>
            <th>Certification</th>
            <th>Mon compte formation</th>
            <th>Lien Mon compte formation</th>
            <th>version</th>
            <th>Taux de réussite (ne pas mettre le signe %)</th>
            <th>Ordre</th>
            <th>presentiel</th>
        </tr>
    <?php
    $req = $bdd->query("SELECT * FROM formations ORDER BY id DESC");
    while($donnee = $req->fetch()){
    ?>
        <form action="" method="post" enctype="multipart/form-data" id="myForm">
            <tr>
                <td><?php echo $donnee['id']; ?></td>
                <td><textarea name="nom"><?php echo $donnee['nom'];?></textarea></td>
                <td><textarea name="duree"><?php echo $donnee['duree'];?></textarea></td>
                <td><textarea name="public"><?php echo $donnee['public'];?></textarea></td>
                <td><textarea name="objectifs"><?php echo $donnee['objectifs'];?></textarea></td>
                <td><textarea name="competences"><?php echo $donnee['competences'];?></textarea></td>
                <td><textarea name="pre_requis"><?php echo $donnee['pre_requis'];?></textarea></td>
                <td><textarea name="methodes_mobilisees"><?php echo $donnee['methodes_mobilisees'];?></textarea></td>
                <td><textarea name="modalites_evaluation"><?php echo $donnee['modalites_evaluation'];?></textarea></td>
                <td><textarea name="allegement"><?php echo $donnee['allegement'];?></textarea></td>
                <td><textarea name="actualisation_competences"><?php echo $donnee['actualisation_competences'];?></textarea></td>
                <td><textarea name="modalites_inscription"><?php echo $donnee['modalites_inscription'];?></textarea></td>
                <td><img src="../images/nos-formations/<?php echo $donnee['photo'];?>"/><input type="file" name="photo"/><div class="errorimg"></div></td>
                <td><textarea name="lien_galaxy"><?php echo $donnee['lien_galaxy'];?></textarea></td>
                <td>
                    <label class="labelCat"><?php echo $donnee['categorie'];?></label>
                    <select name="categorie">
                        <option value="Prévention et secourisme">Prévention et secourisme</option>
                        <option value="Formations de formateurs">Formations de formateurs</option>
                        <option value="Professionnels de santé">Professionnels de santé</option>
                        <option value="Professionnels du sport">Professionnels du sport</option>
                    </select>
                </td>
                <td><textarea name="handicap"><?php echo $donnee['handicap'];?></textarea></td>
                <td>
                    <label class="labelcertif"l><?php echo $donnee['certification'];?></label>
                    <select name="certification">
                        <option value="oui">oui</option>
                        <option value="non">non</option>
                    </select>
                </td>
                <td>
                    <label class="moncompteformation"l><?php echo $donnee['moncompteformation'];?></label>
                    <select name="moncompteformation">
                        <option value="oui">oui</option>
                        <option value="non">non</option>
                    </select>
                </td>
                <td><textarea name="liencompteformation"><?php echo $donnee['liencompteformation'];?></textarea></td>
                <td><textarea name="versionform"><?php echo $donnee['versionform'];?></textarea></td>
                <td><textarea name="taux_reussite"><?php echo $donnee['taux_reussite'];?></textarea></td>
                <td><textarea name="ordre"><?php echo $donnee['ordre'];?></textarea></td>
                <td>
                    <label class="presentiel"l><?php echo $donnee['presentiel'];?></label>
                    <select name="presentiel">
                        <option value="presentiel">presentiel</option>
                        <option value="distanciel">distanciel</option>
                        <option value="hybride">hybride</option>
                        <option value="mixte">mixte</option>
                    </select>
                </td>

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