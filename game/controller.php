<?php
    include_once("model.php");

//    if (isset($_POST['col'])) {
//        $col = $_POST['col'];
//
//        // $model->addToken($col);
//        // $winner = $model->checkWin();
////        if ($winner != 0) {
////            echo json_encode(array('status' => 'win', 'player' => $winner));
////        } elseif ($model->getMoves() == 42) {
////            echo json_encode(array('status' => 'tie'));
////        } else {
////            $model->switchPlayer();
////            echo json_encode(array('status' => 'ok', 'player' => $model->getPlayer()));
////        }
//
//    }


    if (isset($_POST["user1"]) && isset($_POST["user2"]) && isset($_POST["colors"])){
        initGame();
    }

    if (isset($_GET["cell"])) {
        $nom = $_POST['nom'];
        echo $nom;

        $response = array(
            'status' => 'success',
            'message' => 'Les données ont été traitées avec succès pour le nom '.$nom
        );

        echo json_encode($response);

        var_dump($_POST['nom']);

        $line = substr($_GET["cell"], 0,1);
        $cols = substr($_GET["cell"], 1,2);
        if ($_SESSION["grid"][$line][$cols] == 0) {
            play($_GET["cell"]);
            switchUser();
            switchColor();

            if (youWin(1)) { $_SESSION["win"] = 1; };
            if (youWin(2)) { $_SESSION["win"] = 2; };

            // Enlever le getter
//            header('Location: controller.php');
//            exit();
        }
    }




    //            $_SESSION["user1"] = $_SESSION["user1"];
    //            $_SESSION["user2"] = $_SESSION["user2"];
    //            $_SESSION["color1"] = $_SESSION["color1"];
    //            $_SESSION["nbLine"] = $_SESSION["nbLine"];
    //            $_SESSION["nbCols"] = $_SESSION["nbCols"];
    //            $_SESSION["tab"] = $_SESSION["tab"];




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
