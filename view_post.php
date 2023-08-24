<?php
include ("blocks/database.php");

if (isset($_GET['id']))
{
    $id = $_GET['id'];
}

if (!isset($id))
{
    $id = 1;
}

$result = $connection ->query("SELECT * FROM `data` WHERE `id` = $id");

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
    $new_view = $row['view']+1;
    $view = $connection -> query("UPDATE `data` SET `view` = $new_view WHERE `id` =  $id");
}
else
{
    echo "<p>Information can`t be found</p>";
}
?>

<!doctype html>
<html>
<head>
    <script src="https://www.google.com/recaptcha/enterprise.js?render=6LflGFMnAAAAAMBJV3_x6zKm8c8BpAoCS-j70_g4"></script>
    <meta charset="utf-8">
    <meta name="description" content="<?php echo $row['meta_description']?>">
    <meta name="keywords" content="<?php echo $row['meta_keywords'] ?>">
    <title><?php echo $row['title']; ?></title>
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
              <td valign="top">
                  <?php
                    printf("<p class='article_title'>%s</p>
                                   <p class='article_author'>Author: %s</p> 
                                   <p class='article_author'>Added: %s</p>
                                   %s
                                   <p class='article_view'>Views: %s</p>", $row['title'], $row['author'], $row['data'], $row['text'], $row['view']);

                    echo "<p class='article-comment'>Comments</p>";
                    $comments = $connection -> query("SELECT * FROM `comments` WHERE `post` = $id");

                    if (mysqli_num_rows($comments) > 0)
                    {
                        $rowComments = mysqli_fetch_array($comments);
                        do
                        {
                            printf("<div class='div_comment'>
                                           <p><strong>%s</strong></p>
                                           <p class='article_added'>Published: <strong>%s</strong></p>
                                           <p>%s</p>
                                           </div>", $rowComments['author'], $rowComments['date'], $rowComments['text']);
                        }
                        while ($rowComments = mysqli_fetch_array($comments));
                    }

                    ?>
                  <hr>
                  <p class="article-comment">Add comment</p>
                  <form action="comment.php" method="post" name="new_comment">
                      <input type="hidden" name="id" value="<?php echo $id?>">
                      <p><label>Your name:</label><input type="text" name="author" maxlength="30" size="30"></p>
                      <p><label>Comment: <br> <textarea name="text" cols="40" rows="4" ></textarea> </label></p>
                      <div class="g-recaptcha" data-sitekey="6LflGFMnAAAAAKTwmzSRdJiNvYhZiO2uBgDpHElj" style="margin-bottom:1em"></div>
                      <p><input type="submit" name="submit" value="Send"></p>

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




