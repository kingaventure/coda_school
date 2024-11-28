<?php
require "Model/user.php";

if (isset($_POST['edit_button'])) {
    $username = !empty($_POST['username']) ? $_POST['username'] : null;
    $password = !empty($_POST['pass']) ? $_POST['pass'] : null;
    $confirmation = !empty($_POST['confirmation']) ? $_POST['confirmation'] : null;
    $email = !empty($_POST['email']) ? $_POST['email'] : null;
    $enabled = !empty($_POST['enabled']) ? true : false;
    $id =  $_GET['id'];

    if(!is_numeric($id)){
        $errors[]= 'id au mauvais format';
    }

    if (
        !empty($username) &&
        !empty($email)
    ) {
        $username = cleanString($username);
        $email = cleanString($email);


        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'email invalide';
        }

        

        if ($res['user_number'] !== 0) {
            $errors[] = 'Le username est déjà utilisé';
        }

        if (empty($errors)) {
        try {
                $state = $pdo->prepare("UPDATE users SET username = :username, email = :email, enabled = :enabled WHERE id = :id");
                $state->bindParam(':id', $id, PDO::PARAM_INT);
                $state->bindParam(':username', $username);
                $state->bindParam(':email', $email);
                $state->bindParam(':enabled', $enabled, PDO::PARAM_BOOL);
                $state->execute();
                
            } catch (Exception $e) {
                $errors[] = "Erreur de requete : {$e->getMessage()}";
            }
        }
        if (
            !empty($password) &&
            !empty($confirmation)
        ){
            $password = cleanString($password);
            $confirmation = cleanString($confirmation);

            if ($confirmation !== $password) {
                $errors[] = 'Le mot de passe et sa confirmation sont différents';
            } else {
                $confirmation = null;
                $password = password_hash($password, PASSWORD_DEFAULT);
                try {
                    $state = $pdo->prepare("UPDATE 'user' SET password = :password WHERE id = :id");
                    $state->bindParam(':id', $id, PDO::PARAM_INT);
                    $state->bindParam(':password', $password);
                    $state->execute();
                    
                } catch (Exception $e) {
                    $errors[] = "Erreur de requete : {$e->getMessage()}";
                } 
            }
            
            
        }

        
        
    }

}
    

if (isset($_GET['id']) && empty($errors)) {

    $id =  $_GET['id'];

    if(!is_numeric($id)){
        $errors[]= 'id au mauvais format';
    } else {
        try {
            $state = $pdo->prepare("SELECT username, email, enabled FROM users WHERE id = :id");
            $state->bindParam(':id', $id, PDO::PARAM_INT);
            $state->execute();
            $user = $state->fetch();
            
        } catch (Exception $e) {
            $errors[] = "Erreur de requete : {$e->getMessage()}";
        }
    }
}


require "View/user.php";
?>