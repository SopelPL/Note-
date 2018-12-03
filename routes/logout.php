<?php
session_start();
if(!isset($_SESSION['u_data']))
{
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
else
{
    session_destroy();
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}