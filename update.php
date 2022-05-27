<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        .input{  
            width:100%; border:1px solid lightblue; border-radius: 2%;
            padding:3%;
        }
        select{
            width:106%; bor der:1px solid lightblue; border-radius: 2%;
            padding:3%;
        }
        .btn{
            width:100%; border:1px solid lightblue; border-radius: 2%;
            padding:3%;
            background:skyblue; 
        }
      
    </style>
</head>
<body style="background:lightgray">
    <div style="background:white; width:30%; padding:4%; margin:auto; border-radius:4%;">
    <form method="POST" enctype="multipart/form-data">
        <?php 
        session_start();
         if (isset($_POST['submit'])) {
             extract($_POST);
             $file = $_FILES['profile'];
             if (empty($username) || empty($email) 
             || empty($phone) || empty($password) 
             || empty($repass) || !isset($country) || !isset($gender)) {
                echo "<div style='background:red; padding:2%;color:white;text-align:center;border-radius:2%;'>All Fields Are Required</div>";
             }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo "<div style='background:red; padding:2%;color:white;text-align:center;border-radius:2%;'>Invalid Email Address</div>";
             }elseif($password!=$repass){
                echo "<div style='background:red; padding:2%;color:white;text-align:center;border-radius:2%;'>Password Miss match</div>";
             }else {
                $_SESSION['userinfo'] =$_POST;
                if($file['error']==4){

                }else{ 
                if (explode('/',$file['type'])[0]!="image") {
                    echo "<div style='background:red; padding:2%;color:white;text-align:center;border-radius:2%;'>File Type Not Supported</div>";
                   
                 }else{
                    $_SESSION['profile']=$file['name'];
                    move_uploaded_file($file['tmp_name'],'images/'.$file['name']);
                    
                 }
                }
                echo "<div style='background:green; padding:2%;color:white;text-align:center;border-radius:2%;'>Successfully Registered For Account</div>";
                    header("location:index2.php");
               
              
         }
        }
        
        ?>
        <input type="text" class="input" value="<?php echo $_SESSION['userinfo']['username'] ?>" name="username" Placeholder=" Enter Username" ><br>    
        <input type="text" class="input" value="<?php echo $_SESSION['userinfo']['email'] ?>" name="email" Placeholder=" Enter Email Address"> <br>
        <input type="text" class="input" value="<?php echo $_SESSION['userinfo']['phone'] ?>" name="phone" Placeholder=" Enter Phone Number"> <br>
        <input type="password" class="input" value="<?php echo $_SESSION['userinfo']['password'] ?>" name="password" Placeholder=" Enter Password"> <br>
        <input type="password" class="input" value="<?php echo $_SESSION['userinfo']['repass'] ?>" name="repass" Placeholder="Repeat Password"> <br>
        <select name="country" id="">
            <option value="<?php echo $_SESSION['userinfo']['country'] ?>"> <?php echo $_SESSION['userinfo']['country'] ?></option>
           
            <option value="Nigeria">Nigeria</option>
            <option value="Ghana">Ghana</option>
            <option value="United Kindom">United Kindom</option>

        </select>
       <br>
        <label>Gender</lable> <br>
        <input type="radio" <?php echo $_SESSION['userinfo']['gender']=="Male"?'checked':'' ?> name="gender" value="Male">Male
        <input type="radio" <?php echo $_SESSION['userinfo']['gender']=="Female"?'checked':'' ?>name="gender" value="Female">Female
        <input type="file" name="profile">
        <input type="submit" name="submit" class="btn">
        

    </form>
    </div>
</body>
</html>