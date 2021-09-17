<?php
if (isset($_POST['login-submit'])) {
  require '../Database/conn.php';
  $user = $_POST['user'];
  $pwd = $_POST['pwd'];
  // FILTER SCRIPT
  $user = filter_var($user, FILTER_SANITIZE_STRING);
  $pwd = filter_var($pwd, FILTER_SANITIZE_STRING);

  if (empty($user) || empty($pwd)) {
    header("Location: /index?error=emptyfields1");
    exit();
  } else {
    //lam gi cai string
    $user = stripslashes($user);
    $pwd = stripslashes($pwd);
    $user = $conn->real_escape_string($user);
    $pwd = $conn->real_escape_string($pwd);
    // $sql = "SELECT * FROM $loginTable WHERE username='$user'";
    $sql = $conn->prepare("SELECT * FROM $loginTable WHERE username = ?;");
    $sql->bind_param('s', $user);
    $sql->execute();
    $result = $sql->get_result();
    $row = $result->fetch_assoc();

    //Trong video thi or day nen them 1 dong if($row = $conn->query($sql)->fetch_assoc())
    $hashPassword = password_hash($row["password"], PASSWORD_DEFAULT);
    // password_verify(string $password, string $hash): bool
    $pwdCheck = password_verify($pwd, $hashPassword);
    if ($pwdCheck == false) {
      header("Location: /index?error=wrongPwd1");
      exit();
    } elseif ($pwdCheck == true) {
      session_start();
      //2 thang nay la nam trong ban login voi 3 cot id, username, password
      $_SESSION['id'] = $row["id"];
      $_SESSION['username'] = $row["username"];
      header("Location: /admin/admin");
      exit();
    } else {
      header("Location: /index?error=wrongPwd2");
      exit();
    }
    $conn->close();
  }
} else {
  header("Location: /index?error=emptyfields2");
  exit();
}
