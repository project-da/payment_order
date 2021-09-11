<?php

  include('./conn/config.php');
  ?> 
  <!DOCTYPE html>
  <html>
  <title>payment order</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="style.css"></link>
  <body>
  
  <!-- Sidebar -->
  <div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
    <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
    <a href="Manager_view.php" class="w3-bar-item w3-button">ALL PO'S</a>
    <a href="Manager_pre.php" class="w3-bar-item w3-button">ALL PREVIEW </a>
    <a href="logout.php" class="w3-bar-item w3-button">LOGOUT</a>
  </div>
  
  <!-- Page Content -->
  <div class="w3-teal">
    <button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">☰</button>
   
  </div>
  
  
  
  <script>
  function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
  }
  
  function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
  }
  </script>
       
  </body>
  </html> 