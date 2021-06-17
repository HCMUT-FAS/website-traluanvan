<?php
if (isset($_GET['search-submit'])) {
    require "Database/conn.php";
    $s = $_GET["q"];
    if (empty($s)) {
        header("Location: index.php?error=emptysearch");
        exit();
    } else {
        header("Location: index.php?q=$s");
    }
} else {
    header("Location: index.php?error=1");
    exit();
}