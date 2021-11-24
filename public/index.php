<?php
// On cherche à développer une page index.php qui nous permet de générer n'importe quelle parge de notre site
// Pour cel aon teste la présence d'un paramètre GET s'appelant page
// Si le paramètre n'est pas présent, on génère la page d'accueil par défaut
$page = "home";
if (isset($_GET["page"])) {
    $page = $_GET["page"];
}

// echo "Nous allons générer la page {$page}";

// On importe le fichier contenant les constantes pour la BDD et les chemains de notre site
require("../config/index.php");

// Connexion à la BDD beer3000
$dsn = "mysql:host=" . DB_HOSTNAME . ";dbname=" . DB_DATABASE . ";port=" . DB_PORT;
$db = new PDO($dsn, DB_USERNAME, DB_PASSWORD);

// Tableau qui contient les différentes pages de notre site
$data = array(
    "home" => array(
        "model" => "HomeModel",
        "view" => "HomeView",
        "controller" => "HomeController"
    ),
    "beer" => array(
        "model" => "BeerModel",
        "view" => "BeerView",
        "controller" => "BeerController"
    )
);

// On pourcourt le tableau pour vérifier si la page existe rééllement
$find = false;
foreach ($data as $key => $value) {
    if ($page === $key) {
        // Nous avons trouver la bonne page à générer
        $find = true;

        $model = $value["model"];
        $view = $value["view"];
        $controller = $value["controller"];
    }
}

if ($find) {
    // On apporte les diffèrents classe (ex: HomeModel, HomeController et HomeView)
    require(DIR_MODEL . $page . ".php");
    require(DIR_CONTROLLER . $page . ".php");
    require(DIR_VIEW . $page . ".php");

    // Suite à l'import, nous avons la possibilitè d'instancier les classes importées
    $pageModel = new $model($db);
    $pageController = new $controller($pageModel);
    $pageView = new $view($pageController);

    // Appel à la méthode Render pour faire le rendu de la Vue
    $pageView->Render();
}