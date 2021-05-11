<?php
// Page Actuelle
$page = 'modify_income.php';
// Récupération Header
require_once __DIR__ . '/inc/header.php';
// Infos Modification Revenu
$modify_infos = get_income($_GET["income_id"]);
$modify_income[0]['param_value'] = $modify_infos[0]['inc_cat_id'];
$modify_income[1]['param_value'] = $modify_infos[0]['user_id'];
$modify_income[2]['param_value'] = date('Y-m-d', strtotime($modify_infos[0]['inc_receipt_date'])) . 'T' . date('H:i', strtotime($modify_infos[0]['inc_receipt_date']));
$modify_income[3]['param_value'] = $modify_infos[0]['inc_amount'];
?>

<!-- ----------------------------------------- -->
<!-- Début du Main -->
<!-- ----------------------------------------- -->


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once __DIR__ . '/confirmation.php';
} else {
    echo generate_form($modify_income, 'POST');
}
?>


<!-- ----------------------------------------- -->
<!-- Fin du Main -->
<!-- ----------------------------------------- -->

<?php
// Fonction Modification Revenu
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SESSION["form_action"] == 'ready') {
    modify_income($_GET["income_id"], $_POST["inc_cat_id"], $_POST["user_id"], $_POST["inc_receipt_date"], $_POST["inc_amount"]);
    $_SESSION["form_action"] = 'done';
}
// Récupération Footer
require_once __DIR__ . '/inc/footer.php';
?>