<?php

require_once(CONFIG . "autoload.php");

try
{
    $conn = new PDO("mysql:host=" . $config['database_host'] . ";dbname=" . $config['database_name'],
                    $config['database_user'],
                    $config['database_pass']
    );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("SET NAMES " . $config['database_char']);
}
catch(PDOException $e)
{
    if($config['main_mode'] == "dev") die("[DATABASE] Connection Error! -> " . $e->getMessage());
    if($config['main_mode'] == "public") die("[DATABASE] Connection Error! -> #" . $e->getCode());
}