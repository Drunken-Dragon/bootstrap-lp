<?php
include __DIR__ . "/../src/session.php";
require __DIR__ . '/../vendor/autoload.php';
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__ . "/../.env");

switch ($_SERVER['REQUEST_URI']) {
    case '/signup':
        include_once '../src/signup.php';
        break;
    case '/login':
        include_once '../src/login.php';
        break;
    case '/landing':
        include_once '../src/lp.php';
        break;
    case '/form':
        include_once '../src/formularz.php';
        break;
    default:
        include_once '../src/404.php';
        break;
}
