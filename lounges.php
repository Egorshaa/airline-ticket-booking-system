<?php require 'db.php'; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>SkyLounge</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <style>
        nav .logo a {
  font-size: 1.7rem;
  font-weight: 800;
  letter-spacing: 2px;
  background: linear-gradient(90deg, #fff, var(--secondary));
  background-clip: text;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  color: transparent;
}
    </style>
    <nav>
        <div class="logo"><a href="index.php">SKYLINE ✈️</a></div>
        <ul class="nav-links">
            <li><a href="about.php">О компании</a></li>
            <li><a href="rules.php">Правила</a></li>
            <li><a href="lounges.php" style="color: white; border-bottom: 2px solid var(--secondary);">Бизнес-залы</a></li>
            <li><a href="help.php">Помощь</a></li>
        </ul>
        <div class="nav-right">
            <div class="phone-number">8 800 555-35-35</div>
            <?php if(isset($_SESSION['user_id'])): ?><a href="dashboard.php" class="login-btn">В кабинет</a><?php else: ?><a href="login.php" class="login-btn">Войти</a><?php endif; ?>
        </div>
    </nav>

    <div class="container" style="text-align: center;">
        <div class="hero">
            <h1 style="color: gold; text-shadow: 0 0 20px rgba(255, 215, 0, 0.5);">SkyLounge VIP</h1>
            <p>Отдыхайте с комфортом перед полетом</p>
        </div>

        <div class="glass-panel" style="max-width: 900px; margin: 0 auto; text-align: left;">
            <img src="https://images.unsplash.com/photo-1565514020176-6c2235c8e888?auto=format&fit=crop&w=1000&q=80" style="width: 100%; border-radius: 10px; margin-bottom: 20px;">
            
            <h3>Что вас ждет?</h3>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-top: 20px;">
                <div>
                    <h4>🍽 Шведский стол</h4>
                    <p style="opacity: 0.7;">Изысканные блюда от шеф-поваров и премиальные напитки 24/7.</p>
                </div>
                <div>
                    <h4>🚿 Душевые кабины</h4>
                    <p style="opacity: 0.7;">Освежитесь перед долгим перелетом. Мы предоставляем полотенца и косметику.</p>
                </div>
                <div>
                    <h4>💻 Рабочая зона</h4>
                    <p style="opacity: 0.7;">Скоростной Wi-Fi, принтеры и тихие переговорные комнаты.</p>
                </div>
                <div>
                    <h4>🎮 Игровая комната</h4>
                    <p style="opacity: 0.7;">PlayStation 5 и зона отдыха для детей.</p>
                </div>
            </div>

            <div style="margin-top: 30px; padding: 15px; background: rgba(255, 215, 0, 0.1); border: 1px solid gold; border-radius: 10px; text-align: center;">
                Доступ бесплатно для пассажиров <b>Бизнес-класса</b>.
            </div>
        </div>
    </div>
</body>
</html>