<?php
$rootDir = str_replace("\\", "/", realpath($_SERVER["DOCUMENT_ROOT"]));

$rootDir = str_replace("\\", "/", $rootDir);

echo $rootDir;