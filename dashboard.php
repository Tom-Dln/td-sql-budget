<?php
// Page Actuelle
$page = 'dashboard.php';
// Récupération Header
require_once __DIR__ . '/inc/header.php';
// Récupération Totaux Revenus
$incomes_total = get_total_incomes()[0]['SUM(`inc_amount`)'];
$expenses_total = get_total_expenses()[0]['SUM(`exp_amount`)'];
// Réinitialisation Session Formulaire
$_SESSION["form_action"] = 'ready';
?>

<!-- ----------------------------------------- -->
<!-- Début du Main -->
<!-- ----------------------------------------- -->


<div class="row">
    <div class="col-12 col-md-6">
        <canvas id="myChart" data-incomes="<?= ($incomes_total - $expenses_total < 0 ? 0 : $incomes_total - $expenses_total); ?>" data-expenses="<?= $expenses_total; ?>" width="400" height="400"></canvas>
    </div>
    <div class="col-12 col-md-6 table-responsive-sm">
        <table class="table table-striped shadow rounded text-center mt-3">
            <thead>
                <tr>
                    <th scope="col">Revenus</th>
                    <th scope="col">Dépenses</th>
                    <th scope="col">Restants</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row"><?= $incomes_total . ' €'; ?></td>
                    <td><?= $expenses_total . ' €'; ?></td>
                    <td><?= $incomes_total - $expenses_total . ' €'; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<!-- ----------------------------------------- -->
<!-- Fin du Main -->
<!-- ----------------------------------------- -->

<?php
// Récupération Footer
require_once __DIR__ . '/inc/footer.php';
?>