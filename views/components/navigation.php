<?php
    $request = htmlentities($_SERVER['REQUEST_URI']);
?>
<nav>

    <h2>Menu</h2>

    <ul>
        <li>
            <?php if (preg_match("/^\/$/i", $request)) : ?>
                <strong>index</strong>
            <?php else : ?>
                <a href="/">index</a>
            <?php endif; ?>
        </li>
        <li>
            <?php if (preg_match("/^\/login$/i", $request)) : ?>
                <strong>login</strong>
            <?php else : ?>
                <a href="/login">login</a>
            <?php endif; ?>
        </li>
        <li>
            <?php if (preg_match("/^\/registration$/i", $request)) : ?>
                <strong>registration</strong>
            <?php else : ?>
                <a href="/registration">registration</a>
            <?php endif; ?>
        </li>
        <li>
            <?php if (preg_match("/^\/profile$/i", $request)) : ?>
                <strong>profile</strong>
            <?php else : ?>
                <a href="/profile">profile</a>
            <?php endif; ?>
        </li>
        <li>
            <?php if (preg_match("/^\/posts$/i", $request)) : ?>
                <strong>posts</strong>
            <?php else : ?>
                <a href="/posts">posts</a>
            <?php endif; ?>
        </li>
    </ul>

</nav>