<?php   
    require "Model/users.php";
    if(isset($_GET['action']) && $_GET['action'] === 'toggle_enabled' && isset($_GET['id']) && is_numeric($_GET['id'])) {

        $id = cleanString($_GET['id']);
        toggleEnabled($pdo, $id);
        header('Location: index.php?component=users');
    }
    if(isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id']) && is_numeric($_GET['id'] && isset($_GET['id'])) != 1) {

        $id = cleanString($_GET['id']);
        delete($pdo, $id);
        header('Location: index.php?component=users');
    }
    $users= getAll($pdo);    
    require "View/users.php";

    ?>