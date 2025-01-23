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
    <title>Schiaparelli EDM Lander</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/mission.css">
</head>
<body>

<?php require_once __DIR__ . '/../../includes/header.php'; ?>

<section class="mission-header">
    <img src="../../assets/images/edm.jpg" alt="Schiaparelli EDM Lander" class="mission-image">
</section>

<section class="mission-details">
    <div class="mission-title">
        <h1>Schiaparelli EDM Lander</h1>
        <p>2016年 — 着陸失敗</p>
        <p>国: ヨーロッパ、ロシア</p>
        <p>機関: ESA (ExoMars プログラムの一環)</p>
    </div>
    <div class="mission-description">
        <p>
            Schiaparelli EDM Lander は、2016年の「ExoMars」ミッションの一環として打ち上げられた実験用着陸モジュールです。
            主な目的は、火星への着陸技術をテストすることでしたが、着陸中にシステムエラーが発生し、モジュールは地表に衝突しました。
        </p>
        <p>
            興味深い事実:
            <ul>
                <li>イタリアの天文学者ジョヴァンニ・スキアパレッリにちなんで命名されました。</li>
                <li>ESA（欧州宇宙機関）とロスコスモスの共同開発。</li>
                <li>将来のミッションのためのパラシュートやブレーキシステムのテストが主目的でした。</li>
            </ul>
        </p>
    </div>
    <?php if (User::isLoggedIn()): ?>
        <form method="post">
            <input type="hidden" name="mission_id" value="schiaparelli">
            <button type="submit">お気に入りに追加</button>
        </form>
    <?php endif; ?>
</section>

<section class="mission-gallery">
    <h2>ギャラリー</h2>
    <div class="gallery-grid">
        <figure>
            <img src="../../assets/images/schiaparelli1.jpg" alt="Schiaparelli landing module">
            <figcaption>Schiaparelli EDM モジュールの模型</figcaption>
        </figure>
        <figure>
            <img src="../../assets/images/schiaparelli2.jpg" alt="Launch of ExoMars 2016">
            <figcaption>「ExoMars 2016」ミッションの打ち上げ</figcaption>
        </figure>
        <figure>
            <img src="../../assets/images/schiaparelli3.jpg" alt="Schiaparelli crash site">
            <figcaption>モジュールの衝突地点</figcaption>
        </figure>
    </div>
</section>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>

</body>
</html>