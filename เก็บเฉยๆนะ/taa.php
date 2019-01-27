<?php
session_start();
//change 'valid_username' and 'valid_password' to your desired "correct" username and password
if (! empty($_POST) && $_POST['user'] === 'admin' && $_POST['pass'] === '1234')
{
    $_SESSION['logged_in'] = true;
    header('Location: /indextaa.php');
}
else
{
    ?>

<form method="POST">
    Username: <input name="user" type="text"><br>
    Password: <input name="pass" type="text"><br><br>
    <input type="submit" value="submit">
</form>

<?php
}