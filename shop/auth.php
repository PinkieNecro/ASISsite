<?php

function GetProcuct(string $type)
{
    $sql = 'SELECT name, type, cost, description
            FROM products
            WHERE type=:type
            ORDER BY name ASC';

    $statement = db()->prepare($sql);
    $statement->bindValue(':type', $type, PDO::PARAM_STR);
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}