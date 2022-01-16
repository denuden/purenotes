<?php
session_start();
if (!isset($_SESSION['id'])) {
  header("Location: /purenotes");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="/purenotes/js/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="/purenotes/css/nav.css">
