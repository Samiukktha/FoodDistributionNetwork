<?php
    include("connection.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewpoint" content="with=device-width, initial-scale=1.0" />
    <title>Food Connectivity/Organisation Login</title>
    <link rel="stylesheet" href="style_login.css" />
    <link rel="icon" type="image/x-icon" href="images/logo1.png">
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
      <div class="login">
      <p style="text-align:left;"><a href="login.php" style="color:black; text-decoration:none; ">&lt; Back</a></p>
        <h2>Login (Organisation):</h2>   
        <form name="form" action="home_org.php" onsubmit="return isvalid()" method="POST" >
            </br>
            <label>Username:</label>
            <input type="text" id="suser" name="suser" autofocus></br></br>
            <label>Password:</label>
            <input type="password" id="spass" name="spass"></br></br>
            <input type="submit" id="btn" value=" Login " name="submit" >
        </form> 
    </div>
    <script>
        function isvalid(){
            var user=document.form.suser.value;
            var pass=document.form.spass.value;
            if(user.length=="" && pass.length==""){
                alert("Username and password field is empty!!!");
                return false
            }else{
                if(user.length==""){
                    alert("Username field is empty!!!");
                    return false
                }
                if(pass.length==""){
                    alert("Password field is empty!!!");
                    return false
                }
            }
        }
    </script>
    </section>
  </body>
</html>
