<?php
// Page Actuelle
$page = 'transactions.php';
// Récupération Header
require_once __DIR__ . '/inc/header.php';
// Fonction Suppressions Transactions
if (isset($_POST["income_id"])) {
    delete_income($_POST["income_id"]);
}
if (isset($_POST["expense_id"])) {
    delete_expense($_POST["expense_id"]);
}
// Fonctions Récupération des Transactions et Users
$incomes = get_transactions_incomes();
$expenses = get_transactions_expenses();
$users = get_users();
// Réinitialisation Session Formulaire
$_SESSION["form_action"] = 'ready';
?>

<!-- ----------------------------------------- -->
<!-- Début du Main -->
<!-- ----------------------------------------- -->


<div class="row">
    <div class="col-12 table-responsive-sm">
        <table class="table table-striped shadow rounded text-center">
            <thead>
                <tr>
                    <th scope="col">Nom - Date</th>
                    <th scope="col">Montant</th>
                    <th scope="col">Utilisateur</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <form action="" method="POST">
                    <?php
                    $index_incomes = 0;
                    $index_expenses = 0;
                    for ($i = 1; $i <= (count($incomes) + count($expenses)); $i++) {
                        if (!isset($incomes[$index_incomes])) {
                            $type = 'expense';
                            $title = $expenses[$index_expenses]['exp_label'];
                            $date = $expenses[$index_expenses]['exp_date'];
                            $amount = $expenses[$index_expenses]['exp_amount'];
                            $user = get_user($expenses[$index_expenses]['user_id']);
                            $id = $expenses[$index_expenses]['exp_id'];
                            $index_expenses++;
                        } elseif (!isset($expenses[$index_expenses])) {
                            $type = 'income';
                            $title = get_category($incomes[$index_incomes]['inc_cat_id']);
                            $title = $title[0]['inc_cat_name'];
                            $date = $incomes[$index_incomes]['inc_receipt_date'];
                            $amount = $incomes[$index_incomes]['inc_amount'];
                            $user = get_user($incomes[$index_incomes]['user_id']);
                            $id = $incomes[$index_incomes]['inc_id'];
                            $index_incomes++;
                        } elseif (strtotime($incomes[$index_incomes]['inc_receipt_date']) > strtotime($expenses[$index_expenses]['exp_date'])) {
                            $type = 'income';
                            $title = get_category($incomes[$index_incomes]['inc_cat_id']);
                            $title = $title[0]['inc_cat_name'];
                            $date = $incomes[$index_incomes]['inc_receipt_date'];
                            $amount = $incomes[$index_incomes]['inc_amount'];
                            $user = get_user($incomes[$index_incomes]['user_id']);
                            $id = $incomes[$index_incomes]['inc_id'];
                            $index_incomes++;
                        } else {
                            $type = 'expense';
                            $title = $expenses[$index_expenses]['exp_label'];
                            $date = $expenses[$index_expenses]['exp_date'];
                            $amount = $expenses[$index_expenses]['exp_amount'];
                            $user = get_user($expenses[$index_expenses]['user_id']);
                            $id = $expenses[$index_expenses]['exp_id'];
                            $index_expenses++;
                        }
                    ?>
                        <tr class="<?= ($type == 'income' ? 'text-success' : 'text-danger') ?>">
                            <th class="align-middle" scope="row"><u><?= $title; ?></u><br><?= date('d/m/Y', strtotime($date)); ?></th>
                            <!-- <td><?php  ?></td> -->
                            <td class="align-middle"><?= $amount . ' €'; ?></td>
                            <td class="align-middle"><?= $user[0]['first_name']; ?><br><?= $user[0]['last_name']; ?></td>
                            <?php
                            if ($type == 'income') {
                            ?>
                                <td class="align-middle">
                                    <a class="btn px-1" href="modify_income.php?income_id=<?= $id; ?>" role="button">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button name="income_id" type="submit" value="<?= $id; ?>" class="btn my-0 py-0">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            <?php
                            } else {
                            ?>
                                <td class="align-middle">
                                    <a class="btn px-1" href="modify_expense.php?expense_id=<?= $id; ?>" role="button">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button name="expense_id" type="submit" value="<?= $id; ?>" class="btn my-0 py-0">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            <?php
                            }
                            ?>
                        </tr>
                    <?php
                    }
                    ?>
                </form>
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