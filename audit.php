<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Santé Auto Formation | Audit</title>
    <meta charset="utf-8">
    <link rel="icon" type="image/jpg" href="images/favicon.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <link rel="stylesheet" href="audit.css">
    <link rel="stylesheet" href="main.css">
    <link rel="canonical" href="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <?php require_once("nav.html");?>
        <div id="bandeau">
            <div id="bandeauText">
                <h1>Audit</h1>
                <span></span>
            </div>
        </div>
    </header>

    <section>
        <div id="center-section">
            <img src="images/audit/worker.jpg" id="worker" alt="travailleur">

            <p>La collaboration (coopération) de Patrice SANTERO avec le laboratoire HACS Handicap Activité Cognition Santé de Bordeaux depuis plusieurs années, nous a amené à développer une expertise dans les sciences cognitives et dans la biomécanique du geste.</p><br/> 

            <p>
            Nous intervenons entre autres dans les domaines de compétences suivants :<br/> 
            L’accompagnement dans l’analyse des facteurs humains, comme par exemple, la gestion des rapports humains dans l’activité quotidienne d’une entreprise.<br/> 
            L’usage cognitif des technologies, comme l’intégration de nouveaux outils dans une entreprise en y amenant des savoirs procéduraux et cognitifs.<br/> 
            L’accompagnement du vieillissement des salariés, comme par exemple, l’évaluation de la biomécanique et de la motricité des salariés dans leur activité et ainsi limiter l’impact fonctionnel sur la santé des salariés.<br/> 
            L’accompagnement de l’entreprise dans sa transformation, comme par exemple, permettre à un chef d’entreprise de réussir sa transition sociétale.
            </p><br/> 
            
            <img src="images/audit/vigne.jpg" id="vigne" alt="vigne">

            <p>
            Nous pouvons donc vous accompagner dans des domaines tels que :<br/> 
            La mise en place du DUER<br/> 
            L’évaluation des risques professionnels<br/> 
            L’analyse des postes de travail et l’adaptation au handicap<br/> 
            La gestion des risques liés aux incivilités<br/> 
            L’accompagnement à la mise en place de process et procédures
            </p>
        </div>

        <div id="auditimage"></div>
    </section>

    
    <?php require_once("footer.html");?>

    <script>
        let ww = window.outerWidth;
        const nav = document.querySelector("nav");
        const bandeauText  = document.querySelector("#bandeauText");


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