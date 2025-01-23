<?php
session_start();
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../classes/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (User::login($email, $password)) {
        $_SESSION['loggedin'] = true;
        header('Location: index.php');
        exit;
    } else {
        $error = 'メールアドレスまたはパスワードが正しくありません。';
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<?php require_once __DIR__ . '/../includes/header.php'; ?>

<main style="padding-top: 60px;">
    <form method="post" class="login-form">
        <h2>ログイン</h2>
        <?php if (isset($error)): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <label for="email">メールアドレス:</label>
        <input type="email" name="email" id="email" required>
        <label for="password">パスワード:</label>
        <input type="password" name="password" id="password" required>
        <button type="submit">ログイン</button>
        <p>アカウントがありませんか？ <a href="register.php">登録する</a></p>
    </form>
</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>

</body>
</html>