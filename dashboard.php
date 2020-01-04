<?php include 'database_connect.php'?>
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
    $sql = "SELECT * FROM users";
    $result = mysqli_query($link,$sql);
        
    echo '<table class="table table-stripped">
    <tr>
    <th>Name</th>
    <th>Email</th>
    <th>code</th>
    </tr>';
    while($row=mysqli_fetch_assoc($result)){
        $link= $row['code'];
        $name = $row['name'];
      echo "<tr><td>".$row['name']."</td>
      <td>".$row['email']."</td>
      <td>".$link."
      <button class='btn btn-secondary btn-sm' onclick=copy('$link')>copy</button>
      </td>
      </tr>";
    }
    echo '</table>';
    ?>
    <script>
        function copy(str){
            var el = document.createElement('textarea');
            el.value = "localhost/signup.php?code="+str;
            document.body.appendChild(el);
            el.select();
            document.execCommand('copy');
            document.body.removeChild(el);
            window.alert("text copied");
        }
    </script>
    </html>