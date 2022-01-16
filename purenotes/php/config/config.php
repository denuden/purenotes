<?php
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'purenotes');
define('DB_HOST', 'localhost');


//Create connection
  $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME); //config file

//check connection
if (mysqli_connect_errno() ) {
// code...
console.log(' mysqli_connect_errno()');
echo"fail to connect";
}
 ?>
