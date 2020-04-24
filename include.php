<?php
/*
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);*/

define("APP_ROOT", __DIR__);

define("APP_SALT", "SnvodOOmckdjfK");

require_once APP_ROOT . "/db.php";

session_start();

function hash_password($password)
{
    return hash_hmac("ripemd128", $password, APP_SALT);
}

function pageInfo($type, $content)
{
    /*
        $type is color
        $content is message in that info
    */

        $_SESSION["PAGE_INFO_EXISTS"] = TRUE;
        $_SESSION["TYPE"] = strtolower($type);
        $_SESSION["PAGE_INFO"] = $content;
    }

    function clearPageInfo() {
        unset($_SESSION["PAGE_INFO_EXISTS"]);
        unset($_SESSION["TYPE"]);
        unset($_SESSION["PAGE_INFO"]);
    }

	function autoloader($class) {
	    require_once APP_ROOT . "/classes/" . $class . ".class.php";
	}

	spl_autoload_register("autoloader");
date_default_timezone_set('Asia/Kolkata');