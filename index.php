<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="globalStyle.css">
        <!--tailwind
        <script src="https://cdn.tailwindcss.com"></script>
        -->
        <title>Test Hellocse</title>
    </head>
    <body>
        <div>
            <header>
                <div class="text-logo"><img id="logo" src="https://www.hellocse.fr/images/logo_hellocse_white.svg" alt="logo" /><h1>Hellocse Test</h1></div>
                <!-- menu -->
                <nav class="menu-container">
                    <ul class="menu">
                        <li role="home" class="active"><a href="index.html">Home</a></li>
                        <li role="back"><a href="admin/index.php">Admin</a></li>
                    </ul>
                </nav>
            </header>
            <!-- Onglets container -->
            <div class="container site">
                <!-- stars -->
                <!-- Mise en dynamique du site-->
                <?php
                    require 'admin/database.php';
                    $db = Database::connect();
                    $statement = $db->query('SELECT stars.id, stars.name, stars.img, stars.description FROM stars');
                    $star = $statement->fetchAll();
                    foreach($star as $star) {
                            echo '<div class="tab-content">';
                            echo '<a href="#item' . $star['id'] . '" class="btn">' . $star['name'] . '</a>';
                            echo '<div class="items" id="item' . $star['id'] . '">';
                            echo '<h2>' . $star['name'] . '</h2>';
                            echo '<p><img class="img-star" src=" ' . $star['img'] . '"/>' . $star['description'] . '</p>';
                            echo '</div>';
                            echo '</div>';                
                    }
                ?>
                <div class="tab-content">
                    <a href="#default" class="btn current">Fermer</a>
                </div>
            </div>
        </div>
        <script>
            var btns = document.querySelectorAll(".btn");
            var selected = document.getElementsByClassName("current");
            Array.from(btns).forEach(item => {
               item.addEventListener("click", () => {
                  
                  selected[0].className = selected[0].className.replace(" current", "");
                  item.className += " current";
               });
            });
            
            console.log(btns)
         </script>
    </body>
</html>