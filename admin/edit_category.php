<?php
include ("blocks/database.php");
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
<title>Add new article</title>
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
                    if (!isset($id))
                    {
                        $query = ("SELECT `title`, `id` FROM `category`");
                        $result = mysqli_query($connection, $query);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        echo "<h2>Choose a category to edit</h2>";
                        do
                        {
                            printf("<p><a href='edit_category.php?id=%s'>%s</a></p>", $row['id'], $row['title']);
                        }
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC));
                    }
                    else
                    {
                        $query = ("SELECT * FROM `category` WHERE `id` = '$id'");
                        $result = mysqli_query($connection, $query);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                        $meta_description = $row['meta_description'];
                        $meta_keywords = $row['meta_keywords'];
                        $text = $row['text'];
                        $title = $row['title'];

                        Print <<<HERE
                  
                        <form name='editcat' method='post' action='edit_cat_processor.php' enctype='multipart/form-data'>                      
                      <p>
                          <label>Enter a title of a category<br>
                              <input type='text' name='title' maxlength='255' value='$title' required>
                          </label>
                      </p>
                      <p>
                          <label>Enter meta description<br>
                              <input type='text' name='metadescription' maxlength='255' value='$meta_description' required>
                          </label>
                      </p>
                      <p>
                          <label>Enter meta keywords<br>
                              <input type='text' name='metakeywords' maxlength='255' required value='$meta_keywords'>
                          </label>
                      </p>
                      <p>
                          <label>Enter the description of a category<br>
                              <textarea name='text' cols='70' rows='35'>$text</textarea>
                          </label>
                      </p>
                      
                      <input type="hidden" name="id" value="$id">
                      <p>
                          <label>Are you sure?<br>
                              <input type='submit' value='Update a category'>
                          </label>
                      </p>
                  </form>
                  HERE;
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