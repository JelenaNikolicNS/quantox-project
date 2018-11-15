<?php
    require 'header.php';
?>

    <h1>Register</h1>

    <form action="/quantoxproject/index.php" method="post">
        <div class="input">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="">
        </div>

        <div class="input">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="">
        </div>

        <div class="input">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="">
        </div>

        <div class="input">
            <label for="password_repeat">Repeat password:</label>
            <input type="password" id="password_repeat" name="password_repeat" value="">
        </div>

        <input type="submit" name="submit" value="Register">
    </form>

<?php
    include 'footer.php';
?>