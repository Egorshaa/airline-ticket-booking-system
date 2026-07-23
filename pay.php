<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    die("Вы не авторизованы");
}

$booking_id = (int)($_GET['id'] ?? 0);
$user_id = $_SESSION['user_id'];

$stmt = $pdo->prepare("
    SELECT b.*, f.price, f.flight_number, f.origin, f.destination 
    FROM bookings b 
    JOIN flights f ON b.flight_id = f.id 
    WHERE b.id = ? AND b.user_id = ?
");
$stmt->execute([$booking_id, $user_id]);
$order = $stmt->fetch();

if (!$order) die("Ошибка заказа");

$sum = $order['price'];

$wallet = '410016230749230';

$host = $_SERVER['HTTP_HOST'];
$path = rtrim(str_replace('\\', '/', dirname($_SERVER['PHP_SELF'])), '/');

$success_url = "http://{$host}{$path}/success_pay.php?booking_id={$booking_id}";
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Оплата</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container" style="display:flex; justify-content:center; align-items:center; height:80vh;">
    <div class="glass-panel" style="text-align: center; width: 400px;">
        <h2>Оплата заказа #<?= $booking_id ?></h2>
        <p><?= $order['origin'] ?> ➝ <?= $order['destination'] ?></p>
        <h1 style="color: gold; margin: 20px 0;"><?= $sum ?> ₽</h1>

        <form method="POST" action="https://yoomoney.ru/quickpay/confirm.xml">
            <input type="hidden" name="receiver" value="<?= $wallet ?>">
            <input type="hidden" name="label" value="<?= $booking_id ?>">
            <input type="hidden" name="quickpay-form" value="shop">
            <input type="hidden" name="targets" value="Билет С-ЛАЙН <?= $order['flight_number'] ?>">
            <input type="hidden" name="sum" value="<?= $sum ?>">
            <input type="hidden" name="paymentType" value="AC">
            <input type="hidden" name="successURL" value="<?= $success_url ?>">

            <button type="submit" style="background:#8e44ad;color:white;width:100%;padding:15px;font-size:1.1rem;">
                💳 Оплатить
            </button>
        </form>
    </div>
</div>
</body>
</html>