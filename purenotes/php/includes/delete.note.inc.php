<?php
require_once '../config/config.php';
session_start();

$notename = $_POST['notename'];
$userid = $_SESSION['id'];
$rows =array();

$sql = "SELECT noteid FROM notes_tbl WHERE notename=? AND userid=?";
$stmt= mysqli_stmt_init($conn);
//get tabname then id
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, "si", $notename,$userid);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
        $noteid =$row['noteid'];

    // delete notes with tabid
$sql = 'DELETE FROM notes_tbl WHERE noteid = ? AND userid = ?';
$stmt= mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, "ii", $noteid,$userid);
    mysqli_stmt_execute($stmt);
    $success = ['success'];
    echo json_encode($success);
      }
    }
  }

 ?>
