<?php include 'database_connect.php'?>
<?php session_start();?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
         <title>Dashboard</title>
         <meta name="viewport" content="width=device-width,initial-scale=1">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
         <style>
            
         </style>
    </head>
    <?php
    if(isset($_POST["login"])){
        $_SESSION["id"]=1;
        $_SESSION["email"] = $_POST["email"];
        $givenpassword = $_POST["password"];
        $givenpassword = md5($givenpassword);
        $_SESSION["pass"]= $givenpassword;
        
    }
    if($_SESSION["id"]==1)
{   $email = $_SESSION["email"];
    $givenpassword = $_SESSION["pass"];
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($link,$sql);
    $row=mysqli_fetch_assoc($result);
    $password = $row["password"];
    if($givenpassword==$password){
        $link= $row['code'];
        echo "<table class='table table-stripped'>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>code</th>
    </tr>
    <tr>
      <td>".$row['name']."</td>
      <td>".$row['email']."</td>
      <td>".$link."
      <button class='btn btn-secondary btn-sm' onclick=copy('$link')>copy</button>
      </td>
    </tr>
    
    </table>";
    echo '
    <button class="btn btn-danger" id="logout" onclick=logout()>Logout</button>
    ';
    $count = $row["count"];
    if($count>15){
        echo 'You are eligible for a good offer';
    }
    }else{
        echo '<div class="alert alert-warning">Password did not match.</div>';
    }
        
}else{
    echo '<div class="alert alert-danger">Please login.</div>';
}


?>
    <script>
        function copy(str){
            var el = document.createElement('textarea');
            el.value = "localhost/signup.php?code="+str;
            document.body.appendChild(el);
            el.select();
            document.execCommand('copy');
            document.body.removeChild(el);
             window.alert("code copied");
        }
       

        function logout(){
         document.write("<?php $_SESSION["id"]=0 ?>");
   }
    </script>
 
    </html>