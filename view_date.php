<?php
include ("blocks/database.php");

if (isset($_GET['date']))
{
    $date = $_GET['date'];
}
else
{
    exit("<p>Your parameters is invalid. Please, check URL.</p>");
}

$titleDate = $date;
$firstDate = $date;
$date++;
$secondDate = $date;

$firstDate = $firstDate."-01";
$secondDate = $secondDate."-01";


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $titleDate.' articles'; ?></title>
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


                  $result = $connection ->query("SELECT  * FROM `data` WHERE `data` > '$firstDate' AND `data` < '$secondDate'");

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
                              <br>
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