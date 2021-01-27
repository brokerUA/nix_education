<?php

if (isset($_SESSION['message']) && $_SESSION['message'] != '') {
    echo "<div style=\"background-color: silver; padding: 1rem 3rem; margin-bottom: 1rem; display: inline-block\">" .
        "{$_SESSION['message']}</div><br>";
    unset($_SESSION['message']);
}
