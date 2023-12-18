
    <?php
require_once('../db.php'); 
   
    $req = $bdd->query("SELECT * FROM participations ORDER BY id DESC");
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