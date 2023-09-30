<?php
    include("connection.php");
    $suser=$_GET['suser'];
    $oname=$_GET['oname'];

    $sql="select * from organisation where oname='$oname'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
    $oname=$row['oname'];
    $ocontact=$row['ocontact'];
    $omail=$row['omail'];
    $oloc=$row['oloc'];
    $oimg1=$row['ologo'];
    $oimg2=$row['oimage1'];
    $oimg3=$row['oimage2'];
    $oreg=$row['regno'];
    
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Food Connectivity/Supplier Profile</title>
    <link rel="icon" type="image/x-icon" href="images/logo1.png">
    <link rel="stylesheet" href="style_sprofile.css" />
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
      <a href=""><img src=<?php echo $oimg1; ?> /></a><p style="color:white; padding-left:10px;"><?php echo $oname; ?></p>
        <div class="nav-links">
        <ul>
            <li><a href="home_org.php?user=<?php echo $user; ?>">HOME</a></li>
            <li>
              <a href="oprofile.php?user=<?php echo $user; ?>">PROFILE</a>
            </li>
            <li>
              <a href="org_req.php?user=<?php echo $user; ?>">REQUESTS</a>
            </li>
            <li>
              <a href="home.php?">LOG OUT</a>
            </li>
          </ul>
        </div>
      </nav>
      <div class="sprof">
      <p style="text-align:left;"><a href="sup_req.php?user=<?php echo $suser; ?>" style="color:black; text-decoration:none; ">&lt; Back</a></p>
        <h1 style="text-align:center; font-size:40px;">Organisation Profile</h1>
        <div class="content">
          <div class="profile-column">
            <div class="sec"><img src="<?php echo $oimg1; ?>" width="250" height="250"/></div>
            <div class="sec">
              <div class="inner">
              Organisation Name: <?php echo $oname; ?><br />
              </div>
            </div>
          </div>
          <div class="welcome-column">
            <div class="welcome-section" style="padding:justify;">
                </br>
                Contact no.: <?php echo $ocontact; ?><br /></br>
                Email Id: <?php echo $omail; ?><br /></br>
                Location: <?php echo $oloc; ?><br /></br>
                Registeration no.: <?php echo $oreg; ?>
            </div>
          </div>
          <div class="edit-column">
          <img src="<?php echo $oimg2; ?>" width="250" height="250" /></br></br>
          <img src="<?php echo $oimg3; ?>" width="250" height="250"/>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>
