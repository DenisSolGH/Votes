<?php
    require_once 'database.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Получение данных из формы
        $objectName = $_POST['objectName'];
        $shortDescription = $_POST['shortDescription'];
        $longDescription = $_POST['longDescription'];

        // Подключение к базе данных
        $connection = db_connect();

        // Подготовка SQL-запроса
        $sql = "INSERT INTO candidate (name, short_description, long_description, candidate_image) VALUES (?, ?, ?, ?)";

        // Указание пути к изображению по умолчанию
        $defaultImagePath = "https://st3.depositphotos.com/1005233/18095/i/450/depositphotos_180950880-stock-photo-view-business-network-application-displayed.jpg";

        // Подготовка выражения
        $stmt = mysqli_prepare($connection, $sql);
        mysqli_stmt_bind_param($stmt, 'ssss', $objectName, $shortDescription, $longDescription, $defaultImagePath);

        // Выполнение запроса
        $success = mysqli_stmt_execute($stmt);

        // Проверка на успех выполнения запроса
        if ($success) {
            echo "Кандидат успешно добавлен в базу данных.";
        } else {
            echo "Ошибка при добавлении кандидата: " . mysqli_error($connection);
        }

        // Закрытие выражения и соединения
        mysqli_stmt_close($stmt);
        mysqli_close($connection);
    }
?>




