<?php
session_start();
include('./../controllers/DbConnectionUtils.php');
include('./../controllers/GetUserByUsernameAndPassword.php');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2"
        crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
    <div class="row">
        <div class="card offset-1 col-10 mt-5">
            <h5 class="card-header">Login</h5>
            <div class="card-body">
                <form method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" name="userInfoLoginField" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" maxlength="20" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="passwordLoginField" class="form-control" id="exampleInputPassword1" maxlength="20" required>
                    </div>
                    <button type="submit" name="signinSIButton" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <?php
        if (isset($_POST["signinSIButton"])) {
            $getUserInfo = $_POST["userInfoLoginField"];
            $getPassword = $_POST["passwordLoginField"];
            $conn        = con();
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } else {
                $display_full_result = GetUserByUsernameAndPassword($conn, $getUserInfo, $getPassword);
                deacon($conn);
                if ($display_full_result->num_rows > 0) {
                    $user                         = $_POST['userInfoLoginField'];
                    $_SESSION['loggedInUsername'] = $user;
                    echo '<script type="text/javascript">
                                        window.location = "./viewprofile.php"
                                    </script>';
                } else {
                    echo "<div class=\"alert alert-danger alert-dismissible\">
                                        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">×</a>
                                            LOGIN FAILED  
                                    </div>";
                }
            }
        }
        ?>
    </div>
</body>

</html>