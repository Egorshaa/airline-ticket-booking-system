<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    die("Вы не авторизованы");
}

$booking_id = (int)($_GET['booking_id'] ?? 0);
$user_id = $_SESSION['user_id'];

if (!$booking_id) {
    header("Location: client/index.php");
    exit;
}

/* --- БЕРЕМ БРОНЬ --- */
$stmt = $pdo->prepare("
    SELECT * FROM bookings 
    WHERE id = ? AND user_id = ?
");
$stmt->execute([$booking_id, $user_id]);
$booking = $stmt->fetch();

if (!$booking) {
    die("❌ Бронь не найдена");
}

/* --- ЕСЛИ УЖЕ ОПЛАЧЕНО --- */
if ($booking['status'] === 'paid') {
    // просто показываем страницу, без повторного увеличения мест
} else {

    /* --- ОБНОВЛЯЕМ --- */
    $pdo->prepare("
        UPDATE bookings SET status = 'paid' WHERE id = ?
    ")->execute([$booking_id]);

    /* --- ОБНОВЛЯЕМ МЕСТА --- */
    $pdo->prepare("
        UPDATE flights 
        SET seats_booked = seats_booked + 1 
        WHERE id = ?
    ")->execute([$booking['flight_id']]);
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Успешно!</title>
    <style>
        body { 
            background: #1e1e2e; 
            color: white; 
            font-family: sans-serif; 
            display: flex; 
            flex-direction: column; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            text-align: center; 
        }
        h1 { color: #2ecc71; font-size: 3rem; margin-bottom: 10px;}
        p { font-size: 1.2rem; opacity: 0.8; }
    </style>
</head>
<body>
    <h1>✅ Оплата прошла!</h1>
    <p>Спасибо, что выбрали С-ЛАЙН.</p>
    <p>Сейчас вы будете перенаправлены в личный кабинет...</p>

    <script>
        setTimeout(() => { 
            window.location.href = 'client/index.php'; 
        }, 3000);
    </script>
</body>
</html>