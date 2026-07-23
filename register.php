<?php 
require 'db.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $check = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $check->execute([$email]);
    
    if ($check->rowCount() > 0) {
        $error = "Этот Email уже зарегистрирован!";
    } else {
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, 'client')");
        $stmt->execute([$name, $email, $pass]);
        header("Location: login.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация | С-ЛАЙН</title>
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <style>
        body { justify-content: center; align-items: center; }
        .auth-box { width: 400px; text-align: center; }
    </style>
</head>
<body>

    <div class="glass-panel auth-box">
        <h2 style="margin-bottom: 5px;">Создать аккаунт</h2>
        <p style="opacity: 0.7; margin-bottom: 25px;">Присоединяйтесь к С-ЛАЙН</p>

        <?php if(isset($error)) echo "<div style='color: #ff6b6b; margin-bottom: 15px;'>$error</div>"; ?>
        
        <form method="POST">
            <input type="text" name="username" placeholder="Ваше имя" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Пароль" required>
            <button type="submit">Зарегистрироваться</button>
        </form>
        
        <div style="margin-top: 20px; font-size: 0.9rem;">
            Уже есть аккаунт? <a href="login.php" style="color: var(--secondary); font-weight: bold;">Войти</a>
        </div>
        <div style="margin-top: 10px; font-size: 0.8rem; opacity: 0.5;">
            <a href="index.php">← Вернуться на главную</a>
        </div>
    </div>

</body>
</html>