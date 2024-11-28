<?php   
    require "Model/login.php";


    if(isset($_POST['login_button'])) {

        $username = !empty($_POST['username']) ? $_POST['username'] : NULL;
        $pass = !empty($_POST['pass']) ? $_POST['pass'] : NULL;

        if(!empty($username) && !empty($pass))  {
            $username = cleanString($username);
            $pass = cleanString($pass);
            $user = getUser($pdo, $username);
            $isMatchPassword = is_array($user) && password_verify($pass, $user['password']);

                if($isMatchPassword){
                    $_SESSION['auth'] = true;
                    header("Location: index.php?component=users");
                } else {
                    $errors[] = 'identification échoué';
                }
            
        }
    }
    require "View/login.php";
?>