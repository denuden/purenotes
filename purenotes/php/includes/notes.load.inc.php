<?php
require_once '../config/config.php';
session_start();

$name = $_POST['name'];
$section = $_POST['section'];
$rows =array();

$sql = "SELECT studid FROM studtbl WHERE name=?";
$stmt= mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, "s", $name);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
        $studid =$row['studid'];

        }

        $sql = "INSERT INTO teachertbl (name,studid,section) Values (?,?,?)";
        $stmt= mysqli_stmt_init($conn);

          if (!mysqli_stmt_prepare($stmt, $sql)) {
            exit();
          } else {
            mysqli_stmt_bind_param($stmt, "siis", $name,$studid,$section);
            mysqli_stmt_execute($stmt);
          }
    }
  }
}
 ?>
