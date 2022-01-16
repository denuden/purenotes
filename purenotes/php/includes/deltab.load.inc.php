<?php
require_once '../config/config.php';
session_start();

    $userid = $_SESSION['id'];
    $rows =array();
    //gets data inserted from tab tbl and load it immediatley
        $sql = "SELECT tabname FROM tab_tbl WHERE userid=? ORDER BY tabid ASC";
        $stmt= mysqli_stmt_init($conn);

          if (!mysqli_stmt_prepare($stmt, $sql)) {
            exit();
          } else {
            mysqli_stmt_bind_param($stmt, "i", $userid);
            mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
          while ($row = mysqli_fetch_assoc($result)) {
             $rows[]= $row;
          }
              echo json_encode($rows);
        }
 ?>
