<?php
require_once '../config/config.php';
session_start();

  $notename = $_POST['notename'];
  $noteText = $_POST['noteText'];
  $userid = $_SESSION['id'];


      $sql = "UPDATE notes_tbl SET noteText=? WHERE userid=? AND notename=?";
      $stmt= mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
          exit();
        } else {
          mysqli_stmt_bind_param($stmt, "sis", $noteText,$userid,$notename);
          mysqli_stmt_execute($stmt);
          $success= ['success'];
          echo json_encode($success);
        }
 ?>
