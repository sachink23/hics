<?php
require_once "../../include.php";
$dep = new department();
if (!$dep->loggedIn()) {
    header("Location: ../");
    exit;
}
phpinfo();
