<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Santé Auto Formation | Conditions d'inscription</title>
    <meta charset="utf-8">
    <link rel="icon" type="image/jpg" href="images/favicon.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <link rel="stylesheet" href="inscription.css">
    <link rel="stylesheet" href="main.css">
    <link rel="canonical" href="">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:400;600;800" rel="stylesheet">
</head>
<body>
    <header>
        <?php require_once("nav.html");?>
        <div id="bandeau">
            <div id="bandeauText">
                <h1>Conditions d'inscription</h1>
                <span></span>
            </div>
        </div>
    </header>

    <section>
        <p>Toute inscription nécessite l’envoi des justificatifs des prérequis et du bulletin
d’inscription.<br/><br/>
L’inscription n’est définitive qu’à réception des prérequis, de la convention de
formation signée ou du contrat de formation signé</p>

        <h2>Disposition financière et modalités de règlement</h2>
        <p>La convention de formation signée ou du contrat de formation signé doit être
accompagné(e) :<br/><br/>
- soit d&#39;un acompte de 30% à l&#39;ordre de Patrice SANTERO, SANTE AUTO
FORMATION,<br/>
- soit d&#39;une prise en charge validée par votre OPCA avec subrogation
(dans le cas d&#39;une prise en charge partielle, la différence sera facturée
au client,<br/>
- soit d’un financement dans le cadre d’un financement par votre compte
personnel de formation (CPF).<br/><br/>
Le solde de la formation est à régler le dernier jour de la formation à réception
de la facture.<br/>
La facturation sera accompagnée des attestations de présence.
Toute absence durant la formation ou abandon ne pourra pas faire l’objet
d’une renégociation du tarif et des coûts stipulés dans la convention/contrat
de formation<br/>
L’acompte sera restitué pour une annulation intervenant au moins 10 jours
francs avant le début de l’action.<br/>
En cas d’annulation de la formation, faute d’inscrits, ou empêchement de
l’intervenant, Santé Auto Formation s’engage à proposer de nouvelles dates de
formations dans les mêmes conditions.<br/><br/>
Les prix nets de taxe -TVA non applicable, art. 261 du CGI.</p>

        <h2>Délai d’accès</h2>

        <p>Vous pouvez intégrer la formation dès que votre dossier est complet
(prérequis, convention signée, modalité de financement confirmée) et au plus
tard 24 heures, avant le démarrage de l’action. Cependant il convient de se
conformer aux règles spécifiques des différents financeurs (OPCO, CPF, POLE
EMPLOI) qui peuvent être plus longs. Nous contacter le plus tôt possible.</p>
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
            nav.classList.toggle("visible");

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