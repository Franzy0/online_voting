<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Voter Login</title>
    <style>
        body {
            background: linear-gradient(120deg, #1db954, #191414);
            color: white;
            font-family: Arial, sans-serif;
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
        input {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 6px;
            border: none;
        }
        button {
            background: #1db954;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
        }
        button:hover { background: #17a84a; }
        .error { color: #ff5c5c; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Voter Login</h2>
        <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
        <form method="POST" action="<?= site_url('voter/login'); ?>">
            <input type="text" name="voter_id" placeholder="Voter ID" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
</body>
</html>
