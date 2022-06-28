<?php 
    //récupérer la base de données
    require 'database.php';

    // récupération de l'id de la star pour vérifier si GET vide ?
    if (!empty($_GET['id'])) {
        $id = checkInput($_GET['id']);
    }
    
    
    // Vérifier si méthode POST du formulaire du suppression est vide et si star existe alors suppression
    if (!empty($_POST['id'])) {
        $id = checkInput($_POST['id']);
        $db = Database::connect();
        $statement = $db->prepare("DELETE FROM stars WHERE id = ?");
        $statement->execute(array($id));
        Database::disconnect();
        header("Location: index.php"); 
    }
        

    function checkInput($data) {
        $data = trim($data);
        //$data = stripslashes($data);
        $data = htmlspecialchars($data);//blindvalue
        return $data;
      }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="admin.css">
        <link rel="stylesheet" href="../globalStyle.css">
        <!-- tailwind test -->
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Supprimer Hellocse</title>
    </head>
    <body class="bg-slate-100 ">
        <header class="">
            <div>
                <a href="../index.html"><img id="logo" src="https://www.hellocse.fr/images/logo_hellocse_white.svg" alt="logo" /></a>
                <h1 class="h1">Admin Hellocse</h1>
            </div>
        </header>
        <div class="container mx-auto bg-white rounded-xl p-7 dark:bg-slate-800">
            <div class="row">
                <h2 class="h2 text-orange-500">Supprimer une stars</h2>
            </div>
            <br>
            <!-- formulaire d'ajout -->
            <form class="form" action="delete.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id;?>"></input>
                <p class="alert alert-warning">Êtes vous sûr de vouloir supprimer cette star ?</p>
                <!-- bouton retour -->
                <div form="form-actions">
                    <button type="submit" class="btn btn-success">Oui</button>
                    <a class="btn btn-primary" href="index.php">Non</a>
                </div>
            </form>
        </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
</html>