<?php
require_once('db_connect.php');
session_start();

$error = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve and sanitize user input
    $username = sanitizeInput($_POST["username"]);
    $password = sanitizeInput($_POST["password"]);

    // Validate input
    if (empty($username) || empty($password)) {
        $error = "Please fill in all fields.";
    } else {
        // Perform SQL query to check if the credentials are valid
        $query = "SELECT * FROM users WHERE username=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
                
	      // Get the salt from the database
       		 $salt = $row['salt'];

       	      // Combine the salt and password
        	$saltedPassword = $salt . $password;

       
            if (password_verify($saltedPassword, $row['password'])) {


                $sessionID = bin2hex(random_bytes(32));
                
                
            // Set session variable to store the session ID
                $_SESSION['sessionID'] = $sessionID;

            // Set a cookie to store the session ID in the user's browser, expires in 1 day (86400 seconds)
                $cookieName = "userSessionID";
                $cookieValue = $sessionID;
                $cookieExpiration = time() + 86400;
                $cookiePath = "/";
                $secure = true; // Set to true for HTTPS-only cookies
                $httpOnly = true; // Set to true to make the cookie accessible only through the HTTP protocol

                setcookie($cookieName, $cookieValue, $cookieExpiration, $cookiePath, "", $secure, $httpOnly);
                
                header("Location: home.php");
                exit();
            } else {
                $error = "Invalid username or password.";
            }
        } else {
            $error = "Invalid username or password.";
        }
    }
}

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
    <title>Login Page</title>
<style >
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
            var username = document.forms["loginForm"]["username"].value;
            var password = document.forms["loginForm"]["password"].value;

            if (username === "" || password === "") {
                alert("Please fill in all fields.");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <h1>Login</h1>
   
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateForm()">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br><br> <?php if ($error !== ''): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
        <br>
        <input type="submit" value="Login">
        <br><br>doesn't have an account?<br><br><a href="signup.php">Click here to sign up!</a>
    </form>
</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>