<?php
function GetUserByUsermobile($conn, $usermobile)
{
    $sql = "SELECT *
            FROM bbms
            WHERE usermobile ='" . $usermobile . "'";
    return $conn->query($sql);
}