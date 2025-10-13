<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Online Voting System</title>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: "Poppins", sans-serif;
        background-color: #f9faf9;
        color: #2b3a35;
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    h1 {
        font-size: 38px;
        font-weight: 700;
        color: #1d5c57;
        margin-bottom: 40px;
        letter-spacing: 0.5px;
    }

    .login-buttons {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
        justify-content: center;
    }

    .login-buttons a {
        display: inline-block;
        background-color: #7fd8c2;
        color: #fff;
        padding: 14px 32px;
        border-radius: 10px;
        font-weight: 600;
        text-decoration: none;
        font-size: 16px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .login-buttons a:hover {
        background-color: #54c1a9;
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    footer {
        position: absolute;
        bottom: 15px;
        font-size: 13px;
        color: #78948f;
    }

    @media (max-width: 600px) {
        h1 {
            font-size: 28px;
            text-align: center;
        }
        .login-buttons a {
            width: 80%;
        }
    }
</style>
</head>
<body>
    <h1>Welcome to the Online Voting System</h1>
    <div class="login-buttons">
        <a href="<?= site_url('voter/login') ?>">Login as Voter</a>
        <a href="<?= site_url('admin/login') ?>">Login as Admin</a>
    </div>
    <footer>© 2025 Online Voting System</footer>
</body>
</html>
