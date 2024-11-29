<?php   
    require "Model/users.php";
    if(isset($_GET['action']) && $_GET['action'] === 'toggle_enabled' && isset($_GET['id']) && is_numeric($_GET['id'])) {

        $id = cleanString($_GET['id']);
        toggleEnabled($pdo, $id);
        header('Location: index.php?component=users');
    }
    if(isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id']) && is_numeric($_GET['id'])) {
        if($_GET['id'] != 0) {
            $id = cleanString($_GET['id']);
            delete($pdo, $id);
            header('Location: index.php?component=users');
        }
        
    }
    $search = isset($_POST['search']) ? $_POST['search'] : null;
    $users= getAll($pdo, $search);    
    require "View/users.php";

    ?>