<?php
    require 'header.php';
?>

    <a href="views/register.php">Register</a>
    <a href="views/login.php">Login</a>

    <h1>Quantox project</h1>

    <div>
        <form action="/quantoxproject/index.php" method="post">
            <input type="text" name="searchTerm">
            <input type="submit" name="search" value="Search">
        </form>
    </div>

<?php
    include 'footer.php';
?>