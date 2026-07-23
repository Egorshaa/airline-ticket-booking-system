<?php
require 'db.php';

// сначала удаляем брони (иначе нельзя удалить рейсы)
$pdo->exec("DELETE FROM bookings");

// потом удаляем рейсы
$pdo->exec("DELETE FROM flights");

// создаём новые рейсы
for ($i = 1; $i <= 10; $i++) {

    $departure = date('Y-m-d H:i:s', strtotime("+$i day 10:00"));
    $arrival = date('Y-m-d H:i:s', strtotime("+$i day 14:00"));

    $stmt = $pdo->prepare("
        INSERT INTO flights 
        (flight_number, origin, destination, departure_time, arrival_time, price, seats_total, seats_booked, status, category)
        VALUES (?, ?, ?, ?, ?, ?, ?, 0, 'По расписанию', 'europe')
    ");

    $stmt->execute([
        'SU' . rand(100, 999),
        'Москва',
        'Стамбул',
        $departure,
        $arrival,
        rand(5000, 15000),
        180
    ]);
}

echo "ГОТОВО: всё пересоздано";