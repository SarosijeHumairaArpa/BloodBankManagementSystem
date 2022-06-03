<?php
session_start();
$appconfigs = include('./../configs/MyAppConfigs.php');
$link_address = $appconfigs['startpage'];
if (!isset($_SESSION['loggedInUsername'])) {
    header('Location: ' . $link_address);
    die();
}
$sessionedUN = $_SESSION['loggedInUsername'];
include('./../controllers/DbConnectionUtils.php');
include('./../controllers/GetUserByCategory.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <style>
        #result tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body style="background-color:#2aabd2 ">
    <div class="container-fluid" style="color: white ;background-color: darkblue;text-align: center">
        <br>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="category">ADDRESS : </label>
                <input type="text" placeholder="ENTER ADDRESS" class="form-control" id="category" name="addressField" maxlength="1000">
            </div>
            <div class="form-group">
                <label for="subCategory">BLOOD GROUP : </label>
                <select name="bloodGroupField" class="form-control form-select" aria-label="Default select example">
                    <option selected value="">Any</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success btn-lg" name="searchButton">
                <span class="glyphicon glyphicon-search"></span> &nbsp; SEARCH
            </button>
        </form>
        <br>
    </div>

    <div class="container-fluid">
        <div class="table table-responsive table-bordered">
            <table class="table">
                <thead>
                    <tr>
                        <th>NAME</th>
                        <th>PHONE</th>
                        <th>BLOOD GROUP</th>
                        <th>ADDRESS</th>
                    </tr>
                </thead>

                <tbody id="result">
                    <br>
                    <?php
                    $conn = con();
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    } else {
                        $userNameget = $sessionedUN;
                        $_SESSION['loggedInUsername'] = $sessionedUN;
                        if (isset($_POST["searchButton"])) {
                            $getAddress = $_POST["addressField"];
                            $getBloodGroup = $_POST["bloodGroupField"];
                            $result = GetUserByCategory($conn, $getAddress, $getBloodGroup);
                            deacon($conn);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["userfullname"] . "</td>";
                                    echo "<td>" . $row["usermobile"] . "</td>";
                                    echo "<td>" . $row["userbloodgroup"] . "</td>";
                                    echo "<td>" . $row["useraddress"] . "</td>";
                                    echo "</tr>";
                                }
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>