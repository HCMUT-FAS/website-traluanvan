<?php
require_once realpath(__DIR__ . "/vendor/autoload.php");
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$abc = $_ENV["NAME"];
echo "1st";
echo $abc;
echo "3nd";
