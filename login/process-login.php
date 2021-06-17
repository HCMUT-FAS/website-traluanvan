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
    $sql = "SELECT * FROM $loginTable WHERE username='$user'";
    // $result = $conn->query($sql);
    // $row = $result->fetch_assoc();
    $row = $conn->query($sql)->fetch_assoc();

    //Trong video thi or day nen them 1 dong if($row = $conn->query($sql)->fetch_assoc())
    $hashPassword = password_hash($row["password"], PASSWORD_DEFAULT);
    // password_verify(string $password, string $hash): bool
    $pwdCheck = password_verify($pwd, $hashPassword);
    if ($pwdCheck == false) {
      header("Location: login.php?error=wrongPwd1");
      exit();
    } elseif ($pwdCheck == true) {
      session_start();
      //2 thang nay la nam trong ban login voi 3 cot id, username, password
      $_SESSION['id'] = $row["id"];
      $_SESSION['username'] = $row["username"];
      header("Location: ../index.php?login=success");
      exit();
    } else {
      header("Location: login.php?error=wrongPwd2");
      exit();
    }

    $conn->close();
  }
} else {
  header("Location: ../login.php?error=emptyfields2");
  exit();
}
