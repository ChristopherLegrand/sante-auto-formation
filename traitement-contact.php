<?php
//champs caché anti-spam
if(empty($_POST["remarque"])){

    if($_POST['acceptchecked'] == "true"){

        if(isset($_POST["nomprenom"]) && !empty($_POST["nomprenom"])){
            if(isset($_POST["tel"]) && !empty($_POST["tel"])){
                if(preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#",$_POST["tel"])){
                    if(isset($_POST["mail"]) && !empty($_POST["mail"])){
                        if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail'])){
                            if(isset($_POST["message"]) && !empty($_POST["message"])){

                                    $nomprenom = htmlspecialchars($_POST["nomprenom"]);
                                    $tel = htmlspecialchars($_POST["tel"]);
                                    $email = htmlspecialchars($_POST["mail"]);
                                    $entreprise = htmlspecialchars($_POST["entreprise"]);
                                    $text = htmlspecialchars($_POST["message"]);


                                    //POUR EVITER QUE LES MESSAGES ATTERISSENT DANS LES SPAMS, BIEN INDIQUER L'ADRESSE DE L'EXPEDITEUR DAND $header
                                    //POUR LA CONNAITRE, S'ENVOYER UN MAIL EN ENLEVANT $header DE LA FONCTION MAIL, ET ENSUITE RECUPERER L'ADRESSE DE L'EXPEDIEUR DE VOTRE SERVEUR

                                    $header= "From: message site SAF <contact@sante-auto-formation.com>\n";
                                    $header.= "MIME-Version : 1.0\n";
                                    $header.= 'Content-Type: text/html; charset="utf-8"'."\n";
                                    $header.= 'Content-Transfer-Encoding: 8bit';
                                    $destinataire='contact@sante-auto-formation.com';
                                    //$destinataire='wizzign@gmail.com';
                                    $sujet='Message du site SAF';
                                    $message=
                                        '<html>
                                            <body>
                                                <div style="font-size:17px;">'.$text.'</div><br/>
                                                <div style="color:#001459; font-weight:700; font-size:15px;">'.$nomprenom.'</div>
                                                <div style="color:#002398; font-weight:700; font-size:15px;">tel : '.$tel.'</div>
                                                <div style="color:#002398; font-weight:700; font-size:15px;">email : '.$email.'</div>
                                                <div style="color:#002398; font-weight:700; font-size:15px;">entreprise : '.$entreprise.'</div>
                                            </body>
                                        </html>';

                                    mail($destinataire, $sujet, $message, $header);

                                    echo "<span class='good'>votre message a été envoyé</span>";

                            }else{
                                echo "<span class='error'>vous n'avez pas ecrit votre message</span>";
                            }
                        }else{
                            echo "<span class='error'>votre email est invalide</span>";
                        }
                    }else{
                        echo "<span class='error'>vous devez entrer votre email</span>";
                    }
                }else{
                    echo "<span class='error'>votre numéro de téléphone est invalide</span>";
                }
            }else{
                echo "<span class='error'>vous devez entrer votre numéro de téléphone</span>";
            }
        }else{
            echo "<span class='error'>vous devez entrer votre nom et prénom</span>";
        }

    }else{
        echo "<span class='error'>vous devez cocher la case</span>";
    }
}
?>
