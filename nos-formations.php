<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Santé Auto Formation | Nos Formations</title>
    <meta charset="utf-8">
    <link rel="icon" type="image/jpg" href="images/favicon.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <link rel="stylesheet" href="nos-formations.css">
    <link rel="stylesheet" href="main.css">
    <link rel="canonical" href="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500&display=swap" rel="stylesheet">
</head>
<body>
<?php require_once('db.php'); ?>

    <header>
        <?php require_once("nav.html");?>
        <div id="bandeau">
            <div id="bandeauText">
                <h1>Nos Formations</h1>
                <span></span>
            </div>
        </div>
    </header>

    <section>
        <div class="categorie" id="prevention">
            <h2>Prévention et secourisme</h2>
            <div id="contain-items">
                <?php 
                    $req = $bdd->query("SELECT * FROM formations WHERE categorie = 'Prévention et secourisme' ORDER BY ordre DESC");
                    while($donnee = $req->fetch())
                    { 
                ?>
                    <div class="item">
                        <img src="images/nos-formations/<?php echo $donnee['photo'];?>" alt="">
                        <div class="h3contain">
                            <h3><?php echo $donnee['nom'];?></h3>
                        </div>
                        <span></span>
                        <div class="boutonvoir"><a href="formation.php?id=<?php echo $donnee['id'];?>">voir la formation</a></div>
                    </div>
                <?php 
                    } 
                ?>
            </div>
        </div>

        <div class="categorie" id="formateurs">
            <h2>Formations de formateurs</h2>
            <div id="contain-items">
                <?php 
                    $req = $bdd->query("SELECT * FROM formations WHERE categorie = 'Formations de formateurs' ORDER BY ordre DESC");
                    while($donnee = $req->fetch())
                    { 
                ?>
                    <div class="item">
                        <img src="images/nos-formations/<?php echo $donnee['photo'];?>" alt="">
                        <div class="h3contain">
                            <h3><?php echo $donnee['nom'];?></h3>
                        </div>
                        <span></span>
                        <div class="boutonvoir"><a href="formation.php?id=<?php echo $donnee['id'];?>">voir la formation</a></div>
                    </div>
                <?php 
                    } 
                ?>
            </div>
        </div>

        <div class="categorie" id="pro">
            <h2>Professionnels de santé</h2>
            <div id="contain-items">
                <?php 
                    $req = $bdd->query("SELECT * FROM formations WHERE categorie = 'Professionnels de santé' ORDER BY ordre DESC");
                    while($donnee = $req->fetch())
                    { 
                ?>
                    <div class="item">
                        <img src="images/nos-formations/<?php echo $donnee['photo'];?>" alt="">
                        <div class="h3contain">
                            <h3><?php echo $donnee['nom'];?></h3>
                        </div>
                        <span></span>
                        <div class="boutonvoir"><a href="formation.php?id=<?php echo $donnee['id'];?>">voir la formation</a></div>
                    </div>
                <?php 
                    } 
                ?>
            </div>
        </div>

        <div class="categorie" id="sport">
            <h2>Professionnels du sport</h2>
            <div id="contain-items">
                <?php 
                    $req = $bdd->query("SELECT * FROM formations WHERE categorie = 'Professionnels du sport' ORDER BY ordre DESC");
                    while($donnee = $req->fetch())
                    { 
                ?>
                    <div class="item">
                        <img src="images/nos-formations/<?php echo $donnee['photo'];?>" alt="">
                        <div class="h3contain">
                            <h3><?php echo $donnee['nom'];?></h3>
                        </div>
                        <span></span>
                        <div class="boutonvoir"><a href="formation.php?id=<?php echo $donnee['id'];?>">voir la formation</a></div>
                    </div>
                <?php 
                    } 
                ?>
            </div>
        </div>
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