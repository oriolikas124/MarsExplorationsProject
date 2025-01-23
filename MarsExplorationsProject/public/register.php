<?php
session_start();
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../classes/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (User::register($email, $password)) {
        header('Location: login.php');
        exit;
    } else {
        $error = '登録エラーが発生しました。もう一度お試しください。';
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<?php require_once __DIR__ . '/../includes/header.php'; ?>

<main style="padding-top: 60px;">
    <form method="post" class="register-form">
        <h2>登録</h2>
        <?php if (isset($error)): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <label for="username">ユーザー名:</label>
        <input type="text" name="username" id="username" required>
        <label for="email">メールアドレス:</label>
        <input type="email" name="email" id="email" required>
        <label for="password">パスワード:</label>
        <input type="password" name="password" id="password" required>
        <button type="submit">登録する</button>
        <p>アカウントをお持ちですか？ <a href="login.php">ログインする</a></p>
    </form>
</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>

</body>
</html>