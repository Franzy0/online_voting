<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vote Now</title>
    <style>
        body {
            background: #121212;
            color: white;
            font-family: Arial, sans-serif;
            text-align: center;
        }
        h1 { color: #1db954; }
        .candidate {
            background: rgba(255,255,255,0.1);
            padding: 15px;
            margin: 10px auto;
            width: 60%;
            border-radius: 8px;
        }
        button {
            background: #1db954;
            border: none;
            padding: 8px 15px;
            color: white;
            border-radius: 6px;
            cursor: pointer;
        }
        button:hover { background: #17a84a; }
        a.logout {
            background: #ff5c5c;
            padding: 6px 12px;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            float: right;
            margin: 20px;
        }
        .message { color: #1db954; margin-top: 20px; }
    </style>
</head>
<body>
    <a href="<?= site_url('voter/logout'); ?>" class="logout">Logout</a>
    <h1>Vote for Your Candidate</h1>
    <?php if(isset($message)) echo "<p class='message'>$message</p>"; ?>

    <form method="POST" action="<?= site_url('voter/vote'); ?>">
        <?php foreach($candidates as $c): ?>
        <div class="candidate">
            <p><strong><?= $c['name']; ?></strong></p>
            <button type="submit" name="submit_vote" value="1" onclick="document.querySelector('input[name=candidate_id]').value='<?= $c['id']; ?>'">Vote</button>
        </div>
        <?php endforeach; ?>
        <input type="hidden" name="candidate_id">
    </form>
</body>
</html>
