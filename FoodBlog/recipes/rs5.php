<?php include "..\session.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Recipe Details</title>
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
    
    .recipe-details {
      text-align: center;
      padding-top: 50px;
    }
    
    .recipe-details h1 {
      font-size: 80px;
      margin-top: 0;
    }
    
    .recipe-section {
      background-color: #f9f9f9;
      padding: 20px;
      margin-top: 20px;
      border-radius: 5px;
    }
    
    .recipe-section h2 {
      font-size: 60px;
      margin-bottom: 10px;
    }
    
    .recipe-section p {
      font-size: 30px;
      margin-bottom: 20px;
    }

    .recipe-section ul {
      font-size: 30px;
      margin-bottom: 20px;
    }

    .recipe-section ol {
      font-size: 30px;
      margin-bottom: 20px;
    }
    
    .comment-section {
      margin-top: 20px;
      padding: 20px;
      background-color: #f9f9f9;
      border-radius: 5px;
    }
    
       .comment-section p {
      font-size: 30px;
      margin-bottom: 20px;
    }
    .comment-section textarea {
      width: 100%;
      padding: 10px;
      font-size: 30px;
      border-radius: 5px;
      border: 1px solid #ccc;
      resize: vertical;
      height: 200px;
    }
     .comment-section h2 {
      font-size: 60px;
      margin-bottom: 10px;
    
    }
    
    .comment-section button {
      margin-top: 10px;
      padding: 10px 20px;
      background-color: #4caf50;
      color: #fff;
      font-size: 30px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="navbar">
    <a href="home.html">Home</a>
    <a href="recipes.html">Recipes</a>
    <a href="..\about.php">About</a>
    <a href="logout.php">Logout</a>
  </div>
  
  <div class="content">
    <div class="recipe-details">
      <h1>Rice Omelette</h1>
      
      <div class="recipe-section">
        <h2>Duration</h2>
        <p>Preparation Time: 29 minutes</p>
        <p>Cooking Time: 30 minutes</p>
      </div>
      
<div class="recipe-section">
  <h2>Ingredients</h2>
  <ul>
    <li>2 cups cooked rice (preferably chilled or leftover rice)</li>
    <li>3-4 large eggs</li>
    <li>1/2 cup diced cooked chicken or any preferred protein (optional)</li>
    <li>1/2 cup diced vegetables (such as onions, bell peppers, carrots, peas)</li>
    <li>2 tablespoons cooking oil</li>
    <li>2 tablespoons ketchup</li>
    <li>Salt and pepper to taste</li>
    <li>Optional toppings: cherry tomatoes, sliced grilled chicken, or sautéed vegetables</li>
  </ul>
</div>

<div class="recipe-section">
  <h2>Instructions</h2>
  <ol>
    <li>Heat 1 tablespoon of cooking oil in a large non-stick skillet or frying pan over medium heat.</li>
    <li>Add the diced vegetables to the pan and sauté until they are softened and lightly browned. If using cooked chicken or other protein, add it to the pan and cook until heated through.</li>
    <li>Add the cooked rice to the pan and break up any clumps using a spatula. Stir-fry the rice with the vegetables and protein for a few minutes until everything is well combined and heated through.</li>
    <li>Push the rice mixture to one side of the pan, creating a space for the omelette.</li>
    <li>In a bowl, crack the eggs and beat them lightly. Season with salt and pepper.</li>
    <li>Add the remaining 1 tablespoon of cooking oil to the empty side of the pan. Pour the beaten eggs into the oil.</li>
    <li>Allow the eggs to cook for a few seconds until they start to set around the edges.</li>
    <li>Using a spatula, gently fold the partially cooked eggs over the rice mixture, creating a half-moon shape. The eggs will continue to cook and set as you fold them.</li>
    <li>Cook the omelette for an additional minute or until the eggs are fully cooked but still slightly soft and fluffy.</li>
    <li>Carefully slide the rice omelette onto a serving plate.</li>
    <li>Drizzle the ketchup over the top of the omelette, or you can draw patterns or write words with the ketchup if desired.</li>
    <li>Garnish with chopped green onions or parsley for added freshness and flavor.</li>
    <li>Serve the rice omelette hot and enjoy!</li>
  </ol>
</div>

<div class="comment-section">
  <h2>Comments</h2>
  <?php
  $servername = "localhost";
  $username = "zahra";
  $password = "1234";
  $dbname = "project";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

// Retrieve comments from the database
        $sql = "SELECT * FROM comment WHERE recipe_num='5'";
        $result = $conn->query($sql);

        // Display each comment
        if ($result->num_rows > 0) {
            
            while ($row = $result->fetch_assoc()) {
                
                echo "<p>" . htmlspecialchars($row['comment_date']) . " " . htmlspecialchars($row['comment']) ."</p>";
            }
        } else {
            echo "<p>No comments found.</p>";
        }

        // Handle comment submission
        if (isset($_POST['submit'])) {
            $comment = $_POST['comment'];
	    $comment = trim($comment);
      	    $comment = stripslashes($comment);
            $comment = mysqli_real_escape_string($conn, $comment);
            $currentDate = date('Y-m-d'); 
            $num=5;
            // Prepare and bind the statement
             $stmt = $conn->prepare("INSERT INTO comments (comments, comment_date, recipe_num) 	     VALUES (?, ?, ?)");
      	     $stmt->bind_param("ssi", $comment, $currentDate, $num);
            // Insert the comment into the database
             // Execute the statement
      if ($stmt->execute()) {
          // Refresh the page to display the new comment
          header("Location: rs1.php");
          exit();
      } else {
          echo "Error: " . $stmt->error;
      }
      
      // Close the statement
      $stmt->close();
        }

        // Close the database connection
        $conn->close();
        ?>
  <div>
  <form method="POST" action="">
    <textarea name="comment" placeholder="Enter your comment"></textarea>
    <button type="submit" name="submit">Submit</button>
  </form>
</div>
    </div>
  </div>
</body>
</html>

