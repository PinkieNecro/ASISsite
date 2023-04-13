<?php

require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/login.php';
?>

<?php view('header', ['title' => 'Войти']) ?>

<?php if (isset($errors['login'])) : ?>
    <div class="alert alert-error">
        <?= $errors['login'] ?>
    </div>
<?php endif ?>
    <div class="registerform">
        <form action="login.php" method="post">
            <h1>Войти</h1>
            <div>
                <label for="username">Имя Пользователя:</label>
                <input type="text" name="username" id="username" class="inputRegistration" value="<?= $inputs['username'] ?? '' ?>">
                <small><?= $errors['username'] ?? '' ?></small>
            </div>
            <div>
                <label for="password">Пароль:</label>
                <input type="password" name="password" id="password" class="inputRegistration">
                <small><?= $errors['password'] ?? '' ?></small>
            </div>
            <button type="submit">Войти</button>
            <footer>Или <a href="register.php">Зарегестрируйтесь</a></footer>
        </form>
    </div>

<?php view('footer') ?>