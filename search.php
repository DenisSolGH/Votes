<?php
    require "header.html";
    require_once 'database.php';
?>


<!-- Лабораторнаяработа №6
Страница объекта
-->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="style.css">

<title>Голосование</title>

</head>
<!--  Header -->
<?php
    // Шаг 1: Получение соединения с базой данных
    $conn = db_connect();

    // Шаг 2: Получение ключевого слова из GET-параметра
    $query = isset($_GET['query']) ? $_GET['query'] : null;

    // Шаг 3: Выполнение SQL-запроса с сортировкой по длине имени
    $sql = "SELECT * FROM candidate WHERE short_description LIKE '%$query%' ORDER BY LENGTH(name) DESC";
    $result = mysqli_query($conn, $sql);

    // Шаг 4: Вывод результатов
    echo '<h1>Результаты поиска: ' . $query . '</h1>';

    if (mysqli_num_rows($result) > 0) {
        echo '<ul>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<li>Длинное описание: ' . $row['name'] . '</li>';
            echo '<li>Изображение: <img src="' . $row['candidate_image'] . '" alt="Изображение кандидата"></li>';
            echo '<li>Длинное описание: ' . $row['short_description'] . '</li>';
            echo '<li>Короткое описание: ' . $row['long_description'] . '</li>';
            // Дополнительные поля можно добавить по необходимости
        }
        echo '</ul>';
    } else {
        echo '<p>Ничего не найдено.</p>';
    }
?>
