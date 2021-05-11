<?php
// Page Actuelle
$page = 'modify_user.php';
// Récupération Header
require_once __DIR__ . '/inc/header.php';
// Infos Modification Utilisateur
$modify_infos = get_user($_GET["user_id"]);
$modify_user[0]['param_value'] = $modify_infos[0]['first_name'];
$modify_user[1]['param_value'] = $modify_infos[0]['last_name'];
$modify_user[2]['param_value'] = date('Y-m-d', strtotime($modify_infos[0]['birth_date']));
?>

<!-- ----------------------------------------- -->
<!-- Début du Main -->
<!-- ----------------------------------------- -->


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once __DIR__ . '/confirmation.php';
} else {
    echo generate_form($modify_user, 'POST');
}
?>


<!-- ----------------------------------------- -->
<!-- Fin du Main -->
<!-- ----------------------------------------- -->

<?php
// Fonction Ajout Utilisateur
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SESSION["form_action"] == 'ready') {
    modify_user($_GET["user_id"], $_POST["first_name"], $_POST["last_name"], $_POST["birth_date"]);
    $_SESSION["form_action"] = 'done';
}
// Récupération Footer
require_once __DIR__ . '/inc/footer.php';
?>