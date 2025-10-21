<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Online Voting System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(120deg, #1db954, #191414);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-box {
            background: rgba(0,0,0,0.8);
            padding: 30px;
            border-radius: 12px;
            width: 350px;
            text-align: center;
        }
        h2 { color: #1db954; }
        input[type=text], input[type=password] {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 6px;
        }
        button {
            background: #1db954;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        button:hover { background: #17a84a; }
        .error { color: #ff5c5c; font-size: 14px; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Admin Login</h2>
        <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
        <form method="POST" action="<?= site_url('admin/login'); ?>">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
</body>
</html>
