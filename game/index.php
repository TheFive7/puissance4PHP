<!DOCTYPE html>
<html>
<head>
    <title>Puissance 4</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=*, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
    <h2 class="title">Jeu puissance 4</h2>
    <form class="form" method="POST" action="controller.php">
        <?php if (!isset($_GET['exist'])) { ?>
            <div class="form-group">
                <label class="label" for="user1">Nom joueur 1 :</label>
                <input class="input" name="user1" type="text" value="Joueur 1" required oninvalid="setCustomValidity('Pourquoi mettre un pseudo vide ? Choisis un pseudo !')" oninput="setCustomValidity('')">
            </div>
            <div class="form-group">
                <label class="label" for="user2">Nom joueur 2 :</label>
                <input class="input" name="user2" type="text" value="Joueur 2" required oninvalid="setCustomValidity('Pourquoi mettre un pseudo vide ? Choisis un pseudo !')" oninput="setCustomValidity('')">
            </div>
            <div class="form-group">
                <label class="label" for="colors">Choisir la couleur du joueur 1 :</label>
                <div class="select">
                    <select name="colors">
                        <option value="Rouge">Rouge</option>
                        <option value="Jaune">Jaune</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <button class="button" type="submit">Jouer</button>
            </div>
        <?php } ?>

        <?php if (isset($_GET['exist'])) { ?>
            <div class="form-group">
                <p class="text">Une partie est déjà en cours, que voulez-vous faire ?</p>
                <div class="button-group">
                    <a class="button" href="controller.php">Continuer la partie</a>
                    <a class="button" href="controller.php?new=true">Recommencer une partie</a>
                </div>
            </div>
        <?php } ?>
    </form>
</div>
</body>
</html>
