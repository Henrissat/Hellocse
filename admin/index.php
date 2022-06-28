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
                <h2 class="h2 text-orange-500">Liste des stars</h2>
                <a href="insert.php" class="add-btn btn btn-success btn-lg w-40"><span class="glyphicon glyphicon-plus"></span>Ajouter</a>
            </div>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Photo</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <!-- connection à la base de données-->
                    <?php
                        require 'database.php';
                        $db = Database::connect();
                        $database = $db->query('SELECT stars.id, stars.name, stars.img, stars.description 
                                                FROM stars
                                                ORDER BY stars.id DESC')
                                                or die(print_r($db->errorInfo()));
                        while($star = $database->fetch())
                        {
                            echo '<tr>';
                            echo '<td>' . $star['name'] . '</td>';
                            echo '<td>' . $star['img'] . '</td>';
                            echo '<td>' . $star['description'] . '</td>';
                            echo '<td width=340>';
                            echo '<a class="btn btn-secondary" href="view.php?id=' . $star['id'] . '"><span class="bi-eye"></span> Voir</a>';
                            echo '<a class="btn btn-primary" href="update.php?id=' . $star['id'] . '"><span class="bi-pencil"></span> Modifier</a>';
                            echo '<a class="btn btn-danger" href="delete.php?id=' . $star['id'] . '"><span class="bi-x"></span> Supprimer</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        Database::disconnect();
                    ?>
                </tbody>
            </table>
        </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
</html>