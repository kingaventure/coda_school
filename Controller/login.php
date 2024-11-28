<?php   
    require "Model/login.php";


    if(isset($_POST['login_button'])) {

        $username = !empty($_POST['username']) ? $_POST['username'] : NULL;
        $pass = !empty($_POST['pass']) ? $_POST['pass'] : NULL;

        if(!empty($username) && !empty($pass))  {
            $username = cleanString($username);
            $pass = cleanString($pass);

            
            $user = getUser($pdo, $username);
            if (is_array($user)){
                $isMatchPassword = password_verify($pass, $user['password']);
                if($isMatchPassword){
                    $_SESSION['auth']= true;
                } else {
                    $errors[] = 'identification échoué';
                }
            }
        }

    }
    if(isset($_POST['supr_button'])){
        $_SESSION = [];
        session_destroy();
    }






    require "View/login.php";

?>