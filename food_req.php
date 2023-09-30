<?php
    include("connection.php");
    
    $user=$_GET['user'];
    $sname=$_GET['sname'];
    $fname=$_GET['fname'];
    $ft=$_GET['ft'];
    $pc=$_GET['pc'];

    $a="select * from organisation where ousername='$user'";
        $b=mysqli_query($conn,$a);
        $c=mysqli_fetch_array($b, MYSQLI_ASSOC);
        $orgname=$c['oname'];
        $i=$c['ologo'];

    $sql="select * from stock where sname='$sname' and fname='$fname'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
    $ftype=$row['ftype'];
    $qty=$row['qty'];
    $pfc=$row['pfc'];
    $fpic=$row['fimage'];
?>


<!DOCTYPE html>
<html>
  <head>
    <meta name="viewpoint" content="with=device-width, initial-scale=1.0" />
    <title>Food Connectivity/Edit Product</title>
    <link rel="icon" type="image/x-icon" href="images/logo1.png">
    <link rel="stylesheet" href="style_stockadd.css" />
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
      <div id="stock">
      <p style="text-align:left;"><a href="org_sup_prod_list.php?user=<?php echo $user; ?>& ft=<?php echo $ft; ?>& pc=<?php echo $pc; ?>& sname=<?php echo $sname; ?>" style="color:black; text-decoration:none; ">&lt; Back</a></p>
        <h2>Request:</h2></br>
        <form name="form" method="POST" action="food_req_sent.php" enctype="multipart/form-data">

            <img src='<?php echo $fpic; ?>'></br>
            Food Product: <?php echo $fname; ?></br>
            Food Type: <?php echo $ftype; ?></br>
            Per portion feed: <?php echo $pfc; ?></br>
            Stock available: <?php echo $qty; ?></br></br>
            
            <label>Enter Quantity:</label><span style="color:red;"> *</span>
            <input type="number" id="qty" name="qty" maxlength="10" style="width:165px;" max="<?php echo $qty; ?>" required autofocus ></br></br>

            <input type="hidden" name="sname" id="sname" value="<?php echo $sname; ?>">
            <input type="hidden" name="fname" id="fname" value="<?php echo $fname; ?>">
            <input type="hidden" name="user" id="user" value="<?php echo $user; ?>">
            <input type="hidden" name="ft" id="ft" value="<?php echo $ft; ?>">
            <input type="hidden" name="pc" id="pc" value="<?php echo $pc; ?>">

            <input type="submit" id="btn" value=" Send Request " name="submit" >
</form>
</form>
</div>
    </section>
  </body>
</html>





