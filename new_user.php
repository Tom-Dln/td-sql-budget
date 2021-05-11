<?php
// Page Actuelle
$page = 'new_user.php';
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
    echo generate_form($new_user, 'POST');
}
?>


<!-- ----------------------------------------- -->
<!-- Fin du Main -->
<!-- ----------------------------------------- -->

<?php
// Fonction Ajout Utilisateur
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SESSION["form_action"] == 'ready') {
    new_user($_POST["first_name"], $_POST["last_name"], $_POST["birth_date"]);
    $_SESSION["form_action"] = 'done';
}
// Récupération Footer
require_once __DIR__ . '/inc/footer.php';
?>