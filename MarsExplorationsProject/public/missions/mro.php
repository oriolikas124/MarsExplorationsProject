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
    <title>Mars Reconnaissance Orbiter (MRO)</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/mission.css">
</head>
<body>

<?php require_once __DIR__ . '/../../includes/header.php'; ?>

<section class="mission-header">
    <img src="../../assets/images/MRO.jpg" alt="Mars Reconnaissance Orbiter" class="mission-image">
</section>

<section class="mission-details">
    <div class="mission-title">
        <h1>Mars Reconnaissance Orbiter (MRO)</h1>
        <p>2005年 — 現在</p>
        <p>国: アメリカ</p>
        <p>機関: NASA</p>
    </div>
    <div class="mission-description">
        <p>
            Mars Reconnaissance Orbiter (MRO) は、2005年8月にNASAが打ち上げた軌道周回機です。 
            主な目的は、軌道から火星の地表を詳細に調査し、また火星探査車や他の着陸機から地球へのデータ中継を行うことです。
        </p>
        <p>
            興味深い事実:
            <ul>
                <li>探査機の質量は約2,180kgです。</li>
                <li>高解像度カメラHiRISEを搭載しています。</li>
                <li>300テラビット以上のデータを地球に送信しました。</li>
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
            <img src="../../assets/images/mro1.jpg" alt="MRO in orbit">
            <figcaption>MROの軌道上の姿</figcaption>
        </figure>
        <figure>
            <img src="../../assets/images/mro2.jpg" alt="Mars surface by MRO">
            <figcaption>MROが撮影した火星の地表</figcaption>
        </figure>
        <figure>
            <img src="../../assets/images/mro3.jpg" alt="MRO instruments">
            <figcaption>MROの搭載機器</figcaption>
        </figure>
    </div>
</section>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>

</body>
</html>