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
    <script src="https://cdn.tiny.cloud/1/t5s5vjb56avpoawih0s4chgyy280ck7cjb0pqzqygerl3vgw/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#textarea',
            toolbar: 'undo redo | stylesheet | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolory | outdent indent ',
            plugins: 'code'
        });
    </script>
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
                        $query = ("SELECT `title`, `id` FROM `data`");
                        $result = mysqli_query($connection, $query);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        echo "<h2>Choose an article to edit</h2>";
                        do
                        {
                            printf("<p><a href='edit_article.php?id=%s'>%s</a></p>", $row['id'], $row['title']);
                        }
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC));
                    }
                    else
                    {
                        $query = ("SELECT * FROM `data` WHERE `id` = '$id'");
                        $result = mysqli_query($connection, $query);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                        $category = $row['category'];
                        $meta_description = $row['meta_description'];
                        $meta_keywords = $row['meta_keywords'];
                        $description = $row['description'];
                        $text = $row['text'];
                        $view = $row['view'];
                        $author = $row['author'];
                        $img = $row['img'];
                        $title = $row['title'];
                        $data = $row['data'];

                        $result_cat = $connection ->query("SELECT * FROM `category`");
                        $row_cat = mysqli_fetch_array($result_cat);

                        echo "<form name='editar' method='post' action='edit_art_processor.php' enctype='multipart/form-data'>

                        <p>
                          <label>Choose category of an article<br>
                              <select name='category' size='4' required>";
                                do
                                {
                                    printf("<option value='%s'>%s</option>", $row_cat['id'], $row_cat['title']);
                                }
                                while($row_cat = mysqli_fetch_array($result_cat));
                        echo "</select></label>";

                        Print <<<HERE
                        
                      
                      <p>
                          <label>Enter a title of your article<br>
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
                          <label>Enter short description of an article<br>
                              <input type='text' name='description' maxlength='255' value='$description' required>
                          </label>
                      </p>
                      <p>
                          <label>Enter the text of an article<br>
                              <textarea id="textarea" name='text' cols='70' rows='35'>$text</textarea>
                          </label>
                      </p>
                      <p>
                          <label>Enter the name of an article`s author<br>
                              <input type='text' name='author' maxlength='255'  value='$author' required>
                          </label>
                      </p>
                      <p>
                          <label>Enter way to the icon<br>
                              <input type='text' name='icon' maxlength='255' value='$img' required>
                          </label>
                      </p>
                      <input type="hidden" name="view" value="$view">
                      <input type="hidden" name="id" value="$id">
                      <p>
                          <label>Are you sure?<br>
                              <input type='submit' value='Update an article'>
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