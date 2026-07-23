<?php require 'db.php'; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>О компании | SkyLine</title>
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
            <li><a href="about.php" style="color: white; border-bottom: 2px solid var(--secondary);">О компании</a></li>
            <li><a href="rules.php">Правила</a></li>
            <li><a href="lounges.php">Бизнес-залы</a></li>
            <li><a href="help.php">Помощь</a></li>
        </ul>
        <div class="nav-right">
            <div class="phone-number">8 800 555-35-35</div>
            <?php if(isset($_SESSION['user_id'])): ?><a href="dashboard.php" class="login-btn">В кабинет</a><?php else: ?><a href="login.php" class="login-btn">Войти</a><?php endif; ?>
        </div>
    </nav>

    <div class="container">
        <div class="glass-panel" style="max-width: 900px; margin: 40px auto;">
            <h1 style="text-align: center; margin-bottom: 20px;">Мы — SkyLine</h1>
            
            <div style="display: flex; gap: 30px; align-items: center; flex-wrap: wrap;">
                <img src="/img/sky.png" style="border-radius: 15px; width: 300px; flex: 1;">
                
                <div style="flex: 1.5;">
                    <p style="margin-bottom: 15px;">
                        Авиакомпания <b>SkyLine</b> была основана в 2023 году с простой миссией: сделать небо доступным для каждого, сохраняя премиальный уровень комфорта.
                    </p>
                    <p>
                        Сегодня мы летаем в <b>50+ стран мира</b>, соединяя континенты и сердца. Наш флот состоит из новейших самолетов Airbus A350 и Boeing 787 Dreamliner.
                    </p>
                </div>
            </div>

            <div style="display: flex; justify-content: space-around; margin-top: 40px; text-align: center;">
                <div>
                    <h2 style="color: var(--secondary); font-size: 2.5rem;">5M+</h2>
                    <p>Пассажиров</p>
                </div>
                <div>
                    <h2 style="color: var(--secondary); font-size: 2.5rem;">120</h2>
                    <p>Направлений</p>
                </div>
                <div>
                    <h2 style="color: var(--secondary); font-size: 2.5rem;">15</h2>
                    <p>Лет опыта</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>