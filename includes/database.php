<?php
 
 try {
    $pdo = new PDO('mysql:host=localhost;dbname=coda_school_new','root');
} catch (Exception $e) {
    $errors[] = "Erreur de connexion à la bdd {$e->getMessage()}";
}
?>