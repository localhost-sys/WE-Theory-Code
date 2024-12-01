<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: url('https://via.placeholder.com/1500') no-repeat center center fixed;
      background-size: cover;
      height: 100vh;
    }
    .login-container {
      background-color: rgba(255, 255, 255, 0.8);
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      margin: auto;
    }
    .form-control:focus {
      box-shadow: none;
      border-color: #007bff;
    }
    .btn-primary:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="d-flex justify-content-center align-items-center h-100">
    <div class="login-container">
      <h3 class="text-center mb-4">Login</h3>
      <form action="login_action.php" method="POST">
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Login</button>
        <div class="mt-2 text-center">
          <a href="forgot_password.php" class="text-muted">Forgot Password?</a>
        </div>
      </form>
      <div class="mt-3 text-center">
        <a href="signup.php" class="btn btn-link">Don't have an account? Sign Up</a>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
