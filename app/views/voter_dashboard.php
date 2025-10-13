<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Vote Now</title>
<style>
body {
    font-family: 'Poppins', sans-serif;
    background: #FAFAFA;
    padding: 40px;
    text-align: center;
}
.cand-grid {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 25px;
    margin-top: 40px;
}
.cand-card {
    background: white;
    border-radius: 14px;
    padding: 25px;
    width: 220px;
    box-shadow: 0 4px 14px rgba(0,0,0,0.08);
    transition: 0.3s ease;
}
.cand-card:hover {
    transform: translateY(-6px);
}
button {
    background: #3AAE85;
    color: white;
    border: none;
    padding: 8px 14px;
    border-radius: 8px;
    cursor: pointer;
    font-weight: 600;
}
button:hover { background: #329b75; }
.logout {
    display: inline-block;
    margin-top: 40px;
    text-decoration: none;
    background: #d9534f;
    color: white;
    padding: 10px 20px;
    border-radius: 8px;
    font-weight: 600;
}
.logout:hover { background: #c9302c; }
.message { margin-top: 15px; color: #00796B; font-weight: 500; }
</style>
</head>
<body>
    <h2>Welcome, <?= htmlspecialchars($voter_name) ?>!</h2>
    <?php if (!empty($msg)): ?><p class="message"><?= htmlspecialchars($msg) ?></p><?php endif; ?>

    <form method="POST">
        <div class="cand-grid">
            <?php foreach ($candidates as $cand): ?>
                <div class="cand-card">
                    <h3><?= htmlspecialchars($cand['name']) ?></h3>
                    <p><?= htmlspecialchars($cand['position']) ?></p>
                    <button type="submit" name="candidate_id" value="<?= $cand['id'] ?>">Vote</button>
                </div>
            <?php endforeach; ?>
        </div>
    </form>

    <a href="<?= site_url('voter/logout') ?>" class="logout">Logout</a>
</body>
</html>
