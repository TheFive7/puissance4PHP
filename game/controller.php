<?php
    include_once("model.php");
    include_once("param-bdd.php");

    // Formulaire rempli
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

    // Click
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

    include_once("view.php");
    loadGame();
?>
