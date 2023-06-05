<?php
require_once('db_connect.php');
session_start();

$error = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve and sanitize user input
    $username = sanitizeInput($_POST["username"]);
    $password = sanitizeInput($_POST["password"]);

    // Validate input
    if (!preg_match("/^[a-zA-Z0-9]+$/", $username)) {
        $error = "Invalid characters in username. Only letters and numbers are allowed.";
    } else if (strlen($password) < 8) {
        $error = "Password should be at least 8 characters long.";}
    else if (strlen($username) < 4) {
    $error = "Password should be at least 4 characters long.";}
    elseif (empty($username) || empty($password)) {
        $error = "Please fill in all fields.";
    } else if (is_numeric($username)) {
    $error = "Username cannot contain only numbers.";
    }	 else {
        // Check if username already exists
        $query = "SELECT * FROM users WHERE username=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $error = "Username already taken. Please choose a different username.";
        } else {
            $query = "INSERT INTO users (username, password, salt) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        
        // Generate a random salt
        $salt = bin2hex(random_bytes(16));

        // Combine the salt and password
        $saltedPassword = $salt . $password;

        // Hash the salted password
        $hashedPassword = password_hash($saltedPassword, PASSWORD_DEFAULT);

        $stmt->bind_param("sss", $username, $hashedPassword, $salt);

        if ($stmt->execute()) {
            header("Location: home.php");
            exit();
        } else {
            $error = "Error occurred while registering. Please try again.";
        }
    }
}}

function sanitizeInput($input)
{
    global $conn;
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    $input = $conn->real_escape_string($input);
    return $input;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup Page</title>
    
</head>
  <style>
           body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h1 {
            text-align: center;
        }

        form {
            margin-top: 20px;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"] {
            width: 50%;
            padding: 10px;
            border: 1px solid #dddddd;
            border-radius: 3px;
        }

        input[type="submit"] {
            width: 10%;
            padding: 10px;
            background-color: #4caf50;
            color: #ffffff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            
        }
  </style>

      <script>
        function validateForm() {
            var username = document.forms["signupForm"]["username"].value;
            var password = document.forms["signupForm"]["password"].value;

            if (username === "" || password === "") {
                alert("Please fill in all fields.");
                return false;
            }

            if (!/^[a-zA-Z0-9]+$/.test(username)) {
                alert("Invalid characters in username. Only letters and numbers are allowed.");
                return false;
            }

             if (password.length < 8) {
                alert("Password should be at least 8 characters long.");
                return false;
            }

            return true;
        }
    </script>

<body>
    <h1>Signup</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  onsubmit="return validateForm()">
        
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br><br>
        <?php if ($error !== ''): ?>
        <?php echo $error; ?>
        <?php endif; ?><br><br>
        
        <input type="submit" value="Sign Up">
        <br><br><a href="login.php">Click here to log in!</a>
    </form>
</body>

</html>

<?php
// Close the database connection
mysqli_close($conn);
?>