<?php

session_start();
require_once __DIR__ . '/../config/config.php';

$isLoggedIn = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ホーム — 火星ミッション</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/surface.css">
  <link rel="stylesheet" href="../assets/css/orbital.css">
  <script src="../assets/js/scroll.js" defer></script>
</head>

<body>

  <?php require_once __DIR__ . '/../includes/header.php'; ?>

  <main>
    <section class="full-screen video-section">
      <video class="video-background" autoplay loop muted playsinline>
        <source src="../assets/videos/mars_video.mp4" type="video/mp4">
        ご利用のブラウザは動画に対応していません。
      </video>
    </section>

    <section class="full-screen news-section">
      <div class="news-background"></div>
      <div class="news-content">
        <h2>ニュース</h2>
        <ul class="news-list">
          <li><a href="news1.php">パーセベランスが古代の水の痕跡を発見</a></li>
          <li><a href="news2.php">キュリオシティが粘土堆積物を調査中</a></li>
          <li><a href="news3.php">スペースXが火星への新たな打ち上げ準備中</a></li>
          <li><a href="news4.php">新たな砂嵐データを発見</a></li>
          <li><a href="news5.php">NASAが火星の新写真を公開</a></li>
          <li><a href="news6.php">火星からのサンプル回収ミッションの準備</a></li>
        </ul>
      </div>
    </section>

    <section id="orbital" class="orbital-section">
      <div class="hamburger-menu">
        <div class="menu-icon">
          <span></span>
          <span></span>
          <span></span>
        </div>
        <div class="menu-content">
          <div class="close-header">
            <div class="close-icon">&#10005;</div>
          </div>
          <ul>
            <li><strong>2005</strong> <a href="missions/mro.php?id=mro">マーズ・リコネッサンス・オービター (MRO)</a></li>
          </ul>
        </div>
      </div>

      <div class="slider">
        <h1 class="orbital-heading">軌道ミッション</h1>

        <div class="slider-content">
          <div class="slider-item">
            <img src="../assets/images/MRO.jpg" alt="マーズ・リコネッサンス・オービター">
            <div class="text-overlay"></div>
            <div class="slider-info">
              <a href="missions/mro.php?id=mro" class="slider-link">
                <h2>マーズ・リコネッサンス・オービター (MRO)</h2>
                <p>火星を詳細に調査するために2005年にNASAによって打ち上げられた軌道ステーション。</p>
              </a>
            </div>
          </div>
        </div>

        <div class="slider-arrows">
          <button class="arrow left-arrow">◀</button>
          <button class="arrow right-arrow">▶</button>
        </div>
      </div>
    </section>

    <section id="surface" class="surface-section">
      <div class="hamburger-menu">
        <div class="menu-icon">
          <span></span>
          <span></span>
          <span></span>
        </div>
        <div class="menu-content">
          <div class="close-header">
            <div class="close-icon">&#10005;</div>
          </div>
          <ul>
            <li><strong>2011</strong> <a href="missions/curiosity.php?id=curiosity">キュリオシティ</a></li>
          </ul>
        </div>
      </div>

      <div class="slider">
        <h1 class="surface-heading">地表ミッション</h1>

        <div class="slider-content">
          <div class="slider-item">
            <img src="../assets/images/Curiosity.jpg" alt="キュリオシティ">
            <div class="text-overlay"></div>
            <div class="slider-info">
              <a href="missions/curiosity.php?id=curiosity" class="slider-link">
                <h2>キュリオシティ</h2>
                <p>2011年にNASAによって打ち上げられた火星探査車。</p>
              </a>
            </div>
          </div>
        </div>

        <div class="slider-arrows">
          <button class="arrow left-arrow">◀</button>
          <button class="arrow right-arrow">▶</button>
        </div>
      </div>
    </section>

    <section id="failed" class="failed-section">
      <div class="hamburger-menu">
        <div class="menu-icon">
          <span></span>
          <span></span>
          <span></span>
        </div>
        <div class="menu-content">
          <div class="close-header">
            <div class="close-icon">&#10005;</div>
          </div>
          <ul>
            <li><strong>2016</strong> <a href="missions/schiaparelli.php?id=schiaparelli">スキアパレッリEDMランダー</a></li>
          </ul>
        </div>
      </div>

      <div class="slider">
        <h1 class="failed-heading">失敗したミッション</h1>

        <div class="slider-content">
          <div class="slider-item">
            <img src="../assets/images/edm.jpg" alt="スキアパレッリEDMランダー">
            <div class="text-overlay"></div>
            <div class="slider-info">
              <a href="missions/schiaparelli.php?id=schiaparelli" class="slider-link">
                <h2>スキアパレッリEDMランダー</h2>
                <p>2016年にESAが打ち上げた実験モジュール。着陸中に破壊された。</p>
              </a>
            </div>
          </div>
        </div>

        <div class="slider-arrows">
          <button class="arrow left-arrow">◀</button>
          <button class="arrow right-arrow">▶</button>
        </div>
      </div>
    </section>
  </main>

  <?php require_once __DIR__ . '/../includes/footer.php'; ?>

  <script src="../assets/js/main.js"></script>
  <script src="../assets/js/search.js" defer></script>
</body>

</html>