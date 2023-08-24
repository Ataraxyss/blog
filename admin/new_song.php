<?php
include ('blocks/session.php');
include ('blocks/session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Oleh Seyn">
    <title>Main Admin</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">
</head>

<body>
<div class="bodyDiv">
    <table class="mainTable">
        <thead>
        <tr>
            <td colspan="2" class="mainTd"><?php include_once('blocks/header.php')?></td>
        </tr>
        </thead>

        <tbody>
        <tr>
            <td class="mainTdNav">
                <table>
                    <tr>
                        <td><?php include_once ('blocks/redact.php');?></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                </table>
            </td>
            <td class="mainTd">
                <h2>Add music</h2><br>

                <form name="formAM" method="post" action="add_song.php" enctype="multipart/form-data">
                    <input type="text" name="name" maxlength="20" placeholder="Name of song" required><br>
                    <input type="text" name="link" maxlength="255" placeholder="Link on YouTube" required><br>
                    <input type="file" name="img" required><br><br>
                    <input type="submit" name="upload" value="Add">
                </form>

            </td>
        </tr>
        </tbody>

        <tfoot>
        <tr>
            <td colspan="2" class="mainTd"><?php include_once ('blocks/footer.php')?></td>
        </tr>
        </tfoot>
    </table>
</div>
</body>

