<html>
    <head>
        <title>Puissance 4</title>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    </head>
    <body>
    <script>
        function ToColorById(id, color){
            document.getElementById(id).src = color + ".png";

            $.ajax({
                url: 'controller.php',
                type: 'POST',
                data: { nom: 'Dupont' },
                success: function(response) {
                    // La réponse du serveur est stockée dans la variable "response"
                    console.log(response);
                }
            });
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

        <center> <h2> Au tour de <?php echo currentPlayer() ?> (<?php echo currentColor(), $_SESSION["win"]?>)  </h2> </center>
        <br/>
        <br/>
    </body>
</html>