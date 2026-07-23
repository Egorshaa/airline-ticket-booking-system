<?php
require 'db.php';

/* --- ГОРОДА С КООРДИНАТАМИ И ЧАСОВЫМИ ПОЯСАМИ --- */
$cities = [
    ['Москва','Париж', 55.75, 37.61, 48.85, 2.35, 'Europe/Moscow', 'Europe/Paris', 'europe'],
    ['Москва','Берлин', 55.75, 37.61, 52.52, 13.40, 'Europe/Moscow', 'Europe/Berlin', 'europe'],
    ['Москва','Токио', 55.75, 37.61, 35.68, 139.69, 'Europe/Moscow', 'Asia/Tokyo', 'asia'],
    ['Москва','Дубай', 55.75, 37.61, 25.20, 55.27, 'Europe/Moscow', 'Asia/Dubai', 'asia'],
    ['Москва','Нью-Йорк', 55.75, 37.61, 40.71, -74.00, 'Europe/Moscow', 'America/New_York', 'america'],
    ['Москва','Лос-Анджелес', 55.75, 37.61, 34.05, -118.24, 'Europe/Moscow', 'America/Los_Angeles', 'america'],
    ['Москва','Каир', 55.75, 37.61, 30.04, 31.23, 'Europe/Moscow', 'Africa/Cairo', 'africa'],
];

/* --- ФУНКЦИЯ РАССТОЯНИЯ (HAVERSINE) --- */
function distance($lat1, $lon1, $lat2, $lon2) {
    $earth = 6371;
    $dLat = deg2rad($lat2 - $lat1);
    $dLon = deg2rad($lon2 - $lon1);
    $a = sin($dLat/2) * sin($dLat/2) +
         cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
         sin($dLon/2) * sin($dLon/2);
    return $earth * 2 * atan2(sqrt($a), sqrt(1-$a));
}

for ($i = 0; $i < 30; $i++) {

    $c = $cities[array_rand($cities)];

    /* --- РАССТОЯНИЕ --- */
    $km = distance($c[2], $c[3], $c[4], $c[5]);

    /* --- СКОРОСТЬ САМОЛЁТА ~800 км/ч --- */
    $flight_hours = $km / 800;

    /* --- ДАТА ВЫЛЕТА --- */
    $departure_ts = strtotime('+' . rand(1, 20) . ' days +' . rand(0, 23) . ' hours');

    $departure = date('Y-m-d H:i:s', $departure_ts);

    /* --- ПРИЛЁТ --- */
    $arrival_ts = $departure_ts + ($flight_hours * 3600);
    $arrival = date('Y-m-d H:i:s', $arrival_ts);

    /* --- ЦЕНА (зависит от расстояния) --- */
    $price = round($km * 5); // ~5 руб за км

    /* --- СТАТУСЫ (реализм) --- */
    $statuses = ['По расписанию','По расписанию','По расписанию','Задержан'];
    $status = $statuses[array_rand($statuses)];

    $stmt = $pdo->prepare("
        INSERT INTO flights 
        (flight_number, origin, destination, departure_time, arrival_time, price, seats_total, seats_booked, status, category)
        VALUES (?, ?, ?, ?, ?, ?, ?, 0, ?, ?)
    ");

    $stmt->execute([
        'SU' . rand(100,999),
        $c[0],
        $c[1],
        $departure,
        $arrival,
        $price,
        rand(150, 250),
        $status,
        $c[8]
    ]);
}

echo "✈️ Реалистичные рейсы созданы";