<?php include "..\session.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Recipe Details</title>
    <style>
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
      <h1>Carrot Cake</h1>
      
      <div class="recipe-section">
        <h2>Duration</h2>
        <p>Preparation Time: 29 minutes</p>
        <p>Cooking Time: 30 minutes</p>
      </div>
      
<div class="recipe-section">
  <h2>Ingredients</h2>
  <p>
  <ul>
    <li>2 cups all-purpose flour</li>
    <li>2 cups grated carrots</li>
    <li>1 cup granulated sugar</li>
    <li>1 cup vegetable oil</li>
    <li>4 large eggs</li>
    <li>1 teaspoon baking powder</li>
    <li>1 teaspoon baking soda</li>
    <li>1 teaspoon ground cinnamon</li>
    <li>1/2 teaspoon ground nutmeg</li>
    <li>1/2 teaspoon salt</li>
    <li>1/2 cup crushed pineapple, drained (optional)</li>
    <li>1/2 cup chopped walnuts or pecans (optional)</li>
  </ul>
  <p>
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
        $sql = "SELECT * FROM comment WHERE recipe_num='3'";
        $result = $conn->query($sql);

        // Display each comment
        if ($result->num_rows > 0) {
            
            while ($row = $result->fetch_assoc()) {
                
                echo "<p>" . htmlspecialchars($row['comment_date']) . " " . $row['comment'] ."</p>";
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
            $num=3;
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
