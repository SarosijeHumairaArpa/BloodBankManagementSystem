<?php
function GetUserByUsernameAndPassword($conn, $username, $userpassword)
{
    $sql = "SELECT *
                FROM bbms 
                WHERE username='" . $username . "' 
                AND userpassword='" . $userpassword . "' ";
    return $conn->query($sql);
}