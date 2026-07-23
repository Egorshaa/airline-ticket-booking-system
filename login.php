<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['username'] = $user['username'];
        writeLog($pdo, $user['id'], "Вход в систему");
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Неверный логин или пароль";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вход | SkyLine</title>
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
</head>
<body>

    <div class="glass-panel auth-box">
        <h2 style="margin-bottom: 5px;">С возвращением!</h2>
        <p style="opacity: 0.7; margin-bottom: 25px;">Введите данные для входа</p>

        <?php if(isset($error)) echo "<div style='color: #ff6b6b; margin-bottom: 15px;'>$error</div>"; ?>
        
        <form method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Пароль" required>
            <button type="submit">Войти</button>
        </form>
        
        <div style="margin-top: 20px; font-size: 0.9rem;">
            Нет аккаунта? <a href="register.php" style="color: var(--secondary); font-weight: bold;">Регистрация</a>
        </div>
        <div style="margin-top: 10px; font-size: 0.8rem; opacity: 0.5;">
            <a href="index.php">← Вернуться на главную</a>
        </div>
    </div>

</body>
</html>