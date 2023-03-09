<?php
    include_once("model.php");
    include_once("param-bdd.php");

    if (isset($_POST["user1"]) && isset($_POST["user2"]) && isset($_POST["colors"])){
        // Pas de partie en cours
        if (!isset($_SESSION["win"])) {
            initGame();
        } else {
            chooseGame();
        }
    }

    // Nouvelle partie
    if (isset($_GET["new"])) {
        initGame();
    }

    // Rejouer avec les memes noms et couleurs
    if (isset($_GET["replay"])) {
        clean();
    }

    // Tout effacer
    if (isset($_GET["clean"])) {
        addResultToBDD();
        clean();
        header('Location: index.php');
        exit();
    }

    if (isset($_GET["cell"])) {
        if ($_SESSION["win"] == 0) {
            $line = substr($_GET["cell"], 0,1);
            $cols = substr($_GET["cell"], 1,2);
            if ($_SESSION["grid"][$line][$cols] == 0) {
                play($_GET["cell"]);
                switchUser();
                switchColor();

                if (youWin(1)) { $_SESSION["win"] = $_SESSION["user1"]; };
                if (youWin(2)) { $_SESSION["win"] = $_SESSION["user2"]; };

                // Enlever le getter
                header('Location: controller.php');
                exit();
            }
        }
    }
        //        $mysqli = new mysqli("localhost","root","","bdd_php");
        //        $id = 1;
        //        $caseColonne = 0;
        //        $caseLigne = 0;
        //        $valeur = 0;

        //        $req = " INSERT INTO puissance4 ('id','caseColonne','caseLigne','valeur') VALUES ('$id', $caseColonne, $caseLigne,'$valeur' ); ";
        //        $req2 = "SELECT * FROM puissance4";
        //        $result = $mysqli->query($req) ;
        //        echo $result;


    include_once("view.php");
    loadGame();
?>
