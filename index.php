<?php require 'db.php'; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>С-ЛАЙН - Летай выше</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

   <nav>
  <div class="logo">
    <a href="index.php">С-ЛАЙН ✈️</a>
  </div>

  <ul class="nav-links">
    <li><a href="about.php">О компании</a></li>
    <li><a href="rules.php">Правила</a></li>
    <li><a href="lounges.php">Бизнес-залы</a></li>
    <li><a href="help.php">Помощь</a></li>
  </ul>

  <div class="nav-right">
    <?php if(isset($_SESSION['user_id'])): ?>
      <a href="dashboard.php" class="login-btn">В кабинет</a>
    <?php else: ?>
      <a href="login.php" class="login-btn">Войти</a>
    <?php endif; ?>
  </div>
</nav>
    <div class="hero-section">
        <div class="hero-bg"></div>
        <div class="hero-content">
            <h1 class="main-title">
                Весь мир <br>
                <span class="highlight">на ладони</span>
            </h1>
            <p class="subtitle">
                Бронируйте билеты за 2 клика, путешествуйте с комфортом<br>
                бизнес-класса по ценам эконома.
            </p>
            <div class="search-widget-visual">
                <div class="input-group">
                    <span class="label">Откуда</span>
                    <span class="value">Москва (MOW)</span>
                </div>
                <div class="input-group">
                    <span class="label">Куда</span>
                    <span class="value">Любая точка мира</span>
                </div>
                <div class="input-group">
                    <span class="label">Дата</span>
                    <span class="value">Сегодня</span>
                </div>
                <a href="<?= isset($_SESSION['user_id']) ? 'client/index.php' : 'register.php' ?>" class="search-btn">
                    Найти билет 🚀
                </a>
            </div>
            
            <div class="trust-badges">
                <div class="badge">⭐ 4.9 Рейтинг</div>
                <div class="badge">🏆 Лучшая авиакомпания 2023</div>
                <div class="badge">🛡 Безопасные платежи</div>
            </div>
        </div>
    </div>
    <div class="container">
        <h2 style="text-align: center; font-weight: 300; letter-spacing: 2px; margin-bottom: 10px;">ПОПУЛЯРНЫЕ НАПРАВЛЕНИЯ</h2>
        <p style="text-align: center; opacity: 0.6; margin-bottom: 40px;">Куда чаще всего летают наши пассажиры</p>

        <div class="features">
            <div class="card">
                <div class="img-container"><img src="/img/moscow.png"></div>
                <div class="card-content">
                    <span class="price-tag">от 2 500 ₽</span>
                    <h3>Москва</h3>
                    <p style="font-size: 0.9rem; opacity: 0.7;">Красная площадь, деловой центр Москва-Сити и ритм мегаполиса.</p>
                </div>
            </div>
            <div class="card">
                <div class="img-container"><img src="/img/dubai.png"></div>
                <div class="card-content">
                    <span class="price-tag">от 15 000 ₽</span>
                    <h3>Дубай</h3>
                    <p style="font-size: 0.9rem; opacity: 0.7;">Город будущего в пустыне. Роскошный шоппинг и пляжи.</p>
                </div>
            </div>
            <div class="card">
                <div class="img-container"><img src="/img/sochi.png"></div>
                <div class="card-content">
                    <span class="price-tag">от 4 200 ₽</span>
                    <h3>Сочи</h3>
                    <p style="font-size: 0.9rem; opacity: 0.7;">Море и горы в одном месте. Лучший горнолыжный курорт.</p>
                </div>
            </div>
        </div>
        <?php
        try { $news = $pdo->query("SELECT * FROM news ORDER BY created_at DESC LIMIT 3")->fetchAll(); } catch (Exception $e) { $news = []; }
        if(count($news) > 0): 
        ?>
        <h2 style="margin-top: 100px; text-align: center; font-weight: 300; letter-spacing: 2px;">
    НОВОСТИ
</h2>

<div class="features" style="margin-top: 30px;">

    <!-- Новость 1 -->
    <div class="card">
        <div class="img-container">
            <img src="/img/thai.png">
        </div>
        <div class="card-content">
            <h3>Новый рейс в Таиланд</h3>
            <p style="font-size: 0.85rem; opacity: 0.7;">
                Открыты новые направления в Бангкок и Пхукет по выгодным ценам...
            </p>
            <small style="opacity: 0.4;">01.04.2026</small>
        </div>
    </div>

    <!-- Новость 2 -->
    <div class="card">
        <div class="img-container">
            <img src="/img/mars.png">
        </div>
        <div class="card-content">
            <h3>Полёты на Марс</h3>
            <p style="font-size: 0.85rem; opacity: 0.7;">
                С-ЛАЙН запускает тестовую программу межпланетных перелётов...
            </p>
            <small style="opacity: 0.4;">05.04.2026</small>
        </div>
    </div>

</div>
        </div>
        <?php endif; ?>
        <?php
        try {
            $reviews = $pdo->query("SELECT r.*, u.username FROM reviews r JOIN users u ON r.user_id = u.id ORDER BY r.created_at DESC LIMIT 3")->fetchAll();
            $avg = $pdo->query("SELECT AVG(rating) FROM reviews")->fetchColumn();
        } catch (Exception $e) { $reviews = []; $avg = 0; }

        if(count($reviews) > 0):
        ?>
        <div style="margin-top: 100px;">
            <h2 style="text-align: center;">Отзывы пассажиров</h2>
            <div style="text-align: center; color: #f1c40f; margin-bottom: 30px; font-size: 1.2rem;">
                Средняя оценка: <b><?= number_format((float)$avg, 1) ?></b>
            </div>
            <div class="features">
                <?php foreach($reviews as $r): ?>
                    <div class="glass-panel" style="width: 300px; padding: 20px; text-align: left; margin: 0;">
                        <div style="display:flex; justify-content:space-between; margin-bottom: 10px;">
                            <b><?= htmlspecialchars($r['username']) ?></b>
                            <span style="color: gold;"><?= str_repeat('★', $r['rating']) ?></span>
                        </div>
                        <p style="font-style: italic; font-size: 0.9rem; opacity: 0.8;">"<?= htmlspecialchars($r['comment']) ?>"</p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>

    </div>
    <footer>
        <div class="container" style="display: flex; justify-content: space-between; flex-wrap: wrap; gap: 40px;">
            <div style="flex: 1; min-width: 250px;">
                <h3>С-ЛАЙН АВИАЛИНИИ</h3>
                <p style="opacity: 0.6; font-size: 0.9rem; line-height: 1.6;">Лучший сервис для поиска авиабилетов.<br>Летаем выше облаков с 2023 года.</p>
            </div>
            <div style="flex: 1; min-width: 200px;">
                <h4>Пассажирам</h4>
                <ul style="opacity: 0.7; line-height: 2; font-size: 0.9rem;">
                    <li><a href="rules.php">Правила перевозки</a></li>
                    <li><a href="lounges.php">Бизнес-залы</a></li>
                    <li><a href="help.php">Частые вопросы</a></li>
                </ul>
            </div>
            <div style="flex: 1; min-width: 200px;">
                <h4>Контакты</h4>
                <p style="margin-bottom: 10px;">📞 8 928 122 19 70</p>
                <div style="display: flex; gap: 15px; font-size: 1.5rem; margin-top: 20px;">
                    <a href="https://t.me/hiketamine" style="opacity: 0.8;">✈️</a>
                    <a href="#" style="opacity: 0.8;">📷</a>
                </div>
            </div>
        </div>
        <div style="text-align: center; margin-top: 40px; opacity: 0.4; font-size: 0.8rem;">
            &copy; <?= date('Y') ?> С-ЛАЙН Inc.
        </div>
    </footer>

</body>
</html>