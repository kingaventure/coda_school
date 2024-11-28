<?php
require "Model/user.php";

if (isset($_GET['id']) && empty($errors)) {

    $id =  $_GET['id'];

    if(!is_numeric($id)){
        $errors[]= 'id au mauvais format';
    } else {
        $user = get_user($pdo, $id); 
        if(!is_array($user)) {
            $errors[] = "Erreur de récupération de donner";
        }
    }
}

require "View/user.php";
?>