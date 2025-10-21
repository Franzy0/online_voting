<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #121212;
            color: white;
            margin: 0;
        }
        header {
            background: #1db954;
            padding: 15px;
            text-align: center;
        }
        h1 { margin: 0; }
        table {
            width: 90%;
            margin: 30px auto;
            border-collapse: collapse;
            background: rgba(255,255,255,0.1);
        }
        th, td {
            border: 1px solid #333;
            padding: 10px;
            text-align: center;
        }
        th { background: #1db954; }
        a.logout {
            color: white;
            background: #ff5c5c;
            padding: 6px 12px;
            border-radius: 6px;
            text-decoration: none;
            float: right;
            margin-right: 20px;
        }
        a.logout:hover { background: #ff3b3b; }
    </style>
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
        <a href="<?= site_url('admin/logout'); ?>" class="logout">Logout</a>
    </header>

    <section>
        <h2 style="text-align:center;">Voters</h2>
        <table>
            <tr><th>ID</th><th>Voter Name</th></tr>
            <?php foreach($voters as $v): ?>
            <tr>
                <td><?= $v['id']; ?></td>
                <td><?= $v['name']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>

        <h2 style="text-align:center;">Candidates</h2>
        <table>
            <tr><th>ID</th><th>Candidate Name</th></tr>
            <?php foreach($candidates as $c): ?>
            <tr>
                <td><?= $c['id']; ?></td>
                <td><?= $c['name']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>

        <h2 style="text-align:center;">Votes</h2>
        <table>
            <tr><th>Voter ID</th><th>Candidate ID</th></tr>
            <?php foreach($votes as $v): ?>
            <tr>
                <td><?= $v['voter_id']; ?></td>
                <td><?= $v['candidate_id']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </section>
</body>
</html>
