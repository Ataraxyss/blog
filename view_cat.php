<?php
include ("blocks/database.php");

if (isset($_GET['cat']))
{
    $cat = $_GET['cat'];
}

if (!isset($cat))
{
    $cat = 1;
}

$result = $connection ->query("SELECT * FROM `category` WHERE `id` = $cat");

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
<title><?php echo $row['title'].' articles'; ?></title>
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
          <tr>
            <?php include("blocks/navigation.php"); ?>
              <td valign="top"><?php
                  echo $row['text'];
                  $result = $connection ->query("SELECT  `id`, `title`, `description`, `data`, `author`, `view`, `img` FROM `data` WHERE `category` = $cat");

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
                        do
                        {
                            printf("<table align='center' class='post'>
                              <tbody>
                                <tr>
                                  <td class='post_title'>
                                    <p class='post_name'><img class='icon' align='left' src='%s'><a href='view_post.php?id=%s'>%s</a></p>
                                    <p class='post_adds'>Added: %s</p>
                                      <p class='post_author'>Author: %s</p>
                                    </td>
                                </tr>
                                <tr>
                                  <td><p>%s</p>
                                  <p class='post_view'>Views:%s</p>
                                  </td>
                                </tr>
                              </tbody>
                            </table>", $row['img'], $row['id'], $row['title'], $row['data'], $row['author'], $row['description'], $row['view']);
                        }
                        while ($row = mysqli_fetch_array($result));
                    }
                    else
                    {
                        echo "<p>Information can`t be found</p>";
                    }
                  ?></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <?php include("blocks/foot.php"); ?>
  </tbody>
</table>
</body>
</html>