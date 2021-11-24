<?php
// Définir des constantes pour stocker les chemains vers différents dossiers
define("HOST", "http://localhost/literie3000");
define("DIR_TEMPLATE", "../templates/");
define("DIR_ASSETS", "../assets/");
define('DIR_APPLICATION', '../src/');
define('DIR_MODEL', DIR_APPLICATION . 'model/');
define('DIR_CONTROLLER', DIR_APPLICATION . 'controller/');
define('DIR_VIEW',DIR_APPLICATION . 'view/');

// Constantes pour une connexion à la BDD
define("DB_HOSTNAME", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "literie3000");
define("DB_PORT", "3306");