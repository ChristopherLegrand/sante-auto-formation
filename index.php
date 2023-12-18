<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Santé Auto Formation</title>
    <meta charset="utf-8">
    <link rel="icon" type="image/jpg" href="images/favicon.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="main.css">
    <link rel="canonical" href="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <?php require_once("nav.html");?>

        <div id="imageBkgWrap">
            <svg class="svg">
                <clipPath id="my-clip-path" clipPathUnits="objectBoundingBox"><path d="M1,0 v0.715 c0,0,-0.219,0.248,-0.49,0.28 S0.092,0.9,0.03,0.732 s0.007,-0.339,0.119,-0.442 S0.301,0.101,0.287,0 H1"></path></clipPath>
            </svg>

            <div class="clipped"></div>

            <div id="ombre"></div>
        </div>

        <div id="contenuAlign">
            <div id="blockTitre">
                <img src="images/logo.png" alt="logo santé auto formation" id="logo">
                <div id="bloctitreText">
                    <h1>Santé Auto <span>Formation</span></h1>
                    <div id="bleuBlancRouge">
                        <span class="bleu"></span>
                        <span class="blanc"></span>
                        <span class="rouge"></span>
                    </div>
                </div>
            </div>
            <p>Depuis plus de 20 ans, Santé Auto Formation apporte son expérience et son expertise de la
formation professionnelle pour répondre aux obligations réglementaires.<br/>
Ayant œuvrer dans les milieux du secours, de la santé et de la sécurité au travail et du sport,
nous avons décidé de créer en 2001 Santé Auto Formation</p>
            <div id="agendaBtn">AGENDA DES FORMATIONS</div>
        </div>

        <img id="arrow" src="images/arrow.jpg" alt="fleche bas"/>

        <div id="aLaUne">A LA UNE : 
            <div id="banniere">
                <div id="banniereWrap">
                    <p><?php 
                        require_once('db.php');

                        $req = $bdd->query("SELECT * FROM bandeau ");
                        while($donnee = $req->fetch()){echo $donnee['texte'];}
                    ?></p>
                </div>
            </div>
        </div>

        <div id="agenda">
            <div id="closeAgenda">
                <span></span><span></span>
            </div> 
            <div id="agendContain">
                <div id="agendaTextContain">
                    <p>Agenda des formations</p>
                    <div class="tiret"></div>
                </div>

                <iframe src="https://www.logiciel-galaxy.fr/catalogue-SAF.html" ></iframe>
            </div>
        </div>
    </header>

    <section>
        <div id="rectangleFond">
            <div id="rectangleCntreContain">
                <img src="images/img1.png" alt="santé auto formation" id="image1">
                <div id="blocTexte1" class="bloctext">
                    <h2 class="invisibles">Bienvenue Sur notre site</h2>
                    <span class="invisibles"></span>
                    <p class="invisibles">Notre vocation est d’assurer des prestations de formation et de conseils aux entreprises et
aux particuliers.<br/>
Nos points forts sont de vous accompagner sur vos plans de formation, de vous apporter
notre expertise et nos conseils mais également de vous accorder une attention particulière à
la réalisation de vos projet professionnels.<br/>
Toutes nos formations peuvent être réalisées sur votre entreprise et adaptées à vos besoins
spécifiques. Nous analysons vos attentes et construisons un programme sur-mesure
(contenu, durée, suivi...). Nous nous adaptons à votre agenda.
Vous avez un projet de formation ? contactez-nous !</p>
                </div>

                <img src="images/img2-responsive.jpg" alt="santé auto formation" id="image2-responsive">

                <div id="blocTexte2" class="bloctext">
                    <h2 class="invisibles">Un organisme et des formations reconnues</h2>
                    <span class="invisibles"></span>
                    <p class="invisibles">Notre organisme de formation fait partie des centres habilités par l’INRS pour les formations
en santé et sécurité au travail comme le SST ou les formations de FORMATEUR SST ;
Nous sommes experts en biomécanique et en ergonomie dans le milieu du travail et le
milieu sportif.</p>
                    <a class="agendaBtn" href="images/Certificat-Qualiopi.pdf" target="_blank">
                        <img src="images/qualiopi.jpg" alt="qualiopi" id="logo-qualiopi" class="logos-certif invisibles"/><img src="images/datadock.jpg" alt="datadock" class="logos-certif invisibles"/>
                    </a>
                    <p class="invisibles">Depuis 2016, Santé auto formation est engagé dans une démarche qualité pour mieux vous
servir. A ce titre, nous avons obtenu début 2020 la CERTIFICATION QUALIOPI (qualité
formations professionnelles).</p>
                </div>

                <img src="images/img2.png" alt="santé auto formation" id="image2">

            </div>
        </div>
    </section>
    <section id="sectionTwo">
        <h2 class="invisibles">Satisfaction Clients</h2>
        <span class="invisibles"></span>
        <div class="invisibles">
            <img src="images/etoiles.png" alt="etoiles" id="etoiles"/>
            <p id="rate"><?php 
                $req = $bdd->query("SELECT * FROM note ");
                while($donnee2 = $req->fetch()){echo $donnee2['nombre'];}
                    ?>
                sur 5
            </p>
            <p id="base">Basé sur <?php
                $req2 = $bdd->query("SELECT * FROM nbravis ");
                while($donnee3 = $req2->fetch()){echo $donnee3['nombre'];}
            ?> avis</p>
        </div>
    </section>
    <?php require_once("footer.html");?>
    <script>
        let ww = window.outerWidth;
        const nav = document.querySelector("nav");
        const logo = document.querySelector("#logo");
        const h1 = document.querySelector("h1");
        const agenda = document.querySelector("#agenda");
        const agendaBtn = document.querySelector("#agendaBtn");
        const closeAgenda = document.querySelector("#closeAgenda");
        const bleuBlancRouge = document.querySelector("#bleuBlancRouge");
        const contenuAlignP = document.querySelector("#contenuAlign p");
        const banniereWrap = document.querySelector("#banniereWrap");
        const banniereWrapWidth = document.querySelector("#banniereWrap").offsetWidth;
        const banniere = document.querySelector("#banniere");
        const banniereWidth = document.querySelector("#banniere").offsetWidth;
        const clipped = document.querySelector(".clipped");
        const ombre = document.querySelector("#ombre");


        window.addEventListener("load", function(event) {
            if(ww > 900){
                nav.classList.add("visible");
            }

            logo.classList.add("visible");
            h1.classList.add("visible");
            bleuBlancRouge.classList.add("visible");
            agendaBtn.classList.add("visible");
            contenuAlignP.classList.add("visible");
            clipped.classList.add("visible");
            ombre.classList.add("visible");
        });

        agendaBtn.addEventListener("click", () => {
            if(agenda.classList.contains("visible")){
                agenda.classList.remove("visible");   
            }else{
                agenda.classList.add("visible");
            }
        });

        closeAgenda.addEventListener("click", () => {
            if(agenda.classList.contains("visible")){
                agenda.classList.remove("visible");   
            }
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
        

        // INIT TRANSITION DEFILEMENT
        banniereWrap.style.animation = "defile "+ banniereWrapWidth/60 +"s backwards linear infinite";
        banniereWrap.style.setProperty('--banniere-wrap-width', -banniereWrapWidth +"px");


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
                    nav.classList.add("visible");

                    for (let hamSpan of hambSpans){
                        hamSpan.classList.add("active");
                    }
                }

                if (ww < 900){
                    nav.classList.remove("visible");

                    for (let hamSpan of hambSpans){
                        hamSpan.classList.remove("active");
                    }
                }
            }               
        }
    </script>
</body>
</html>