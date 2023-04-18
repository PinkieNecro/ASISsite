<?php
function register_user(string $email, string $username, string $password, bool $is_admin = false): bool
{
    $sql = 'INSERT INTO users(username, email, password, is_admin)
            VALUES(:username, :email, :password, :is_admin)';

    $statement = db()->prepare($sql);

    $statement->bindValue(':username', $username, PDO::PARAM_STR);
    $statement->bindValue(':email', $email, PDO::PARAM_STR);
    $statement->bindValue(':password', password_hash($password, PASSWORD_BCRYPT), PDO::PARAM_STR);
    $statement->bindValue(':is_admin', (int)$is_admin, PDO::PARAM_INT);


    return $statement->execute();
}

function find_user_by_id(string $id)
{
    $sql = 'SELECT * FROM users
            WHERE id=:id';

    $statement = db()->prepare($sql);
    $statement->bindValue(':id', $id, PDO::PARAM_STR);
    $statement->execute();

    return $statement->fetch(PDO::FETCH_ASSOC);
}

function find_user_by_username(string $username)
{
    $sql = 'SELECT *
            FROM users
            WHERE username=:username';

    $statement = db()->prepare($sql);
    $statement->bindValue(':username', $username, PDO::PARAM_STR);
    $statement->execute();

    return $statement->fetch(PDO::FETCH_ASSOC);
}

function login(string $username, string $password): bool
{
    $user = find_user_by_username($username);

    if ($user && password_verify($password, $user['password'])) {

        session_regenerate_id();

        $_SESSION['username'] = $user['username'];
        $_SESSION['user_id']  = $user['id'];
        $_SESSION['user_Admin'] = $user['is_admin'];

        return true;
    }

    return false;
}

function find_message($checked)
{
    $sql = 'SELECT id, telephone, telephoneUser, telephoneMessage, CurrentDateTelephone, checked FROM dbo.application
            WHERE checked=:checked';

    $statement = db()->prepare($sql);
    $statement->bindValue(':checked', $checked, PDO::PARAM_STR);
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function find_message_check(string $id)
{
    $sql = 'SELECT checked FROM dbo.application
            WHERE id=:id';

    $statement = db()->prepare($sql);
    $statement->bindValue(':id', $id, PDO::PARAM_STR);
    $statement->execute();

    return $statement->fetch(PDO::FETCH_ASSOC);
}

function check_message(string $id)
{   
    if(find_message_check($id)['checked']==0){
        $checked=1;
    }
    else
    {
        $checked=0;
    }
    $sql = 'UPDATE dbo.application
            SET checked=:checked
            WHERE id=:id';

    $statement = db()->prepare($sql);
    $statement->bindValue(':checked', $checked, PDO::PARAM_STR);
    $statement->bindValue(':id', $id, PDO::PARAM_STR);

    return $statement->execute();
}

function find_order_check(string $id)
{
    $sql = 'SELECT Done FROM dbo.Orders
            WHERE id=:id';

    $statement = db()->prepare($sql);
    $statement->bindValue(':id', $id, PDO::PARAM_STR);
    $statement->execute();

    return $statement->fetch(PDO::FETCH_ASSOC);
}

function check_order(string $id)
{   
    if(find_order_check($id)['Done']==0){
        $Done=1;
    }
    else
    {
        $Done=0;
    }
    $sql = 'UPDATE dbo.Orders
            SET Done=:Done
            WHERE id=:id';

    $statement = db()->prepare($sql);
    $statement->bindValue(':Done', $Done, PDO::PARAM_STR);
    $statement->bindValue(':id', $id, PDO::PARAM_STR);

    return $statement->execute();
}

function is_user_logged_in(): bool
{
    return isset($_SESSION['username']);
}

function is_user_admin(): bool
{
    return $_SESSION['user_Admin'];
}

function require_login(): void
{
    if (!is_user_logged_in()) {
        redirect_to('login.php');
    }
}
function logout(): void
{
    if (is_user_logged_in()) {
        unset($_SESSION['username'], $_SESSION['user_id']);
        session_destroy();
        redirect_to('/index.php');
    }
    else
    {
        echo "ERROR";
    }
}
function current_user()
{
    if (is_user_logged_in()) {
        return "(".$_SESSION['username'].")";
    }
    return null;
}