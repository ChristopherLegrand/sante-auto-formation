<?php

//server plesk
// try
// {
//     $bdd = new PDO('mysql:host=217.182.80.228;dbname=test;charset=utf8', 'testuser', 'V4hpy7!5');
// }
// catch (Exception $e)
// {
//         die('Erreur : ' . $e->getMessage());
// }


//local
// try
// {
//    $bdd = new PDO('mysql:host=localhost; dbname=saf; charset=utf8', 'root', 'root');
// }
// catch (Exception $e)
// {
//    die('Erreur : ' . $e->getMessage());
// }

//ionos
try
{
    $bdd = new PDO('mysql:host=db5006113980.hosting-data.io;dbname=dbs5116923;charset=utf8', 'dbu124721', 'V4hpy7!5');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

?>