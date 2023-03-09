<html>
    <head>
        <title>Puissance 4</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=*, initial-scale=1.0">
    </head>
    <body>
        <center><h2>Jeu puissance 4 </h2></center>

        <form method ="POST" action="controller.php">
            <label for="user1">Nom</label>
            <input name="user1" type="text" value="Joueur 1" required oninvalid="setCustomValidity('Pourquoi mettre un pseudo vide ? Choisis un pseudo !')" oninput="setCustomValidity('')"> <br> <br>

            <label for="user2">Nom</label>
            <input name="user2" type="text" value="Joueur 2" required oninvalid="setCustomValidity('Pourquoi mettre un pseudo vide ? Choisis un pseudo !')" oninput="setCustomValidity('')"> <br> <br>

            <label for="colors">Choisir la couleur du joueur 1:</label>
            <select name="colors">
                <option value="Rouge">Rouge</option>
                <option value="Jaune">Jaune</option>
            </select>

            <br> <br>

            <button type = submit> Jouer </button>
        </form>
    </body>
</html>
