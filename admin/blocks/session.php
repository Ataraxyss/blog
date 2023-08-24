<?php
header('Content-type: text/html; charset=utf-8');
session_start();
if (! $_SESSION['scheize'])
    header('Location: http://localhost/www/admin/blocks/lockform.php');