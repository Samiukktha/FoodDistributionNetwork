<?php
    include("connection.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewpoint" content="with=device-width, initial-scale=1.0" />
    <title>Food Connectivity/Supplier Signup</title>
    <link rel="stylesheet" href="style_ssignup.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;600;700&display=swap"
      rel="stylesheet"
    />
  </head>

  <body>
    <section class="header">
      <nav>
        <a href="home.php"><img src="images/logo1.png" /></a>
        <div class="nav-links">
        <ul>
            <li><a href="home.php">HOME</a></li>
            <li>
              <a href="about.php">ABOUT</a>
            </li>
            <li>
              <a href="login.php">LOG IN</a>
            </li>
          </ul>
        </div>
      </nav>
      <div id="signup">
      <p style="text-align:left;"><a href="signup.php" style="color:black; text-decoration:none; ">&lt; Back</a></p>
        <h2>SignUp Form (Supplier):</h2></br>
        <form name="form" method="POST" action="logic_ssignup.php" enctype="multipart/form-data">
            <label>Enter Admin Name:</label><span style="color:red;"> *</span>
            <input type="text" id="admin" name="admin" style="width:228px;" required></br></br>
            <label>Enter Company Name:</label><span style="color:red;"> *</span>
            <input type="text" id="sname" name="sname" style="width:201px;" required></br></br>
            <label>Enter Contact:</label><span style="color:red;"> *</span>
            <input type="text" id="no" name="no" maxlength="10" style="width:268px;" required></br></br>
            <label>Enter Email:</label><span style="color:red;"> *</span>
            <input type="email" id="email" name="email" style="width:290px;" required></br></br>
            <label>Enter Location:</label><span style="color:red;"> *</span></br>
            <textarea name="loc" rows="5" cols="58" placeholder="Enter" required></textarea></br></br>
            <label>Enter Pincode:</label><span style="color:red;"> *</span>
            <input type="text" id="pincode" name="pincode" maxlength="6" style="width:270px;" required></br></br>
            <label>Upload company logo (Optional):</label></br>
            <input type="file" name="file" id="file" > </br></br>
            <label>Enter Username:</label><span style="color:red;"> *</span>
            <input type="text" id="user" name="user" style="width:251px;" required></br></br>
            <label>Enter Password:</label><span style="color:red;"> *</span>
            <input type="password" id="pass" name="pass" maxlength="8" style="width:256px;" required></br></br>
            <label>Re-enter Password:</label><span style="color:red;"> *</span>
            <input type="password" id="rpass" name="rpass" maxlength="8" style="width:228px;" required></br></br>
            <input type="submit" id="btn" value=" SignUp " name="submit" >
</form>
</div>
    </section>
  </body>
</html>
