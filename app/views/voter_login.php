<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Voter Login</title>
<style>
body {
    font-family: 'Poppins', sans-serif;
    background: #f0f7f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}
.login-box {
    background: #fff;
    padding: 30px 40px;
    border-radius: 12px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    text-align: center;
}
input, button {
    width: 100%;
    padding: 10px;
    margin-top: 12px;
    border-radius: 8px;
    border: 1px solid #ccc;
    font-size: 15px;
}
button {
    background: #3AAE85;
    color: white;
    border: none;
    cursor: pointer;
    font-weight: 600;
}
button:hover { background: #329b75; }
.message { margin-top: 15px; color: #d33; font-weight: 500; }
</style>
</head>
<body>
<div class="login-box">
    <h2>Voter Login</h2>
    <form method="POST" autocomplete="off">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    <?php if (!empty($msg)): ?>
        <p class="message"><?= htmlspecialchars($msg) ?></p>
    <?php endif; ?>
</div>
</body>
</html>
