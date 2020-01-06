<?phpsession_start()?>
<?php include 'database_connect.php'?>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
         <title>SignUP</title>
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
            $id = $_GET["id"];
            $sq = "SELECT * FROM users WHERE id ='$id'";
           $result=mysqli_query($link,$sq);
            $row=mysqli_fetch_assoc($result);

       if(isset($_POST["edit"])){
       
        
          $name = $_POST["name"];
           
           $email = $_POST["email"];
           $password = $_POST["password"];
        
           $invalidEmail = "<p>Please enter valid email!</p>";
           $filename = $_FILES['file']['name'];
           $filesize = $_FILES['file']['size'];
           $fileerror = $_FILES['file']['error'];
           $filetype = $_FILES['file']['type'];
           $temp = $_FILES['file']['tmp_name'];
           $pd = "images/.$filename";
           $allowed = array("image/jpg","image/jpeg","image/png");
           $error = "";
           if($filename){
               if(!in_array($filetype,$allowed))
               $error.="<p>Please upload a photo only</P>";
            }
           
          
         
           
           if($name){
               
            $name = filter_var($name,FILTER_SANITIZE_STRING);
            $sql = "UPDATE users SET name='$name' WHERE id='$id'";
            mysqli_query($link,$sql); 
           }
            
           if($email){
               $_SESSION["email"]=$email;
            $email = filter_var($email,FILTER_SANITIZE_STRING);
               if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                   $error .= $invalidEmail;
               }else{
                $sql = "UPDATE users SET email ='$email' WHERE id='$id'";
                mysqli_query($link,$sql);
               }
            }
           
           if($password){
            $password = md5($password);
            $_SESSION["pass"]=$password;
            $sql = "UPDATE users SET password='$password' WHERE id='$id'";
            mysqli_query($link,$sql); 
            }
             
        
           

          
    if($error){
         $result = '<div class="alert alert-warning">'.$error.'</div>';
         echo $result;
    }else{
                if(!($fileerror==4)){
                    $sql = "UPDATE users SET pic_url='$pd' WHERE id='$id'";
                    mysqli_query($link,$sql);
                    move_uploaded_file($temp,$pd);

                }
                    if($email)
                 header("Location:dashboard.php?emailid=$email");
                 else if($password)
                 header("Location:dashboard.php?pass=$password");
                 else
                 header("Location:dashboard.php");
                 
            }
       }
      ?>
      <?php ?>
        <div class="container-fluid contain col-sm-offet-1 col-sm-6">
            <h3 class="text-info" style="text-align: center;">Edit profile</h3>
            <form method="post" enctype="multipart/form-data">
           
            <div class="form-group" >
                <label for="name"><strong>Name:</strong></label>
                <input type="text" name="name" id="firstName" class="form-control" 
                       value="<?php  echo $row["name"];?>">
            </div>
            <div class="form-group" >
                <label for="email"><strong>Email:</strong></label>
                <input type="email" name="email" id="email" class="form-control" 
                       value="<?php  echo $row["email"];?>">
            </div>
            <div class="form-group" >
                <label for="password"><strong>Password:</strong></label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group" >
                <label for="file"><strong>Add/change profile picture</strong></label>
                <input type="file" name="file" id="file" >
            </div>
           
            
            
            <input type="submit" name="edit" value="OK" 
                   class="btn btn-info" id="edit">
                    
         
            
            </form>
        </div>
    </body>
</html>