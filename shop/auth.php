<?php

function GetProcuct(string $type)
{
    $sql = 'SELECT id, name, type, cost, description
            FROM products
            WHERE type=:type
            ORDER BY name ASC';

    $statement = db()->prepare($sql);
    $statement->bindValue(':type', $type, PDO::PARAM_STR);
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function AddCart(string $id)
{
    $sql = 'SELECT * FROM products 
            WHERE id=:id
            ORDER BY name ASC';

    $statement = db()->prepare($sql);
    $statement->bindValue(':id', $id, PDO::PARAM_STR);
    $statement->execute();

    return $statement->fetch(PDO::FETCH_ASSOC);
}

function ShowCart()
{
    $sql = "SELECT * FROM products WHERE id IN ("; 
						
    foreach($_SESSION['cart'] as $id => $value) { 
        $sql.=$id.","; 
    } 
    $sql=substr($sql, 0, -1).") ORDER BY name ASC";

    $statement = db()->prepare($sql);
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}