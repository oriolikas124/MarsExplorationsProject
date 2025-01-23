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
$stmt = $db->prepare('SELECT missions.* FROM missions JOIN favorites ON missions.id = favorites.mission_id WHERE favorites.user_id = ?');
$stmt->execute([$userId]);
$favorites = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Избранное</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<?php require_once __DIR__ . '/../includes/header.php'; ?>

<main style="padding-top: 60px;">
    <h2>Избранные миссии</h2>
    <?php if (empty($favorites)): ?>
        <p>У вас нет избранных миссий.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($favorites as $mission): ?>
                <li>
                    <a href="missions/<?= htmlspecialchars($mission['id']) ?>.php">
                        <?= htmlspecialchars($mission['name']) ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>

</body>
</html>
