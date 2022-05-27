<?php
 session_start();
 if (!isset($_SESSION['userinfo'])) {
      header("location:index.php");
 }
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body{
            background:lightgray;
        }
      .container{
        background:white; width:40%; padding:4%; margin:auto; border-radius:4%;
      }
      .userdata{
          border:1px solid lightblue;
          margin-top:4%;
          padding:2%;
      }
      .btn center button{
            width:50%; border:1px solid lightblue; border-radius: 2%;
            padding:3%;
            background:skyblue; 
            color:white;
        }
        .usefull a{
            float:right;
        }
        .usefull button{
            width:50%; border:1px solid lightblue; border-radius: 2%;
            padding:3%;
            background:skyblue; 
            color:white;
        }
        .usefull{
            margin-top:2%;
        }
        img{
            border-radius:50%;
        }
      .usefull a{
          float:left;
      }
      .usefull span a{
          float:right;
          width:30%; border:1px solid lightblue; border-radius: 2%;
            padding:2%;
            background:skyblue; 
            color:white;
            text-align:center;
      }
    </style>
</head>
<body>
    <div class="container">
        <div class="profile">
            <center>
              <img src="images/<?php echo $_SESSION['profile'] ?>" width="100" alt=""> 
            </center>
        </div>
        <div class="btn">
            <center>
            <button>Follow</button>
            </center>
          
        </div>
        <div class="userdata">
        <label>Username</label><br>
         <span><?php echo $_SESSION['userinfo']['username'] ?></span> 
        </div> <br>
        <div class="userdata">
        <label>Email</label><br>
         <span><?php echo $_SESSION['userinfo']['email'] ?></span> 
        </div> <br>
        <div class="userdata">
        <label>Phone Number</label><br>
         <span><?php echo $_SESSION['userinfo']['phone'] ?></span> 
        </div> <br>
        <div class="userdata">
        <label>Country</label><br>
         <span><?php echo $_SESSION['userinfo']['country'] ?></span> 
        </div> <br>
        <div class="userdata">
        <label>Gender</label><br>
         <span><?php echo $_SESSION['userinfo']['gender'] ?></span> 
        </div>
        <div class="usefull">
          <span><a href="update.php">Update</a></span>
            <a href="logout.php">Log Out</a>
        </div>
    </div>
</body>
</html>