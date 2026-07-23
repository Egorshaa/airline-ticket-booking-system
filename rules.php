<?php require 'db.php'; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Правила перевозки</title>
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
            <li><a href="rules.php" style="color: white; border-bottom: 2px solid var(--secondary);">Правила</a></li>
            <li><a href="lounges.php">Бизнес-залы</a></li>
            <li><a href="help.php">Помощь</a></li>
        </ul>
        <div class="nav-right">
            <div class="phone-number">8 800 555-35-35</div>
            <?php if(isset($_SESSION['user_id'])): ?><a href="dashboard.php" class="login-btn">В кабинет</a><?php else: ?><a href="login.php" class="login-btn">Войти</a><?php endif; ?>
        </div>
    </nav>

    <div class="container">
        <div class="glass-panel" style="max-width: 800px; margin: 40px auto;">
            <h2 style="border-bottom: 1px solid rgba(255,255,255,0.2); padding-bottom: 10px;">👜 Правила провоза багажа</h2>
            
            <div style="margin-top: 20px;">
                <h3>Ручная кладь</h3>
                <p>Бесплатно для всех тарифов. Габариты не более <b>55х40х25 см</b>, вес до <b>10 кг</b>.</p>
                <div style="background: rgba(255,255,255,0.1); padding: 10px; border-radius: 10px; margin: 10px 0;">
                    ✅ Ноутбук, дамская сумка и зонт не считаются ручной кладью и провозятся бесплатно.
                </div>
            </div>

            <div style="margin-top: 30px;">
                <h3>Регистрируемый багаж</h3>
                <ul style="list-style: none; padding-left: 0;">
                    <li style="margin-bottom: 10px;">🎒 <b>Эконом:</b> 1 место до 23 кг </li>
                    <li style="margin-bottom: 10px;">💼 <b>Бизнес:</b> 2 места по 32 кг каждое</li>
                </ul>
            </div>

            <div style="margin-top: 30px;">
                <h3 style="color: #ff6b6b;">🚫 Запрещено к перевозке</h3>
                <p>Взрывчатые вещества, сжатые газы, легковоспламеняющиеся жидкости, токсичные вещества.</p>
            </div>
        </div>
    </div>
</body>
</html>