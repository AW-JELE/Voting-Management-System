<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>SRC ELECTIONS</title>

  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Arial', sans-serif;
      background: linear-gradient(45deg, #FF6B6B, #556270);
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    #login-container {
      text-align: center;
      background-color: rgba(255, 255, 255, 0.8);
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    h1 {
      color: #434343;
    }

    button {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin: 10px;
    }

    button:hover {
      background-color: #45a049;
    }
  </style>
</head>

<body>

  <div id="login-container">
    <h1>SRC ELECTIONS</h1>
    <button onclick="redirectToLogin('admin')">Login as Admin</button>
    <button onclick="redirectToLogin('student')">Login as Student</button>
  </div>

  <script>
    function redirectToLogin(userType) {
      if (userType === 'admin') {
        window.location.href = 'login.php';
      } else if (userType === 'student') {
        window.location.href = 'voter_in.php';
      }
    }
  </script>

</body>

</html>
