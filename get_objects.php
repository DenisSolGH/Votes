<?php
    // Подключаем файл с функцией db_connect
    require_once 'database.php';

    // Устанавливаем соединение с базой данных
    $connection = db_connect();

    // Проверяем успешность соединения
    if ($connection) {
        // Выполняем SQL-запрос
        $sql = "SELECT name FROM candidate";
        $result = mysqli_query($connection, $sql);

        // Проверяем успешность запроса
        if ($result) {
            // Инициализируем массив для хранения объектов
            $objects = array();

            // Извлекаем данные из результата запроса
            while ($row = mysqli_fetch_assoc($result)) {
                $objects[] = $row['name'];
            }

            // Возвращаем JSON-представление массива
            echo json_encode($objects);
        } else {
            // Выводим сообщение об ошибке запроса
            echo "Ошибка запроса: " . mysqli_error($connection);
        }

        // Закрываем соединение
        mysqli_close($connection);
    } else {
        // Выводим сообщение об ошибке соединения
        echo "Ошибка соединения с базой данных";
    }
?>

