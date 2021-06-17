<?php
if (isset($_POST['login-submit'])) {
  require '../Database/conn.php';
  $user = $_POST['user'];
  $pwd = $_POST['pwd'];

  if (empty($user) || empty($pwd)) {
    header("Location: login.php?error=emptyfields1");
    exit();
  } else {
    //lam gi cai string
    $user = stripslashes($user);
    $pwd = stripslashes($pwd);
    $user = $conn->real_escape_string($user);
    $pwd = $conn->real_escape_string($pwd);
    $sql = "SELECT * FROM $loginTable WHERE username='$user' AND PASSWORD='$pwd'";
    // $result = $conn->query($sql);
    // $row = $result->fetch_assoc();
    $row = $conn->query($sql)->fetch_assoc();

    if ($user == $row["username"] and $pwd == $row["password"]) {
      echo "Login succesfully!";
      // session_start();
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
