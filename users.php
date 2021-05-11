<?php
// Page Actuelle
$page = 'users.php';
// Récupération Header
require_once __DIR__ . '/inc/header.php';
// Fonction Suppression Utilisateur
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    delete_user($_POST["user_id"]);
}
// Récupération Utilisateurs
$users = get_users();
// Réinitialisation Session Formulaire
$_SESSION["form_action"] = 'ready';
?>

<!-- ----------------------------------------- -->
<!-- Début du Main -->
<!-- ----------------------------------------- -->


<div class="row">
    <div class="col table-responsive-sm">
        <table class="table table-striped shadow rounded text-center">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <form action="" method="POST">
                    <?php
                    $index = 1;
                    foreach ($users as $key) {
                    ?>
                        <tr>
                            <td class="align-middle"><?= $key['last_name']; ?></td>
                            <td class="align-middle"><?= $key['first_name']; ?></td>
                            <td class="align-middle">
                                <a class="btn my-0 py-0 px-1" href="user.php?user_id=<?= $key['user_id']; ?>" role="button">
                                    <i class="fas fa-search"></i>
                                </a>
                                <a class="btn my-0 py-0 px-1" href="modify_user.php?user_id=<?= $key['user_id']; ?>" role="button">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button name="user_id" type="submit" value="<?= $key['user_id']; ?>" class="btn my-0 py-0 px-1">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                    <?php
                        $index++;
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