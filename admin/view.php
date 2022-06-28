<?php 
    //récupérer la base de données
    require 'database.php';

    //si id n'est pas vide
    if(!empty($_GET['id']))
    {
        $id = checkInput($_GET['id']);
    }

    //connection base de données
    $db = Database::connect();
    $statement = $db->prepare('SELECT stars.id, stars.name, stars.img, stars.description 
                                FROM stars
                                WHERE stars.id = ?');

    $statement->execute(array($id));
    $stars = $statement->fetch();
    Database::disconnect();

    //gérer les intrusions
    function checkInput($data)
    {
        $data = trim($data);
        //$data = stripslashses($data);
        $data = htmlspecialchars($data);
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
        <<!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="admin.css">
        <link rel="stylesheet" href="../globalStyle.css">
        <!-- tailwind test -->
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Admin Hellocse</title>
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
                <h2 class="h2">Les stars</h2>
            </div>
            <br>
            <!-- -->
            <form>
                <div class="form-group">
                    <label class="underline leading-10 uppercase text-orange-500">Nom :</label><h4><?php echo ' ' . $stars['name']; ?></h4>
                </div>
                <br>
                <div class="form-group">
                    <label class="underline leading-10 uppercase text-orange-500">Description :</label><p><?php echo ' ' . $stars['description']; ?></p>
                </div>
                <br>
                <div class="form-group">
                    <label class="underline leading-10 uppercase text-orange-500">Image :</label><img src="<?php echo ' ' . $stars['img']; ?>">
                    </div>
            </form>
            <br>
            <!-- bouton retour -->
            <div>
                <a class="btn btn-primary" href="index.php">Retour</a>
            </div>
        </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
</html>