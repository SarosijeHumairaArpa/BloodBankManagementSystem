<?php
session_start();
include('./../controllers/DbConnectionUtils.php');
include('./../controllers/GetUserByUsermobile.php');
include('./../controllers/GetUserByUsername.php');
include('./../controllers/CreateUser.php');
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
            <h5 class="card-header">Signup</h5>
            <div class="card-body">
                <form method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="userNameField" aria-describedby="emailHelp" maxlength="20" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Full name</label>
                        <input type="text" class="form-control" name="fullNameField" id="exampleInputPassword1" maxlength="100" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Address</label>
                        <input name="addressField" type="text" class="form-control" id="exampleInputPassword1" maxlength="1000" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mobile</label>
                        <input name="phoneNumberField" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control" id="exampleInputPassword1" minlength="11" maxlength="11" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Blood group</label>
                        
                        <select name="bloodGroupField" class="form-control form-select" aria-label="Default select example" required>
                            <option selected value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input name="passwordField" type="password" class="form-control" id="exampleInputPassword1" maxlength="20" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input name="repeatPasswordField" type="password" class="form-control" id="exampleInputPassword1" maxlength="20" required>
                    </div>
                    <button name="signUpButton" type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <?php
        $conn = con();
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            if (isset($_POST["signUpButton"])) {
                if (isset($_POST["userNameField"]) && isset($_POST["fullNameField"]) && isset($_POST["phoneNumberField"]) && isset($_POST["passwordField"]) && isset($_POST["passwordField"]) && isset($_POST["repeatPasswordField"]) && isset($_POST["addressField"]) && isset($_POST["bloodGroupField"])) {
                    $getUserName       = $_POST["userNameField"];
                    $getFullName      = $_POST["fullNameField"];
                    $getPhoneNumber    = $_POST["phoneNumberField"];
                    $getPassword       = $_POST["passwordField"];
                    $getRepeatPassword = $_POST["repeatPasswordField"];
                    $getAddress          = $_POST["addressField"];
                    $getBloodGroup          = $_POST["bloodGroupField"];
                    if ($getPhoneNumber != NULL) {
                        $display_full_result_email = GetUserByUsermobile($conn, $getPhoneNumber);
                        deacon($conn);
                        if ($display_full_result_email->num_rows > 0) {
                            echo "<div class=\"alert alert-danger alert-dismissible\">
                                        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">×</a>
                                            <strong>ERROR : </strong> Phone number already exists
                                    </div>";
                            $emailFlag = 0;
                        }
                    }
                    if ($getPassword !== $getRepeatPassword) {
                        echo "<div class=\"alert alert-danger alert-dismissible\">
                                    <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">×</a>
                                            <strong>ERROR : </strong> PASSWORD DIDN'T MATCH
                                </div>";
                    } else {
                        if ($getUserName != NULL) {
                            $conn                         = con();
                            $display_full_result_username = GetUserByUsername($conn, $getUserName);
                            deacon($conn);
                            if ($display_full_result_username->num_rows > 0) {
                                echo "<div class=\"alert alert-danger alert-dismissible\">
                                            <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">×</a>
                                            <strong>ERROR : </strong> USERNAME ALREADY EXISTS
                                        </div>";
                            } else {
                                if ($getPhoneNumber != NULL) {
                                    $conn                             = con();
                                    $display_full_result_phone_number = GetUserByUsermobile($conn, $getPhoneNumber);
                                    deacon($conn);
                                    if ($display_full_result_phone_number->num_rows > 0) {
                                        echo "<div class=\"alert alert-danger alert-dismissible\">
                                                    <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">×</a>
                                                    <strong>ERROR : </strong> DUPLICATE PHONE NUMBER EXISTS
                                                </div>";
                                    } else {
                                        $conn   = con();
                                        $result = CreateUser($conn, $getUserName, $getPassword, $getFullName, $getAddress, $getPhoneNumber, $getBloodGroup);
                                        deacon($conn);
                                        if ($result) {
                                            echo "<div class=\"alert alert-success alert-dismissible\">
                                                            <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">×</a>
                                                            \"Signup Successful. Please go to login\"    
                                                        </div>";
                                            echo '<script type="text/javascript">
                                                        window.location = "./signin.php"
                                                    </script>';
                                        } else {
                                            echo "<div class=\"alert alert-danger alert-dismissible\">
                                                            <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">×</a>
                                                            \"INSERT OPERATION FAILED\" . \"<br>\"    
                                                        </div>";
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        ?>
    </div>
</body>

</html>