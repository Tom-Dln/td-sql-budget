<?php
// Page Actuelle
$page = 'modify_expense.php';
// Récupération Header
require_once __DIR__ . '/inc/header.php';
// Infos Modification Dépense
$modify_infos = get_expense($_GET["expense_id"]);
$modify_expense[0]['param_value'] = $modify_infos[0]['exp_label'];
$modify_expense[1]['param_value'] = $modify_infos[0]['user_id'];
$modify_expense[2]['param_value'] = date('Y-m-d', strtotime($modify_infos[0]['exp_date'])) . 'T' . date('H:i', strtotime($modify_infos[0]['exp_date']));
$modify_expense[3]['param_value'] = $modify_infos[0]['exp_amount'];
?>

<!-- ----------------------------------------- -->
<!-- Début du Main -->
<!-- ----------------------------------------- -->


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once __DIR__ . '/confirmation.php';
} else {
    echo generate_form($modify_expense, 'POST');
}
?>


<!-- ----------------------------------------- -->
<!-- Fin du Main -->
<!-- ----------------------------------------- -->

<?php
// Fonction Modification Dépense
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SESSION["form_action"] == 'ready') {
    modify_expense($_GET["expense_id"], $_POST["exp_label"], $_POST["user_id"], $_POST["exp_date"], $_POST["exp_amount"]);
    $_SESSION["form_action"] = 'done';
}
// Récupération Footer
require_once __DIR__ . '/inc/footer.php';
?>