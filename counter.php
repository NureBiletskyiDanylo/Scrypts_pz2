<?php
session_start();
if (!isset($_SESSION['counted']))
{
    $agent = $_SERVER['HTTP_USER_AGENT'];
    $uri = $_SERVER['REQUEST_URI'];
    $user = $_SERVER['PHP_AUTH_USER'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $ref = $_SERVER['HTTP_REFERER'];
    $dtune = date('r');
    if (!$ref)
    {
        $ref = "HI";
    }
    if (!$user)
    {
        $user = "HI";
    }

    $entry_line = "$dtime-IP: $ip | Agent: $agent | URL: $uri | Referer: $ref | Username: $user \n";
    $fp = fopen("logs.txt", "a");
    fputs($fp, $entry_line);
    fclose($fp);
    $_SESSION['counted'];
}
