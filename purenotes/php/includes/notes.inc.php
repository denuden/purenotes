<?php
require_once '../config/config.php';
session_start();

$today = date("Y-m-d");


$tabname = $_POST['tabname'];
$userid = $_SESSION['id'];
$notename = $_POST['notename'];
// gets tabname id
$sql = "SELECT tabid FROM tab_tbl WHERE tabname=?";
$stmt= mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, "s", $tabname);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
        $tabid =$row['tabid'];

// checks if notes are same name
        $sql = "SELECT notename FROM notes_tbl WHERE notename=?"; //checks if uid is taken
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
          exit();
        } else {
          mysqli_stmt_bind_param($stmt, "s", $notename);
          mysqli_stmt_execute($stmt);

          mysqli_stmt_store_result($stmt); //stores result from stmt to stmt
          $result= mysqli_stmt_num_rows($stmt);
            if ($result > 0) {
              $error = ['noteistaken'];
              echo json_encode($error);
              exit();

            }else {
        // inserts it to notes tbl
        $sql = "INSERT INTO notes_tbl (notename,tabid,userid,dateCreated) Values (?,?,?,?)";
        $stmt= mysqli_stmt_init($conn);

          if (!mysqli_stmt_prepare($stmt, $sql)) {
            exit();
          } else {
            mysqli_stmt_bind_param($stmt, "siis", $notename,$tabid,$userid,$today);
            mysqli_stmt_execute($stmt);
          }
        }
      }
    }
  }

// selects recent created then puts it to js to html
$sql = "SELECT notename,dateCreated FROM notes_tbl WHERE userid=? ORDER BY noteid DESC LIMIT 1";
$stmt= mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, "i", $userid);
    mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
  if ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
    echo json_encode($rows);
  }
}




 ?>
