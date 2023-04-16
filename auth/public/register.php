<?php
require __DIR__ . '/../../content/src/header.php';
require __DIR__ . '/../src/register.php';
?>

<div class="registerform">
    <form action="register.php" method="post">
        <h1>Регистрация</h1>

        <div>
            <label for="username">Имя:</label>
            <input type="text" name="username" id="username" class="inputRegistration" value="<?= $inputs['username'] ?? '' ?>"
                class="<?= error_class($errors, 'username') ?>">
            <small><?= $errors['username'] ?? '' ?></small>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="inputRegistration" value="<?= $inputs['email'] ?? '' ?>"
                class="<?= error_class($errors, 'email') ?>">
            <small><?= $errors['email'] ?? '' ?></small>
        </div>

        <div>
            <label for="password">Пароль:</label>
            <input type="password" name="password" id="password" class="inputRegistration" value="<?= $inputs['password'] ?? '' ?>"
                class="<?= error_class($errors, 'password') ?>">
            <small><?= $errors['password'] ?? '' ?></small>
        </div>

        <div>
            <label for="password2">Повторите пароль:</label>
            <input type="password" name="password2" id="password2" class="inputRegistration" value="<?= $inputs['password2'] ?? '' ?>"
                class="<?= error_class($errors, 'password2') ?>">
            <small><?= $errors['password2'] ?? '' ?></small>
        </div>


        <button type="submit">Регистрация</button>

        <footer>Уже зарегестрированы? <a href="login.php">Войти</a></footer>

    </form>
</div>
<?php view('footer') ?>