<?php
require_once '../config/config.php';
session_start();

$tabname = $_POST['tabname'];
$userid = $_SESSION['id'];
$rows =array();

$sql = "SELECT tabid FROM tab_tbl WHERE tabname=? AND userid=?";
$stmt= mysqli_stmt_init($conn);
//get tabname then id
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, "si", $tabname,$userid);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
        $tabid =$row['tabid'];

//delete with tabid
$sql = 'DELETE FROM tab_tbl WHERE tabid=? AND userid=?';
$stmt= mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, "ii", $tabid,$userid);
    mysqli_stmt_execute($stmt);

    // delete all notes with tabid
$sql = 'DELETE FROM notes_tbl WHERE tabid = ? AND userid = ?';
$stmt= mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, "ii", $tabid,$userid);
    mysqli_stmt_execute($stmt);
    $success = ['success'];
    echo json_encode($success);

      }
    }
  }
}
 ?>
