<?php
    include("connection.php");
    $user=$_GET['user'];
    $a="select * from supplier where susername='$user'";
    $b=mysqli_query($conn,$a);
    $c=mysqli_fetch_array($b, MYSQLI_ASSOC);
    $sname=$c['sname'];
    $i=$c['slogo'];

?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewpoint" content="with=device-width, initial-scale=1.0" />
    <title>Food Connectivity/Add Product</title>
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
      <p style="text-align:left;"><a href="home_sup.php?user=<?php echo $user; ?>" style="color:black; text-decoration:none; ">&lt; Back</a></p>
        <h2>Add New Product:</h2></br>
        <form name="form" method="POST" action="logic_stockadd.php" enctype="multipart/form-data">

            <label>Enter Food Name:</label><span style="color:red;"> *</span>
            <input type="text" id="fname" name="fname" style="width:277px;" required></br></br>

            <label>Choode Food Type:</label><span style="color:red;"> *</span>
            <select name="foodtype" id="foodtype" placeholder="Choose" style="width:268px;">
            <option value="Rice">Rice/Noodles</option>
            <option value="Cakes">Cakes</option>
            <option value="Drink">Drink</option>
            <option value="Chats">Chats</option>
            <option value="Sweets">Sweets</option>
            <option value="Bread">Bread</option>
            </select><br><br>

            <label>Enter Per Portion Feed Capacity:</label><span style="color:red;"> *</span>
            <input type="number" id="ppfc" name="ppfc" maxlength="10" style="width:165px;" placeholder="5 (one portion feeds 5)" required></br></br>

            <label>Enter Quantity:</label><span style="color:red;"> *</span>
            <input type="number" id="qty" name="qty" style="width:302px;" required></br></br>

            <label>Upload 1 portion image:</label></br>
            <input type="file" name="file" id="file" > </br></br>

            <label>Enter Expiration Date:</label><span style="color:red;"> *</span>
            <input type="date" id="exp" name="exp" ></br></br>

            <input type="hidden" name="user" id="user" value="<?php echo $user; ?>">

            <input type="submit" id="btn" value=" Add " name="submit" >
</form>
</div>
    </section>
  </body>
</html>
