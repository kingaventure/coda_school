<?php 

    function display( PDO $pdo, $id) {
    $state = $pdo->prepare('SELECT username, email, enabled FROM users WHERE id = :id');
    $state->bindParam(':username', $username, PDO::PARAM_STR);
    $state->bindParam(':id', $id, PDO::PARAM_INT);
    $state->execute();
    $res = $state->fetch();
}