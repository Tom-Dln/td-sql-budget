<?php
// Page Actuelle
$page = 'menu.php';
// Récupération Header
require_once __DIR__ . '/inc/header.php';
// Réinitialisation Session Formulaire
$_SESSION["form_action"] = 'ready';
?>

<!-- ----------------------------------------- -->
<!-- Début du Main -->
<!-- ----------------------------------------- -->


<div class="list-group">
    <a href="new_income.php" class="list-group-item list-group-item-action">Un revenu</a>
    <a href="new_expense.php" class="list-group-item list-group-item-action">Une dépense</a>
    <a href="new_user.php" class="list-group-item list-group-item-action">Un utilisateur</a>
</div>


<!-- ----------------------------------------- -->
<!-- Fin du Main -->
<!-- ----------------------------------------- -->

<?php
// Récupération Footer
require_once __DIR__ . '/inc/footer.php';
?>