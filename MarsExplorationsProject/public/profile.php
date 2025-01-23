<?php
session_start();
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../classes/User.php';

if (!User::isLoggedIn()) {
    header('Location: login.php');
    exit;
}

$userId = $_SESSION['user_id'];
$db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
$stmt = $db->prepare('SELECT * FROM users WHERE id = ?');
$stmt->execute([$userId]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $stmt = $db->prepare('UPDATE users SET email = ?, password = ? WHERE id = ?');
    $stmt->execute([$email, password_hash($password, PASSWORD_DEFAULT), $userId]);
    $success = 'プロフィールが更新されました。';
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>マイプロフィール</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<?php require_once __DIR__ . '/../includes/header.php'; ?>

<main style="padding-top: 60px;">
    <form method="post" class="profile-form">
        <h2>マイプロフィール</h2>
        <?php if (isset($success)): ?>
            <p class="success"><?= htmlspecialchars($success) ?></p>
        <?php endif; ?>
        <label for="email">メールアドレス:</label>
        <input type="email" name="email" id="email" value="<?= htmlspecialchars($user['email']) ?>" required><br>
        <label for="password">新しいパスワード:</label>
        <input type="password" name="password" id="password" required>
        <button type="submit">更新する</button>
    </form>
</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>

</body>
</html>
