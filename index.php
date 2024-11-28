<?php 
    session_start();
    require "includes/database.php";
    require "includes/function.php";
    $errors = [];
    if(isset($_GET['deconnect'])){
        session_destroy();
        header("Location: index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <?php
        if (isset($_SESSION['auth'])){
            require "partials/navbar.php";
                if(isset($_GET['component'])) {
                    $componentName = cleanString($_GET['component']);
                    if(file_exists("Controller/$componentName.php")){
                        require "Controller/$componentName.php";
                    }
                }
            } else {
                require 'Controller/login.php';
            }
            require "partials/errors.php";
        ?>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script
</body>
</html>