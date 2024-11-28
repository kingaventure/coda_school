<?php

function getAll(PDO $pdo){
    $res = $pdo->prepare('SELECT * FROM users');
    $res->execute();
    return $res->fetchAll();
}

function toggleEnabled(PDO $pdo, int $id): void {
    $res = $pdo->prepare(query:'UPDATE users SET enabled = NOT enabled WHERE id = :id');
    $res->bindParam(':id', $id, PDO::PARAM_INT);
    $res->execute();
}

function delete(PDO $pdo, int $id): void {
    $res = $pdo->prepare(query:'DELETE FROM users WHERE id = :id');
    $res->bindParam(':id', $id, PDO::PARAM_INT);
    $res->execute();
}
?>