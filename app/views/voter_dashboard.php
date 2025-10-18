<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Voting Dashboard</title>
<style>
body {
    background: #f5f5f5;
    font-family: 'Poppins', sans-serif;
    margin: 0;
}
header {
    background: linear-gradient(135deg, #4DC0B5, #56C596);
    color: white; padding: 20px; text-align: center;
}
.container { padding: 40px; text-align: center; }
.card {
    background: white; padding: 25px; border-radius: 10px;
    margin: 15px auto; width: 300px;
    box-shadow: 0 5px 10px rgba(0,0,0,0.1);
}
button {
    background: #56C596; border: none; color: white; padding: 10px 15px;
    border-radius: 8px; cursor: pointer; margin-top: 10px;
}
button:hover { background: #3AAE85; }
p.msg { color: #00796B; font-weight: 600; }
.logout { position: absolute; top: 20px; right: 25px; color: white; text-decoration: none; }
.logout:hover { text-decoration: underline; }
</style>
</head>
<body>
<header>
    <h2>Welcome, <?= htmlspecialchars($voter_name) ?> 👋</h2>
    <a href="<?= site_url('voter/logout') ?>" class="logout">Logout</a>
</header>
<div class="container">
    <h3>Choose your candidate:</h3>
    <?php if (!empty($msg)): ?><p class="msg"><?= $msg ?></p><?php endif; ?>
    <?php foreach ($candidates as $c): ?>
        <div class="card">
            <h4><?= htmlspecialchars($c['name']) ?></h4>
            <p><?= htmlspecialchars($c['position']) ?></p>
            <form method="POST">
                <input type="hidden" name="candidate_id" value="<?= $c['id'] ?>">
                <button type="submit">Vote</button>
            </form>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>
