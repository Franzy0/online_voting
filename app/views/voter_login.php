<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Voter Login</title>
<style>
body {
    background: linear-gradient(135deg, #8DE3D0, #4DC0B5);
    height: 100vh; display: flex; justify-content: center; align-items: center;
    font-family: 'Poppins', sans-serif;
}
.container {
    background: white; padding: 40px 45px; border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    width: 350px; text-align: center;
}
h2 { color: #00796B; margin-bottom: 25px; }
input, button {
    width: 100%; padding: 12px; margin: 10px 0;
    border-radius: 8px; border: 1px solid #ccc; font-size: 15px;
}
button {
    background: #56C596; color: white; border: none; cursor: pointer;
    font-weight: 600;
}
button:hover { background: #3AAE85; }
p.message { color: #D32F2F; font-size: 14px; }
a { color: #00796B; text-decoration: none; }
a:hover { text-decoration: underline; }
</style>
</head>
<body>
<div class="container">
    <h2>Voter Login</h2>
    <form method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    <?php if (!empty($msg)): ?>
        <p class="message"><?= htmlspecialchars($msg) ?></p>
    <?php endif; ?>
    <p><a href="<?= BASE_URL ?>">Back to Home</a></p>
</div>
</body>
</html>
