<header class="site-header">
  <div class="logo">
    <a href="http://localhost:8888/MarsExplorationsProject/public/index.php">
      <img src="path/to/logo-placeholder.png" alt="Site Logo" class="site-logo">
    </a>
  </div>
  <nav class="site-nav">
    <form class="search-form" autocomplete="off">
      <input 
        type="text" 
        placeholder="ミッションを検索..." 
        required 
        id="search-input"
      >
      <button type="submit" class="search-button">
        <span class="icon-search">&#128269;</span>
      </button>
      <div id="autocomplete-list"></div>
    </form>

    <ul>
      <li><a href="index.php#orbital">軌道ミッション</a></li>
      <li><a href="index.php#surface">地表ミッション</a></li>
      <li><a href="index.php#failed">失敗したミッション</a></li>
      <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true): ?>
        <li><a href="profile.php">マイプロフィール</a></li>
      <?php else: ?>
        <li><a href="login.php">ログイン</a></li>
      <?php endif; ?>
    </ul>
  </nav>
</header>