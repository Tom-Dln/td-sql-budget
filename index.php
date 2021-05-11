<?php
// Page Actuelle
$page = 'index.php';
// Récupération Header
require_once __DIR__ . '/inc/header.php';
// Réinitialisation Session Formulaire
$_SESSION["form_action"] = 'ready';
?>

<!-- ----------------------------------------- -->
<!-- Début du Main -->
<!-- ----------------------------------------- -->


<div class="row mt-4">
    <div class="col-12 col-md-6">
        <img src="assets/img/illustration-index.png" class="img-fluid" alt="Illustration de l'Application de Budget">
    </div>
    <div class="col-12 col-md-6 pt-0 pt-md-5">
        <p class="text-center my-5">Votre nouvelle application de Budgetisation !<br>Afin de répondre à un besoin d'organisation dans certains cadres, nous vous proposons notre nouvelle application Budget'Easy pour gérer au mieux votre argent :)</p>
        <a class="btn btn-gradient btn-lg d-block w-50 mx-auto" href="dashboard.php" role="button">Commencer</a>
    </div>
</div>


<!-- ----------------------------------------- -->
<!-- Fin du Main -->
<!-- ----------------------------------------- -->

<?php
// Récupération Footer
require_once __DIR__ . '/inc/footer.php';
?>