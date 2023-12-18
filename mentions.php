<!DOCTYPE html>
<html lang="fr">
<head>
    <meta name="robots" content="noindex, nofollow">
    <title>Santé Auto Formation | Mentions légales</title>
    <meta charset="utf-8">
    <link rel="icon" type="image/jpg" href="images/favicon.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <link rel="stylesheet" href="mentions.css">
    <link rel="stylesheet" href="main.css">
    <link rel="canonical" href="">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:400;600;800" rel="stylesheet">
</head>
<body>
    <header>
        <?php require_once("nav.html");?>
        <div id="bandeau">
            <div id="bandeauText">
                <h1>Mentions légales</h1>
                <span></span>
            </div>
        </div>
    </header>

    <section>
        <p>Conformément aux dispositions des articles 6-III et 19 de la Loi n° 2004-575 du 21 juin 2004 pour la Confiance dans l'économie numérique, dite L.C.E.N., nous portons à la connaissance des utilisateurs et visiteurs du site : SANTE AUTO FORMATION les informations suivantes :</p>

        <h2>Informations légales :</h2> 
        <p>
        Patrice SANTERO, Santé auto formation<br/>
        sante-auto-formation.com<br/>
        siret : 43493696900022<br/>
        Enregistrement auprès de la CNIL sous le numéro 1699224<br/>
        27, chemin des Arneys<br/>
        33480 CASTELNAU DE MEDOC<br/>
        contact@sante-auto-formation.com</p>

        <p>Le Webmaster est : Aurélien Delestre L’hébergeur du site est : IONOS</p>

        <h2>2. Description des services fournis :</h2> 
        <p>Le site SANTE AUTO FORMATION a pour objet de fournir une information concernant l’ensemble des activités de la société. Le propriétaire du site s’efforce de fournir sur le site SANTE AUTO FORMATION des informations aussi précises que possible. Toutefois, il ne pourra être tenu responsable des omissions, des inexactitudes et des carences dans la mise à jour, qu’elles soient de son fait ou du fait des tiers partenaires qui lui fournissent ces informations. Toutes les informations proposées sur le site SANTE AUTO FORMATION sont données à titre indicatif, sont non exhaustives, et sont susceptibles d’évoluer. Elles sont données sous réserve de modifications ayant été apportées depuis leur mise en ligne.</p>

        <h2>3. Propriété intellectuelle et contrefaçons :</h2> 
        <p>Le proprietaire du site est propriétaire des droits de propriété intellectuelle ou détient les droits d’usage sur tous les éléments accessibles sur le site, notamment les textes, images, graphismes, logo, icônes, sons, logiciels… Toute reproduction, représentation, modification, publication, adaptation totale ou partielle des éléments du site, quel que soit le moyen ou le procédé utilisé, est interdite, sauf autorisation écrite Toute exploitation non autorisée du site ou de l’un quelconque de ces éléments qu’il contient sera considérée comme constitutive d’une contrefaçon et poursuivie conformément aux dispositions des articles L.335-2 et suivants du Code de Propriété Intellectuelle.</p>

        <h2>4. Protection des biens et des personnes - gestion des données personnelles :</h2> 
        <p>Utilisateur : Internaute se connectant, utilisant le site susnommé : SANTE AUTO FORMATION En France, les données personnelles sont notamment protégées par la loi n° 78-87 du 6 janvier 1978, la loi n° 2004-801 du 6 août 2004, l'article L. 226-13 du Code pénal et la Directive Européenne du 24 octobre 1995, la loi n° 2018-493 du 20 juin 2018 relative à la protection des données personnels.</p>

        <p>Sur le site SANTE AUTO FORMATION, le proprietaire du site ne collecte des informations personnelles relatives à l'utilisateur que pour le besoin de certains services proposés (répondre à vos demandes d’information, devis
programme…, vous inscrire à une formation et en assurer le suivi, vous informer des
formations et prestations de Santé auto formation…) par le site SANTE AUTO FORMATION. L'utilisateur fournit ces informations en toute connaissance de cause, notamment lorsqu'il procède par lui-même à leur saisie. Les données d’identification ou
de contact (nom, prénom, adresse mail et/ou postale, numéro de téléphone) seront
communiqué uniquement à Santé auto formation et concerne des données essentielles
pour toute demande d’information et/ou d’inscription. D’autres données peuvent être
collectées à des fins statistiques (situation profesionnelle, secteur professionnel,
catégories socio-professionnelle, taille de l’entreprise). Celles-ci seront traitées de façon
anonyme. Les données ne sont conservées que pour des durées strictement
nécessaires aux finalités pour lesquelles elles ont été recueillies et archivées selon les
durées de prescription et de conservations légales et notamment fiscales et comptables.
<br/>Il est alors précisé à l'utilisateur du site SANTE AUTO FORMATION l’obligation ou non de fournir ces informations. Conformément aux dispositions des articles 38 et suivants de la loi 78-17 du 6 janvier 1978 relative à l’informatique, aux fichiers et aux libertés, tout utilisateur dispose d’un droit d’accès, de rectification, de suppression et d’opposition aux données personnelles le concernant. Pour l’exercer, adressez votre demande à SANTE AUTO FORMATION  (par courriel à contact@sante-auto-formation.com ou par courrier
au 27 chemin des Arneys, 33480 Castelnau De Médoc) en effectuant votre demande écrite et signée, accompagnée d’une copie du titre d’identité avec signature du titulaire de la pièce, en précisant l’adresse à laquelle la réponse doit être envoyée. Vous pouvez

consultez le site cnil.fr pour plus d’informations sur vos droits.</p>

        <p>Aucune information personnelle de l'utilisateur du site SANTE AUTO FORMATION n'est publiée à l'insu de l'utilisateur, échangée, transférée, cédée ou vendue sur un support quelconque à des tiers. Les bases de données sont protégées par les dispositions de la loi du 1er juillet 1998 transposant la directive 96/9 du 11 mars 1996 relative à la protection juridique des bases de données.</p>
    </section>


    <?php require_once("footer.html");?>

    <script>
        let ww = window.outerWidth;
        const nav = document.querySelector("nav");
        const bandeauText = document.querySelector("#bandeauText");

        window.addEventListener("load", function(event) {
            if(ww > 900){
                nav.classList.add("visible");
            }

            bandeauText.classList.add("visible");
        });

        document.addEventListener("scroll", () => {
            if(ww > 900){
                if(window.scrollY > 80) {
                nav.classList.add("fondBlanc");
                }else{
                    nav.classList.remove("fondBlanc");
                }
            }
        });


        //ANIMATION APPARITIONS ELEMENT AU SCROLL
        let invisibles = document.querySelectorAll(".invisibles");
        let windowHeight = window.innerHeight;

        for (let invisible of invisibles) {
            let invisiblePosTop = invisible.getBoundingClientRect().top;

            window.addEventListener("scroll",function(){
                let winScrollTop = window.scrollY;

                if(winScrollTop >= invisiblePosTop-windowHeight){
                    invisible.style.opacity = 1;
                    invisible.style.top = 0;
                }
            });
        }


        //HAMBURGER
        let hamburger = document.querySelector("#hamburger");
        let hambSpans = document.querySelectorAll("#hamburger span");

        hamburger.addEventListener("click", () => {
            nav.classList.toggle("ouvert");

            for (let hamSpan of hambSpans){
                hamSpan.classList.toggle("active");
            }
        });

        //RESIZE
        var rtime;
        var timeout = false;
        var delta = 200;

        window.addEventListener("resize", () => {
            rtime = new Date();
            if (timeout === false) {
                timeout = true;
                setTimeout(resizeend, delta);
            }
        });

        function resizeend() {
            if (new Date() - rtime < delta) {
                setTimeout(resizeend, delta);
            } else {
                timeout = false;
                let ww = window.outerWidth;

                if(ww > 900){
                    nav.style.top = 0;
                }

                if (ww <= 900){
                    nav.classList.remove("visible");
                    nav.classList.remove("ouvert");
                    nav.style.top = "-400px";

                    for (let hamSpan of hambSpans){
                        hamSpan.classList.remove("active");
                    }
                }
            }               
        }
        
    </script>
</body>
</html>