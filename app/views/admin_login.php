<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Login</title>
<style>
* { box-sizing: border-box; font-family: 'Poppins', sans-serif; }
body {
    background: linear-gradient(135deg, #A8E6CF, #56C596);
    height: 100vh; margin: 0;
    display: flex; justify-content: center; align-items: center;
}
.login-container {
    background: #FAFAFA;
    padding: 45px 40px;
    border-radius: 16px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    width: 360px; text-align: center;
}
h2 { color: #00796B; margin-bottom: 25px; font-weight: 600; }
input, button {
    width: 100%; padding: 12px; margin: 8px 0;
    border-radius: 8px; border: 1px solid #ccc;
    font-size: 15px; outline: none;
}
input:focus {
    border-color: #56C596; box-shadow: 0 0 4px rgba(86, 197, 150, 0.5);
}
button {
    background: #56C596; color: white; border: none;
    cursor: pointer; font-weight: 600; transition: 0.3s ease;
}
button:hover { background: #3AAE85; }
p.message { color: #D32F2F; font-size: 14px; margin-top: 10px; }
a { color: #00796B; text-decoration: none; font-size: 14px; }
a:hover { text-decoration: underline; }
</style>
</head>
<body>
<div class="login-container">
    <h2>Admin Login</h2>
    <form method="POST" autocomplete="off" action="<?= site_url('admin/login') ?>">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    <?php if (!empty($msg)): ?>
        <p class="message"><?= htmlspecialchars($msg) ?></p>
    <?php endif; ?>
    <a href="<?= site_url() ?>">← Back to Home</a>
</div>
</body>
</html>
