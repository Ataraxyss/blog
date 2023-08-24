<?php
include ('blocks/database.php');
include ('blocks/session.php');

if (isset($_POST['title'])) {
    $title = $_POST['title'];

    if ($title == '') {
        unset($title);
    }

}

if (isset($_POST['metadescription'])) {
    $metadescription = $_POST['metadescription'];

    if ($metadescription == '') {
        unset($metadescription);
    }

}

if (isset($_POST['metakeywords'])) {
    $metakeywords = $_POST['metakeywords'];

    if ($metakeywords == '') {
        unset($metakeywords);
    }

}

if (isset($_POST['text'])) {
    $text = $_POST['text'];

    if ($text == '') {
        unset($text);
    }

}

?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Processor</title>
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
                    if (isset($title) && isset($metadescription) && isset($text) && isset($metakeywords))
                    {
                        $result = $connection -> query("INSERT INTO `category` (`title`, `meta_description`, `meta_keywords`, `text`) VALUES ('$title', '$metadescription', '$metakeywords', '$text')");

                        if ($result == 'true')
                        {
                            echo "<p>New category was added successfuly</p>";
                        }
                        else
                        {
                            echo "<p>Something went wrong</p>";
                        }
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