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
      <div id="prof">
      <p style="text-align:left;"><a href="sprofile.php?user=<?php echo $user; ?>" style="color:black; text-decoration:none; ">&lt; Back</a></p>
        <h2>Edit Profile:</h2></br>
        <form name="form" method="POST" action="logic_sprof_edit.php" enctype="multipart/form-data">

            <img src='<?php echo $slogo; ?>'></br>
            Company Name: <?php echo $sname; ?></br></br>
            
            <label>Admin Name:</label>
            <input type="text" name="admin" id="admin" value="<?php echo $admin; ?>" ></br></br>

            <label>Enter Contact:</label><span style="color:red;"> *</span>
            <input type="text" id="no" name="no" maxlength="10" style="width:268px;" value="<?php echo $scontact; ?>"></br></br>

            <label>Enter Email:</label><span style="color:red;"> *</span>
            <input type="email" id="email" name="email" style="width:290px;" value="<?php echo $smail; ?>"></br></br>

            <label>Enter Location:</label><span style="color:red;"> *</span></br>
            <textarea name="loc" rows="5" cols="58" placeholder="Enter"><?php echo $sloc; ?></textarea></br></br>

            <label>Enter Pincode:</label><span style="color:red;"> *</span>
            <input type="text" id="pincode" name="pincode" maxlength="6" style="width:270px;" value="<?php echo $spincode; ?>"></br></br>

            <input type="hidden" name="user" id="user" value="<?php echo $user; ?>" >
            
            <input type="submit" id="btn" value=" Confirm Changes " name="submit" >
</form>
</div>
    </section>
  </body>
</html>
