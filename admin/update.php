<?php 
    //récupérer la base de données
    require 'database.php';

    // récupération de l'id de la star pour vérifier si GET vide ?
    if (!empty($_GET['id'])) {
        $id = checkInput($_GET['id']);
    }

    //gérer les erreurs
    $nameError = $descriptionError = $imgError = "";
    
    if(!empty($_POST)) {
        $name = checkInput($_POST["name"]);
        $description = checkInput($_POST["description"]);
        $img = checkInput($_FILES["img"]['name']);
        $imgPath = '../images/' . basename($img);
        $imgExtension = pathinfo($imgPath,PATHINFO_EXTENSION);
        $isSuccess = true;

        if(empty($name)) {
            $nameError = "Ce champ ne peut pas être vide";
            $isSuccess = false;
        }
        if(empty($description)) {
            $descriptionError = "Ce champ ne peut pas être vide";
            $isSuccess = false;
        }
        if(empty($img)) {
            $isImgUpdated = false;
        }
        // gestion des formats des fichiers images et du poids
        else {
            $isImgUpdated = true;
            $isUploadSuccess = true;
            //format
            if($imgExtension != "jpg" && $imgExtension != "png" && $imgExtension != "jpeg" && $imgExtension != "gif" ) {
                $imgError = "Les fichiers autorises sont: .jpg, .jpeg, .png, .gif";
                $isUploadSuccess = false;
            }
            //si images déjà existante
            if(file_exists($imgPath)) {
                $imgError = "Le fichier existe deja";
                $isUploadSuccess = false;
            }
            //poid max
            if($_FILES["img"]["size"] > 500000) {
                $imgError = "Le fichier ne doit pas depasser les 500KB";
                $isUploadSuccess = false;
            }
            // récupérer l'image temporaire pour l'enregistrer dans fichier image
            if($isUploadSuccess) {
                if(!move_uploaded_file($_FILES["img"]["tmp_name"], $imgPath)) {
                    $imgError = "Il y a eu une erreur lors de l'upload";
                    $isUploadSuccess = false;
                } 
            } 
        }

        // gérer mes cas de succès de l'ajout ou modification de mon images
        if(($isSuccess && $isImgUpdated && $isUploadSuccess) || ($isSuccess && $isImgUpdated)) {
            $db = Database::connect();
            if($isImgUpdated){
                $statement = $db->prepare("UPDATE stars set name = ?, description = ?, img = ? WHERE id = ?");
                $statement->execute(array($name,$description,$img,$id));
            }
            else{
                $statement = $db->prepare("UPDATE stars set name = ?, description = ? WHERE id = ?");
                $statement->execute(array($name,$description,$img,$id));
            }
            Database::disconnect();
            header("Location: index.php");

        } else if ($isImgUpdated && !$isUploadSuccess) {
            $db = Database::connect();
            $statement = $db->prepare("SELECT * FROM stars where id = ?");
            $statement->execute(array($id));
            $stars = $statement->fetch();
            $img = $item['img'];
            Database::disconnect();
        }
    }
    else{
        $db = Database::connect();
        $statement = $db->prepare("SELECT * FROM stars WHERE id = ?");
        $statement->execute(array($id));
        $stars = $statement->fetch();
        $name = $stars['name'];
        $description = $stars['description'];
        $img = $stars['img'];
        Database::disconnect();
    }

    function checkInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
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
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="admin.css">
        <link rel="stylesheet" href="../globalStyle.css">
        <!-- tailwind test -->
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Admin Hellocse Modifier</title>
    </head>
    <body class="bg-slate-100 ">
        <header class="">
            <div>
                <a href="../index.html"><img id="logo" src="https://www.hellocse.fr/images/logo_hellocse_white.svg" alt="logo" /></a>
                <h1 class="h1">Admin Hellocse</h1>
            </div>
        </header>
        <div class="container mx-auto bg-white rounded-xl p-7 dark:bg-slate-800">
            <h2 class="h2 text-orange-500">Modifier une stars</h2>
            <br>
            <div class="row">
                <div class="col col-sm-12 col-md-6">
                    <!-- formulaire d'ajout -->
                    <!-- modification en fonction de l'id-->
                    <form class="form" action="<?php echo 'update.php?id=' . $id; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="underline leading-10 uppercase text-orange-500">Nom :</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="<?php echo $name;?>">
                            <!-- gestion des erreurs -->
                            <span class="erreur-form"><?php echo $nameError;?></span>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="underline leading-10 uppercase text-orange-500">Description :</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="<?php echo $description;?>">
                            <!-- gestion des erreurs -->
                            <span class="erreur-form"><?php echo $descriptionError; ?></span>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Images :</label>
                            <p><?php echo $img; ?></p>
                            <label class="underline leading-10 uppercase text-orange-500">Sélectionner une image :</label><br>
                            <input type="file" id="img" name="img">
                            <!-- gestion des erreurs -->
                            <span class="erreur-form"><?php echo $imgError; ?></span>
                        </div>
                        <br>
                        <!-- bouton retour et modification -->
                        <div form="form-actions">
                            <button type="submit" class="btn btn-success">Modifier</button>
                            <a class="btn btn-primary" href="index.php"><span class="bi bi-arrow-left"></span>Retour</a>
                        </div>
                    </form>
                </div>
                <div class="col col-sm-12 col-md-6 site">
                    <div class="img-thumbnail">
                    <img src="<?php echo '../images/'.$img;?>" alt="...">
                    <div class="caption">
                        <h4><?php echo $name;?></h4>
                        <p><?php echo $description;?></p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
</html>