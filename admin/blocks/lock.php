<?php
include ('database.php');

$query = ("SELECT `user`, `password` FROM `userlist`");
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

header('Content-type: text/html; charset=utf-8');

$login = $_POST['login'];
$password = $_POST['password'];

if ($login == $row['user'] && $password == $row['password'])
{
    session_start();
    $_SESSION['scheize'] = true;
    $script = 'http://localhost/www/admin/index.php';
}
else
{
    $script = 'lockform.php';
}

header("Location: $script");