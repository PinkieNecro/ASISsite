<?php

if (is_user_logged_in()) {
    redirect_to('/index.php');
}

$inputs = [];
$errors = [];

if (is_post_request()) {

    [$inputs, $errors] = filter($_POST, [
        'username' => 'string | required',
        'password' => 'string | required'
    ]);

    if ($errors) {
        redirect_with('login.php', ['errors' => $errors, 'inputs' => $inputs]);
    }

    // if login fails
    if (!login($inputs['username'], $inputs['password'])) {

        $errors['login'] = 'Неверное имя или пароль';

        redirect_with('login.php', [
            'errors' => $errors,
            'inputs' => $inputs
        ]);
    }
    // login successfully
    redirect_to('/index.php');

} else if (is_get_request()) {
    [$errors, $inputs] = session_flash('errors', 'inputs');
}
if (is_user_logged_in()) {
    redirect_to('/index.php');
}