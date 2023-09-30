<?php
    include("connection.php");
    if(isset($_POST['submit'])){
        $user=$_POST['suser'];
        $password=$_POST['spass'];

        $sql="select * from organisation where ousername='$user' and opassword='$password'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
        $orgname=$row['oname'];
        $i=$row['ologo'];
        $count=mysqli_num_rows($result);
        if($count!=1){
            echo '<script>
                window.location.href="ologin.php";
                alert("Login failed. Invalid username and password!!!")
            </script>';                            
        }
    }else{
      $user=$_GET['user'];
      $sql="select * from organisation where ousername='$user'";
      $result=mysqli_query($conn,$sql);
      $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
      $orgname=$row['oname'];
      $i=$row['ologo'];

    }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewpoint" content="with=device-width, initial-scale=1.0" />
    <title>Food Connectivity/Organisation Home Page</title>
    <link rel="icon" type="image/x-icon" href="images/logo1.png">
    <link rel="stylesheet" href="style_ohome.css" />
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
      <div class="ohome">
        <h1 style="text-align:center; font-size:40px;">Organisation Home Page</h1>
        <div class="content">
        <br>
        <p style="font-size:30px;">Welcome, <?php echo $orgname; ?>.</p></br>
        <form name="form" method="POST" action="org_sup_list.php">
            <br>
            <label >Choose Food Type (Optional):</label>
            <select name="foodtype" id="foodtype" placeholder="Choose">
            <option value="click">Click</option>
            <option value="Rice/Noodles">Rice/Noodles</option>
            <option value="Cakes">Cakes</option>
            <option value="Drink">Drink</option>
            <option value="Chats">Chats</option>
            <option value="Sweets">Sweets</option>
            <option value="Bread">Bread</option>
            </select>
            <br><br>
            <label>Choose Pincode (Optional):</label>
            <select name="pincode" id="pincode" placeholder="Choose">
            <option value="click">Click</option>
            <?php 
              $s="select distinct(spincode) from supplier";
              $r=mysqli_query($conn,$s);
              while($ro=mysqli_fetch_assoc($r)){
            ?>
            <option value="<?php echo $ro['spincode']; ?>"><?php echo $ro['spincode']; ?></option>
            <?php
              }
            ?>
            </select>
            <br><br>
            <input type="hidden" name="user" id="user" value="<?php echo $user; ?>">
            <input type="submit" id="btn" value=" Start Search " name="submit" >
        </form> 


        </div>
    </section>
  </body>
</html>

