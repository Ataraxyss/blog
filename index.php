<?php
include ("blocks/database.php");

$result = $connection ->query("SELECT `title`, `meta_description`, `meta_keywords`, `text` FROM `settings` WHERE `page` = 'index'");

if (!$result)
{
    echo "<p>Cannot connect to a database</p>
            <br>
            <p>Please, contact the administration</p>
            <br>
            <p>admin@gmail.com</p>
            <br>
            <p><strong>Error code: </strong></p>";
    exit (mysqli_error());
}

if (mysqli_num_rows($result)>0)
{
    $row = mysqli_fetch_array($result);
}
else
{
    echo "<p>Information can`t be found</p>";
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <meta name="description" content="<?php echo $row['meta_description']?>">
    <meta name="keywords" content="<?php echo $row['meta_keywords'] ?>">
<title><?php echo $row["title"]; ?></title>
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
              <td><?php echo $row['text'] ?></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <?php include("blocks/foot.php"); ?>
  </tbody>
</table>
</body>
</html>