<!-- ---------------------------------------------
    Fichier de Configuration
---------------------------------------------- -->

<?php

// Définition Zone Horaire
date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fra', 'fr_FR');

// Informations Connexion BDD
define('BDD_NAME', 'budget');
define('BDD_USER', 'root');
define('BDD_PWD',  '');
define('BDD_HOST', 'localhost');

$pages = [
    'index.php'          => ['Budget\'Easy',           'Accueil',                                                         'index'],
    'dashboard.php'      => ['Tableau de bord',        'Informations de Budget :',                                        'dashboard'],
    'transactions.php'   => ['Transactions',           'Liste des transactions :',                                        'transactions'],
    'menu.php'           => ['Nouvelle Transaction',   'Que souhaitez vous ajouter ?',                                    'menu'],
    'new_expense.php'    => ['Nouvelle Dépense',       'Remplissez ce formulaire pour ajouter une nouvelle dépense :',    'new_expense'],
    'new_income.php'     => ['Nouveau Revenu',         'Remplissez ce formulaire pour ajouter un nouveau revenu :',       'new_income'],
    'new_user.php'       => ['Nouvel Utilisateur',     'Remplissez ce formulaire pour ajouter un nouvel utilisateur :',   'new_user'],
    'modify_expense.php' => ['Modifier Dépense',       'Remplissez ce formulaire pour modifier la dépense :',             'modify_expense'],
    'modify_income.php'  => ['Modifier Revenu',        'Remplissez ce formulaire pour modifier le revenu :',              'modify_income'],
    'modify_user.php'    => ['Modifier Utilisateur',   'Remplissez ce formulaire pour modifier l\'utilisateur :',         'modify_user'],
    'categories.php'     => ['Catégories',             'Liste des catégories :',                                          'categories'],
    'users.php'          => ['Utilisateurs',           'Liste des utilisateurs :',                                        'users'],
    'user.php'           => ['Détails Utilisateur',    '',                                                                'user'],
];

$new_user = [
    [
        'param_show'  => 'Prénom',
        'param_name' => 'first_name',
        'param_input' => ['input', 'text'],
        'param_option'  => '',
        'param_value' => ''
    ],
    [
        'param_show'  => 'Nom',
        'param_name' => 'last_name',
        'param_input' => ['input', 'text'],
        'param_option'  => '',
        'param_value' => ''
    ],
    [
        'param_show'  => 'Date de Naissance',
        'param_name' => 'birth_date',
        'param_input' => ['input', 'date'],
        'param_option'  => 'dt_td',
        'param_value' => ''
    ],
];

$modify_user = [
    [
        'param_show'  => 'Prénom',
        'param_name' => 'first_name',
        'param_input' => ['input', 'text'],
        'param_option'  => '',
        'param_value' => ''
    ],
    [
        'param_show'  => 'Nom',
        'param_name' => 'last_name',
        'param_input' => ['input', 'text'],
        'param_option'  => '',
        'param_value'=> ''
    ],
    [
        'param_show'  => 'Date de Naissance',
        'param_name' => 'birth_date',
        'param_input' => ['input', 'date'],
        'param_option'  => 'dt_td',
        'param_value' => ''
    ],
];

$new_income = [
    [
        'param_show'  => 'Catégorie',
        'param_name' => 'inc_cat_id',
        'param_input' => ['select'],
        'param_option'  => 'slct-cat',
        'param_value' => ''
    ],
    [
        'param_show'  => 'Utilisateur',
        'param_name' => 'user_id',
        'param_input' =>  ['select'],
        'param_option'  => 'slct-user',
        'param_value' => ''
    ],
    [
        'param_show'  => 'Date',
        'param_name' => 'inc_receipt_date',
        'param_input' => ['input', 'datetime-local'],
        'param_option'  => 'dtl_td',
        'param_value' => ''
    ],
    [
        'param_show'  => 'Montant',
        'param_name' => 'inc_amount',
        'param_input' => ['input', 'number'],
        'param_option'  => '',
        'param_value' => ''
    ],
];

$modify_income = [
    [
        'param_show'  => 'Catégorie',
        'param_name' => 'inc_cat_id',
        'param_input' => ['select'],
        'param_option'  => 'slct-cat',
        'param_value' => ''
    ],
    [
        'param_show'  => 'Utilisateur',
        'param_name' => 'user_id',
        'param_input' =>  ['select'],
        'param_option'  => 'slct-user',
        'param_value' => ''
    ],
    [
        'param_show'  => 'Date',
        'param_name' => 'inc_receipt_date',
        'param_input' => ['input', 'datetime-local'],
        'param_option'  => 'dtl_td',
        'param_value' => ''
    ],
    [
        'param_show'  => 'Montant',
        'param_name' => 'inc_amount',
        'param_input' => ['input', 'number'],
        'param_option'  => '',
        'param_value' => ''
    ],
];

$new_expense = [
    [
        'param_show'  => 'Étiquette',
        'param_name' => 'exp_label',
        'param_input' => ['input', 'text'],
        'param_option'  => '',
        'param_value' => ''
    ],
    [
        'param_show'  => 'Utilisateur',
        'param_name' => 'user_id',
        'param_input' =>  ['select'],
        'param_option'  => 'slct-user',
        'param_value' => ''
    ],
    [
        'param_show'  => 'Date',
        'param_name' => 'exp_date',
        'param_input' => ['input', 'datetime-local'],
        'param_option'  => 'dtl_td',
        'param_value' => ''
    ],
    [
        'param_show'  => 'Montant',
        'param_name' => 'exp_amount',
        'param_input' => ['input', 'number'],
        'param_option'  => '',
        'param_value' => ''
    ],
];

$modify_expense = [
    [
        'param_show'  => 'Étiquette',
        'param_name' => 'exp_label',
        'param_input' => ['input', 'text'],
        'param_option'  => '',
        'param_value' => ''
    ],
    [
        'param_show'  => 'Utilisateur',
        'param_name' => 'user_id',
        'param_input' =>  ['select'],
        'param_option'  => 'slct-user',
        'param_value' => ''
    ],
    [
        'param_show'  => 'Date',
        'param_name' => 'exp_date',
        'param_input' => ['input', 'datetime-local'],
        'param_option'  => 'dtl_td',
        'param_value' => ''
    ],
    [
        'param_show'  => 'Montant',
        'param_name' => 'exp_amount',
        'param_input' => ['input', 'number'],
        'param_option'  => '',
        'param_value' => ''
    ],
];

?>