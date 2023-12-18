<!DOCTYPE html>
<html lang="fr">
<head>
    <meta name="robots" content="noindex, nofollow">
    <title>Santé Auto Formation | Contact</title>
    <meta charset="utf-8">
    <link rel="icon" type="image/jpg" href="images/favicon.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="main.css">
    <link rel="canonical" href="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500&display=swap" rel="stylesheet">
    <!-- <script src="https://www.google.com/recaptcha/api.js"></script> -->
</head>
<body>
    <header>
        <?php require_once("nav.html");?>
    </header>

    <section>
        <div id="infos">
            <img src="images/logo-contact.png" alt="logo" id="logo-contact">
            <h1>Santé Auto Formation</h1>
            <p> 27 Chem. des Arneys<br/>33480 Castelnau-de-Médoc<br/>05 56 58 15 17</p>
        </div>

        <div class="form">
            <h1>Contact</h1>
            <form method="POST"  id="formulaire">
                <input type="text" name="nomprenom" placeholder="nom et prénom" id="nomprenom" >
                <input type="text" name="tel" placeholder="tel" id="tel" >
                <input type="text" name="mail" placeholder="mail" id="mail">
                <input type="text" name="entreprise" placeholder="entreprise" id="entreprise">
                <input type="text" name="remarque" placeholder="remarque" id="remarque">
                <textarea name="message" id="message" cols="30" rows="10" id="message" placeholder="message" ></textarea>
                <div>
                <input type="checkbox" id="accept" name="scales" >
                <label for="scales">J’accepte que Santé Auto Formation utilise mes données personnelles pour me contacter suite à ma demande d’information</label>
                </div>
                <!-- <button type="submit" class="g-recaptcha btn btn-primary" data-sitekey="6LdrmcEdAAAAACiBgpD8X1LIHfUV0OlpOq1Qc1yV"  data-callback='onSubmit' data-action='submit'>Envoyer</button> -->
                <input type="submit" name="submit" placeholder="envoyer">
                <div id="return">
                   
                </div>

                <p>Santé Auto Formation  a besoin des données personnelles que vous nous avez communiquées pour vous fournir des informations sur nos produits et services. Vous pouvez vous désabonner de ces communications à tout moment. Pour plus d'informations sur la façon de vous désabonner, ainsi que sur les pratiques de confidentialité et la modalité de protection de la vie privée, veuillez-vous reporter aux mentions légales</p>
            </form> 
        </div>
    </section>

    
    <?php require_once("footer.html");?>

    <!-- recaptcha recaptcha recaptcha 
        <script>
        function onSubmit(token) {
        document.getElementById("formulaire").submit();
    }
    </script> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(function(){
                let ww = window.outerWidth;
                const nav = document.querySelector("nav");


                window.addEventListener("load", function(event) {
                    if(ww > 900){
                        nav.classList.add("visible");
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

                

                //TRAITEMENT FORMULAIR

                $("#formulaire").submit(function(){

                    var nomprenom = $("#nomprenom").val();
                        tel = $("#tel").val();
                        mail = $("#mail").val();
                        entreprise = $("#entreprise").val();
                        message = $("#message").val();
                        remarque = $("#remarque").val();
                        accept = document.getElementById("accept");
                        acceptchecked = accept.checked;
                        

                    $.post("traitement-contact.php", {nomprenom:nomprenom,  tel:tel, mail:mail, entreprise:entreprise, message:message, remarque:remarque, acceptchecked:acceptchecked}, function(data){

                        $("#return").html(data);

                        if(data == "<span class='good'>votre message a été envoyé</span>"){
                            $("#nomprenom").val('');
                            $("#tel").val('');
                            $("#mail").val('');
                            $("#entreprise").val('');
                            $("#message").val('');
                            $("#remarque").val('');
                        }

                    });

                    return false;

                });
        });
    </script>
</body>
</html>