<?php
    include("connection.php");
    if(isset($_POST['submit'])){
        $user=$_POST['suser'];
        $password=$_POST['spass'];

        $sql="select * from supplier where susername='$user' and spassword='$password'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count=mysqli_num_rows($result);
        if($count!=1){
            echo '<script>
                window.location.href="slogin.php";
                alert("Login failed. Invalid username and password!!!")
            </script>';
        }

        $sname=$row['sname'];
        $logo=$row['slogo'];

        $sql="select * from stock where sname='$sname'";
        $result=mysqli_query($conn,$sql);
    }else{

      $user=$_GET['user'];

      $sql="select * from supplier where susername='$user'";
      $result=mysqli_query($conn,$sql);
      $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
      $sname=$row['sname'];
      $logo=$row['slogo'];

      $sql="select * from stock where sname='$sname'";
      $result=mysqli_query($conn,$sql);
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewpoint" content="with=device-width, initial-scale=1.0" />
    <title>Food Connectivity/Supplier Home Page</title>
    <link rel="icon" type="image/x-icon" href="images/logo1.png">
    <link rel="stylesheet" href="style_shome.css" />
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
        <a href=""><img src="<?php echo $logo; ?>" /></a><p style="color:white; padding-left:10px;"><?php echo $sname; ?></p>
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
      <div class="shome">
        <h1 style="text-align:center; font-size:40px;">Supplier Home Page</h1>
        <div class="content">
         <br>
          <p style="font-size:30px; text-align:left;">Welcome, <?php echo $sname; ?>.</br>
          <a href="stockadd.php?user=<?php echo $user; ?>" class="btn">Add New Product</a></br></p></br>
          
                  <table style="width:100%"> 
                    <tr>
                      <th>Image</th>
                      <th>Food</th>
                      <th>Type</th>
                      <th>Per Portion Feed</th>
                      <th>Quantity</th>
                      <th>Expiry</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                    <tr>
                      <?php
                        while($row=mysqli_fetch_assoc($result)){
                      ?>
                        <?php $image=$row['fimage']; ?>
                        <td><?php echo "<img src='$image'/>"; ?></td>
                        <td><?php echo $row['fname']?></td>
                        <td><?php echo $row['ftype']?></td>
                        <td><?php echo $row['pfc']?></td>
                        <td><?php echo $row['qty']?></td>
                        <td><?php echo $row['expdate']?></td>
                        <td><a href="stockedit.php?food=<?php echo $row['fname']; ?>& sname=<?php echo $sname; ?>& user=<?php echo $user; ?>" class="btn-e">Edit</a></td>
                        <td><a href="stockdelete.php?food=<?php echo $row['fname']; ?>& sname=<?php echo $sname; ?>& user=<?php echo $user; ?>" class="btn-d">Delete</a></td>
                      </tr>
                      </tr>
                      <?php
                        }
                      ?>
                  </table>
          </div>       
      </div>
    </section>
  </body>
</html>


