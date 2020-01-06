<!Doctype html>
<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
         <title>Dashboard</title>
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
    <?php
session_start();
$_SESSION["id"]=0;
?>
    <div class="fluid-container contain col-sm-offet-1 col-sm-6">
    <form method="post" action="dashboard.php">
    <div class="form-group">
    <label for="email"><strong>email:</strong></label>
    <input type="email" id= "email" name="email" class="form-control">
    </div>
    <div class="form-group">
    <label for="password"><strong>password:</strong></label>
    <input type="password" id= "password" name="password" class="form-control">
    </div>
    <button class= "btn btn-success" id="login" name="login">Login</button>
    </form>
    </div>
</html>