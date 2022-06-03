<?php
function UpdateUser($conn, $username, $userfullname, $useraddress, $usermobile, $userbloodgroup)
{
    $sql = "UPDATE bbms
            SET userfullname = '" . $userfullname . "',
            useraddress = '" . $useraddress . "',
            usermobile = '" . $usermobile . "',
            userbloodgroup = '" . $userbloodgroup . "'
            WHERE username='" . $username . "'";
    return $conn->query($sql);
}