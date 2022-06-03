<?php
function CreateUser($conn, $username, $userpassword, $userfullname, $useraddress, $usermobile, $userbloodgroup)
{
    $sql = "INSERT INTO bbms(username,userpassword,userfullname,useraddress,
            usermobile,userbloodgroup)
            VALUES ('" . $username . "', '" . $userpassword . "', '" . $userfullname . "',
            '" . $useraddress . "', '" . $usermobile . "', '" . $userbloodgroup . "')";
    return $conn->query($sql);
}
