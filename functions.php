<!-- ---------------------------------------------
    Fichier de Fonctions
---------------------------------------------- -->

<?php

#################### Connexion BDD ####################


function bdd_connect()
{
    try {
        $options = [
            // Permet à PDO de lever des exceptions en cas d'erreur SQL
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        // data source name
        $dsn = 'mysql:host=' . BDD_HOST . ';dbname=' . BDD_NAME . ';charset=utf8';
        // instance de la base de données (pdo)
        $bdd_instance = new PDO($dsn, BDD_USER, BDD_PWD, $options);
        // printf('Connexion Base De Données - Active');
        return $bdd_instance;
    } catch (PDOException $ex) {
        printf('Connexion Base De Données - Erreur code "%s"', $ex->getCode());
        // arrêter l'exécution du script
        // die();
    }
}


#################### Fonctions Utilisateurs ####################


function get_users()
{
    $bdd_instance = bdd_connect();
    $request = <<<EOD
        SELECT
            `first_name`, `last_name`, `birth_date`, `user_id`
        FROM `users`
        ORDER BY `last_name`
EOD;
    $stmt = $bdd_instance->query($request);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}


function get_user($user_id)
{
    $bdd_instance = bdd_connect();
    $request = <<<EOD
        SELECT
            `first_name`, `last_name`, `birth_date`
        FROM `users`
        WHERE `user_id` = :user_id;
EOD;
    $stmt = $bdd_instance->prepare($request);
    $stmt->bindValue(':user_id', $user_id);
    $stmt->execute();
    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return ($user);
}


function new_user($first_name, $last_name, $birth_date)
{
    $bdd_instance = bdd_connect();
    $request = <<<EOD
        INSERT INTO `users` (`first_name`, `last_name`, `birth_date`)
        VALUES (:first_name, :last_name, :birth_date)
EOD;
    $stmt = $bdd_instance->prepare($request);
    $stmt->bindValue(':first_name', $first_name);
    $stmt->bindValue(':last_name', $last_name);
    $stmt->bindValue(':birth_date', date('Y-m-d H:i:s', strtotime($birth_date)));
    $stmt->execute();
}


function delete_user($user_id)
{
    $bdd_instance = bdd_connect();
    $request = <<<EOD
        DELETE FROM `expenses`
        WHERE `user_id` = :user_id;
        DELETE FROM `incomes`
        WHERE `user_id` = :user_id;
        DELETE FROM `users`
        WHERE `user_id` = :user_id;
EOD;
    $stmt = $bdd_instance->prepare($request);
    $stmt->bindValue(':user_id', $user_id);
    $stmt->execute();
}


function modify_user($user_id, $first_name, $last_name, $birth_date)
{
    $bdd_instance = bdd_connect();
    $request = <<<EOD
        UPDATE `users`
        SET `first_name` = :first_name, `last_name` = :last_name, `birth_date` = :birth_date
        WHERE `user_id` = :user_id
EOD;
    $stmt = $bdd_instance->prepare($request);
    $stmt->bindValue(':user_id', $user_id);
    $stmt->bindValue(':first_name', $first_name);
    $stmt->bindValue(':last_name', $last_name);
    $stmt->bindValue(':birth_date', date('Y-m-d H:i:s', strtotime($birth_date)));
    $stmt->execute();
}


#################### Fonctions Dépenses ####################


function get_expense($expense_id)
{
    $bdd_instance = bdd_connect();
    $request = <<<EOD
        SELECT
            `exp_date`, `exp_amount`, `exp_label`, `user_id`
        FROM `expenses`
        WHERE `exp_id` = :expense_id;
EOD;
    $stmt = $bdd_instance->prepare($request);
    $stmt->bindValue(':expense_id', $expense_id);
    $stmt->execute();
    $expense = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return ($expense);
}


function new_expense($exp_label, $user_id, $exp_date, $exp_amount)
{
    $bdd_instance = bdd_connect();
    $request = <<<EOD
        INSERT INTO `expenses` (`exp_date`, `exp_amount`, `exp_label`, `user_id`)
        VALUES (:exp_date, :exp_amount, :exp_label, :user_id)
EOD;
    $stmt = $bdd_instance->prepare($request);
    $stmt->bindValue(':exp_label', $exp_label);
    $stmt->bindValue(':user_id', $user_id);
    $stmt->bindValue(':exp_date', date('Y-m-d H:i:s', strtotime($exp_date)));
    $stmt->bindValue(':exp_amount', $exp_amount);
    $stmt->execute();
}


function delete_expense($expense_id)
{
    $bdd_instance = bdd_connect();
    $request = <<<EOD
        DELETE FROM `expenses`
        WHERE `exp_id` = :expense_id;
EOD;
    $stmt = $bdd_instance->prepare($request);
    $stmt->bindValue(':expense_id', $expense_id);
    $stmt->execute();
}


function modify_expense($expense_id, $exp_label, $user_id, $exp_date, $exp_amount)
{
    $bdd_instance = bdd_connect();
    $request = <<<EOD
        UPDATE `expenses`
        SET `exp_label` = :exp_label, `user_id` = :user_id, `exp_date` = :exp_date, `exp_amount` = :exp_amount
        WHERE `exp_id` = :expense_id
EOD;
    $stmt = $bdd_instance->prepare($request);
    $stmt->bindValue(':expense_id', $expense_id);
    $stmt->bindValue(':exp_label', $exp_label);
    $stmt->bindValue(':user_id', $user_id);
    $stmt->bindValue(':exp_date', date('Y-m-d H:i:s', strtotime($exp_date)));
    $stmt->bindValue(':exp_amount', $exp_amount);
    $stmt->execute();
}


#################### Fonctions Revenus ####################


function get_income($income_id)
{
    $bdd_instance = bdd_connect();
    $request = <<<EOD
        SELECT
            `inc_cat_id`, `user_id`, `inc_receipt_date`, `inc_amount`
        FROM `incomes`
        WHERE `inc_id` = :income_id;
EOD;
    $stmt = $bdd_instance->prepare($request);
    $stmt->bindValue(':income_id', $income_id);
    $stmt->execute();
    $income = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return ($income);
}


function new_income($inc_cat_id, $user_id, $inc_receipt_date, $inc_amount)
{
    $bdd_instance = bdd_connect();
    $request = <<<EOD
        INSERT INTO `incomes` (`inc_cat_id`, `user_id`, `inc_receipt_date`, `inc_amount`)
        VALUES (:inc_cat_id, :user_id, :inc_receipt_date, :inc_amount)
EOD;
    $stmt = $bdd_instance->prepare($request);
    $stmt->bindValue(':inc_cat_id', $inc_cat_id);
    $stmt->bindValue(':user_id', $user_id);
    $stmt->bindValue(':inc_receipt_date', date('Y-m-d H:i:s', strtotime($inc_receipt_date)));
    $stmt->bindValue(':inc_amount', $inc_amount);
    $stmt->execute();
}


function delete_income($income_id)
{
    $bdd_instance = bdd_connect();
    $request = <<<EOD
        DELETE FROM `incomes`
        WHERE `inc_id` = :income_id;
EOD;
    $stmt = $bdd_instance->prepare($request);
    $stmt->bindValue(':income_id', $income_id);
    $stmt->execute();
}


function modify_income($income_id, $inc_cat_id, $user_id, $inc_receipt_date, $inc_amount)
{
    $bdd_instance = bdd_connect();
    $request = <<<EOD
        UPDATE `incomes`
        SET `inc_cat_id` = :inc_cat_id, `user_id` = :user_id, `inc_receipt_date` = :inc_receipt_date, `inc_amount` = :inc_amount
        WHERE `inc_id` = :income_id
EOD;
    $stmt = $bdd_instance->prepare($request);
    $stmt->bindValue(':income_id', $income_id);
    $stmt->bindValue(':inc_cat_id', $inc_cat_id);
    $stmt->bindValue(':user_id', $user_id);
    $stmt->bindValue(':inc_receipt_date', date('Y-m-d H:i:s', strtotime($inc_receipt_date)));
    $stmt->bindValue(':inc_amount', $inc_amount);
    $stmt->execute();
}


#################### Fonctions Transactions ####################


function get_transactions_incomes()
{
    $bdd_instance = bdd_connect();
    $request = <<<EOD
        SELECT
            `inc_id`, `inc_amount`, `inc_receipt_date`, `inc_cat_id`, `user_id`
        FROM `incomes`
        ORDER BY `inc_receipt_date` DESC
EOD;
    $stmt = $bdd_instance->query($request);
    $transactions_incomes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $transactions_incomes;
}


function get_transactions_expenses()
{
    $bdd_instance = bdd_connect();
    $request = <<<EOD
        SELECT
            `exp_id`, `exp_date`, `exp_amount`, `exp_label`, `user_id`
        FROM `expenses`
        ORDER BY `exp_date` DESC
EOD;
    $stmt = $bdd_instance->query($request);
    $transactions_expenses = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $transactions_expenses;
}


function get_total_incomes()
{
    $bdd_instance = bdd_connect();
    $request = <<<EOD
        SELECT SUM(`inc_amount`)
            FROM `incomes`
EOD;
    $stmt = $bdd_instance->query($request);
    $transactions_incomes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $transactions_incomes;
}


function get_total_expenses()
{
    $bdd_instance = bdd_connect();
    $request = <<<EOD
        SELECT SUM(`exp_amount`)
            FROM `expenses`
EOD;
    $stmt = $bdd_instance->query($request);
    $transactions_expenses = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $transactions_expenses;
}


#################### Fonctions Catégories ####################


function get_categories()
{
    $bdd_instance = bdd_connect();
    $request = <<<EOD
        SELECT
            `inc_cat_name`, `inc_cat_id`
        FROM `incomes_categories`
        ORDER BY `inc_cat_name`
EOD;
    $stmt = $bdd_instance->query($request);
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $categories;
}


function get_category($category_id)
{
    $bdd_instance = bdd_connect();
    $request = <<<EOD
        SELECT
            `inc_cat_name`
        FROM `incomes_categories`
        WHERE `inc_cat_id` = :category_id;
EOD;
    $stmt = $bdd_instance->prepare($request);
    $stmt->bindValue(':category_id', $category_id);
    $stmt->execute();
    $category = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return ($category);
}


#################### Fonction Formulaire ####################


function generate_form($parameters, $method)
{
    $form = "<form action='' method='$method'>";
    foreach ($parameters as $key) {
        $form .= '<div class="form-group row">';
        $form .= '<label for="' . $key['param_name'] . '" class="col-6 col-form-label">' . $key['param_show'] . '</label>';
        $form .= '<div class="col-6">';
        if ($key['param_input'][0] == 'input') {
            $form .= '<input id="' . $key['param_name'] . '" name="' . $key['param_name'] . '" type="' . $key['param_input'][1] . '" value="' . $key['param_value'] . '" ';
            if ($key['param_option'] == 'dt_td') {
                $form .= 'max="' . date('Y-m-d') . '" ';
            }
            if ($key['param_option'] == 'dtl_td') {
                $form .= 'max="' . date('Y-m-d') . 'T' . date('H:i') . '" ';
            }
            $form .= 'class="form-control" required>';
        } else {
            $form .= '<select id="' . $key['param_name'] . '" name="' . $key['param_name'] . '" class="form-control" required>>';
            if ($key['param_option'] == 'slct-cat') {
                $categories = get_categories();
                foreach ($categories as $value) {
                    $form .= '<option value="' . $value['inc_cat_id'] . '"' . ($value['inc_cat_id'] == $key['param_value'] ? 'selected' : '') . '>' . $value['inc_cat_name'] . '</option>';
                }
            } elseif ($key['param_option'] == 'slct-user') {
                $users = get_users();
                foreach ($users as $value) {
                    $form .= '<option value="' . $value['user_id'] . '"' . ($value['user_id'] == $key['param_value'] ? 'selected' : '') . '>' . $value['last_name'] . ' ' . $value['first_name'] . '</option>';
                }
            }
            $form .= '</select>';
        }
        $form .= '</div>';
        $form .= '</div>';
    }
    $form .= '<button type="submit" class="btn btn-gradient d-block mx-auto mt-5">Valider</button>';
    $form .= '</form>';
    return $form;
}


?>