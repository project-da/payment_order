<?php
$host="localhost";
$uname="root";
$upass="";
$link=mysqli_connect($host,$uname,$upass,"po_db");
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
  }
  ?>


