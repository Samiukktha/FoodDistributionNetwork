<?php
    include("connection.php");
    $user=$_GET['user'];
    $sql="select * from organisation where ousername='$user'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
    $oname=$row['oname'];
    $ocontact=$row['ocontact'];
    $omail=$row['omail'];
    $oloc=$row['oloc'];
    $oimg1=$row['ologo'];
    $oimg2=$row['oimage1'];
    $oimg3=$row['oimage2'];
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewpoint" content="with=device-width, initial-scale=1.0" />
    <title>Food Connectivity/Supplier Profile Edit</title>
    <link rel="icon" type="image/x-icon" href="images/logo1.png">
    <link rel="stylesheet" href="style_sprofile_edit.css" />
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
      <div id="prof">
      <p style="text-align:left;"><a href="oprofile.php?user=<?php echo $user; ?>" style="color:black; text-decoration:none; ">&lt; Back</a></p>
        <h2>Edit Profile:</h2></br>
        <form name="form" method="POST" action="logic_oprof_edit.php" enctype="multipart/form-data">

            <img src='<?php echo $oimg1; ?>'></br>
            Organisation Name: <?php echo $oname; ?></br></br>
            
            <label>Enter Contact:</label><span style="color:red;"> *</span>
            <input type="text" id="no" name="no" maxlength="10" style="width:268px;" value="<?php echo $ocontact; ?>"></br></br>

            <label>Enter Email:</label><span style="color:red;"> *</span>
            <input type="email" id="email" name="email" style="width:290px;" value="<?php echo $omail; ?>"></br></br>

            <label>Enter Location:</label><span style="color:red;"> *</span></br>
            <textarea name="loc" rows="5" cols="58" placeholder="Enter"><?php echo $oloc; ?></textarea></br></br>

            <input type="hidden" name="user" id="user" value="<?php echo $user; ?>" >
            
            <input type="submit" id="btn" value=" Confirm Changes " name="submit" >
</form>
</div>
    </section>
  </body>
</html>
