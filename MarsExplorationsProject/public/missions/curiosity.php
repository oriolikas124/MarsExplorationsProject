<?php
session_start();
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../classes/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && User::isLoggedIn()) {
    $missionId = $_POST['mission_id'];
    $userId = $_SESSION['user_id'];
    $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
    $stmt = $db->prepare('INSERT INTO favorites (user_id, mission_id) VALUES (?, ?)');
    $stmt->execute([$userId, $missionId]);
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curiosity ミッション</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>

<?php require_once __DIR__ . '/../../includes/header.php'; ?>

<section class="mission-header">
    <img src="../../assets/images/Curiosity.jpg" alt="Curiosity Mission" class="mission-image">
</section>

<section class="mission-details">
    <div class="mission-title">
        <h1>Curiosity ミッション</h1>
        <p>2011年〜現在</p>
        <p>国: アメリカ</p>
        <p>機関: NASA</p>
    </div>
    <div class="mission-description">
        <p>
            Curiosity は 2011年11月に NASA によって打ち上げられた火星探査車です。
            主な目的は、火星に過去に生命が存在する可能性を調査し、地表と大気の構成を分析することです。
            2012年8月6日にゲールクレーターに無事着陸しました。
            ミッション中、車輪の摩耗を含む多くの問題に直面しましたが、現在も活動を続け、火星に関する
            貴重なデータを提供しています。
        </p>
        <p>
            面白い事実:
            <ul>
                <li>探査車の重量は約900kgです。</li>
                <li>着陸は Skycrane システムを使用して行われました。</li>
                <li>これまでに50万枚以上の写真を撮影しました。</li>
            </ul>
        </p>
    </div>
    <?php if (User::isLoggedIn()): ?>
        <form method="post">
            <input type="hidden" name="mission_id" value="<?= htmlspecialchars($missionId) ?>">
            <button type="submit">お気に入りに追加</button>
        </form>
    <?php endif; ?>
</section>

<section class="mission-gallery">
    <h2>ギャラリー</h2>
    <div class="gallery-grid">
        <figure>
            <img src="../../assets/images/gallery1.jpg" alt="Curiosity landing">
            <figcaption>探査車の着陸</figcaption>
        </figure>
        <figure>
            <img src="../../assets/images/gallery2.jpg" alt="Curiosity drilling">
            <figcaption>サンプル採取の掘削</figcaption>
        </figure>
        <figure>
            <img src="../../assets/images/gallery3.jpg" alt="Mars surface">
            <figcaption>火星の地表</figcaption>
        </figure>
    </div>
</section>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>

</body>
</html>