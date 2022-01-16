<?php
require_once '../config/config.php';


  $uid = $_POST['uid'];
  $pwd = $_POST['pwd'];

  if (empty($uid) || empty($pwd)) {
    $error =['emptyfields'=>'Please fill in all the fields'];
    echo json_encode($error);
    exit();
  } else {
    $sql = "SELECT * FROM user_tbl WHERE username=?";
    $stmt= mysqli_stmt_init($conn);

      if (!mysqli_stmt_prepare($stmt, $sql)) {
        exit();
      } else {
        mysqli_stmt_bind_param($stmt, "s", $uid);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
          if ($row = mysqli_fetch_assoc($result)) {
            $pwdCheck = password_verify($pwd, $row['password']);

              if ($pwdCheck == false) {
                $error = ['passwordnotmatch' => 'Password do not match'];
                echo json_encode($error);
                exit();
              } elseif ($pwdCheck == true) {
                session_start();
                $_SESSION['id']= $row['userid'];
                $_SESSION['uid']= $row['username'];
                $_SESSION['email']= $row['email'];
                $_SESSION['fullname']= $row['fullname'];
                $error = ['success' => 'success'];
                  echo json_encode($error);
                exit();
              }

          } else {
            $error = ['nouser' => 'No user match detected'];
              echo json_encode($error);
            exit();
          }
      }
  }
  mysqli_stmt_close($stmt);   //closes everything to save resource
  mysqli_close($conn);

 ?>
