<?php
// Page Actuelle
$page = 'new_expense.php';
// Récupération Header
require_once __DIR__ . '/inc/header.php';
?>

<!-- ----------------------------------------- -->
<!-- Début du Main -->
<!-- ----------------------------------------- -->


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once __DIR__ . '/confirmation.php';
} else {
    echo generate_form($new_expense, 'POST');
}
?>


<!-- ----------------------------------------- -->
<!-- Fin du Main -->
<!-- ----------------------------------------- -->

<?php
// Fonction Ajout Dépense
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SESSION["form_action"] == 'ready') {
    new_expense($_POST["exp_label"], $_POST["user_id"], $_POST["exp_date"], $_POST["exp_amount"]);
    $_SESSION["form_action"] = 'done';
}
// Récupération Footer
require_once __DIR__ . '/inc/footer.php';
?>