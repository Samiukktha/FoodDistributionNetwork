<?php
    include("connection.php");
    $ouser=$_GET['ouser'];
    $sname=$_GET['sname'];
    $ft=$_GET['ft'];
    $pc=$_GET['pc'];

    $a="select * from organisation where ousername='$ouser'";
        $b=mysqli_query($conn,$a);
        $c=mysqli_fetch_array($b, MYSQLI_ASSOC);
        $orgname=$c['oname'];
        $i=$c['ologo'];



    $sql="select * from supplier where sname='$sname'";
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
    <link rel="stylesheet" href="style_osprofile.css" />
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
      <a href=""><img src=<?php echo $i; ?> /></a><p style="color:white; padding-left:10px;"><?php echo $orgname; ?></p>
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
</br><a href="org_sup_list.php?user=<?php echo $ouser; ?>& ft=<?php echo $ft; ?>& pc=<?php echo $pc; ?> " class="btn">Back</a>
    </section>
  </body>
</html>
