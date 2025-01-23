<?php
session_start();

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../includes/helpers.php';
require_once __DIR__ . '/../classes/Mission.php';

$type = $_GET['type'] ?? null;

$missions = Mission::getMissionsByType($type);

require_once __DIR__ . '/../includes/header.php';
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ミッションの分類</title>
</head>
<body>

<main style="padding-top: 60px;">
    <h2>
        <?php
        if ($type === 'orbital') {
            echo '軌道ミッション';
        } elseif ($type === 'lander') {
            echo '着陸ミッション';
        } elseif ($type === 'failed') {
            echo '失敗したミッション';
        } else {
            echo 'すべてのミッション';
        }
        ?>
    </h2>

    <?php if (empty($missions)): ?>
        <p>このカテゴリーにはまだミッションがありません。</p>
    <?php else: ?>
        <ul>
            <?php foreach ($missions as $mission): ?>
                <li>
                    <a href="missions/<?= htmlspecialchars($mission['id']) ?>.php">
                        <?= htmlspecialchars($mission['name']) ?>
                    </a>
                    (<?= htmlspecialchars($mission['mission_type']) ?>)
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>

</body>
</html>