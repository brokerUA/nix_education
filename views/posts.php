<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Posts</title>
</head>
<body>

<?php require_once "./components/header.php" ?>

<?php require_once "./components/navigation.php" ?>

<main>
    <h1>Posts</h1>

    <?php require_once "../posts-data.php" ?>

    <?php if (isset($postsData) && is_array($postsData)) :?>
        <ul>

        <?php foreach ($postsData as $post) : ?>
        <li>
            <a href="<?=$post['link']?>"><?=$post['title']?></a><br>
            <p><?=$post['description']?></p>
        </li>

        <?php endforeach; ?>

        </ul>

    <?php else : ?>
    <p>Posts not found.</p>

    <?php endif; ?>


</main>

<?php require_once "./components/footer.php" ?>

</body>
</html>