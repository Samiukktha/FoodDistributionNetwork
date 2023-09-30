<?php
    include("connection.php");
   
    $foodname=$_GET['food'];
    $sname=$_GET['sname'];
    $user=$_GET['user'];

    $a="select * from supplier where susername='$user'";
    $b=mysqli_query($conn,$a);
    $c=mysqli_fetch_array($b, MYSQLI_ASSOC);
    $sname=$c['sname'];
    $i=$c['slogo'];

    $sql="select * from stock where sname='$sname' and fname='$foodname'";
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
      <a href=""><img src="<?php echo $i; ?>" /></a><p style="color:white; padding-left:10px;"><?php echo $sname; ?></p>
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
      <div id="stock">
        <h2>Edit Product:</h2></br>
        <form name="form" method="POST" action="logic_stockedit.php" enctype="multipart/form-data">

            <img src='<?php echo $fpic; ?>'></br>
            Food Product: <?php echo $foodname; ?></br>
            Food Type: <?php echo $ftype; ?></br></br>
            
            <label>Enter Per Portion Feed Capacity:</label><span style="color:red;"> *</span>
            <input type="number" id="ppfc" name="ppfc" maxlength="10" style="width:165px;" placeholder="5 (one portion feeds 5)" value=<?php echo $pfc ?> required></br></br>

            <label>Enter Quantity:</label><span style="color:red;"> *</span>
            <input type="number" id="qty" name="qty" style="width:302px;" required value=<?php echo $qty ?>></br></br>

            <label>Enter Expiration Date:</label><span style="color:red;"> *</span>
            <input type="date" id="exp" name="exp" ></br></br>

            <input type="hidden" name="sname" id="sname" value="<?php echo $sname; ?>">
            <input type="hidden" name="fname" id="fname" value="<?php echo $foodname; ?>">
            <input type="hidden" name="user" id="user" value="<?php echo $user; ?>">

            <input type="submit" id="btn" value=" Confirm Changes " name="submit" >
</form>
</div>
    </section>
  </body>
</html>
