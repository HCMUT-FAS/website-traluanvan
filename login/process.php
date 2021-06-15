
<?php

if (isset($_POST['login-submit'])) {
  require '../Database/conn.php';
  $user = $_POST['user'];
  $pass = $_POST['pwd'];

  if (empty($user) || empty($pass)) {
    header("Location: login.php?error=emptyfields1");
    exit();
  } else {
    //lam gi cai string
    $user = stripslashes($user);
    $pass = stripslashes($pass);
    $user = $conn->real_escape_string($user);
    $pass = $conn->real_escape_string($pass);
    $sql = "select * from $loginTable where username='$user' and password='$pass'";
    // $result = $conn->query($sql);
    // $row = $result->fetch_assoc();
    $row = $conn->query($sql)->fetch_assoc();


  /*
  TASK FOR 12/5/2021
  set cookie for success login and set expired time
  */

    if ($user == $row["username"] and $pass == $row["password"]) {
      echo "Login succesfully!";
      //reload to the main page and open admin feature
    } else {
      header("Location: login.php?error=wrong");
      exit();
    }

    $conn->close();
  }
} else {
  header("Location: ../login.php?error=emptyfields2");
  exit();
}
?>
