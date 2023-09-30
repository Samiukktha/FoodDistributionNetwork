<?php
    include("connection.php");
    $user=$_GET['user'];
    $sql="select * from supplier where susername='$user'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
    $admin=$row['admin'];
    $sname=$row['sname'];
    $scontact=$row['scontact'];
    $smail=$row['smail'];
    $sloc=$row['sloc'];
    $spincode=$row['spincode'];
    $slogo=$row['slogo'];
    
?>


<!DOCTYPE html>
<html>
  <head>
    <meta name="viewpoint" content="with=device-width, initial-scale=1.0" />
    <title>Food Connectivity/Supplier Profile</title>
    <link rel="icon" type="image/x-icon" href="images/logo1.png">
    <link rel="stylesheet" href="style_sprof.css" />
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
      <a href=""><img src="<?php echo $slogo; ?>" /></a><p style="color:white; padding-left:10px;"><?php echo $sname; ?></p>
        <div class="nav-links">
        <ul>
            <li><a href="home_sup.php?user=<?php echo $user; ?>">HOME</a></li>
            <li>
              <a href="sprofile.php?user=<?php echo $user; ?>">PROFILE</a>
            </li>
            <li>
              <a href="sup_req.php?user=<?php echo $user; ?>">REQUESTS</a>
            </li>
            <li>
              <a href="home.php?">LOG OUT</a>
            </li>
          </ul>
        </div>
      </nav>
      <div class="sprof">
      <p style="text-align:left;"><a href="home_sup.php?user=<?php echo $user; ?>" style="color:black; text-decoration:none; ">&lt; Back</a></p>
        <h1 style="text-align:center; font-size:40px;">Supplier Profile</h1>
        <div class="content">
         <br>
          <div class="sec" ><img src='<?php echo $slogo; ?>'></br></br>
            Company Name: <?php echo $sname; ?></br></br>
            Admin Name: <?php echo $admin; ?>
         </div>
            <div class="sec">
            <div class="inner">
            </br></br>Contact no.: <?php echo $scontact; ?></br></br>
            Email Id: <?php echo $smail; ?></br></br>
            Location: <?php echo $sloc; ?></br></br>
            Pincode: <?php echo $spincode; ?>    
        </div>            
          </div>       
      </div>
</br><a href="sprofedit.php?user=<?php echo $user; ?>" class="btn">Edit</a>
    </section>
  </body>
</html>
