<html>
    <head>
        <title>Puissance 4</title>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
    <script>
        function ToColorById(id, color) {
            <?php if ($_SESSION['win'] == 0) {
                echo "<script>", "document.getElementById(id).src = color + '.png'", "</script>";
            } ?>
        }
    </script>
        <center>
            <table style="background-color: blue;">
                <?php
                for ($i = 0; $i < getLine(); ++$i) {
                    ?>
                    <tr>
                        <?php
                        for ($j = 0; $j < getCols(); ++$j) {
                            ?>
                            <td><a href="controller.php?cell=<?php echo $i.$j ?>" onclick="ToColorById('<?php echo 'cell'.$i.$j ?>', '<?php echo currentColor() ?>');"><img id="<?php echo "cell".$i.$j ?>" src="Vide.png"></a></td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </table>
        </center>

        <?php if ($_SESSION['win'] == 0) { ?>
            <center> <h2> Au tour de <?php echo currentPlayer() ?> (<?php echo currentColor() ?>)  </h2> </center>
        <?php } else { ?>
            <center>
                <h2> Bravo <?php echo $_SESSION['win'] ?> tu as gagné ! </h2>
                <a href="controller.php?clean=true"> Retour au menu </a> <br>
                <a href="controller.php?replay=true"> Rejouer </a>
            </center>
        <?php } ?>
        <br/>
        <br/>
    </body>
</html>
