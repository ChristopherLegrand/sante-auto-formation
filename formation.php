<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Santé Auto Formation | Concevoir une séance d'activité sportive à l'usage des Kinésithérapeutes</title>
    <meta charset="utf-8">
    <link rel="icon" type="image/jpg" href="images/favicon.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <link rel="stylesheet" href="formation.css">
    <link rel="stylesheet" href="main.css">
    <link rel="canonical" href="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500&display=swap" rel="stylesheet">
</head>
<body>
<?php require_once('db.php'); 

$req = $bdd->prepare("SELECT * FROM formations WHERE id = ? ORDER BY id DESC");
$req->execute(array($_GET['id']));
while($donnee = $req->fetch()){
?>
    <header>
        <?php require_once("nav.html");?>
        <div id="bandeau" style="background-image: url(images/nos-formations/<?php echo $donnee['photo'];?>);">
            <div id="bandeauText">
                <h1><?php echo nl2br($donnee['nom']); ?></h1>
            </div>
        </div>
    </header>

    <section>
            <div id="topInfoContain">

                <?php if(strlen($donnee['duree']) !== 0){ ?>
                    <div class="topinfo">
                        <div class="topinfoCenter">
                            <h2>Durée</h2>
                            <p><?php echo nl2br($donnee['duree']); ?></p>
                        </div>
                    </div>
                <?php } ?>

                <?php if(strlen($donnee['public']) !== 0){ ?>
                    <div class="topinfo">
                        <div class="topinfoCenter">
                            <h2>Public</h2>
                            <p><?php echo nl2br($donnee['public']); ?></p>
                        </div>
                    </div>
                <?php } ?>

                <?php if(strlen($donnee['presentiel']) !== 0){ ?>
                    <div class="topinfo">
                        <div class="topinfoCenter">
                            <h2>Type de formation</h2>
                            <p><?php echo nl2br($donnee['presentiel']); ?></p>
                        </div>
                    </div>
                <?php } ?>
                
            </div>

        <div id="part2" class="sections">

        <?php if(strlen($donnee['objectifs']) !== 0){ ?>
            <div class="parties2">
                <h2>Objectifs</h2>
                <p><?php echo nl2br($donnee['objectifs']); ?></p>
            </div>
        <?php } ?>

        <?php if(strlen($donnee['competences']) !== 0){ ?>
            <div class="parties2">
                <h2>Compétences à acquérir</h2>
                <p><?php echo nl2br($donnee['competences']); ?></p>
            </div>
        <?php } ?>

        <?php if(strlen($donnee['methodes_mobilisees']) !== 0){ ?>
            <div class="parties2">
                <h2>Pré-requis et conditions d'accès</h2>
                <p><?php echo nl2br($donnee['pre_requis']); ?></p>
            </div>
        <?php } ?>

        <?php if(strlen($donnee['methodes_mobilisees']) !== 0){ ?>
            <div class="parties2">
                <h2>Méthodes mobilisées</h2>
                <p><?php echo nl2br($donnee['methodes_mobilisees']); ?></p>
            </div>
        <?php } ?>

        <?php if(strlen($donnee['modalites_evaluation']) !== 0){ ?>
            <div class="parties2">
                <h2>Modalité d’évaluation</h2>
                <p><?php echo nl2br($donnee['modalites_evaluation']); ?></p>
            </div>
        <?php } ?>

        <?php if(strlen($donnee['allegement']) !== 0){ ?>
            <div class="parties2">
                <h2>Allègement</h2>
                <p><?php echo nl2br($donnee['allegement']); ?></p>
            </div>
        <?php } ?>

        <?php if(strlen($donnee['actualisation_competences']) !== 0){ ?>
            <div class="parties2">
                <h2>Maintien et actualisation des compétences</h2>
                <p><?php echo nl2br($donnee['actualisation_competences']); ?></p>
            </div>
        <?php } ?>

        <?php if(strlen($donnee['modalites_inscription']) !== 0){ ?>
            <div class="parties2">
                <h2>Modalités d'inscription et délai d’accès</h2>
                <p><?php echo nl2br($donnee['modalites_inscription']); ?></p>
            </div>
        <?php } ?>

        <?php if(strlen($donnee['handicap']) !== 0){ ?>
            <div class="parties2">
                <h2>Accessibilité aux personnes en situation de handicap</h2>
                <p><?php echo nl2br($donnee['handicap']); ?></p>
            </div>
        <?php } ?>

        <?php if($donnee['certification'] == "oui"){ ?>
            <div class="parties2">
                <h2>Taux de réussite à la certification</h2>
                <!-- <img src="images/etoiles.png" alt="etoiles" id="etoiles"/> -->
                <div id="barre_reussite"><div id="barre_remplie" style="width:<?php echo nl2br($donnee['taux_reussite']); ?>%"></div></div>
                <p id="text-etoile"><?php echo nl2br($donnee['taux_reussite']); ?>%</p>
            </div>
        <?php } ?>

        <?php if($donnee['moncompteformation'] == "oui"){ ?>
            <div id="lienslogos">
                <p>Finançable par MON COMPTE FORMATION :</p>
                <a href="<?php echo nl2br($donnee['liencompteformation']); ?>" target="blank"><img src="images/moncompteformation.png" alt="mon compte formation logo" class="logoLien"/></a>
            </div>
        <?php } ?>


            <a href="#part3" id="tarif">Programme et tarif sur demande</a>

            <div id="miseajour"><?php echo nl2br($donnee['versionform']); ?></div>
        </div>

        <div id="part1" class="sections"></div>
    </section>



    <div id="part3">
        <iframe src="<?php echo $donnee['lien_galaxy']; ?>" frameborder="0" id="galaxy"></iframe>
    </div> 

<?php
}
?>
    
    <?php require_once("footer.html");?>

    <script>
        let ww = window.outerWidth;
        const nav = document.querySelector("nav");
        const h1 = document.querySelector("h1");
        const iframe = document.querySelector("iframe");

        
        iframe.addEventListener("load", function(){
            console.log("complete");
            setTimeout(function(){ window.scrollTo(0,0); }, 1000);
        });
        


        window.addEventListener("load", function(event) {
            if(ww > 900){
                nav.classList.add("visible");
            }

            h1.classList.add("visible");
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