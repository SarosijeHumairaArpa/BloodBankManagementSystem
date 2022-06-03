<?php
function con(): mysqli
{
    $db_configs = include ('./../configs/MyDbConfigs.php');
    $server_name = $db_configs['host'];
    $user_name = $db_configs['username'];
    $user_password = $db_configs['password'];
    $database_name = $db_configs['database'];
    return new mysqli($server_name, $user_name, $user_password, $database_name);
}

function deacon($conn)
{
    mysqli_close($conn);
}