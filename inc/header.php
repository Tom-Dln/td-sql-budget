<?php
// Démarrage Session
session_start();
// Récupération Config
require_once __DIR__ . '/../config/config.php';
// Récupération Functions
require_once __DIR__ . '/../functions.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Ceci est un exemple de méta description. Cela apparaîtra souvent dans les résultats de recherche.">
    <title><?= 'Budget - ' . $pages[$page][0]; ?></title>
    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- CSS Custom -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="assets/img/favicon-dev.ico">
</head>

<body id="<?= $pages[$page][2]; ?>">
    <header class="text-center">
        <!-- Navigation sur Desktop -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-header d-none d-lg-flex">
            <div class="container">
                <h1 class="text-white" href="#"><?= $pages[$page][0]; ?></h1>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ml-auto">
                        <a class="nav-link" href="dashboard.php"><i class="fas fa-chart-line menu-icon-desktop"></i> Dashboard</a>
                        <a class="nav-link" href="transactions.php"><i class="fas fa-receipt menu-icon-desktop"></i> Transactions</a>
                        <a class="nav-link" href="menu.php"><i class="fas fa-plus-circle menu-icon-desktop"></i> Ajouter</a>
                        <a class="nav-link" href="users.php"><i class="fas fa-users menu-icon-desktop"></i> Utilisateurs</a>
                        <a class="nav-link" href="dashboard.php"><i class="fas fa-cog menu-icon-desktop"></i> Réglages</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Navigation sur Mobile -->
        <nav id="navigation-top" class="bg-header shadow-lg d-lg-none">
            <div class="container">
                <div class="row py-2 px-3">
                    <h1 class="<?= ($page == 'index.php' ? 'text-center' : 'text-left') ?> p-0 m-0 text-white w-100"><?= $pages[$page][0]; ?></h1>
                </div>
            </div>
        </nav>
        <nav id="navigation-bottom" class="bg-header shadow-lg fixed-bottom pt-2 d-lg-none">
            <div class="container">
                <div class="row d-flex align-items-center py-2">
                    <a class="text-white flex-grow-1" href="dashboard.php">
                        <i class="fas fa-chart-line menu-icon"></i>
                        <h3>Dashboard</h3>
                    </a>
                    <a class="text-white flex-grow-1" href="transactions.php">
                        <i class="fas fa-receipt menu-icon"></i>
                        <h3>Transactions</h3>
                    </a>
                    <a class="text-white flex-grow-1" href="menu.php">
                        <i class="fas fa-plus-circle menu-icon"></i>
                        <h3>Ajouter</h3>
                    </a>
                    <a class="text-white flex-grow-1" href="users.php">
                        <i class="fas fa-users menu-icon"></i>
                        <h3>Utilisateurs</h3>
                    </a>
                    <a class="text-white flex-grow-1" href="dashboard.php">
                        <i class="fas fa-cog menu-icon"></i>
                        <h3>Réglages</h3>
                    </a>
                </div>
            </div>
        </nav>
    </header>
    <main class="container py-4 mb-5 mb-lg-0">
        <?php if ($pages[$page][1] != '') { ?>
            <h2 id="title" class="text-center mb-5"><u><?= $pages[$page][1]; ?></u></h2>
        <?php } ?>