<?php   
    require "Model/login.php";


    if(isset($_POST['login_button'])) {

        $username = !empty($_POST['username']) ? $_POST['username'] : NULL;
        $pass = !empty($_POST['pass']) ? $_POST['pass'] : NULL;

        if(!empty($username) && !empty($pass))  {
            $username = cleanString($username);
            $pass = cleanString($pass);

            $user = getUser($pdo, $username);
            var_dump($user);   
        }

    }






    require "View/login.php";

?>