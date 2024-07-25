<?php

$link = mysqli_connect("localhost", "root", "", "bron");

if (mysqli_connect_errno()) {
    echo "Ошибка подключения к базе данных: " . mysqli_connect_error();
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $time = $_POST['time'];


    $sql = "INSERT INTO bron (name, phone, date, number) VALUES ('$name', '$phone', '$date', '$time')";
    if (mysqli_query($link, $sql)) {

        echo "<h2>Ваше бронирование:</h2>";
        echo "<b>Имя:</b> " . $name . "<br>";
        echo "<b>Телефон:</b> " . $phone . "<br>";
        echo "<b>Дата:</b> " . $date . "<br>";
        echo "<b>Время:</b> " . $time . "<br>";
        echo "<p>Спасибо за бронирование! Мы ждем вас!</p>";
    } else {
        echo "Ошибка при оформлении бронирования: " . mysqli_error($link);
    }

    mysqli_close($link);
} else {
    echo "Ошибка: Неправильный запрос.";
}
?>
