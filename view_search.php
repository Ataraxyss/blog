<?php
include ("blocks/database.php");

if (isset($_POST['search']))
{
    $search = $_POST['search'];
}

if (isset($_POST['submit']))
{
    $submit = $_POST['submit'];
}

if (isset($submit))
{
    if (empty($search) || strlen($search) < 4)
        {
            exit("<p>Your request is empty or shorter than 4 symbols</p>");
        }
    $search = htmlspecialchars(stripslashes(trim($search)));


}
else
{
    exit("<p>You come here without valid parameters</p>");
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $search . "&nbsp find results" ?></title>
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

                  $connection ->query("ALTER TABLE `data` ADD FULLTEXT(`text`);");
                  $result = $connection ->query("SELECT  * FROM `data` WHERE MATCH(`text`) AGAINST('$search')");


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
                        echo "<p>We can`t find any coincidence</p>";
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