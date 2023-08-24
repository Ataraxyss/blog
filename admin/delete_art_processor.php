<?php
include ('blocks/database.php');
include ('blocks/session.php');

$server = 'localhost';
$username = 'root';
$password = 'root';
$dbname = 'blog';
$charset = 'utf8';

$connection = new mysqli($server, $username, $password, $dbname);

$id = $_POST['id'];

$connection->query("DELETE FROM `data` WHERE `id` = '$id'");


?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin`s block</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body style="text-align: center">
<table width="690" border="1" align="center" class="main_border">
    <tbody>
    <?php include("blocks/header.php"); ?>
    <tr>
        <td bgcolor="#FFFFFF">
            <table width="100%">
                <tbody>
                <tr">
                <?php include("blocks/navigation.php"); ?>
                <td>
                <?php

                if ($connection = true)
                {
                    echo "<p>Article deleted successfuly</p>";
                }
                else
                {
                    echo "<p>Something went wrong</p>";
                }

                ?>
                </td>
    </tr>
    </tbody>
</table></td>
</tr>
<?php include("blocks/foot.php"); ?>
</tbody>
</table>
</body>
</html>
