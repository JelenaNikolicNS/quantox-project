<?php
    require 'header.php';
?>

    <h1>Login</h1>

    <form action="/quantoxproject/index.php" method="post">
        <div class="input">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="">
        </div>

        <div class="input">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="">
        </div>

        <input type="submit" name="login" value="Login">
    </form>

<?php
    include 'footer.php';
?>