<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Theme Simply Me</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    body {
      font: 20px Montserrat, sans-serif;
      line-height: 1.8;
      color: #f5f6f7;
    }

    p {
      font-size: 16px;
    }

    .margin {
      margin-bottom: 45px;
    }

    .bg-1 {
      background-color: #1abc9c;
      /* Green */
      color: #ffffff;
    }

    .bg-2 {
      background-color: #474e5d;
      /* Dark Blue */
      color: #ffffff;
    }

    .bg-3 {
      background-color: #ffffff;
      /* White */
      color: #555555;
    }

    .bg-4 {
      background-color: #2f2f2f;
      /* Black Gray */
      color: #fff;
    }

    .container-fluid {
      padding-top: 70px;
      padding-bottom: 70px;
    }

    .navbar {
      padding-top: 15px;
      padding-bottom: 15px;
      border: 0;
      border-radius: 0;
      margin-bottom: 0;
      font-size: 12px;
      letter-spacing: 5px;
    }

    .navbar-nav li a:hover {
      color: #1abc9c !important;
    }
  </style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">BBMS</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="./views/signin.php">Sign In</a></li>
          <li><a href="./views/signup.php">Sign Up</a></li>
          <li><a href="./views/editprofile.php">Edit Profile</a></li>
          <li><a href="./views/searchprofile.php">Search Profile</a></li>
        </ul>
      </div>
    </div>
  </nav>


  <!-- First Container -->
  <div class="container-fluid bg-1 text-center">
    <h3 class="margin">Welcome</h3>
    <h3 class="margin">To</h3>
    <h3>Blood Bank Management System</h3>
  </div>

  <!-- Second Container -->
  <div class="container-fluid bg-2 text-center">
    <h3 class="margin">Why donate blood?</h3>
    <p>A blood donation truly is a “gift of life” that a healthy individual can give to others in their community who are sick or injured. In one hour’s time, a person can donate one unit of blood that can be separated into four individual components that could help save multiple lives.</p><br>
    <p>From one unit of blood, red blood cells can be extracted for use in trauma or surgical patients. Plasma, the liquid part of blood, is administered to patients with clotting problems. The third component of blood, platelets, clot the blood when cuts or other open wounds occur, and are often used in cancer and transplant patients. Cryoprecipitated anti-hemophilic factor (AHF) is also used for clotting factors.</p>
  </div>

  <!-- Third Container (Grid) -->
  <div class="container-fluid bg-3 text-center">
    <h3 class="margin">How blood group works?</h3><br>
    <div class="row">
      <div class="col-12">
        <p class="margin">The human body contains around 8 to 10 pints of blood depending on the size of the individual.
          However, the composition of the blood is not the same in each person. This is what makes the person's blood
          type. There are four ABO groups.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-3">
        <p><strong>Group A:</strong> The surface of the red blood cells contains A antigen, and the plasma has anti-B antibody that would
          attack any foreign B antigen containing red blood cells..</p>
      </div>
      <div class="col-sm-3">
        <p><strong>Group B:</strong> The surface of the red blood cells contains B antigen, and the plasma has anti-A antibody that would
          attack any foreign A antigen containing red blood cells.</p>
      </div>
      <div class="col-sm-3">
        <p><strong>Group AB:</strong> The red blood cells have both A and B antigens, but the plasma does not contain anti-A/anti-B
          antibodies. Individuals with type AB can receive any ABO blood type</p>
      </div>
      <div class="col-sm-3">
        <p><strong>Group O:</strong> The plasma contains both types of anti-A/anti-B antibodies, but the surface of the red blood cells
          does not contain any A/B antigens. Having none of these A/B antigens means that they can be donated to a
          person with any ABO blood type.</p>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="container-fluid bg-4 text-center">
    <p>Thanks for visiting us</p>
  </footer>

</body>

</html>