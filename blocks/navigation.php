<td width="182" class="left" style="text-align: justify" valign="top">

    <div class="navigation">Categories</div>

    <?php
        $resultCat = $connection ->query("SELECT * FROM `category`");

        if (!$resultCat)
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

        if (mysqli_num_rows($resultCat)>0)
        {
            $rowNav = mysqli_fetch_array($resultCat);

            do
            {
                printf("<p class='navlink'><a href='view_cat.php?cat=%s'>%s</a></p>", $rowNav['id'], $rowNav['title']);
            }
            while ($rowNav = mysqli_fetch_array($resultCat));
        }
        else
        {
            echo "<p>Information can`t be found</p>";
        }

    ?>

    <div class="navigation">New articles</div>
    <?php

    $resultArt = $connection -> query("SELECT `id`, `title` FROM `data` ORDER BY `data` DESC, `id` DESC LIMIT 3");

    if (!$resultArt)
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

    if (mysqli_num_rows($resultArt)>0)
    {
        $rowArt = mysqli_fetch_array($resultArt);

        do
        {
            printf("<p class='navlink'><a href='view_post.php?id=%s'>%s</a></p>", $rowArt['id'], $rowArt['title']);
        }
        while ($rowArt = mysqli_fetch_array($resultArt));
    }
    else
    {
        echo "<p>Information can`t be found</p>";
    }

    ?>

    <div class="navigation">Archive</div>
    <?php

    $resultDate = $connection -> query("SELECT DISTINCT LEFT(`data`, 7) AS 'month' FROM `data` ORDER BY `month` DESC");

    if (!$resultDate)
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

    if (mysqli_num_rows($resultDate)>0)
    {
        $rowDate = mysqli_fetch_array($resultDate);

        do
        {
            printf("<p class='navlink'><a href='view_date.php?date=%s'>%s</a></p>", $rowDate['month'], $rowDate['month']);
        }
        while ($rowDate = mysqli_fetch_array($resultDate));
    }
    else
    {
        echo "<p>Information can`t be found</p>";
    }
    ?>

    <div class="navigation">Search</div>
    <form action="view_search.php" name="search" method="post">
        <p>require 4 symbols</p>
        <input class="search" type="text" name="search" maxlength="40">
        <input class="search_butt" type="submit" name="submit" value="Find">
    </form>
</td>