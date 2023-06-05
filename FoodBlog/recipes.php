<?php include "session.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Recipes</title>

 <!DOCTYPE html>
<html>
<head>
  <title>Recipes</title>
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
      height: 100px; /
    }
    
    .navbar a {
      float: left;
      color: #fff;
      text-align: center;
      padding: 19px 16px;
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
    
    .recipes-section {
      text-align: center;
      padding-top: 50px;
    }
    
    .recipes-section h1 {
      font-size: 50px;
      margin-top: 0;
    }
    
    .recipe-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 20px;
      justify-items: center;
    }
    
    .recipe-card {
      width: 400px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    .recipe-card img {
      width: 100%;
      height: 300px;
      object-fit: cover;
      border-radius: 5px 5px 0 0;
    }
    
    .recipe-card h2 {
      margin: 10px 0;
    }
      .clickable-heading {
    color: inherit;
    text-decoration: none;
    cursor: pointer;
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
    <div class="recipes-section">
      <h1>RECIPES</h1>
      <div class="recipe-grid">
        <div class="recipe-card">
          <img src="fruit-salad.jpg" alt="Fruit Salad">
          <h2 class="clickable-heading" onclick="location.href='recipes/rs1.php';">Fruit Salad</h2>
        </div>
        <div class="recipe-card">
          <img src="brownies.jpeg" alt="Fudgy brownies">
          <h2 class="clickable-heading" onclick="location.href='recipes/rs2.php';">Fudgy brownies</h2>
        </div>
        <div class="recipe-card">
          <img src="carrot-cake.jpg" alt="Carrot Cake Recipe">
          <h2 class="clickable-heading" onclick="location.href='recipes/rs3.php';">Carrot Cake</h2>
        </div>
        <div class="recipe-card">
          <img src="pesto-pasta.jpg" alt="Pesto Pasta Recipe">
          <h2 class="clickable-heading" onclick="location.href='recipes/rs4.php';">Pesto Pasta</h2>
        </div>
        <div class="recipe-card">
          <img src="Rice.jpg" alt="Rice Omelet">
          <h2 class="clickable-heading" onclick="location.href='recipes/rs5.php';">Rice Omelette</h2>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
