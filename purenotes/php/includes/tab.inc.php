<?php
require_once '../config/config.php';
session_start();

$title = $_POST['title'];
$userid = $_SESSION['id'];

$sql = "SELECT tabname FROM tab_tbl WHERE tabname=?"; //checks if uid is taken
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
  exit();
} else {
  mysqli_stmt_bind_param($stmt, "s", $title);
  mysqli_stmt_execute($stmt);

  mysqli_stmt_store_result($stmt); //stores result from stmt to stmt
  $result= mysqli_stmt_num_rows($stmt);
    if ($result > 0) {
      $error = ['tabnametaken'];
      echo json_encode($error);
      exit();
    } else {
    $sql = "INSERT INTO tab_tbl (tabname,userid) Values (?,?)";
    $stmt= mysqli_stmt_init($conn);

      if (!mysqli_stmt_prepare($stmt, $sql)) {
        exit();
      } else {
        mysqli_stmt_bind_param($stmt, "si", $title,$userid);
        mysqli_stmt_execute($stmt);

    //gets data inserted from tab tbl
        $sql = "SELECT * FROM tab_tbl WHERE userid=? ORDER BY tabid DESC LIMIT 1";
        $stmt= mysqli_stmt_init($conn);

          if (!mysqli_stmt_prepare($stmt, $sql)) {
            exit();
          } else {
            mysqli_stmt_bind_param($stmt, "i", $userid);
            mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
          if ($row = mysqli_fetch_assoc($result)) {
            $parseTitle = $row['tabname'];
            echo json_encode($parseTitle);
          }
        }
      }
    }
  }
 ?>
