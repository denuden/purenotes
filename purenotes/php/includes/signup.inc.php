<?php
require_once '../config/config.php';


    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdrepeat = $_POST["pwdrepeat"];

// echo ($fullname.$email.$uid.$pwd.$pwdrepeat);
    if (empty($fullname) || empty($email) || empty($uid) || empty($pwd) || empty($pwdrepeat)){
      $error = ['emptyfields' => 'Please fill in all the fields'];
      echo json_encode($error);
      exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error = ['invalidemail' => 'Email is invalid'];
      echo json_encode($error);
      exit();
    } elseif (!preg_match("/^[a-zA-Z0-9]*$/",$uid) && strlen($uid) > 30) {
      $error = ['invalidusername' => 'Username is invalid or too long(max 30)'];
      echo json_encode($error);
      exit();
    } elseif ($pwd !== $pwdrepeat) {
      $error = ['passwordnotmatch' => 'Password do not match'];
      echo json_encode($error);
      exit();
    } else {


      $sql = "SELECT username FROM user_tbl WHERE username=?"; //checks if uid is taken
      $stmt = mysqli_stmt_init($conn);


      if (!mysqli_stmt_prepare($stmt, $sql)) {
        exit();
      } else {
        mysqli_stmt_bind_param($stmt, "s", $uid);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_store_result($stmt); //stores result from stmt to stmt
        $result= mysqli_stmt_num_rows($stmt);
          if ($result > 0) {
            $error = ['usernametaken' => 'Username already taken'];
            echo json_encode($error);
            exit();
          } else {
            $sql = "INSERT INTO user_tbl (fullname,email,username,password) VALUES (?,?,?,?)";
            $stmt= mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
              exit();
            } else {
              $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

              mysqli_stmt_bind_param($stmt, "ssss", $fullname,$email,$uid,$hashedPwd);
              mysqli_stmt_execute($stmt);


//
              $sql = "SELECT * FROM user_tbl WHERE username=?";  //immediately transfer to another page with session started
              $stmt= mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                  exit();
                } else {
                  mysqli_stmt_bind_param($stmt, "s", $uid);
                  mysqli_stmt_execute($stmt);

                  $result = mysqli_stmt_get_result($stmt); //gets result from stmt to $result
                    if ($row = mysqli_fetch_assoc($result)) {
                          session_start();
                          $_SESSION['id']= $row['userid'];
                          $_SESSION['uid']= $row['username'];
                          $_SESSION['email']= $row['email'];
                          $_SESSION['fullname']= $row['fullname'];

                          $error = ['success' => 'success'];
                            echo json_encode($error);
                            exit();
                        } else {
                            exit();
                    }
                }
              exit();
            }
          }
      }
    }
    mysqli_stmt_close($stmt);   //closes everything to save resource
    mysqli_close($conn);

 ?>
