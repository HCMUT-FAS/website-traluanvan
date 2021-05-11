<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Process</title>
</head>

<body>
  <h1>hello</h1>
  <?php
  // Database info
  $servername = "remotemysql.com";
  $username = "11pvv4O6sJ";
  $password = "NWnV8A7TuL";
  $dbname = "11pvv4O6sJ";
  $port = 3306;
  $table = "luanVan";
  $conn = new mysqli($servername, $username, $password, $dbname, $port);

  $loginTable = "login";
  $user = $_POST['user'];
  $pass = $_POST['password'];

  $user = stripslashes($user);
  $pass = stripslashes($pass);
  $user = $conn->real_escape_string($user);
  $pass = $conn->real_escape_string($pass);

  $sql = "select * from login where username='admin' and password='admin'";
  $result = $conn->query($sql);
  echo $result->num_rows . "<br>";
  $row = $result->fetch_assoc();

  /*
  TASK FOR 12/5/2021
  set cookie for success login and set exspired time

  Watch User Authentication
  */

  if ($user == $row["username"] and $pass == $row["password"]) {
    echo "Login succesfully!";
    //reload to the main page and open admin feature
  } else {
    echo "Wrong username or password";
  }

  $conn->close();
  ?>
</body>

</html>