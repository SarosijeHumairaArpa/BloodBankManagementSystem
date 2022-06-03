<?php
session_start();
$appconfigs = include('./../configs/MyAppConfigs.php');
$link_address = $appconfigs['startpage'];
if (!isset($_SESSION['loggedInUsername'])) {
    header('Location: ' . $link_address);
    die();
}
$user = $_SESSION['loggedInUsername'];
include('./../controllers/DbConnectionUtils.php');
include('./../controllers/GetUserByUsername.php');
$username = null;
$userfullname = null;
$useraddress = null;
$usermobile = null;
$userbloodgroup = null;
$conn = con();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $myUserName = $user;
    $result     = GetUserByUsername($conn, $myUserName);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $username = $row["username"];
            $userfullname = $row["userfullname"];
            $useraddress = $row["useraddress"];
            $usermobile = $row["usermobile"];
            $userbloodgroup = $row["userbloodgroup"];
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
    <div class="row">
        <div class="card offset-1 col-10 mt-5">
            <h5 class="card-header">Profile</h5>
            <div class="card-body">
                <form method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="userNameField" aria-describedby="emailHelp" maxlength="20" value="<?php echo $username; ?>" required disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Full name</label>
                        <input value="<?php echo $userfullname; ?>" type="text" class="form-control" name="fullNameField" id="exampleInputPassword1" maxlength="100" required disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Address</label>
                        <input name="addressField" value="<?php echo $useraddress; ?>" type="text" class="form-control" id="exampleInputPassword1" maxlength="1000" required disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mobile</label>
                        <input name="phoneNumberField" value="<?php echo $usermobile; ?>" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control" id="exampleInputPassword1" minlength="11" maxlength="11" required disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Blood group</label>
                        <input name="phoneNumberField" value="<?php echo $userbloodgroup; ?>" type="text" class="form-control" id="exampleInputPassword1" minlength="2" maxlength="3" required disabled>
                    </div>
                    <a href="./editprofile.php" class="btn btn-info" role="button">Update Profile</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>