<?php
    $user1 = "Default 1";
    $user2 = "Default 2";
    $currentUser = $user1;

    $color1 = "Rouge";
    $currentColor = $color1;

    $nbLine = 6;
    $nbCols = 7;

    session_start();

    function initGame() {
        $_SESSION["user1"] = isset($_SESSION['lastuser1']) ? $_SESSION['lastuser1'] : $_POST["user1"];
        $_SESSION["user2"] = isset($_SESSION['lastuser2']) ? $_SESSION['lastuser2'] : $_POST["user2"];
        $_SESSION["currentUser"] = $_SESSION["user1"];

        $_SESSION["color1"] = isset($_SESSION['lastcolors']) ? $_SESSION['lastcolors'] : $_POST["colors"];
        $_SESSION["currentColor"] = $_SESSION["color1"];

        $_SESSION["nbLine"] = $GLOBALS["nbLine"];
        $_SESSION["nbCols"] = $GLOBALS["nbCols"];

        $_SESSION["win"] = 0;

        for ($i = 0; $i < $_SESSION["nbLine"]; $i++) {
            for ($j = 0; $j < $_SESSION["nbCols"]; $j++) {
                $_SESSION["grid"][$i][$j] = 0;
            }
        }
    }

    function chooseGame() {
        $_SESSION["lastuser1"] = $_POST["user1"];
        $_SESSION["lastuser2"] = $_POST["user2"];
        $_SESSION["lastcolors"] = $_POST["colors"];

        header('Location: index.php?exist=true');
    }

    function clean() {
        $_SESSION["win"] = 0;

        for ($i = 0; $i < $_SESSION["nbLine"]; $i++) {
            for ($j = 0; $j < $_SESSION["nbCols"]; $j++) {
                $_SESSION["grid"][$i][$j] = 0;
            }
        }
    }

    function play($indice) {
        $line = substr($indice, 0,1);
        $cols = substr($indice, 1,2);

        if ($line != getLine() - 1) {
            for ($i = 0; $i < getLine(); $i++) {
                if ($_SESSION["grid"][$line + 1][$cols] == 0) {
                    $line = $i + 1;
                }
            }
        }

        $_SESSION["grid"][$line][$cols] = currentPlayer() == getPlayer1() ? 1 : 2;

/*        for ($i = 0; $i < $_SESSION["nbLine"]; $i++) {
            for ($j = 0; $j < $_SESSION["nbCols"]; $j++) {
                echo $_SESSION["grid"][$i][$j]."   ";
            }
            echo "<br>";
        }*/
    }

    function loadGame() {
        for ($i = 0; $i < $_SESSION["nbLine"]; $i++) {
            for ($j = 0; $j < $_SESSION["nbCols"]; $j++) {
                if ($_SESSION["grid"][$i][$j] != 0) {
                    if ($_SESSION["grid"][$i][$j] == 1) {
                        echo "<script> document.getElementById('cell".$i.$j."').src = '".getColor1() .".png'; </script>";
                    } else {
                        echo "<script> document.getElementById('cell".$i.$j."').src = '".getColor2() .".png'; </script>";
                    }
                }
            }
        }
    }

    function youWin($idPlayer) {
        // Lignes
        for ($i = 0; $i < getLine(); $i++) {
            for ($j = 0; $j < getCols() - 3; $j++) {
                if (getGridValue($i,$j) == $idPlayer && getGridValue($i,$j + 1) == $idPlayer && getGridValue($i,$j + 2) == $idPlayer && getGridValue($i,$j + 3) == $idPlayer) {
                    return true;
                }
            }
        }

        // Colonnes
        for ($i = 0; $i < getLine() - 3; $i++) {
            for ($j = 0; $j < getCols(); $j++) {
                if (getGridValue($i,$j) == $idPlayer && getGridValue($i + 1,$j) == $idPlayer && getGridValue($i + 2,$j) == $idPlayer && getGridValue($i + 3,$j) == $idPlayer) {
                    return true;
                }
            }
        }

        // Diagonale haut gauche bas droite
        for ($i = 0; $i < getLine() - 3; $i++) {
            for ($j = 0; $j < getCols() - 3; $j++) {
                if (getGridValue($i,$j) == $idPlayer && getGridValue($i + 1,$j + 1) == $idPlayer && getGridValue($i + 2,$j + 2) == $idPlayer && getGridValue($i + 3,$j + 3) == $idPlayer) {
                    return true;
                }
            }
        }

        // Diagonale bas gauche haut droite
        for ($i = 0; $i < getLine() - 3; $i++) {
            for ($j = 3; $j < getCols(); $j++) {
                if (getGridValue($i,$j) == $idPlayer && getGridValue($i + 1,$j - 1) == $idPlayer && getGridValue($i + 2,$j - 2) == $idPlayer && getGridValue($i + 3,$j - 3) == $idPlayer) {
                    return true;
                }
            }
        }

        return false;
    }

    function stopGame() {

    }

    function switchUser() {
        if ($_SESSION["currentUser"] == $_SESSION["user1"]) {
            $_SESSION["currentUser"] = $_SESSION["user2"];
        } else {
            $_SESSION["currentUser"] = $_SESSION["user1"];
        }
    }

    function switchColor() {
        if ($_SESSION["currentColor"] == "Rouge") {
            $_SESSION["currentColor"] = "Jaune";
        } else {
            $_SESSION["currentColor"] = "Rouge";
        }
    }

    function currentPlayer() {
        return $_SESSION["currentUser"];
    }

    function currentColor() {
        return $_SESSION["currentColor"];
    }

    function getPlayer1() {
        return $_SESSION["user1"];
    }

    function getPlayer2() {
        return $_SESSION["user2"];
    }

    function getColor1() {
        return $_SESSION["color1"];
    }

    function getColor2() {
        return $_SESSION["color1"] == "Rouge" ? "Jaune" : "Rouge";
    }

    function getLine() {
        return $_SESSION["nbLine"];
    }

    function getCols() {
        return $_SESSION["nbCols"];
    }

    function getGrid() {
        return $_SESSION["grid"];
    }

    function getGridValue($i, $j) {
        return $_SESSION["grid"][$i][$j];
    }
?>
