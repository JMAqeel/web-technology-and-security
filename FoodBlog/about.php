<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

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

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #ddd;
}
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}

.about-section {
  padding: 50px;
  text-align: center;
  background-color: #474e5d;
  color: white;
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}


@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}
</style>
</head>
<body>
  <div class="navbar">
    <a href="home.php">Home</a>
    <a href="recipes.php">Recipes</a>
    <a href="about.php">About us</a>
    <a href="logout.php">Logout</a>
  </div>


<div class="about-section">
  <h1>About Us</h1>
  <p>Welcome To Our Website.</p>
  <p>We Pride Ourselves On Providing The Best Recipes Ever.</p>
</div>

<h2 style="text-align:center">Our Team</h2>
<div class="row">
  <div class="column">
    <div class="card">

      <div class="container">
        <h2>Maryam </h2>
        <p class="title">Founder</p>
        <p>maryam@gmail.com</p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">

      <div class="container">
        <h2>Alana </h2>
        <p class="title">Founder</p>
        <p>Alana@gmail.com</p>
      </div>
    </div>
  </div>
  
  <div class="column">
    <div class="card">

      <div class="container">
        <h2>Zahra </h2>
        <p class="title">Founder</p>
        <p>Zahra@gmail.com</p>
      </div>
    </div>
  </div>
</div>
  

<div class="row">
  <div class="column">
    <div class="card">

      <div class="container">
        <h2>Juri </h2>
        <p class="title">Founder</p>
        <p>Juri@gmail.com</p>
      </div>
    </div>
  </div>
  
    <div class="column">
    <div class="card">

      <div class="container">
        <h2>Noor </h2>
        <p class="title">Founder</p>
        <p>noor@gmail.com</p>
      </div>
    </div>
  </div>
</div>


</body>
</html>