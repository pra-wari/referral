<?php include 'database_connect.php'?>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
         <title>Contact Form</title>
         <meta name="viewport" content="width=device-width,initial-scale=1">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
         <style>
             .contain{
                 border:1px solid black;
                 border-radius: 10px;
                 margin-top: 5%;
                 padding: 20px;
                 
             }
         </style>
    </head>
    <body>
        
       <?php
      

       if(isset($_POST["signup"])){
        
        $referral = $_GET["code"];
        
          $name = $_POST["name"];
           
           $email = $_POST["email"];
           $password = $_POST["password"];
       
          
           $nameMissing = "<p>Please enter your name!</p>";
           $passMissing = "<p>Please create your password !</p>";
           
           
           $emailMissing = "<p>Please enter your email!</p>";
           $invalidEmail = "<p>Please enter valid email!</p>";
           
          
         
           $error = "";
           if(!$name){
               $error.= $nameMissing;
           }else{
               $name = filter_var($name,FILTER_SANITIZE_STRING);
           }
           if(!$password){
            $error .= $passMissing;
        }else{
            $password = md5($password); 
        }
           

          
           if(!$email){
               $error.= $emailMissing;
           }else{
               $email = filter_var($email,FILTER_SANITIZE_STRING);
               if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                   $error .= $invalidEmail;
               }
           }
           function random_strings() 
           { 
             $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
             return substr(str_shuffle($str_result), 0, 10); 
           }
           $code = random_strings();
          
           if($error){
         $result = '<div class="alert alert-warning">'.$error.'</div>';
         echo $result;
     }else{
            
           
            $name = mysqli_real_escape_string($link, $name);
            
            $email = mysqli_real_escape_string($link, $email);
            
            
            
            if(!$referral){
                $sql = "INSERT INTO users(name,email,password,code)
                 values('$name','$email','$password','$code')";
            }else{
                $sql = "INSERT INTO users(name,email,password,code,referral) 
                values('$name','$email','$password','$code','$referral')";
                $sql1 = "UPDATE users SET count= count+1 Where code = '$referral'";
                mysqli_query($link, $sql1);
            }
            if(mysqli_query($link, $sql)){
                echo '<div class="alert alert-success">Thanks'
                . ' for signup.</div>';
            }else{
                echo '<div class="alert alert-warning">unable'
                . ' to add table.'. mysqli_error($link).'</div>';
            }
     }
       }
      ?>
        <div class="container-fluid contain col-sm-offet-1 col-sm-6">
            <h3 class="text-info" style="text-align: center;">Signup Form</h3>
            <form method="post">
           
            <div class="form-group" >
                <label for="name"><strong>Name:</strong></label>
                <input type="text" name="name" id="firstName" class="form-control" 
                       value="<?php if(isset($_POST["submit"])) echo $_POST["name"];?>">
            </div>
            <div class="form-group" >
                <label for="email"><strong>Email:</strong></label>
                <input type="email" name="email" id="email" class="form-control" 
                       value="<?php if(isset($_POST["submit"])) echo $_POST["name"];?>">
            </div>
            <div class="form-group" >
                <label for="password"><strong>Password:</strong></label>
                <input type="password" name="password" id="password" class="form-control" 
                       value="<?php if(isset($_POST["submit"])) echo $_POST["name"];?>">
            </div>
           
           
            
            
            <input type="submit" name="signup" value="SignUP" 
                   class="btn btn-success btn-lg" id="signup">
            
            </form>
        </div>
    </body>
</html>



