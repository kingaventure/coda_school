<?php 

function get_user(PDO $pdo, int $id): array | string
{
    try {
        $state = $pdo->prepare("SELECT username, email, enabled FROM users WHERE id = :id");
        $state->bindParam(':id', $id, PDO::PARAM_INT);
        $state->execute();
        return $state->fetch();
        
    } catch (Exception $e) {
        return $e->getMessage(); 
    }
}

function update(PDO $pdo, int $id): array | string
{

    try {
        $state = $pdo->prepare("UPDATE username, email, enabled FROM users WHERE id = :id");
        $state->bindParam(':id', $id, PDO::PARAM_INT);
        $state->execute();
    } catch (Exception $e) {
        return $e->getMessage(); 
    } 

}