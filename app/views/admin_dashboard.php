<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Dashboard</title>
<style>
* { box-sizing: border-box; font-family: 'Poppins', sans-serif; }
body { background: #FAFAFA; margin: 0; }
header {
    background: linear-gradient(135deg, #56C596, #3AAE85);
    color: white; padding: 18px 45px;
    display: flex; justify-content: space-between; align-items: center;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}
header h1 { margin: 0; font-weight: 600; }
.logout-btn {
    background: #fff; color: #00796B;
    padding: 10px 18px; border-radius: 8px;
    text-decoration: none; font-weight: 600;
    transition: 0.3s ease; border: 1px solid transparent;
}
.logout-btn:hover { background: #00796B; color: #fff; border: 1px solid #fff; }
.container { padding: 50px 20px; text-align: center; }
.container h2 { color: #00796B; margin-bottom: 40px; font-weight: 500; }
.cards {
    display: flex; justify-content: center; flex-wrap: wrap; gap: 25px;
}
.card {
    background: #FFFFFF; padding: 25px; border-radius: 16px;
    width: 240px; box-shadow: 0 4px 18px rgba(0,0,0,0.08);
    transition: 0.3s ease; border-top: 6px solid #56C596;
}
.card-link { text-decoration: none; color: inherit; }
.card-link:hover .card {
    transform: translateY(-6px); box-shadow: 0 8px 20px rgba(0,0,0,0.12);
}
.card h3 { color: #333; margin: 0 0 10px; font-weight: 500; }
.card p { color: #00796B; font-size: 28px; font-weight: 700; margin: 0; }
</style>
</head>
<body>
<header>
    <h1>Admin Dashboard</h1>
    <a href="<?= site_url('admin/logout') ?>" class="logout-btn">Logout</a>
</header>
<div class="container">
    <h2>Welcome, <?= htmlspecialchars($admin) ?> 👋</h2>
    <div class="cards">
        <a href="#" class="card-link">
            <div class="card"><h3>Total Voters</h3><p><?= $totalVoters ?></p></div>
        </a>
        <a href="#" class="card-link">
            <div class="card"><h3>Total Candidates</h3><p><?= $totalCandidates ?></p></div>
        </a>
        <a href="#" class="card-link">
            <div class="card"><h3>Total Votes</h3><p><?= $totalVotes ?></p></div>
        </a>
        <a href="#" class="card-link">
            <div class="card"><h3>Manage Candidates</h3><p>CRUD</p></div>
        </a>
    </div>
</div>
</body>
</html>
