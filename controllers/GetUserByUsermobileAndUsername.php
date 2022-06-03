<?php
function GetUserByUsermobileAndUsername($conn, $username, $usermobile)
{
    $sql = "SELECT *
                FROM bbms 
                WHERE usermobile = '" . $usermobile . "' 
                AND username != '" . $username . "' ";
    return $conn->query($sql);
}