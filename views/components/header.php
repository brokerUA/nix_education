<?php
if (isset($isAuth) && $isAuth) {
    $user = new App\User();
    $user = $user->getFirstBy('id', $_SESSION['user_id']);
    $userName = $user && $user->name != '' ? $user->name : 'NoName';
}
?>
<header>

    <?php if (isset($isAuth) && $isAuth) : ?>
        Hi, <?=$userName?>!
        &nbsp;&nbsp;&nbsp;&nbsp;<a href="/logout">Logout</a>

    <?php else : ?>
        <a href="/login">Login</a> / <a href="/registration">Sign up</a>

    <?php endif; ?>

</header>
