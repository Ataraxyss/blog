<?php
include ("blocks/database.php");
include ('blocks/session.php');
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
                  <h2>Add a new article</h2>

                  <form name="adar" method="post" action="add_art_processor.php" enctype="multipart/form-data">
                      <p>
                          <label>Enter a title of your article<br>
                              <input type="text" name="title" maxlength="255" required>
                          </label>
                      </p>
                      <p>
                          <label>Enter meta description<br>
                              <input type="text" name="metadescription" maxlength="255" required>
                          </label>
                      </p>
                      <p>
                          <label>Enter meta keywords<br>
                              <input type="text" name="metakeywords" maxlength="255" required>
                          </label>
                      </p>
                      <p>
                          <label>Enter short description of an article<br>
                              <input type="text" name="description" maxlength="255" required>
                          </label>
                      </p>
                      <p>
                          <label>Enter the text of an article<br>
                              <textarea id="textarea" name="text" cols="70" rows="35"></textarea>
                          </label>
                      </p>
                      <p>
                          <label><br>
                              <select name="category" required>
                                  <?php
                                    $result = $connection -> query("SELECT `title`, `id` FROM `category`");

                                    $row = mysqli_fetch_array($result);

                                    do
                                    {
                                        printf("<option value='%s'>%s</option>", $row['id'], $row['title']);
                                    }
                                    while ($row = mysqli_fetch_array($result));

                                  ?>

                              </select>
                          </label>
                      </p>
                      <p>
                          <label>Enter the name of an article`s author<br>
                              <input type="text" name="author" maxlength="255" required>
                          </label>
                      </p>
                      <p>
                          <label>Enter way to the icon<br>
                              <input type="text" name="icon" maxlength="255" required>
                          </label>
                      </p>
                      <p>
                          <label>Are you sure?<br>
                              <input type="submit" value="Add an article">
                          </label>
                      </p>
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