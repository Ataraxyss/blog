<?php
include_once ('blocks/database.php');
include ('blocks/session.php');

if (isset($_GET['id']))
{
    $id = $_GET['id'];
}
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
                    <h3>Delete an article</h3>
                    <form action="delete_art_processor.php" method="post">
                        <?php

                        $query = ("SELECT `title`, `id` FROM `data`");
                        $result = mysqli_query($connection, $query);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                        do
                        {
                            printf("<p><input name='id' type='radio' value='%s'><label>%s</label></p>", $row['id'], $row['title']);
                        }
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC));

                        ?>
                        <p><input type="submit" value="Delete"></p>
                    </form>
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
