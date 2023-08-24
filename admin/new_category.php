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

                  <form name="adcat" method="post" action="add_cat_processor.php" enctype="multipart/form-data">
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
                          <label><br>
                              <p>Enter short description of a category</p>
                              <textarea name="text" cols="64" rows="35"></textarea>
                          </label>
                      </p>
                      <p>
                          <label>Are you sure?<br>
                              <input type="submit" value="Add a category">
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