<?php
include ("blocks/database.php");

if (isset($_POST['author']))
{
    $author = $_POST['author'];
}

if (isset($_POST['text']))
{
    $text = $_POST['text'];
}

if (isset($_POST['submit']))
{
    $submit = $_POST['submit'];
}

if (isset($_POST['id']))
{
    $id = $_POST['id'];
}

if (isset($submit))
{
    if (isset($author))
    {
        trim($author);
    }
    else
    {
        $author = "Anonymous";
    }

    if (isset($text))
    {
        trim($text);
    }
    else
    {
        $text = "";
    }

    if (empty($text))
    {
        exit ("<p>Textarea is empty. Please, wright your message</p>
               <input type='button' name='back' value='Back' onclick='window.history.go(-1); return false;'>");
    }

    $date = date("Y-m-d");

    $author = stripslashes($author);
    $text = stripslashes($text);
    $author = htmlspecialchars($author);
    $text = htmlspecialchars($text);

    $result_comment = $connection -> query("INSERT INTO `comments` (`post`, `author`, `text`, `date`) VALUES ('$id', '$author', '$text', '$date')");

    echo "<html>
            <head>
                <meta http-equiv='refresh' content='0; URL=view_post.php?id=$id'>
            </head>
          </html>";
    exit();
//    $address = "grs5_khov@student.ztu.edu.ua";
//    $subject = "New comment";
//    $result = $connection -> query("SELECT `title` FROM `data` WHERE `id` = '$id'");
//    $row = mysqli_fetch_array($result);
//    $title = $row['title'];
//    $message = "$author left comment at your $title:\n $text"."Link to aan article -> http://localhost/www/view_post.php?id=".$id;
//    $link = "Link to aan article -> http://localhost/www/view_post.php?id=".$id;
//
//    mail("$address", "$subject", "$message", 'Content-type: text/html; charset=iso-8859-1' . "\r\n");
}