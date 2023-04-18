<?php

function GetProcuct(string $type)
{
    $sql = 'SELECT id, name, type, cost, description, img_link
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

function CreateOrder(string $username)
{
    $sql = 'INSERT INTO Orders(username, CurrentDateOrder)
    VALUES(:username, :CurrentDateOrder)';

    $statement = db()->prepare($sql);
    $statement->bindValue(':username', $username, PDO::PARAM_STR);
    $date = date('Y-m-d H:i:s');
    $statement->bindValue(':CurrentDateOrder', $date, PDO::PARAM_STR );
    $statement->execute();

    $sql = 'SELECT id FROM Orders 
    WHERE id=(SELECT MAX(id) FROM Orders)';
    $statement = db()->prepare($sql);
    $statement->execute();

    return $statement->fetch(PDO::FETCH_ASSOC);
}

function FillOrder(string $order_id, string $products, string $count, string $cost)
{
    $sql = 'INSERT INTO order_items(order_id, products, count, cost)
    VALUES(:order_id, :products, :count, :cost)';
    $statement = db()->prepare($sql);
    $statement->bindValue(':order_id', $order_id, PDO::PARAM_STR);
    $statement->bindValue(':products', $products, PDO::PARAM_STR);
    $statement->bindValue(':count', $count, PDO::PARAM_STR);
    $statement->bindValue(':cost', $cost, PDO::PARAM_STR);

    return $statement->execute();
}

function UpdateTotalCostOrder(string $id, string $FullPrice)
{
    $sql = 'UPDATE dbo.Orders
            SET FullPrice=:FullPrice
            WHERE id=:id';

    $statement = db()->prepare($sql);
    $statement->bindValue(':FullPrice', $FullPrice, PDO::PARAM_STR);
    $statement->bindValue(':id', $id, PDO::PARAM_STR);

    return $statement->execute();
}