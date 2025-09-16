<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WMSU ILS Attendance Tracking</title>
    <style>
        body {
            background: url('./images/shs.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
          }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }
        h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        img {
            width: 80px;
            margin-bottom: 10px;
          }
        .name-fields {
            display: flex;
            gap: 10px;
        }
        .name-fields .form-group {
            flex: 1;
        }
        button {
            background-color: #d00;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            margin-top: 10px;
        }
        button:hover {
            background-color: #d43939;
        }
        .login-link {
            margin-top: 20px;
            color: #666;
        }
        .login-link a {
            color: #d00;
            text-decoration: none;
        }
        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>WMSU ILS Attendance Tracking</h3>
        <img src="./images/logo.jpg" alt="logo">
        
        <h2>Sign Up</h2>
        
        <div class="name-fields">
            <div class="form-group">
                <label for="firstname">Firstname</label>
                <input type="text" id="firstname" placeholder="Firstname">
            </div>
            <div class="form-group">
                <label for="lastname">Lastname</label>
                <input type="text" id="lastname" placeholder="Lastname">
            </div>
        </div>
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" placeholder="Email">
        </div>
        
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" placeholder="Password">
        </div>
        
        <button type="submit">Sign Up</button>
        
        <div class="login-link">
            Already have an account? <a href="signin.php">Login here</a>
        </div>
    </div>
</body>
</html>