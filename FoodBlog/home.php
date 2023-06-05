<?php include "session.php"; ?>

<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 0;
    }
    
    .navbar {
      background-color: #333;
      overflow: hidden;
      height: 100px; 
    }
    
    .navbar a {
      float: left;
      color: #fff;
      text-align: center;
      padding: 20px 16px;
      text-decoration: none;
      font-size: 40px;
    }
    
    .navbar a:hover {
      background-color: #ddd;
      color: #333;
    }
    
    .content {
      padding: 20px;
    }
    
    h1 {
      margin-top: 0;
    }

        body {
      font-family: Arial, sans-serif;
      background-image: url('home.jpg');
      background-size: cover;
      background-position: center;
      margin: 0;
      padding: 0;
    }
    
    .welcome-message {
      text-align: center;
      color: #fff;
      font-size: 48px;
      margin-top: 40vh;
    }
  </style>
</head>
<body>
  <div class="navbar">
    <a href="home.php">Home</a>
    <a href="recipes.php">Recipes</a>
    <a href="about.php">About</a>
     <a href="logout.php">Logout</a>
  </div>
  
  <div class="content">

  <div class="welcome-message">
    <h1>Welcome to our Website!</h1>
  </div>

  </div>
</body>
</html>
