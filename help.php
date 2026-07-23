<?php require 'db.php'; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Центр поддержки</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        details {
            background: rgba(255,255,255,0.05);
            margin-bottom: 10px;
            border-radius: 5px;
            overflow: hidden;
        }
        summary {
            padding: 15px;
            cursor: pointer;
            font-weight: bold;
            background: rgba(255,255,255,0.1);
            list-style: none; 
        }
        summary::after {
            content: '+'; float: right; font-weight: bold;
        }
        details[open] summary::after {
            content: '-';
        }
        .answer { padding: 15px; line-height: 1.6; opacity: 0.9; }
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
</head>
<body>
    <nav>
        <div class="logo"><a href="index.php">SKYLINE ✈️</a></div>
        <ul class="nav-links">
            <li><a href="about.php">О компании</a></li>
            <li><a href="rules.php">Правила</a></li>
            <li><a href="lounges.php">Бизнес-залы</a></li>
            <li><a href="help.php" style="color: white; border-bottom: 2px solid var(--secondary);">Помощь</a></li>
        </ul>
        <div class="nav-right">
            <div class="phone-number">8 800 555-35-35</div>
            <?php if(isset($_SESSION['user_id'])): ?><a href="dashboard.php" class="login-btn">В кабинет</a><?php else: ?><a href="login.php" class="login-btn">Войти</a><?php endif; ?>
        </div>
    </nav>

    <div class="container">
        <div class="glass-panel" style="max-width: 800px; margin: 40px auto;">
            <h2 style="text-align: center; margin-bottom: 30px;">Часто задаваемые вопросы</h2>

            <details>
                <summary>Как вернуть билет?</summary>
                <div class="answer">Зайдите в Личный кабинет, найдите нужный билет в списке и нажмите кнопку "Вернуть билет". Средства вернутся на карту в течение 3-5 дней.</div>
            </details>

            <details>
                <summary>Можно ли перевозить животных?</summary>
                <div class="answer">Да, мелкие животные (до 8 кг с клеткой) могут лететь в салоне. Крупные животные перевозятся в багажном отсеке. Требуется предварительное согласование.</div>
            </details>

            <details>
                <summary>За сколько заканчивается регистрация?</summary>
                <div class="answer">Регистрация в аэропорту заканчивается за 40 минут до вылета. Онлайн-регистрация доступна за 24 часа.</div>
            </details>

            <details>
                <summary>Что делать, если я опоздал на рейс?</summary>
                <div class="answer">Обратитесь к представителю авиакомпании в аэропорту. Если ваш тариф позволяет, мы пересадим вас на следующий рейс с доплатой.</div>
            </details>
            
            <div style="text-align: center; margin-top: 40px;">
                <p>Не нашли ответ?</p>
                <?php if(isset($_SESSION['user_id'])): ?>
                    <a href="client/index.php"><button style="width: 200px;">Написать в поддержку</button></a>
                <?php else: ?>
                    <p style="opacity: 0.6;">Войдите в систему, чтобы связаться с оператором.</p>
                <?php endif; ?>
            </div>

        </div>
    </div>
</body>
</html>