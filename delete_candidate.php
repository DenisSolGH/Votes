<?php
    require_once 'database.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Получение идентификатора объекта для удаления
        $objectName = $_POST['objectName'];

        // Подключение к базе данных
        $connection = db_connect();

        // Подготовка SQL-запроса
        $sql = "DELETE FROM candidate WHERE name = ?";

        // Подготовка выражения
        $stmt = mysqli_prepare($connection, $sql);
        mysqli_stmt_bind_param($stmt, 's', $objectName);

        // Выполнение запроса
        $success = mysqli_stmt_execute($stmt);

        // Проверка на успех выполнения запроса
        if ($success) {
            echo "Объект успешно удален из базы данных.";
        } else {
            echo "Ошибка при удалении объекта: " . mysqli_error($connection);
        }

        // Закрытие выражения и соединения
        mysqli_stmt_close($stmt);
        mysqli_close($connection);
    }
?>
