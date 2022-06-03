<?php
function GetUserByCategory($conn, $useraddress, $userbloodgroup)
{
    $sql = null;
    // category = useraddress = 0 + userbloodgroup =  1
    if ($useraddress != "" && $userbloodgroup == "") {
        $sql = "SELECT *
                    FROM bbms 
                    WHERE useraddress LIKE '%$useraddress%'
                    ORDER BY  useraddress, userbloodgroup";
    }
    // category = useraddress = 1 + userbloodgroup =  0
    elseif ($useraddress == "" && $userbloodgroup != "") {
        $sql = "SELECT *
                    FROM bbms 
                    WHERE userbloodgroup LIKE '%$userbloodgroup%'
                    ORDER BY  userbloodgroup, useraddress";
    }
    // category = useraddress = 1 + userbloodgroup =  1
    elseif ($useraddress != "" && $userbloodgroup != "") {
        $sql = "SELECT *
                    FROM bbms 
                    WHERE useraddress LIKE '%$useraddress%'
                    AND userbloodgroup LIKE '%$userbloodgroup%'
                    ORDER BY  useraddress, userbloodgroup";
    }
    else {
        $sql = "SELECT *
                    FROM bbms 
                    ORDER BY  useraddress, userbloodgroup";;
    }
    return $conn->query($sql);
}