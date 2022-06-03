<?php
function GetUserByUsername($conn, $username)
{
    $sql = "SELECT *
            FROM bbms
            WHERE username ='" . $username . "'";
    return $conn->query($sql);
}