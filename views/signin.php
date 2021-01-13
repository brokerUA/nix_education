<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signin</title>
</head>
<body>

<?php require_once "./components/header.php" ?>

<?php require_once "./components/navigation.php" ?>

<main>
    <h1>Signin</h1>

    <form method="post" action="./" style="display: inline-block">
        <fieldset>
            <label>
                E-mail:<br>
                <input name="login" type="email">
            </label>
            <br><br>
            <input type="submit" value="Signin">
        </fieldset>
    </form>
</main>

<?php require_once "./components/footer.php" ?>

</body>
</html>