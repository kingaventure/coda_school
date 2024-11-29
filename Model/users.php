<?php

function getAll(PDO $pdo, string $search = null) : array{
    $query = 'SELECT * FROM users';
    if(null !== $search){
        $query = $query .' WHERE id LIKE :search OR username LIKE :search OR email LIKE :search';
    }
    $res = $pdo->prepare($query);
    if(null !== $search){
        $res->bindValue(':search', "%$search%");
    }
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